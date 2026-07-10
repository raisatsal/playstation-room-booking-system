<?php

namespace App\Filament\Resources\JenisPlaystations\Pages;

use App\Filament\Resources\JenisPlaystations\JenisPlaystationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditJenisPlaystation extends EditRecord
{
    protected static string $resource = JenisPlaystationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
