<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $revenueMonth = \App\Models\Pemesanan::where('status_pembayaran', 'sudah_bayar')
            ->whereMonth('tanggal_pemesanan', now()->month)
            ->whereYear('tanggal_pemesanan', now()->year)
            ->sum('total_harga');

        $ordersToday = \App\Models\Pemesanan::whereDate('tanggal_pemesanan', now()->toDateString())
            ->count();

        $roomsAvailable = \App\Models\Room::where('status_room', 'tersedia')->count();
        $roomsOccupied = \App\Models\Room::where('status_room', 'dipakai')->count();
        $totalRooms = \App\Models\Room::count();

        $totalCustomers = \App\Models\Pelanggan::count();

        return [
            Stat::make('Pendapatan Bulan Ini', 'Rp ' . number_format($revenueMonth, 0, ',', '.'))
                ->description('Total pendapatan yang sudah dibayar')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
            
            Stat::make('Pemesanan Hari Ini', $ordersToday . ' Transaksi')
                ->description('Jumlah pemesanan masuk hari ini')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('info'),

            Stat::make('Status Room', "{$roomsAvailable} Tersedia / {$roomsOccupied} Dipakai")
                ->description("Total room terdaftar: {$totalRooms}")
                ->descriptionIcon('heroicon-m-home')
                ->color($roomsAvailable > 0 ? 'success' : 'danger'),

            Stat::make('Total Pelanggan', $totalCustomers . ' Orang')
                ->description('Pelanggan terdaftar dalam sistem')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),
        ];
    }
}
