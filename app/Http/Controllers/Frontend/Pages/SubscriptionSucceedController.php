<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionSucceedController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('frontend.pages.subscriptions.succeed');
    }
}
