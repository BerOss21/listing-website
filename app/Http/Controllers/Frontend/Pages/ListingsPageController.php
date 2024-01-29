<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ListingsPageController extends Controller
{
    public function __invoke(Request $request, Category $category)
    {
        $listings=$category->listings()->withAvg('active_reviews','rating')->withCount('active_reviews')->approved()->active()->latest()->paginate(6);

        return view('frontend.pages.listings',compact('listings'));
    }
}
