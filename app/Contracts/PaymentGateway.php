<?php

namespace App\Contracts;

use App\Models\Package;


interface PaymentGateway
{
    public function pay(Package $package);

    public function verify($id);
}
