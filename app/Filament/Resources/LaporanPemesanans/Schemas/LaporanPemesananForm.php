<?php

namespace App\Filament\Resources\LaporanPemesanans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;

class LaporanPemesananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_pemesanan')->label('Kode Pemesanan')->disabled(),
                TextInput::make('nama_pelanggan')->label('Nama Pelanggan')->disabled(),
                TextInput::make('nama_room')->label('Nama Room')->disabled(),
                DatePicker::make('tanggal_pemesanan')->label('Tanggal')->disabled(),
                TextInput::make('durasi_jam')->label('Durasi (Jam)')->disabled(),
                TextInput::make('total_harga')->label('Total Harga')->disabled()->prefix('Rp'),
                TextInput::make('metode_pembayaran')->label('Metode Pembayaran')->disabled(),
                TextInput::make('status_pembayaran')->label('Status Pembayaran')->disabled(),
                TextInput::make('status_pemesanan')->label('Status Pemesanan')->disabled(),
            ]);
    }
}
