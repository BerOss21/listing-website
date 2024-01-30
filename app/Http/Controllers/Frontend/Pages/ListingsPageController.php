<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingsPageController extends Controller
{
    public function __invoke(Request $request)
    {
        $listings=Listing::filter($request->query())
                            ->withAvg('active_reviews','rating')
                            ->withCount('active_reviews')
                            ->with(['category','location'])
                            ->approved()
                            ->active()
                            ->latest()
                            ->paginate(6);

        return view('frontend.pages.listings',compact('listings'));
    }
}
