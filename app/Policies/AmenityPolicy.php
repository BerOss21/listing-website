<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Amenity;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AmenityPolicy
{
    public function before(User|Admin $user)
    {
        if($user instanceof Admin)
        {
            return true;
        }
    }

    public function viewAny(User|Admin $user): bool
    {
        return true;
    }

    public function view(User|Admin $user, Amenity $amenity): bool
    {
        return true;
    }

    public function create(User|Admin $user): bool
    {
        return false;
    }

    public function update(User|Admin $user, Amenity $amenity): bool
    {
        return false;
    }

    public function delete(User|Admin $user, Amenity $amenity): bool
    {
        return false;
    }

    public function restore(User|Admin $user, Amenity $amenity): bool
    {
        return false;
    }

    public function forceDelete(User|Admin $user, Amenity $amenity): bool
    {
        return false;
    }
}
