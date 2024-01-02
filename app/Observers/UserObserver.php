<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    public function updated(User $admin): void
    {
        $this->deleteOldFiles($admin);
    }

    public function deleted(User $admin): void
    {
        $this->deleteOldFiles($admin);
    }

    /**
     * 
     * @param \App\Models\User $admin
     * @return void
     */
    protected function deleteOldFiles(User $admin) :void
    {
        $avatar=$admin->getRawOriginal('avatar');

        $banner=$admin->getRawOriginal('banner');

        if($admin->wasChanged('avatar') && $avatar!='avatars/default.png' &&  Storage::disk('user')->exists($avatar))
        {
            Storage::disk('user')->delete($avatar);
        }

        if($admin->wasChanged('banner') && $banner!='banners/default.png' && Storage::disk('user')->exists($banner))
        {
            Storage::disk('user')->delete($banner);
        }
    }
}
