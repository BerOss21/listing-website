<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,Package $package)
    {
        $methods=PaymentMethod::whereStatus(true)->latest()->get();
        
        return view('frontend.pages.payment',compact('package','methods'));
    }
}
