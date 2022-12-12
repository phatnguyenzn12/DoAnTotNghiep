<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mentor>
 */
class MentorFactory extends Factory
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
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'avatar' => 'placeholder.png',
            'number_phone' => fake()->phoneNumber(),
            'password' => Hash::make('12345678'), // password
            'is_active' => 1,
            'remember_token' => null,
            'address' => 'hà nội',
            'about_me' => fake()->text(700),
            'social_networks' => 'https://www.facebook.com/bach.chu.3762584/,https://www.instagram.com/chutatbach2002/ ,twitter,linkedin',
            'educations' => 'dạy tại cao đẳng fpt',
            'specializations' => fake()->text(8),
            'years_in_experience' => 10,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
