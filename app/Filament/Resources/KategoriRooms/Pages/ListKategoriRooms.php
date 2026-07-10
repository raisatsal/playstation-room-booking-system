<?php

namespace App\Filament\Resources\KategoriRooms\Pages;

use App\Filament\Resources\KategoriRooms\KategoriRoomResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKategoriRooms extends ListRecords
{
    protected static string $resource = KategoriRoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
