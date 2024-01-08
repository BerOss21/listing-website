<?php

namespace App\Observers;

use App\Models\Listing;
use Illuminate\Support\Facades\Storage;

class ListingObserver
{
    public function updated(Listing $listing): void
    {
        $this->deleteOldFiles($listing,'updated');
    }

    public function deleted(Listing $listing): void
    {
        $this->deleteOldFiles($listing,'deleted');
    }
    
    /**
     * 
     * @param \App\Models\Listing $listing
     * @param string $method
     * @return void
     */
    protected function deleteOldFiles(Listing $listing,string $method) :void
    {
        $image=$listing->getRawOriginal('image');

        $thumbnail_image=$listing->getRawOriginal('thumbnail_image');

        $attachment=$listing->getRawOriginal('attachment');
       
        if(($listing->wasChanged('image') || $method=='deleted')  &&  Storage::disk('admin')->exists($image))
        {
            Storage::disk('admin')->delete($image);
        }

        if(($listing->wasChanged('thumbnail_image') || $method=='deleted') && Storage::disk('admin')->exists($thumbnail_image))
        {
            Storage::disk('admin')->delete($thumbnail_image);
        }

        if(($listing->wasChanged('attachment') || $method=='deleted') && Storage::disk('admin')->exists($attachment))
        {
            Storage::disk('admin')->delete($attachment);
        }
    }
}
