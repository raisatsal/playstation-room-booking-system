<?php

namespace App\Filament\Resources\Pemesanans\Schemas;

use App\Models\Pemesanan;
use App\Models\Room;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;
use Carbon\Carbon;

class PemesananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_pemesanan')
                    ->label('Kode Pemesanan')
                    ->default(function () {
                        $datePart = now()->format('Ymd');
                        $lastBooking = Pemesanan::whereDate('tanggal_pemesanan', now()->toDateString())
                            ->orderBy('id_pemesanan', 'desc')
                            ->first();
                            
                        if (!$lastBooking) {
                            return "PMS-{$datePart}-0001";
                        }
                        
                        $parts = explode('-', $lastBooking->kode_pemesanan);
                        $lastNum = (int) end($parts);
                        $nextNum = $lastNum + 1;
                        $paddedNum = str_pad($nextNum, 4, '0', STR_PAD_LEFT);
                        
                        return "PMS-{$datePart}-{$paddedNum}";
                    })
                    ->disabled()
                    ->dehydrated()
                    ->required(),
                    
                Select::make('id_pelanggan')
                    ->label('Pelanggan')
                    ->relationship('pelanggan', 'nama_pelanggan')
                    ->searchable()
                    ->preload()
                    ->required(),
                    
                Select::make('id_room')
                    ->label('Room PlayStation')
                    ->relationship(
                        name: 'room',
                        titleAttribute: 'nama_room',
                        modifyQueryUsing: fn ($query) => $query->orderByRaw("FIELD(status_room, 'tersedia', 'maintenance', 'dipakai')")
                    )
                    ->searchable()
                    ->preload()
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn ($state, $set, $get) => self::calculateTotal($set, $get)),
                    
                DatePicker::make('tanggal_pemesanan')
                    ->label('Tanggal Main')
                    ->default(now())
                    ->required(),
                    
                TimePicker::make('jam_mulai')
                    ->label('Jam Mulai')
                    ->default(now()->format('H:i'))
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn ($state, $set, $get) => self::calculateTotal($set, $get)),
                    
                TimePicker::make('jam_selesai')
                    ->label('Jam Selesai')
                    ->default(now()->addHour()->format('H:i'))
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn ($state, $set, $get) => self::calculateTotal($set, $get)),
                    
                TextInput::make('durasi_jam')
                    ->label('Durasi (Jam)')
                    ->numeric()
                    ->default(1)
                    ->disabled()
                    ->dehydrated()
                    ->required(),
                    
                TextInput::make('total_harga')
                    ->label('Total Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled()
                    ->dehydrated()
                    ->required(),
                    
                Select::make('metode_pembayaran')
                    ->label('Metode Pembayaran')
                    ->options([
                        'cash' => 'Cash',
                        'transfer' => 'Transfer Bank',
                        'qris' => 'QRIS',
                    ])
                    ->default('cash')
                    ->required(),
                    
                Select::make('status_pembayaran')
                    ->label('Status Pembayaran')
                    ->options([
                        'belum_bayar' => 'Belum Bayar',
                        'sudah_bayar' => 'Sudah Bayar',
                    ])
                    ->default('belum_bayar')
                    ->required(),
                    
                Select::make('status_pemesanan')
                    ->label('Status Pemesanan')
                    ->options([
                        'aktif' => 'Aktif (Sedang Main)',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->default('aktif')
                    ->required(),
            ]);
    }
    
    /**
     * Hitung durasi jam dan total harga pemesanan.
     */
    public static function calculateTotal($set, $get)
    {
        $jamMulai = $get('jam_mulai');
        $jamSelesai = $get('jam_selesai');
        $idRoom = $get('id_room');
        
        if (!$jamMulai || !$jamSelesai) {
            $set('durasi_jam', 0);
            $set('total_harga', 0);
            return;
        }
        
        // Parse time menggunakan Carbon
        $time1 = Carbon::parse($jamMulai);
        $time2 = Carbon::parse($jamSelesai);
        
        // Jika jam selesai lebih awal dari jam mulai, asumsikan melewati tengah malam (keesokan harinya)
        if ($time2->lt($time1)) {
            $time2->addDay();
        }
        
        $durasi = $time1->diffInHours($time2);
        
        // Minimal 1 jam jika ada perbedaan menit
        if ($durasi == 0 && $time1->diffInMinutes($time2) > 0) {
            $durasi = 1;
        }
        
        $set('durasi_jam', $durasi);
        
        if (!$idRoom) {
            $set('total_harga', 0);
            return;
        }
        
        // Dapatkan harga room dan harga tambahan kategori
        $room = Room::with('kategori')->find($idRoom);
        if ($room) {
            $hargaPerJam = $room->harga_per_jam;
            $hargaTambahan = $room->kategori?->harga_tambahan ?? 0;
            $totalHarga = ($hargaPerJam + $hargaTambahan) * $durasi;
            $set('total_harga', $totalHarga);
        } else {
            $set('total_harga', 0);
        }
    }
}
