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
        $lesson = Lesson::all()->random();
        $user = User::all()->random();
        return [
            'comment' => fake()->name(30),
           // 'vote' => fake()->numberBetween(0,200),          //fake()->numberBetween(0,200)
            'reply' => 0,          //rand(0,100)
            'status' => '1',
            'lesson_id' => $lesson->id,
            'user_id' => $user->id,
        ];
    }
}
