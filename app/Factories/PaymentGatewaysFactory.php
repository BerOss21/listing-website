<?php

namespace App\Factories;

use App\Services\Payment\Paypal;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Container\Container;


class PaymentGatewaysFactory
{

    public static function create($name)
    {
        $studly=Str::studly($name);

        try
        {
            $instance=app("App\Services\Payment\\".$studly);
            
            return $instance;
        }
        
        catch(Exception $e)
        {
            throw $e;
            // throw new Exception("Payment gateway {$name} not found");
        }
    }
}