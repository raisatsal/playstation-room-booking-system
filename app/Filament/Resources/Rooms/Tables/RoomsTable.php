<?php

namespace App\Filament\Resources\Rooms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class RoomsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto_room')
                    ->label('Foto')
                    ->disk('public')
                    ->square(),
                    
                TextColumn::make('kode_room')
                    ->label('Kode Room')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('nama_room')
                    ->label('Nama Room')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('jenisPlaystation.nama_playstation')
                    ->label('PlayStation')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('harga_per_jam')
                    ->label('Harga/Jam')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->sortable(),
                    
                TextColumn::make('kapasitas_orang')
                    ->label('Kapasitas')
                    ->numeric()
                    ->suffix(' Orang')
                    ->sortable(),
                    
                TextColumn::make('status_room')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'tersedia' => 'success',
                        'dipakai' => 'danger',
                        'maintenance' => 'warning',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status_room')
                    ->label('Status Room')
                    ->options([
                        'tersedia' => 'Tersedia',
                        'dipakai' => 'Dipakai',
                        'maintenance' => 'Maintenance',
                    ]),
                SelectFilter::make('id_kategori_room')
                    ->label('Kategori Room')
                    ->relationship('kategori', 'nama_kategori'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
