<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OwnerCourse>
 */
class OwnerCourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $course = Course::all()->random();
        static $course_id = 0;
        $user = User::all()->random();
        return [
            'course_id' => ++$course_id,
            'user_id' => 1
        ];
    }
}
