<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,Listing $listing)
    {
        $listing=$listing->load(['schedules','images','videos','user','category','amenities','location']);

        $similar_listings=Listing::where('category_id',$listing->category_id)->where('id','!=',$listing->id)->latest()->take(4)->get();

        return view('frontend.pages.listing-detail',compact('listing','similar_listings'));
    }
}
