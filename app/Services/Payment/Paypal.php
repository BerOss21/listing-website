<?php

namespace App\Services\Payment;

use App\Models\Package;
use App\Contracts\PaymentGateway\PaymentProcess;
use App\Contracts\PaymentGateway\PaymentVerification;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;
use Session;

class Paypal implements PaymentProcess,PaymentVerification
{
    public function __construct(protected string $token,protected PaymentMethod $method){}

    public function pay(Package $package)
    {
        $data = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'reference_id' => 'd9f80740-38f0-11e8-b467-0ed5f89f718b',
                    'amount' => [
                        "currency_code" => config('settings.site_default_currency'),
                        "value" => $package->price
                    ],
                ],
            ],
            'payment_source' => [
                'paypal' => [
                    'experience_context' => [
                        'payment_method_preference' => 'IMMEDIATE_PAYMENT_REQUIRED',
                        'brand_name' => $package->name,
                        'locale' => config('app.locale'),
                        'landing_page' => 'LOGIN',
                        'shipping_preference' => 'NO_SHIPPING',
                        'user_action' => 'PAY_NOW',
                        "return_url" => route('payment.return',[$package->slug,$this->method->slug]),
                        "cancel_url" => route('payment.cancel'),
                    ],
                ],
            ],
        ];  

        $header=[
            'Content-Type' => 'application/json',
            'PayPal-Request-Id' => '7b92603e-77ed-4896-8e78-5dea2050476a',
            'Authorization'=>"Bearer {$this->token}"
        ];

        $response = Http::withHeaders($header)->post('https://api-m.sandbox.paypal.com/v2/checkout/orders',$data);

        $link=collect($response->json('links'))->where('rel','payer-action')->first();

        Session::put("order_intent_{$response->json('id')}",auth()->id());
    //    dd()
        return redirect()->away($link['href']);
    }

    public function verify($id)
    {
        $header=[
            'Authorization'=>"Bearer {$this->token}"
        ];

        $base_response = Http::withHeaders($header)->get('https://api-m.sandbox.paypal.com/v2/checkout/orders/'.$id);

        $response=[
            'base_data'=>[
                'transaction_id'=>$base_response['id'],
                'status'=>$base_response['status']=='APPROVED'?true:false,
                'paid_amount'=>$base_response['purchase_units'][0]['amount']['value'],
                'paid_currency'=>$base_response['purchase_units'][0]['amount']['currency_code']
            ],
            'content'=>$base_response->json() 
        ];

        return $response;
    }

    public function options()
    {
        return [
            'client_id'=>[
                'label'=>'Client Id',
                'name'=>'client_id',
                'type'=>'text'
            ],
            'client_secret'=>[
                'label'=>'Client secret',
                'name'=>'client_secret',
                'type'=>'text'
            ],

        ];
    }
}
