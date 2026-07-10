<?php

namespace App\Filament\Resources\LaporanPemesanans\Pages;

use App\Filament\Resources\LaporanPemesanans\LaporanPemesananResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLaporanPemesanan extends EditRecord
{
    protected static string $resource = LaporanPemesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
