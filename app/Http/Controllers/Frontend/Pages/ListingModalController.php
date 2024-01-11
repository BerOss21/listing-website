<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingModalController extends Controller
{

    public function __invoke(Request $request, Listing $listing)
    {
        return view('frontend.partials.modal_detail_listings_content',compact('listing'))->render();
    }
}
