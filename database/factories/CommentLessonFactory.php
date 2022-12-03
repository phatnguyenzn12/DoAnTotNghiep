<?php

namespace Database\Factories;

use App\Models\CommentLesson;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentLessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->random();
        return [
            'comment' => fake()->name(30),
            'reply' => rand(0, 10),          //rand(0,100)
            'lesson_id' => 6,
            'user_id' => $user->id,
        ];
    }
}
