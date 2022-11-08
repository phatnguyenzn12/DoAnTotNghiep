<?php

namespace Database\Factories;

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
        static $course_id = 1;
        static $user_id = 1;
        $user_id++;
        return [
            'course_id' => $course_id++,
            'user_id' => $user_id == 4 ? $user_id = 1 : $user_id
        ];
    }
}
