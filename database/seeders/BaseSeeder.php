<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\CateCourse;
use App\Models\Censor;
use App\Models\Certificate;
use App\Models\Chapter;
use App\Models\CommentCourse;
use App\Models\CommentLesson;
use App\Models\Course;
use App\Models\DiscountCode;
use App\Models\DisscountCode;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Models\Mentor;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OwnerCourse;
use App\Models\PercentagePayable;
use App\Models\Skill;
use App\Models\Specialize;
use App\Models\User;
use App\Models\UserCertificate;
use Database\Factories\CensorFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            [
                'name' => 'lead',
                'guard_name' => 'mentor',
            ]
        );
        Role::create(
            [
                'name' => 'teacher',
                'guard_name' => 'mentor',
            ]
        );

        $users = User::factory()
            ->count(5)
            ->create();

        $mentor = Mentor::create(
            [
                'name' => 'chutatbach9',
                'email' => 'chutatbach9@gmail.com',
                'email_verified_at' => now(),
                'avatar' => 'images/avatar_icon.jpg',
                'number_phone' => fake()->phoneNumber(),
                'password' => Hash::make('12345678'), // password
                'is_active' => 1,
                'remember_token' => null,
                'address' => 'hà nội',
                'about_me' => fake()->text(700),
                'social_networks' => 'https://www.facebook.com/bach.chu.3762584/,https://www.instagram.com/chutatbach2002/ ,twitter,linkedin',
                'educations' => 'dạy tại cao đẳng fpt',
                'specializations' => 'html,css,php',
                // 'skills' => 'html,css,php',
                'years_in_experience' => 10,
                // 'point' => 100
                'cate_course_id' => rand(1,3),
            ]
        );
        $mentor->assignRole('lead');

        $mentor = Mentor::create(
            [
                'name' => 'chutatbach1',
                'email' => 'chutatbach1@gmail.com',
                'email_verified_at' => now(),
                'avatar' => 'images/avatar_icon.jpg',
                'number_phone' => fake()->phoneNumber(),
                'password' => Hash::make('12345678'), // password
                'is_active' => 1,
                'remember_token' => null,
                'address' => 'hà nội',
                'about_me' => fake()->text(700),
                'social_networks' => 'https://www.facebook.com/bach.chu.3762584/,https://www.instagram.com/chutatbach2002/ ,twitter,linkedin',
                'educations' => 'dạy tại cao đẳng fpt',
                'specializations' => 'html,css,php',
                'cate_course_id' => rand(1,3),
            ]
        );
        $mentor->assignRole('teacher');


        $mentor = Mentor::create(
            [
                'name' => 'bachctph16049',
                'email' => 'bachctph16049@fpt.edu.vn',
                'email_verified_at' => now(),
                'avatar' => 'images/avatar_icon.jpg',
                'number_phone' => fake()->phoneNumber(),
                'password' => Hash::make('12345678'), // password
                'is_active' => 1,
                'remember_token' => null,
                'address' => 'hà nội',
                'about_me' => fake()->text(700),
                'social_networks' => 'https://www.facebook.com/bach.chu.3762584/,https://www.instagram.com/chutatbach2002/ ,twitter,linkedin',
                'educations' => 'dạy tại cao đẳng fpt',
                'specializations' => '',
                'years_in_experience' => 10,
                'cate_course_id' => rand(1,3),
            ]
        );
        $mentor->assignRole('teacher');

        $mentor = Mentor::create(
            [
                'name' => 'Truong Duc Anh',
                'email' => 'ducanh23072002a@gmail.com',
                'email_verified_at' => now(),
                'avatar' => 'images/avatar_icon.jpg',
                'number_phone' => fake()->phoneNumber(),
                'password' => Hash::make('12345678'), // password
                'is_active' => 1,
                'remember_token' => null,
                'address' => 'hà nội',
                'about_me' => fake()->text(700),
                'social_networks' => 'https://www.facebook.com/bach.chu.3762584/,https://www.instagram.com/chutatbach2002/ ,twitter,linkedin',
                'educations' => 'dạy tại cao đẳng fpt',
                'specializations' => '',
                'years_in_experience' => 10,
                'cate_course_id' => rand(1,3),
            ]
        );
        $mentor->assignRole('lead');

        Mentor::factory(3)->create();
        Admin::factory(1)->create();
        CateCourse::factory(3)->create();
        Skill::factory(3)->create();
        Course::factory(10)->create();
        Certificate::factory(10)->create();
        UserCertificate::factory(10)->create();
        Chapter::factory(100)->create();
        Lesson::factory(100)->create();
        foreach (Lesson::select('*')->get() as $lesson) {
            if ($lesson->lesson_type == 'video') {
                LessonVideo::create(
                    [
                        'lesson_id' => $lesson->id,
                    ]
                );
            }
        }
        CommentCourse::factory(300)->create();
        CommentLesson::factory(10)->create();
        Cart::factory(10)->create();
        Order::factory(100)->create();
        OrderDetail::factory(500)->create();
        PercentagePayable::factory(500)->create();
        OwnerCourse::factory(10)->create();
        Banner::factory(3)->create();
        DiscountCode::factory(3)->create();
    }
}
