<?php

namespace App\Filament\Resources\KategoriRooms\Pages;

use App\Filament\Resources\KategoriRooms\KategoriRoomResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKategoriRoom extends EditRecord
{
    protected static string $resource = KategoriRoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
