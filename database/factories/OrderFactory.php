<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id = Order::select('id')->max('id');
        return [
            'status' => fake()->randomNumber(1, 4),
            'total_price' => 1000000,
            'user_id' => rand(1, 2),
            'code' =>  '#' . str_pad($id == null ? 0 : $id, 8, "0", STR_PAD_LEFT)
        ];
    }
}
