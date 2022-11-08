<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $course_id = 0;
        static $order_id  = 0;
        $course_id == 10 ? $course_id = 1: $course_id++;
        $order_id > 3 ? $order_id = 1 : $order_id++;
        $course = Course::select('price')->where('id',$course_id)->first();
        return [
            'price' => $course->price,
            'course_id' => $course_id,
            'order_id' => $order_id,
        ];
    }
}
