<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use App\Models\Video;
use Illuminate\Auth\Access\Response;

class VideoPolicy
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

    public function view(User|Admin $user, Video $video): bool
    {
        return true;
    }

    public function create(User|Admin $user): bool
    {
        return true;
    }

    public function update(User|Admin $user, Video $video): bool
    {
        return false;
    }

    public function delete(User|Admin $user, Video $video): bool
    {
        return $video->listing->user_id==$user->id;
    }

    public function restore(User|Admin $user, Video $video): bool
    {
        return false;
    }

    public function forceDelete(User|Admin $user, Video $video): bool
    {
        return false;
    }
}
