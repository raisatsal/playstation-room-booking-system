<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ganti nama role 'Pengguna' menjadi 'Pelanggan'
        DB::table('roles')
            ->where('name', 'Pengguna')
            ->update(['name' => 'Pelanggan']);
            
        // Reset cache permission Spatie agar perubahan terdeteksi
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('roles')
            ->where('name', 'Pelanggan')
            ->update(['name' => 'Pengguna']);
            
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
};
