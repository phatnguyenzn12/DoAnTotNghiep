<?php

namespace Database\Factories;

use App\Models\Certificate;
use App\Models\Mentor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
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
        $name = fake()->text(15);
        $slug = Str::slug($name);
        return [
            'title' => $name,
            'content' => fake()->text(300),
            'price' =>   Arr::random([200000, 500000, 1000000, 100000, 800000, 900000, 750000, 340000, 430000, 2000000]),
            'discount' => Arr::random([0, 20, 50, 90]),
            'status' => Arr::random([0,1,2]),
            'slug' => $slug,
            'participant' => 0,
            'cate_course_id' => rand(1, 3),
            'video' => 'https://www.youtube.com/embed/tReb83qlcNc',
            'image' => 'images/banner_kh.jpg',
            'mentor_id' => rand(1,2),
            'skill_id' => 1,
            'language' => 0,
            'description' => fake()->text(1000),
            'description_details' => fake()->text(30) . ',' . fake()->text(30) . ',' . fake()->text(30),
            'percentage_pay' =>  Arr::random([10, 20, 50, 90]),
            // 'type' => rand(0, 1),
        ];
    }
}
