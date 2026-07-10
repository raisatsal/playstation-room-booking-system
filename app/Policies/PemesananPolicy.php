<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pemesanan;

class PemesananPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_pemesanan');
    }

    public function view(User $user, Pemesanan $pemesanan): bool
    {
        return $user->hasPermissionTo('view_pemesanan');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_pemesanan');
    }

    public function update(User $user, Pemesanan $pemesanan): bool
    {
        return $user->hasPermissionTo('edit_pemesanan');
    }

    public function delete(User $user, Pemesanan $pemesanan): bool
    {
        return $user->hasPermissionTo('delete_pemesanan');
    }
}
