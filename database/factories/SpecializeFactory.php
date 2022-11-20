<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specialize>
 */
class SpecializeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $i = 0;
        $titles = ['Designer','PHP','Laravel'];
        return [
            'title' => $titles[$i++]
        ];
    }
}
