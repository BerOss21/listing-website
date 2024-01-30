<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'location_id' => Location::inRandomOrder()->first()->id,
            'package_id' => Package::inRandomOrder()->first()->id,
            'image' => 'sections/listings/images/z5x8MtBZlKqeiBzXdxw8wO230AMzqNho96LB1B1c.jpg',
            'thumbnail_image' =>'sections/listings/thumbnail_images/WNecHrOXRn8mEGScaNy73dQGSGi5cAlQsr2dPLSl.jpg',
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'phone' => fake()->phoneNumber,
            'email' => fake()->safeEmail,
            'address' => fake()->address,
            'website' => fake()->url,
            'facebook_link' => fake()->url,
            'x_link' => fake()->url,
            'linkedin_link' => fake()->url,
            'whatsapp_link' => fake()->url,
            'is_verified' => fake()->boolean,
            'is_featured' => fake()->boolean,
            'views' => fake()->randomNumber,
            'google_map_embed_code' => fake()->text,
            'attachment' => null, 
            'expire_date' => fake()->date,
            'seo_title' => fake()->sentence,
            'seo_description' => fake()->sentence,
            'status' => fake()->boolean,
            'is_approved' => fake()->boolean,
        ];
    }
}
