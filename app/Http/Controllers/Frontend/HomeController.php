<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Package;


class HomeController extends Controller
{
    public function index()
    {
        $hero=Hero::first();

        $categories=Category::active()->showAtHome()->latest()->get();

        $packages=Package::active()->showAtHome()->latest()->get();

        return view('frontend.home.index',compact('hero','categories','packages'));
    }
}
