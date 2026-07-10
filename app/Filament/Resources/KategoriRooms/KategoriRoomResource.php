<?php

namespace App\Filament\Resources\KategoriRooms;

use App\Filament\Resources\KategoriRooms\Pages\CreateKategoriRoom;
use App\Filament\Resources\KategoriRooms\Pages\EditKategoriRoom;
use App\Filament\Resources\KategoriRooms\Pages\ListKategoriRooms;
use App\Filament\Resources\KategoriRooms\Schemas\KategoriRoomForm;
use App\Filament\Resources\KategoriRooms\Tables\KategoriRoomsTable;
use App\Models\KategoriRoom;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KategoriRoomResource extends Resource
{
    protected static ?string $model = KategoriRoom::class;

    protected static ?string $navigationLabel = 'Kategori Room';
    protected static ?string $pluralLabel = 'Kategori Room';
    protected static ?string $modelLabel = 'Kategori Room';
    protected static \UnitEnum|string|null $navigationGroup = 'Master Data';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $recordTitleAttribute = 'nama_kategori';

    public static function form(Schema $schema): Schema
    {
        return KategoriRoomForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KategoriRoomsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKategoriRooms::route('/'),
            'create' => CreateKategoriRoom::route('/create'),
            'edit' => EditKategoriRoom::route('/{record}/edit'),
        ];
    }
}
