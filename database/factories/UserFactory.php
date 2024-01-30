<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName,
            'lastname' => fake()->lastName,
            'email' => fake()->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), 
            // 'avatar' => 'avatars/default.png',
            // 'banner' => 'banners/default.png',
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'about' => fake()->paragraph,
            'website' => fake()->url,
            'fb_link' => fake()->url,
            'x_link' => fake()->url,
            'in_link' => fake()->url,
            'wa_link' => fake()->url,
            'insta_link' => fake()->url,
            'remember_token' => Str::random(10),
        ];
    }
}
