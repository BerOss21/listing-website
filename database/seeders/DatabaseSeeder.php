<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hero;
use App\Models\Admin;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Services\Payment\Paypal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * persist heroes tables without casting
         */

        // $this->call(PaypalMethodSeeder::class);
        $this->call(StripeMethodSeeder::class);
        
      

        // $hero = new Hero;

        // $hero->setRawAttributes([
        //     'id'=>1,
        //     'title'=>'Let us help you Find Buy & Own Dreams',
        //     'sub_title'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos quasi facilis, cupiditate
        //     rem voluptates omnis repellat consectetur nihil quod a, illo nemo eveniet iste, minima
        //     delectus doloribus! Praesentium, maiores iusto?',
        //     'background'=>'sections/hero/default.jpg',
        // ]);

        // $hero->save();

        // Admin::factory()->create([
        //     'firstname' => 'Super',
        //     'lastname' => 'Admin',
        //     'email' => 'admin@test.com',
        // ]);

        // User::factory()->create([
        //     'firstname' => 'Test',
        //     'lastname' => 'User',
        //     'email' => 'user@test.com',
        // ]);
    }
}
