<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            // 'background' => 'sections/categories/default.jpg',
            // 'icon' => 'sections/categories/default_icon.jpg',
            'show_at_home' => fake()->boolean,
            'status' => fake()->boolean,
        ];
    }
}
