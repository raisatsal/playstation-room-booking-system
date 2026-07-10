<?php

namespace App\Filament\Resources\JenisPlaystations\Pages;

use App\Filament\Resources\JenisPlaystations\JenisPlaystationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJenisPlaystations extends ListRecords
{
    protected static string $resource = JenisPlaystationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
