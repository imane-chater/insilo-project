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
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@insilo.be',
            'email_verified_at' => now(),
            'role' => 'admin',
            'image' => 'users/TcvDFgXoqjVzyuzVjU66ykvWjEFER5T8kLzyt1PV.png',
            'password' => Hash::make('admin@insilo.be'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}