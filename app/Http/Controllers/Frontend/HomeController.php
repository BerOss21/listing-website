<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\Listing;
use App\Models\Package;
use App\Models\Category;
use App\Models\Location;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first();

        $categories = Category::active()
            ->showAtHome()
            ->withCount('approved_listings')
            ->latest()
            ->get();

        $locations =Location::with(['approved_listings'=>['category','location']])
            ->active()
            ->showAtHome()
            ->latest()
            ->get();

        $featured_listings=Listing::with(['category','location'])->featured()->latest()->get();

        $packages = Package::active()->showAtHome()->latest()->get();

        return view('frontend.home.index', compact('hero', 'categories', 'locations', 'packages', 'featured_listings'));
    }
}
