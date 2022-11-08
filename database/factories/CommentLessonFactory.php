<?php

namespace Database\Factories;

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
        return [
            'comment' => fake()->name(30),
            'vote' => fake()->numberBetween(0,200),
            'reply' => rand(0,100),
            'status' => '1',
            'lesson_id' => rand(1,100),
            'user_id' => rand(1,50),
        ];
    }
}
