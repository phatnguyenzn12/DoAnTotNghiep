<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $number = 1;
        // $lesson_type = ['video', 'exercise'];
        // $random_key = array_rand($lesson_type, 1);
        // $lesson_type[$random_key]
        return [
            'title' => fake()->name(),
            'content' => fake()->text(40),
            'lesson_type' => 'video',
            // 'attachment' => '0',
            'sort' =>  $number++,
            'chapter_id' => rand(1, 20),
            'is_check' => 1,
            'is_demo' => rand(0,1),
            'is_edit' => 0
        ];
    }
}
