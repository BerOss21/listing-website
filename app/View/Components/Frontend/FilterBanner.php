<?php

namespace App\View\Components\Frontend;

use Closure;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Location;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FilterBanner extends Component
{
    public function render(): View|Closure|string
    {
        $categories=Category::select('id','slug','name')->active()->showAtHome()->latest()->get();
        $locations=Location::select('id','slug','name')->active()->showAtHome()->latest()->get();
        $amenities=Amenity::select('id','slug','name')->active()->showAtHome()->latest()->get();
        
        return view('components.frontend.filter-banner',compact('categories','locations','amenities'));
    }
}
