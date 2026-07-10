<?php

namespace App\Filament\Resources\JenisPlaystations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class JenisPlaystationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_playstation')
                    ->label('Nama PlayStation')
                    ->required()
                    ->maxLength(100),
                TextInput::make('generasi')
                    ->label('Generasi')
                    ->maxLength(50)
                    ->placeholder('Contoh: PS5, PS4 Pro'),
                Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->columnSpanFull()
                    ->rows(3),
            ]);
    }
}
