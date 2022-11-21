<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Censor>
 */
class CensorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'email_verified_at' => now(),
            'avatar' => 'placeholder.png',
            'number_phone' => fake()->phoneNumber(),
            'password' => '$2a$12$7jg/HO6Q2c1.gxdxBNwKcur.IHdWRpsDARlgLM.LOPWcRnkc/R79m', // password
            'is_active' => 1,
        ];
    }
}
