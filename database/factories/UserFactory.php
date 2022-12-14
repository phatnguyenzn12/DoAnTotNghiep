<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
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
    public function definition()
    {
        $email = fake()->safeEmail();
        return [
            'name' => fake()->name(),
            'email' => $email,
            'email_verified_at' => now(),
            'avatar' => 'images/avatar_icon.jpg',
            'number_phone' => fake()->phoneNumber(),
            'password' => '$2a$12$7cb85hDoFwbLMxyz2MyWlut09LRSeDhsphhw623FkVA5skWFt024e', // 12345678
            'remember_token' => Str::random(10),
            'about_me' => fake()->text(100),
            'education' => 'cao đẳng fpt,trung tâm fpt',
            'location' => 'hà nội',
            'certificate_id' => rand(1,5),
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
