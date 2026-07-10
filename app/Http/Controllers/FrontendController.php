<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class FrontendController extends Controller
{

    public function index()
    {
        // Fetch 4 featured rooms for home page preview
        $rooms = Room::with(['kategori', 'jenisPlaystation'])->limit(4)->get();
        return view('frontend.home', compact('rooms'));
    }

    public function room()
    {
        $rooms = Room::with(['kategori', 'jenisPlaystation'])->get();
        return view('frontend.room', compact('rooms'));
    }

    public function howToBook()
    {
        return view('frontend.how-to-book');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }


    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('frontend.auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Jika rolenya Admin atau Operator, redirect ke panel admin
            if ($user->hasRole(['Admin', 'Operator'])) {
                return redirect()->intended('/admin');
            }

            return redirect()->intended('/')->with('success', 'Selamat datang kembali, ' . $user->name . '!');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan salah.',
        ])->onlyInput('email');
    }


    public function showRegister()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('frontend.auth.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:100',
            'email'          => 'required|string|email|max:100|unique:users|unique:pelanggan,email',
            'password'       => 'required|string|min:8|confirmed',
            'nomor_telepon'  => 'required|string|max:20|unique:pelanggan',
            'nik'            => 'required|string|max:20|unique:detail_pelanggan',
            'tanggal_lahir'  => 'required|date|before:today',
            'alamat'         => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // 1. Buat User
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Assign role 'Pelanggan' ke user baru
            $user->assignRole('Pelanggan');

            // 2. Buat Pelanggan
            $pelanggan = Pelanggan::create([
                'nama_pelanggan' => $request->name,
                'nomor_telepon' => $request->nomor_telepon,
                'email' => $request->email,
                'alamat' => $request->alamat,
            ]);

            // 3. Buat Detail Pelanggan
            $pelanggan->detail()->create([
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);

            DB::commit();

            Auth::login($user);

            return redirect('/')->with('success', 'Registrasi berhasil! Selamat datang di PSRoom Enterprise.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat pendaftaran: ' . $e->getMessage())->withInput();
        }
    }


    public function showBooking($id_room)
    {
        $room = Room::with(['kategori', 'jenisPlaystation'])->findOrFail($id_room);
        
        if ($room->status_room !== 'tersedia') {
            return redirect('/')->with('error', 'Room ' . $room->nama_room . ' saat ini sedang tidak tersedia untuk dipesan.');
        }

        // Cek data pelanggan
        $user = Auth::user();
        $pelanggan = $user->pelanggan;

        if (!$pelanggan) {
            return redirect('/')->with('error', 'Data profile pelanggan Anda tidak ditemukan. Silakan hubungi admin.');
        }

        return view('frontend.booking', compact('room', 'pelanggan'));
    }


    public function booking(Request $request, $id_room)
    {
        $request->validate([
            'jam_mulai'          => 'required|date_format:H:i',
            'jam_selesai'        => 'required|date_format:H:i|different:jam_mulai',
            'metode_pembayaran'  => 'required|in:cash,transfer,qris',
        ]);

        $room = Room::with('kategori')->findOrFail($id_room);

        if ($room->status_room !== 'tersedia') {
            return redirect('/')->with('error', 'Room sudah tidak tersedia.');
        }

        $user = Auth::user();
        $pelanggan = $user->pelanggan;

        if (!$pelanggan) {
            return redirect('/')->with('error', 'Profil pelanggan Anda tidak ditemukan.');
        }

        // Hitung durasi dan total harga di backend demi keamanan
        $time1 = Carbon::parse($request->jam_mulai);
        $time2 = Carbon::parse($request->jam_selesai);

        if ($time2->lt($time1)) {
            $time2->addDay();
        }

        $durasi = $time1->diffInHours($time2);
        if ($durasi == 0 && $time1->diffInMinutes($time2) > 0) {
            $durasi = 1;
        }

        if ($durasi <= 0) {
            return back()->with('error', 'Jam selesai sewa harus lebih lambat daripada jam mulai sewa.')->withInput();
        }

        $hargaPerJam = $room->harga_per_jam;
        $hargaTambahan = $room->kategori?->harga_tambahan ?? 0;
        $totalHarga = ($hargaPerJam + $hargaTambahan) * $durasi;

        // Auto-generate kode pemesanan
        $datePart = now()->format('Ymd');
        $lastBooking = Pemesanan::whereDate('tanggal_pemesanan', now()->toDateString())
            ->orderBy('id_pemesanan', 'desc')
            ->first();
            
        if (!$lastBooking) {
            $kode = "PMS-{$datePart}-0001";
        } else {
            $parts = explode('-', $lastBooking->kode_pemesanan);
            $lastNum = (int) end($parts);
            $nextNum = $lastNum + 1;
            $paddedNum = str_pad($nextNum, 4, '0', STR_PAD_LEFT);
            $kode = "PMS-{$datePart}-{$paddedNum}";
        }

        // Simpan Pemesanan
        Pemesanan::create([
            'id_pelanggan' => $pelanggan->id_pelanggan,
            'id_room' => $room->id_room,
            'kode_pemesanan' => $kode,
            'tanggal_pemesanan' => date('Y-m-d'),
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'durasi_jam' => $durasi,
            'total_harga' => $totalHarga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_pembayaran' => 'belum_bayar',
            'status_pemesanan' => 'aktif',

        ]);

        return redirect('/riwayat')->with('success', 'Pemesanan room ' . $room->nama_room . ' berhasil dikirim! Status saat ini aktif.');
    }

    // Tampilkan Riwayat Pemesanan Pelanggan
    public function history()
    {
        $user = Auth::user();
        $pelanggan = $user->pelanggan;

        if (!$pelanggan) {
            return redirect('/')->with('error', 'Profil pelanggan tidak ditemukan.');
        }

        $bookings = Pemesanan::with('room')
            ->where('id_pelanggan', $pelanggan->id_pelanggan)
            ->orderBy('id_pemesanan', 'desc')
            ->get();

        return view('frontend.history', compact('bookings'));
    }

    // Proses Logout Pelanggan
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Anda telah berhasil keluar.');
    }
}