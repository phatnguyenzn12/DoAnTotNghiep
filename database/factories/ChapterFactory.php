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
            // 'sort' => $number++,
            'deadline' => '2022-12-09 00:00:00',
            'course_id' => rand(1, 10),
            'mentor_id' => rand(2, 3),
        ];
    }
}
