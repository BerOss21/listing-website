<?php

namespace App\View\Components\Frontend;

use App\Models\Listing;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListingCard extends Component
{

    public function __construct(public Listing $listing){}
    
    public function render(): View|Closure|string
    {
        return view('components.frontend.listing-card');
    }
}
