<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class StripeMethodSeeder extends Seeder
{
    public function run(): void
    {
        PaymentMethod::create(['name'=>'stripe']);
    }
}
