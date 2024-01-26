<?php

namespace App\Contracts\PaymentGateway;

use App\Models\Package;

interface PaymentProcess
{
    public function pay(Package $package);
}
