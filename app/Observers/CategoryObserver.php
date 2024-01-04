<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryObserver
{
    public function updated(Category $category): void
    {
        $this->deleteOldFiles($category,'updated');
    }

    public function deleted(Category $category): void
    {
        $this->deleteOldFiles($category,'deleted');
    }
    
    /**
     * 
     * @param \App\Models\Category $category
     * @param string $method
     * @return void
     */
    protected function deleteOldFiles(Category $category,string $method) :void
    {
        $background=$category->getRawOriginal('background');

        $icon=$category->getRawOriginal('icon');
       
        if(($category->wasChanged('background') || $method=='deleted') && $background!='sections/categories/backgrounds/default.png' &&  Storage::disk('admin')->exists($background))
        {
            Storage::disk('admin')->delete($background);
        }

        if(($category->wasChanged('icon') || $method=='deleted') && $icon!='sections/categories/icons/default.png' && Storage::disk('admin')->exists($icon))
        {
            Storage::disk('admin')->delete($icon);
        }
    }
}
