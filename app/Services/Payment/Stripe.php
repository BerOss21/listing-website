<?php

namespace App\Services\Payment;

use App\Models\Package;
use App\Contracts\PaymentGateway\PaymentProcess;
use App\Contracts\PaymentGateway\PaymentVerification;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;
use Session;

class Stripe implements PaymentProcess,PaymentVerification
{
    public function __construct(protected PaymentMethod $method){}

    public function pay(Package $package)
    {
        $response=auth()->user()->checkoutCharge($package->price, $package->name,1 ,[
            'success_url' => route('payment.return',[$package->slug,$this->method->slug]).'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
        ]);

        Session::put("order_intent_{$response->id}",auth()->id());

        return $response;
    }

    public function verify($id)
    {
        $checkoutSession = auth()->user()->stripe()->checkout->sessions->retrieve(request()->get('session_id'));

        $response=[
            'base_data'=>[
                'transaction_id'=>$checkoutSession->id,
                'status'=>$checkoutSession->status=='complete'?true:false,
                'paid_amount'=>$checkoutSession->amount_total,
                'paid_currency'=>$checkoutSession->currency
            ],
            'content'=>json_decode(json_encode($checkoutSession),true)
        ];

        return $response;
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
