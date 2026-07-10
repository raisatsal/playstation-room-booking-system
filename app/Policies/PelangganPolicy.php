<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pelanggan;

class PelangganPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_pelanggan');
    }

    public function view(User $user, Pelanggan $pelanggan): bool
    {
        return $user->hasPermissionTo('view_pelanggan');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_pelanggan');
    }

    public function update(User $user, Pelanggan $pelanggan): bool
    {
        return $user->hasPermissionTo('edit_pelanggan');
    }

    public function delete(User $user, Pelanggan $pelanggan): bool
    {
        return $user->hasPermissionTo('delete_pelanggan');
    }
}
