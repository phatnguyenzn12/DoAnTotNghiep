<?php

namespace Database\Factories;

use App\Models\CommentCourse;
use App\Models\Course;
use App\Models\User;
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
        $course = Course::all()->random();
        $user = User::all()->random();
        return [
            'comment' => fake()->name(),
            'vote' => fake()->numberBetween(1,5),
            'mentor_id' => 0,
            'reply' => rand(0,100),
            'status' => 1,
            'course_id' =>$course->id,
            'user_id' => $user->id,
        ];
    }
}
