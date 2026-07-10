<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Fasilitas;

class FasilitasPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_fasilitas');
    }

    public function view(User $user, Fasilitas $fasilitas): bool
    {
        return $user->hasPermissionTo('view_fasilitas');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_fasilitas');
    }

    public function update(User $user, Fasilitas $fasilitas): bool
    {
        return $user->hasPermissionTo('edit_fasilitas');
    }

    public function delete(User $user, Fasilitas $fasilitas): bool
    {
        return $user->hasPermissionTo('delete_fasilitas');
    }
}
