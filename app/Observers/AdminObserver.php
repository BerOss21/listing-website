<?php

namespace App\Observers;

use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

class AdminObserver
{
    public function updated(Admin $admin): void
    {
        $this->deleteOldFiles($admin,'updated');
    }

    public function deleted(Admin $admin): void
    {
        $this->deleteOldFiles($admin,'deleted');
    }

    /**
     * 
     * @param \App\Models\Admin $admin
     * @param string $method
     * @return void
     */
    protected function deleteOldFiles(Admin $admin,string $method) :void
    {
        $avatar=$admin->getRawOriginal('avatar');

        $banner=$admin->getRawOriginal('banner');

        if(($admin->wasChanged('avatar') || $method=='deleted') && $avatar!='avatars/default.png' &&  Storage::disk('admin')->exists($avatar))
        {
            Storage::disk('admin')->delete($avatar);
        }

        if(($admin->wasChanged('banner') || $method=='deleted') && $banner!='banners/default.png' && Storage::disk('admin')->exists($banner))
        {
            Storage::disk('admin')->delete($banner);
        }
    }
}
