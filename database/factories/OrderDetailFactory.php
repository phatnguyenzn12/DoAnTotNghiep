<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
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
        $timestamp = rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2022"));
        $random_Date = date("d.m.Y", $timestamp);
        return [
            'price' => $course->price,
            'course_id' => $course->id,
            'order_id' => $order,
            'percentage_pay' =>   $course->percentage_pay,
            'created_at' => $random_Date
        ];
    }
}
