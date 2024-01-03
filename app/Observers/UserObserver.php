<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    public function updated(User $user): void
    {
        $this->deleteOldFiles($user,'updated');
    }

    public function deleted(User $user): void
    {
        $this->deleteOldFiles($user,'deleted');
    }

    /**
     * 
     * @param \App\Models\User $user
     * @param string $method
     * @return void
     */
    protected function deleteOldFiles(User $user, string $method) :void
    {
        $avatar=$user->getRawOriginal('avatar');

        $banner=$user->getRawOriginal('banner');

        if(($user->wasChanged('avatar') || $method=='deleted') && $avatar!='avatars/default.png' &&  Storage::disk('user')->exists($avatar))
        {
            Storage::disk('user')->delete($avatar);
        }

        if(($user->wasChanged('banner') || $method=='deleted') && $banner!='banners/default.png' && Storage::disk('user')->exists($banner))
        {
            Storage::disk('user')->delete($banner);
        }
    }
}
