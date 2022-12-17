<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DisscountCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->asciify('********************'),
            'discount' => array_rand([0,20,50,90]),
            // 'start_time' => fake()->dateTimeAD('2022-10-40 08:30:00', 'UTC'),
            // 'end_time' => fake()->dateTimeAD('2022-11-40 08:30:00', 'UTC'),
        ];
    }
}
