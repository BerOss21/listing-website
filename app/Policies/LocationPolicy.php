<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use App\Models\Location;
use Illuminate\Auth\Access\Response;

class LocationPolicy
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

    public function view(User|Admin $user, Location $location): bool
    {
        return true;
    }

    public function create(User|Admin $user): bool
    {
        return false;
    }

    public function update(User|Admin $user, Location $location): bool
    {
        return false;
    }

    public function delete(User|Admin $user, Location $location): bool
    {
        return false;
    }

    public function restore(User|Admin $user, Location $location): bool
    {
        return false;
    }

    public function forceDelete(User|Admin $user, Location $location): bool
    {
        return false;
    }
}
