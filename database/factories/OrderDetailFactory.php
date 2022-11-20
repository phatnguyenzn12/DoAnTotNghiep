<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Order;
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
        $order = Order::all()->random();
        $course = Course::all()->random();

        return [
            'price' => $course->price,
            'course_id' => $course->id,
            'order_id' => $order,

        ];
    }
}
