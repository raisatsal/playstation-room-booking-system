<?php

namespace App\Filament\Resources\Rooms\Schemas;

use App\Models\KategoriRoom;
use App\Models\JenisPlaystation;
use App\Models\Room;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\CheckboxList;
use Filament\Schemas\Schema;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_room')
                    ->label('Kode Room')
                    ->default(function () {
                        $lastRoom = Room::orderBy('id_room', 'desc')->first();
                        if (!$lastRoom) {
                            return 'RM01';
                        }
                        $lastNum = (int) substr($lastRoom->kode_room, 2);
                        $nextNum = $lastNum + 1;
                        return 'RM' . str_pad($nextNum, 2, '0', STR_PAD_LEFT);
                    })
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->unique(Room::class, 'kode_room', ignoreRecord: true),
                    
                TextInput::make('nama_room')
                    ->label('Nama Room')
                    ->required()
                    ->maxLength(100),
                    
                Select::make('id_kategori_room')
                    ->label('Kategori Room')
                    ->relationship('kategori', 'nama_kategori')
                    ->required()
                    ->reactive(),
                    
                Select::make('id_jenis_playstation')
                    ->label('Jenis PlayStation')
                    ->relationship('jenisPlaystation', 'nama_playstation')
                    ->required(),
                    
                TextInput::make('harga_per_jam')
                    ->label('Harga Per Jam')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
                    
                TextInput::make('kapasitas_orang')
                    ->label('Kapasitas Orang')
                    ->numeric()
                    ->default(1)
                    ->required(),
                    
                Select::make('status_room')
                    ->label('Status Room')
                    ->options([
                        'tersedia' => 'Tersedia',
                        'dipakai' => 'Dipakai',
                        'maintenance' => 'Maintenance',
                    ])
                    ->default('tersedia')
                    ->required(),
                    
                FileUpload::make('foto_room')
                    ->label('Foto Room')
                    ->image()
                    ->disk('public')
                    ->directory('rooms')
                    ->visibility('public')
                    ->columnSpanFull(),
                    
                CheckboxList::make('fasilitas')
                    ->label('Fasilitas')
                    ->relationship('fasilitas', 'nama_fasilitas')
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
