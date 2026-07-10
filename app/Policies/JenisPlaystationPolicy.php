<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JenisPlaystation;

class JenisPlaystationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_jenis_playstation');
    }

    public function view(User $user, JenisPlaystation $jenisPlaystation): bool
    {
        return $user->hasPermissionTo('view_jenis_playstation');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_jenis_playstation');
    }

    public function update(User $user, JenisPlaystation $jenisPlaystation): bool
    {
        return $user->hasPermissionTo('edit_jenis_playstation');
    }

    public function delete(User $user, JenisPlaystation $jenisPlaystation): bool
    {
        return $user->hasPermissionTo('delete_jenis_playstation');
    }
}
