<?php

namespace App\Filament\Resources\KategoriRooms\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KategoriRoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_kategori')
                    ->required(),
                TextInput::make('harga_tambahan')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
            ]);
    }
}
