<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use App\Models\Package;

class PackagePolicy
{
    public function before(User|Admin $user)
    {
        if($user instanceof Admin )
        {
            return true;
        }
    }

    public function viewAny(User|Admin $user): bool
    {
        return false;
    }

    public function view(User|Admin $user, Package $package): bool
    {
        return false;
    }

    public function create(User|Admin $user): bool
    {
        return false;
    }

    public function update(User|Admin $user, Package $package): bool
    {
        return false;
    }

    public function delete(User|Admin $user, Package $package): bool
    {
        return false;
    }

    public function restore(User|Admin $user, Package $package): bool
    {
        return false;
    }
}
