<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LessonVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $lesson_id = rand(1, 100);
        // dd($lesson_type);
        return [
            'video_path' => 'https://www.youtube.com/watch?v=oQjcJBGIFsA',
            'lesson_id' => $lesson_id,
        ];
    }
}
