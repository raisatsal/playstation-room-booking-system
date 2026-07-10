<?php

namespace App\Filament\Resources\JenisPlaystations;

use App\Filament\Resources\JenisPlaystations\Pages\CreateJenisPlaystation;
use App\Filament\Resources\JenisPlaystations\Pages\EditJenisPlaystation;
use App\Filament\Resources\JenisPlaystations\Pages\ListJenisPlaystations;
use App\Filament\Resources\JenisPlaystations\Schemas\JenisPlaystationForm;
use App\Filament\Resources\JenisPlaystations\Tables\JenisPlaystationsTable;
use App\Models\JenisPlaystation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JenisPlaystationResource extends Resource
{
    protected static ?string $model = JenisPlaystation::class;

    protected static ?string $navigationLabel = 'Jenis PlayStation';
    protected static ?string $pluralLabel = 'Jenis PlayStation';
    protected static ?string $modelLabel = 'Jenis PlayStation';
    protected static \UnitEnum|string|null $navigationGroup = 'Master Data';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?string $recordTitleAttribute = 'nama_playstation';

    public static function form(Schema $schema): Schema
    {
        return JenisPlaystationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JenisPlaystationsTable::configure($table);
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
            'index' => ListJenisPlaystations::route('/'),
            'create' => CreateJenisPlaystation::route('/create'),
            'edit' => EditJenisPlaystation::route('/{record}/edit'),
        ];
    }
}
