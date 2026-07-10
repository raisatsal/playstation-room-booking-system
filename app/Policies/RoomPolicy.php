<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Room;

class RoomPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_room');
    }

    public function view(User $user, Room $room): bool
    {
        return $user->hasPermissionTo('view_room');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_room');
    }

    public function update(User $user, Room $room): bool
    {
        return $user->hasPermissionTo('edit_room');
    }

    public function delete(User $user, Room $room): bool
    {
        return $user->hasPermissionTo('delete_room');
    }
}
