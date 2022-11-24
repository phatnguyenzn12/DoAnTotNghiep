<?php

namespace Database\Factories;

use App\Models\Mentor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $mentor = Mentor::all()->random();
        return [
            'title' => fake()->title(),
            'description' => fake()->text(200),
            'image' => fake()->imageUrl(),
            'mentor_id' => $mentor->id
        ];
    }
}
