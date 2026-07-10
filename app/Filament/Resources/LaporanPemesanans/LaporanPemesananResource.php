<?php

namespace App\Filament\Resources\LaporanPemesanans;

use App\Filament\Resources\LaporanPemesanans\Pages\CreateLaporanPemesanan;
use App\Filament\Resources\LaporanPemesanans\Pages\EditLaporanPemesanan;
use App\Filament\Resources\LaporanPemesanans\Pages\ListLaporanPemesanans;
use App\Filament\Resources\LaporanPemesanans\Schemas\LaporanPemesananForm;
use App\Filament\Resources\LaporanPemesanans\Tables\LaporanPemesanansTable;
use App\Models\LaporanPemesanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LaporanPemesananResource extends Resource
{
    protected static ?string $model = LaporanPemesanan::class;

    protected static ?string $navigationLabel = 'Laporan Pemesanan';
    protected static ?string $pluralLabel = 'Laporan Pemesanan';
    protected static ?string $modelLabel = 'Laporan Pemesanan';
    protected static \UnitEnum|string|null $navigationGroup = 'Laporan & Statistik';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'kode_pemesanan';

    public static function form(Schema $schema): Schema
    {
        return LaporanPemesananForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LaporanPemesanansTable::configure($table);
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
            'index' => ListLaporanPemesanans::route('/'),
        ];
    }
}
