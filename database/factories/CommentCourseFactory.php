<?php

namespace Database\Factories;

use App\Models\CommentCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentCourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => fake()->name(),
            'vote' => fake()->numberBetween(1,5),
            'mentor_id' => 0, 
            'reply' => rand(0,100),
            'status' => 1,
            'course_id' => rand(1,10),
            'user_id' => rand(1,50),
        ];
    }
}
