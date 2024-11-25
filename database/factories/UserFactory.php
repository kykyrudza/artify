<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'index',
            'email' => 'index@index.com',
            'email_verified_at' => now(),
            'password' => bcrypt('index'),
            'remember_token' => Str::random(10),
        ];
    }
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
