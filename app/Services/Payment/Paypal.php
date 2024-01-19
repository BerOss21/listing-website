<?php

namespace App\Services\Payment;

use App\Models\Package;
use App\Helpers\Currency;
use App\Contracts\PaymentGateway;
use Illuminate\Support\Facades\Http;

class Paypal implements PaymentGateway
{
    public function __construct(protected string $token){}

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
                        "return_url" => route('payment.return'),
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
        
        return ['payer-action'=>$link['href']];
    }

    public function verify($id)
    {
        $header=[
            'Authorization'=>"Bearer {$this->token}"
        ];

        $response = Http::withHeaders($header)->get('https://api-m.sandbox.paypal.com/v2/checkout/orders/'.$id);

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
