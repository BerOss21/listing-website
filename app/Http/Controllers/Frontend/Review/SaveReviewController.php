<?php

namespace App\Http\Controllers\Frontend\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ReviewRequest;
use App\Models\Listing;

class SaveReviewController extends Controller
{
    public function __invoke(ReviewRequest $request,Listing $listing)
    {    
        $review=$listing->reviews()->create($request->validated());

        if($request->ajax()) return view('frontend.partials.review',compact('review'))->render();

        toastr()->success('Review created successfully');

        return back();
    }
}
