<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Cart;
use App\Models\CateCourse;
use App\Models\Censor;
use App\Models\Chapter;
use App\Models\CommentCourse;
use App\Models\CommentLesson;
use App\Models\Course;
use App\Models\DisscountCode;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Models\Mentor;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OwnerCourse;
use App\Models\Skill;
use App\Models\Specialize;
use App\Models\User;
use Database\Factories\CensorFactory;
use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()
            ->count(46)
            ->create();
        foreach ($users as $user) {
            $user->assignRole('student');
        }
        Admin::factory(1)->create();
        Mentor::factory(10)->create();
        Censor::factory(1)->create();
        CateCourse::factory(3)->create();
        Specialize::factory(3)->create();
        Skill::factory(3)->create();
        Course::factory(30)->create();
        Chapter::factory(20)->create();
        Lesson::factory(100)->create();
        foreach(Lesson::select('*')->get() as $lesson) {
            if($lesson->lesson_type == 'video') {
                LessonVideo::create(
                    [
                        'is_demo' => 0,
                        'video_path' => '772157924',
                        'lesson_id' => $lesson->id,
                        'is_check' => 1,
                    ]
                );
            }
        }
        CommentCourse::factory(300)->create();
        CommentLesson::factory(1000)->create();
        Cart::factory(10)->create();
        Order::factory(100)->create();
        OrderDetail::factory(500)->create();
        OwnerCourse::factory(200)->create();
    }
}
