<?php

namespace Database\Factories;

use App\Models\Mentor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $number = 1;
        //    $mentor = Mentor::get()->random();
        return [
            'title' => fake()->name(),
            'course_id' => rand(1, 10),
        ];
    }
}
