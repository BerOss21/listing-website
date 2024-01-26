<?php

namespace App\Services\Payment;

use App\Contracts\PaymentGateway\PaymentVerification;
use Illuminate\Support\Facades\Config;

class Free implements PaymentVerification
{
    public function verify($id)
    {
        $response=[
            'base_data'=>[
                'transaction_id'=>uniqid(),
                'status'=>true,
                'paid_amount'=>0,
                'paid_currency'=>Config::get('settings.site_default_currency','usd')
            ],
            'content'=>[]
        ];

        return $response;
    }

    public function options()
    {
        return [];
    }
}
