<?php

namespace App\Filament\Resources\Pemesanans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;

class PemesanansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_pemesanan')
                    ->label('Kode Pemesanan')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('pelanggan.nama_pelanggan')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('room.nama_room')
                    ->label('Room')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('tanggal_pemesanan')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                    
                TextColumn::make('jam_mulai')
                    ->label('Mulai')
                    ->time('H:i'),
                    
                TextColumn::make('jam_selesai')
                    ->label('Selesai')
                    ->time('H:i'),
                    
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
                    ->label('Pembayaran')
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
            ->recordActions([
                Action::make('selesaikan_pemesanan')
                    ->label('Selesaikan')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Selesaikan Pemesanan')
                    ->modalDescription('Apakah Anda yakin ingin menyelesaikan pemesanan ini? Tindakan ini akan memicu Stored Procedure di database untuk memperbarui status pemesanan, pembayaran, serta status room.')
                    ->visible(fn ($record) => $record->status_pemesanan === 'aktif')
                    ->action(function ($record) {
                        // Jalankan Stored Procedure di MySQL
                        DB::select("CALL sp_selesaikan_pemesanan(?)", [$record->id_pemesanan]);
                        
                        Notification::make()
                            ->title('Transaksi Selesai')
                            ->body("Pemesanan {$record->kode_pemesanan} berhasil diselesaikan via Stored Procedure database.")
                            ->success()
                            ->send();
                    }),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
