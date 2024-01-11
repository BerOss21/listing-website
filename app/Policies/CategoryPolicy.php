<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
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

    public function view(User|Admin $user, Category $category): bool
    {
        return true;
    }

    public function create(User|Admin $user): bool
    {
        return false;
    }

    public function update(User|Admin $user, Category $category): bool
    {
        return false;
    }

    public function delete(User|Admin $user, Category $category): bool
    {
        return false;
    }

    public function restore(User|Admin $user, Category $category): bool
    {
        return false;
    }

    public function forceDelete(User|Admin $user, Category $category): bool
    {
        return false;
    }
}
