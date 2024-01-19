<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Services\Payment\Paypal;
use App\Http\Controllers\Controller;
use App\Factories\PaymentGatewaysFactory;

class PaymentProcessController extends Controller
{
    public function pay(Request $request,Package $package,PaymentMethod $method)
    {
        $instance=PaymentGatewaysFactory::create($method->name);

        $response=$instance->pay($package);

        return redirect()->away($response['payer-action']);
    }
}
