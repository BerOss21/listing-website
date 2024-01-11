<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ListingsPageController extends Controller
{
    public function __invoke(Request $request, Category $category)
    {
        $listings=$category->listings()->approved()->active()->latest()->paginate(5);

        return view('frontend.pages.listings',compact('listings'));
    }
}
