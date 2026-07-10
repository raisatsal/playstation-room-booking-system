<?php

namespace App\Filament\Resources\LaporanPemesanans\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Table;

class LaporanPemesanansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_pemesanan')
                    ->label('Kode')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('nama_pelanggan')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('nama_room')
                    ->label('Room')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('nama_kategori')
                    ->label('Kategori')
                    ->sortable(),
                    
                TextColumn::make('nama_playstation')
                    ->label('Jenis PS')
                    ->sortable(),
                    
                TextColumn::make('tanggal_pemesanan')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                    
                TextColumn::make('durasi_jam')
                    ->label('Durasi')
                    ->numeric()
                    ->suffix(' Jam')
                    ->sortable(),
                    
                TextColumn::make('total_harga')
                    ->label('Total Harga')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->sortable(),
                    
                TextColumn::make('metode_pembayaran')
                    ->label('Metode')
                    ->badge()
                    ->color('gray'),
                    
                TextColumn::make('status_pembayaran')
                    ->label('Status Bayar')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'sudah_bayar' => 'success',
                        'belum_bayar' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'sudah_bayar' => 'Sudah Bayar',
                        'belum_bayar' => 'Belum Bayar',
                        default => $state,
                    })
                    ->sortable(),
                    
                TextColumn::make('status_pemesanan')
                    ->label('Status Main')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'info',
                        'selesai' => 'success',
                        'dibatalkan' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'aktif' => 'Aktif (Sedang Main)',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                        default => $state,
                    })
                    ->sortable(),
            ])
            ->filters([
                Filter::make('tanggal_pemesanan')
                    ->form([
                        DatePicker::make('dari_tanggal')->label('Dari Tanggal'),
                        DatePicker::make('sampai_tanggal')->label('Sampai Tanggal'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['dari_tanggal'], fn ($q, $date) => $q->whereDate('tanggal_pemesanan', '>=', $date))
                            ->when($data['sampai_tanggal'], fn ($q, $date) => $q->whereDate('tanggal_pemesanan', '<=', $date));
                    }),
                SelectFilter::make('status_pemesanan')
                    ->label('Status Pemesanan')
                    ->options([
                        'aktif' => 'Aktif',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ]),
                SelectFilter::make('status_pembayaran')
                    ->label('Status Pembayaran')
                    ->options([
                        'belum_bayar' => 'Belum Bayar',
                        'sudah_bayar' => 'Sudah Bayar',
                    ]),
            ])
            ->recordActions([]) // Kosongkan action agar read-only
            ->toolbarActions([]); // Kosongkan bulk actions agar read-only
    }
}
