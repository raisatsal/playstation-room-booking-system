<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LaporanPemesanan;

class LaporanPemesananPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_laporan');
    }

    public function view(User $user, LaporanPemesanan $laporan): bool
    {
        return $user->hasPermissionTo('view_laporan');
    }

    public function create(User $user): bool
    {
        return false; // Laporan hanya read-only
    }

    public function update(User $user, LaporanPemesanan $laporan): bool
    {
        return false; // Laporan hanya read-only
    }

    public function delete(User $user, LaporanPemesanan $laporan): bool
    {
        return false; // Laporan hanya read-only
    }
}
