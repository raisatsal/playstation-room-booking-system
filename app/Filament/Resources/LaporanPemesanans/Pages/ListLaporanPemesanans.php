<?php

namespace App\Filament\Resources\LaporanPemesanans\Pages;

use App\Filament\Resources\LaporanPemesanans\LaporanPemesananResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLaporanPemesanans extends ListRecords
{
    protected static string $resource = LaporanPemesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
