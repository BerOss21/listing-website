<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Models\Listing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingDetailController extends Controller
{
    public function __invoke(Request $request,Listing $listing)
    {
        $listing=$listing->loadAvg('active_reviews','rating')->loadCount('active_reviews')->load(['active_schedules','images','videos','user','category','amenities','location','active_reviews.user']);

        $featured_listings=$listing->where('is_featured',true);

        $similar_listings=Listing::withCount('active_reviews')->where('category_id',$listing->category_id)->where('id','!=',$listing->id)->latest()->take(4)->get();

        $day=Str::lower(now(config('app.timezone'))->format('l'));

        $time=now(config('app.timezone'))->format('H:i');

        $open=$listing->active_schedules()->where('day',$day)->whereTime('start_time','<=',$time)->whereTime('end_time','>=',$time)->exists();

        $listing->increment('views');

        return view('frontend.pages.listing-detail',compact('listing','similar_listings','open'));
    }
}
