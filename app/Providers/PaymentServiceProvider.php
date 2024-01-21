<?php

namespace App\Providers;

use App\Models\PaymentMethod;
use App\Services\Payment\Paypal;
use App\Services\Payment\Stripe;
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
                $method=PaymentMethod::whereName('paypal')->first();

                $response = Http::withBasicAuth(Config::get('paypal')['client_id'],Config::get('paypal')['client_secret'])
                ->withHeaders([
                    "Content-Type" => "application/x-www-form-urlencoded",
                ])
                ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token?grant_type=client_credentials');

                return new Paypal($response->json("access_token"),$method);
                
            }
            catch(\Exception $e)
            {
                throw $e;
            }
        });

        $this->app->singleton(Stripe::class,function(){
            $method=PaymentMethod::whereName('stripe')->first();

            return new Stripe($method);
        });
    }

    public function boot(): void
    {
        Config::set('paypal',Cache::rememberForever('paypal_config', function () {
            $paymentMethod=PaymentMethod::whereName('paypal')->first();
            return $paymentMethod ? $paymentMethod->config : [];
        }));

        Config::set('stripe',Cache::rememberForever('stripe_config', function () {
            $paymentMethod=PaymentMethod::whereName('stripe')->first();
            return $paymentMethod ? $paymentMethod->config : [];
        }));
    }
}
