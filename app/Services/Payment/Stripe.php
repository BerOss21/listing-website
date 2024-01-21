<?php

namespace App\Services\Payment;

use App\Models\Package;
use App\Contracts\PaymentGateway;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;
use Session;

class Stripe implements PaymentGateway
{
    public function __construct(protected PaymentMethod $method){}

    public function pay(Package $package)
    {
        return auth()->user()->checkoutCharge($package->price, $package->name,1 ,[
            'success_url' => route('payment.return',[$package->slug,$this->method->slug]).'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
        ]);
    }

    public function verify($id)
    {
        $checkoutSession = auth()->user()->stripe()->checkout->sessions->retrieve(request()->get('session_id'));

        return $checkoutSession;
        // dd('checkoutSession',$checkoutSession);
    }

    public function options()
    {
        return [
            'key'=>[
                'label'=>'Key',
                'name'=>'key',
                'type'=>'text'
            ],
            'secret'=>[
                'label'=>'Secret',
                'name'=>'secret',
                'type'=>'text'
            ],

        ];
    }
}
