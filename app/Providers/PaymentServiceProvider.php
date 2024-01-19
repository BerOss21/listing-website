<?php

namespace App\Providers;

use App\Models\PaymentMethod;
use App\Services\Payment\Paypal;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;

class PaymentServiceProvider extends ServiceProvider 
{
    public function register(): void
    {     
        $this->app->singleton(Paypal::class,function(){
            try
            {
                $response = Http::withBasicAuth(Config::get('payment.paypal')['client_id'],Config::get('payment.paypal')['client_secret'])
                ->withHeaders([
                    "Content-Type" => "application/x-www-form-urlencoded",
                ])
                ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token?grant_type=client_credentials');

                return new Paypal($response->json("access_token"));
                
            }
            catch(\Exception $e)
            {
                throw $e;
            }
        });
    }

    public function boot(): void
    {
        Config::set('payment.paypal',Cache::rememberForever('paypal_config', function () {
            $paymentMethod=PaymentMethod::whereName('paypal')->first();
            return $paymentMethod ? $paymentMethod->config : [];
        }));
    }
}
