<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
        $user = User::all()->random();
        $timestamp = rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2022"));
        $random_Date = date("d.m.Y", $timestamp);
        $price = Arr::random([100000, 200000, 3000000, 400000, 200000, 500000, 20000, 60000, 800000, 2000000]);

        return [
            'status' => fake()->randomNumber(1, 4),
            'total_price' => $price,
            'user_id' => $user->id,
            'code' =>  Str::random(10),
            'created_at' => $random_Date
        ];
    }
}
