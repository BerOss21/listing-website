<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use App\Models\Schedule;
use Illuminate\Auth\Access\Response;

class SchedulePolicy
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

    public function view(User|Admin $user, Schedule $schedule): bool
    {
        return true;
    }

    public function create(User|Admin $user): bool
    {
        return true;
    }

    public function update(User|Admin $user, Schedule $schedule): bool
    {
        return $user->id==$schedule->listing->user_id;
    }

    public function delete(User|Admin $user, Schedule $schedule): bool
    {
        return $user->id==$schedule->listing->user_id;
    }

    public function restore(User|Admin $user, Schedule $schedule): bool
    {
        return $user->id==$schedule->listing->user_id;
    }
}
