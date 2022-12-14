<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->text(15),
            'content' => fake()->text(300),
            'status' => 1,
            'image'=>'images/banner.jpg',
            'course_id' => rand(1, 10),
            'discount_code_id' => rand(1, 3),
            'type' => rand(0, 1),
        ];
    }
}
