<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaypalMethodSeeder extends Seeder
{
    public function run(): void
    {
        PaymentMethod::create([ 'name'=>'paypal']);
    }
}
