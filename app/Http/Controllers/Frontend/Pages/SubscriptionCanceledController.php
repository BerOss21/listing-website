<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionCanceledController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('frontend.pages.subscriptions.canceled');
    }
}
