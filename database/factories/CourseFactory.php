<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $prices = [200000,500000,1000000,100000,800000,900000,750000,340000,430000,2000000];
        static $i = 0;
        $name = fake()->text(15);
        $discounts = [0, 20, 50, 90];
        $slug = Str::slug($name);
        return [
            'title' => $name,
            'content' => fake()->text(30),
            'price' => $prices[$i++],
            'discount' => $discounts[array_rand($discounts)],
            'status' => 1,
            'slug' => $slug,
            'participant' => 0,
            'cate_course_id' => rand(1, 3),
            'video' => 'https://www.youtube.com/watch?v=oQjcJBGIFsA',
            'image' => fake()->imageUrl(),
        ];
    }
}
