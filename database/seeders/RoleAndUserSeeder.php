<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache permission Spatie agar tidak konflik
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // =============================
        // BUAT ROLE
        // =============================
        $roleAdmin    = Role::create(['name' => 'Admin']);
        $roleOperator = Role::create(['name' => 'Operator']);
        $rolePelanggan = Role::create(['name' => 'Pelanggan']);

        // =============================
        // BUAT PERMISSION
        // =============================

        // Permission untuk Pelanggan
        $permissions = [
            // Pelanggan
            'view_pelanggan',
            'create_pelanggan',
            'edit_pelanggan',
            'delete_pelanggan',

            // Room
            'view_room',
            'create_room',
            'edit_room',
            'delete_room',

            // Pemesanan
            'view_pemesanan',
            'create_pemesanan',
            'edit_pemesanan',
            'delete_pemesanan',

            // Kategori Room
            'view_kategori_room',
            'create_kategori_room',
            'edit_kategori_room',
            'delete_kategori_room',

            // Jenis PlayStation
            'view_jenis_playstation',
            'create_jenis_playstation',
            'edit_jenis_playstation',
            'delete_jenis_playstation',

            // Fasilitas
            'view_fasilitas',
            'create_fasilitas',
            'edit_fasilitas',
            'delete_fasilitas',

            // Laporan
            'view_laporan',

            // Dashboard
            'view_dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // =============================
        // ASSIGN PERMISSION KE ROLE
        // =============================

        // Admin → semua permission
        $roleAdmin->givePermissionTo(Permission::all());

        // Operator → hanya kelola pemesanan, room, pelanggan & lihat laporan
        $roleOperator->givePermissionTo([
            'view_pelanggan',
            'create_pelanggan',
            'edit_pelanggan',
            'view_room',
            'view_pemesanan',
            'create_pemesanan',
            'edit_pemesanan',
            'view_fasilitas',
            'view_laporan',
            'view_dashboard',
        ]);

        // Pelanggan → tidak ada akses ke panel admin
        // (nanti hanya bisa akses halaman publik)

        // =============================
        // BUAT USER
        // =============================

        // 1. User Admin
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole($roleAdmin);

        // 2. User Operator/Staff
        $operator = User::create([
            'name'     => 'Staff',
            'email'    => 'staff@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $operator->assignRole($roleOperator);

        // =============================
        // DATA MASTER DUMMY
        // =============================

        // 1. Kategori Room
        $vip = \App\Models\KategoriRoom::create([
            'nama_kategori' => 'VIP',
            'harga_tambahan' => 15000,
            'deskripsi' => 'Room eksklusif dengan AC, TV OLED 55 inci, dan sofa kulit premium',
        ]);

        $deluxe = \App\Models\KategoriRoom::create([
            'nama_kategori' => 'Deluxe',
            'harga_tambahan' => 8000,
            'deskripsi' => 'Room nyaman dengan AC, TV LED 43 inci, dan sofa santai',
        ]);

        $regular = \App\Models\KategoriRoom::create([
            'nama_kategori' => 'Regular',
            'harga_tambahan' => 0,
            'deskripsi' => 'Room standar dengan Kipas Angin, TV LED 32 inci',
        ]);

        // 2. Jenis PlayStation
        $ps5 = \App\Models\JenisPlaystation::create([
            'nama_playstation' => 'PlayStation 5',
            'generasi' => 'PS5',
            'keterangan' => 'Generasi terbaru dengan game visual 4K ultra smooth',
        ]);

        $ps4pro = \App\Models\JenisPlaystation::create([
            'nama_playstation' => 'PlayStation 4 Pro',
            'generasi' => 'PS4',
            'keterangan' => 'Generasi game visual 4K HDR',
        ]);

        $ps4 = \App\Models\JenisPlaystation::create([
            'nama_playstation' => 'PlayStation 4 Slim',
            'generasi' => 'PS4',
            'keterangan' => 'Generasi game visual Full HD',
        ]);

        // 3. Fasilitas
        $ac = \App\Models\Fasilitas::create(['nama_fasilitas' => 'AC', 'keterangan' => 'Pendingin ruangan']);
        $kipas = \App\Models\Fasilitas::create(['nama_fasilitas' => 'Kipas Angin', 'keterangan' => 'Kipas angin dinding']);
        $sofa = \App\Models\Fasilitas::create(['nama_fasilitas' => 'Sofa Premium', 'keterangan' => 'Sofa empuk mewah']);
        $tv4k = \App\Models\Fasilitas::create(['nama_fasilitas' => 'TV 4K OLED 55"', 'keterangan' => 'Televisi layar lebar kualitas tinggi']);
        $tvhd = \App\Models\Fasilitas::create(['nama_fasilitas' => 'TV LED 32"', 'keterangan' => 'Televisi standar hd']);
        $snack = \App\Models\Fasilitas::create(['nama_fasilitas' => 'Snack & Minum Gratis', 'keterangan' => 'Diberikan satu paket saat bermain']);

        // 4. Room
        $room1 = \App\Models\Room::create([
            'id_kategori_room' => $vip->id_kategori_room,
            'id_jenis_playstation' => $ps5->id_jenis_playstation,
            'kode_room' => 'RM01',
            'nama_room' => 'VIP Room 1',
            'harga_per_jam' => 30000,
            'kapasitas_orang' => 4,
            'status_room' => 'tersedia',
        ]);
        $room1->fasilitas()->sync([$ac->id_fasilitas, $sofa->id_fasilitas, $tv4k->id_fasilitas, $snack->id_fasilitas]);

        $room2 = \App\Models\Room::create([
            'id_kategori_room' => $vip->id_kategori_room,
            'id_jenis_playstation' => $ps5->id_jenis_playstation,
            'kode_room' => 'RM02',
            'nama_room' => 'VIP Room 2',
            'harga_per_jam' => 30000,
            'kapasitas_orang' => 4,
            'status_room' => 'tersedia',
        ]);
        $room2->fasilitas()->sync([$ac->id_fasilitas, $sofa->id_fasilitas, $tv4k->id_fasilitas, $snack->id_fasilitas]);

        $room3 = \App\Models\Room::create([
            'id_kategori_room' => $deluxe->id_kategori_room,
            'id_jenis_playstation' => $ps4pro->id_jenis_playstation,
            'kode_room' => 'RM03',
            'nama_room' => 'Deluxe Room 1',
            'harga_per_jam' => 20000,
            'kapasitas_orang' => 3,
            'status_room' => 'tersedia',
        ]);
        $room3->fasilitas()->sync([$ac->id_fasilitas, $sofa->id_fasilitas, $tvhd->id_fasilitas]);

        $room4 = \App\Models\Room::create([
            'id_kategori_room' => $regular->id_kategori_room,
            'id_jenis_playstation' => $ps4->id_jenis_playstation,
            'kode_room' => 'RM04',
            'nama_room' => 'Regular Room 1',
            'harga_per_jam' => 12000,
            'kapasitas_orang' => 2,
            'status_room' => 'tersedia',
        ]);
        $room4->fasilitas()->sync([$kipas->id_fasilitas, $tvhd->id_fasilitas]);

        // 5. Pelanggan (One-to-One dengan DetailPelanggan)
        $userBudi = User::create([
            'name'     => 'Budi Santoso',
            'email'    => 'budi@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $userBudi->assignRole('Pelanggan');

        $pelanggan1 = \App\Models\Pelanggan::create([
            'nama_pelanggan' => 'Budi Santoso',
            'nomor_telepon' => '081234567890',
            'email' => 'budi@gmail.com',
            'alamat' => 'Jl. Merdeka No. 10, Jakarta',
        ]);
        $pelanggan1->detail()->create([
            'nik' => '3171012345670001',
            'tanggal_lahir' => '1995-05-15',
        ]);

        $userAni = User::create([
            'name'     => 'Ani Wijaya',
            'email'    => 'ani@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $userAni->assignRole('Pelanggan');

        $pelanggan2 = \App\Models\Pelanggan::create([
            'nama_pelanggan' => 'Ani Wijaya',
            'nomor_telepon' => '085712345678',
            'email' => 'ani@gmail.com',
            'alamat' => 'Jl. Sudirman No. 25, Jakarta',
        ]);
        $pelanggan2->detail()->create([
            'nik' => '3171012345670002',
            'tanggal_lahir' => '1998-08-20',
        ]);

        // 6. Pemesanan (Transaksi Dummy)
        
        // Transaksi 1: Pemesanan Aktif Hari Ini (akan memicu trigger room dipake)
        $pemesanan1 = \App\Models\Pemesanan::create([
            'id_pelanggan' => $pelanggan1->id_pelanggan,
            'id_room' => $room1->id_room,
            'kode_pemesanan' => 'PMS-' . date('Ymd') . '-0001',
            'tanggal_pemesanan' => date('Y-m-d'),
            'jam_mulai' => '14:00',
            'jam_selesai' => '16:00',
            'durasi_jam' => 2,
            'total_harga' => 60000,
            'metode_pembayaran' => 'cash',
            'status_pembayaran' => 'belum_bayar',
            'status_pemesanan' => 'aktif',
        ]);

        // Transaksi 2: Pemesanan Selesai Bulan Ini (untuk chart pendapatan)
        $pemesanan2 = \App\Models\Pemesanan::create([
            'id_pelanggan' => $pelanggan2->id_pelanggan,
            'id_room' => $room3->id_room,
            'kode_pemesanan' => 'PMS-' . date('Ymd') . '-0002',
            'tanggal_pemesanan' => date('Y-m-d'),
            'jam_mulai' => '10:00',
            'jam_selesai' => '12:00',
            'durasi_jam' => 2,
            'total_harga' => 40000,
            'metode_pembayaran' => 'transfer',
            'status_pembayaran' => 'sudah_bayar',
            'status_pemesanan' => 'selesai',
        ]);
    }
}