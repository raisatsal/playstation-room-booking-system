<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Filament\Support\Facades\FilamentAsset::register([
            \Filament\Support\Assets\Css::make('custom-stylesheet', asset('css/filament-custom.css')),
        ]);

        // Daftarkan semua Policy secara eksplisit
        Gate::policy(\App\Models\Room::class,              \App\Policies\RoomPolicy::class);
        Gate::policy(\App\Models\Pelanggan::class,         \App\Policies\PelangganPolicy::class);
        Gate::policy(\App\Models\Pemesanan::class,         \App\Policies\PemesananPolicy::class);
        Gate::policy(\App\Models\KategoriRoom::class,      \App\Policies\KategoriRoomPolicy::class);
        Gate::policy(\App\Models\JenisPlaystation::class,  \App\Policies\JenisPlaystationPolicy::class);
        Gate::policy(\App\Models\Fasilitas::class,         \App\Policies\FasilitasPolicy::class);
        Gate::policy(\App\Models\LaporanPemesanan::class,  \App\Policies\LaporanPemesananPolicy::class);
        Gate::policy(\App\Models\User::class,              \App\Policies\UserPolicy::class);
    }
}

