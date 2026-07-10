<?php

namespace App\Filament\Resources\Pelanggans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;

class PelangganForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_pelanggan')
                    ->label('Nama Pelanggan')
                    ->required()
                    ->maxLength(100),
                TextInput::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->required()
                    ->maxLength(20)
                    ->unique('pelanggan', 'nomor_telepon', ignoreRecord: true),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(100)
                    ->unique('pelanggan', 'email', ignoreRecord: true),
                Textarea::make('alamat')
                    ->label('Alamat')
                    ->rows(3)
                    ->columnSpanFull(),
                    
                Section::make('Detail Tambahan (One-to-One)')
                    ->relationship('detail')
                    ->schema([
                        TextInput::make('nik')
                            ->label('NIK')
                            ->required()
                            ->unique('detail_pelanggan', 'nik', ignoreRecord: true)
                            ->maxLength(20),
                        DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
