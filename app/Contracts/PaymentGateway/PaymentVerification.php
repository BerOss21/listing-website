<?php

namespace App\Contracts\PaymentGateway;

interface PaymentVerification
{
    public function verify(?string $id);
}
