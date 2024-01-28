<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;

class OrderPolicy
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

    public function view(User|Admin $user, Order $order): bool
    {
        return $order->user_id==$user->id;
    }

    public function create(User|Admin $user): bool
    {
        return true;
    }

    public function update(User|Admin $user, Order $order): bool
    {
        return false;
    }

    public function delete(User|Admin $user, Order $order): bool
    {
        return false;
    }

    public function restore(User|Admin $user, Order $order): bool
    {
        return false;
    }

    public function forceDelete(User|Admin $user, Order $order): bool
    {
        return false;
    }
}
