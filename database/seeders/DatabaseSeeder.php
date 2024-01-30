<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hero;
use App\Models\User;
use App\Models\Admin;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Location;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use App\Services\Payment\Paypal;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(20)->create();
        // Category::factory(20)->create();
        // Location::factory(20)->create();
        // $amenities=Amenity::factory(20)->create();
        // Listing::factory(80)->create();

        // $this->call(PaypalMethodSeeder::class);
        // $this->call(StripeMethodSeeder::class);

        // Listing::each(function ($listing) use ($amenities) {
        //     $listing->amenities()->attach($amenities->random(rand(1, 3)));
        // });

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
