<?php

namespace App\Observers;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageObserver
{
    public function updated(Image $image): void
    {
        $this->deleteOldFiles($image,'updated');
    }

    public function deleted(Image $image): void
    {
        $this->deleteOldFiles($image,'deleted');
    }
    
    /**
     * 
     * @param \App\Models\Image $image
     * @param string $method
     * @return void
     */
    protected function deleteOldFiles(Image $image,string $method) :void
    {
        $image_raw=$image->getRawOriginal('image');

        if(($image->wasChanged('image') || $method=='deleted')  &&  Storage::disk('admin')->exists($image_raw))
        {
            Storage::disk('admin')->delete($image_raw);
        }
    }
}
