<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Mentor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

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
        static $course = 1;
        return [
            'title' => fake()->title(),
            'description' => fake()->text(200),
            'course_id' => ++$course,
        ];
    }
}
