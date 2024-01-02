<?php

namespace App\Observers;

use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

class AdminObserver
{
    public function updated(Admin $admin): void
    {
        $this->deleteOldFiles($admin);
    }

    public function deleted(Admin $admin): void
    {
        $this->deleteOldFiles($admin);
    }

    /**
     * 
     * @param \App\Models\Admin $admin
     * @return void
     */
    protected function deleteOldFiles(Admin $admin) :void
    {
        $avatar=$admin->getRawOriginal('avatar');

        $banner=$admin->getRawOriginal('banner');

        if($admin->wasChanged('avatar') && $avatar!='avatars/default.png' &&  Storage::disk('admin')->exists($avatar))
        {
            Storage::disk('admin')->delete($avatar);
        }

        if($admin->wasChanged('banner') && $banner!='banners/default.png' && Storage::disk('admin')->exists($banner))
        {
            Storage::disk('admin')->delete($banner);
        }
    }
}
