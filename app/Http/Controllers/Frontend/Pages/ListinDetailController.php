<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListinDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,Listing $listing)
    {
        $listing=$listing->load(['schedules','images','videos','user','category','amenities','location']);

        // $similar_listings=Listing::whereRelation('category','id')
        return view('frontend.pages.listing-detail',compact('listing'));
    }
}
