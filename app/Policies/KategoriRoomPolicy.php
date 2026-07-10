<?php

namespace App\Policies;

use App\Models\User;
use App\Models\KategoriRoom;

class KategoriRoomPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_kategori_room');
    }

    public function view(User $user, KategoriRoom $kategoriRoom): bool
    {
        return $user->hasPermissionTo('view_kategori_room');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_kategori_room');
    }

    public function update(User $user, KategoriRoom $kategoriRoom): bool
    {
        return $user->hasPermissionTo('edit_kategori_room');
    }

    public function delete(User $user, KategoriRoom $kategoriRoom): bool
    {
        return $user->hasPermissionTo('delete_kategori_room');
    }
}
