<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Amenity>
 */
class AmenityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word,
            'icon' => 'fa ' . fake()->randomElement(['fa-home', 'fa-car', 'fa-coffee', 'fa-heart', 'fa-bolt']),
            'show_at_home' => fake()->boolean,
            'status' => fake()->boolean,
        ];
    }
}
