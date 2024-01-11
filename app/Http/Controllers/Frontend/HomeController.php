<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Storage;

class HomeController extends Controller
{
    public function index()
    {
        $hero=Hero::first();

        $categories=Category::active()->showAtHome()->latest()->get();

        return view('frontend.home.index',compact('hero','categories'));
    }
}
