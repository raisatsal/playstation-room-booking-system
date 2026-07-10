<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class IncomeChart extends ChartWidget
{
    protected ?string $heading = 'Income Chart';

    protected function getData(): array
    {
        $data = [];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        
        for ($monthNum = 1; $monthNum <= 12; $monthNum++) {
            $data[] = \App\Models\Pemesanan::where('status_pembayaran', 'sudah_bayar')
                ->whereMonth('tanggal_pemesanan', $monthNum)
                ->whereYear('tanggal_pemesanan', now()->year)
                ->sum('total_harga');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan Bulanan (Rp)',
                    'data' => $data,
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'fill' => 'start',
                    'tension' => 0.4,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
