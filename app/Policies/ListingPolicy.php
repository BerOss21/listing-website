<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingPolicy
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
        return true;
    }

    public function view(User|Admin $user, Listing $listing): bool
    {
        return true;
    }

    public function create(User|Admin $user): bool
    {
        return true;
    }

    public function update(User|Admin $user, Listing $listing): bool
    {
        return $user->id==$listing->user_id;
    }

    public function delete(User|Admin $user, Listing $listing): bool
    {
        return $user->id==$listing->user_id;
    }

    public function restore(User|Admin $user, Listing $listing): bool
    {
        return $user->id==$listing->user_id;
    }

    public function forceDelete(User|Admin $user, Listing $listing): bool
    {
        return $user instanceof Admin;
    }
}
