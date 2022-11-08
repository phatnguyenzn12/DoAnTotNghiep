<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CateCourse;
use App\Models\Chapter;
use App\Models\CommentCourse;
use App\Models\CommentLesson;
use App\Models\Course;
use App\Models\DisscountCode;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OwnerCourse;
use App\Models\User;
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
        CateCourse::factory(3)->create();
        Course::factory(10)->create();
        Chapter::factory(20)->create();
        Lesson::factory(100)->create();
        foreach(Lesson::select('*')->get() as $lesson) {
            if($lesson->lesson_type == 'video') {
                LessonVideo::create(
                    [
                        'is_demo' => 0,
                        'video_path' => '766989834',
                        'lesson_id' => $lesson->id
                    ]
                );
            }
        }
        CommentCourse::factory(100)->create();
        CommentLesson::factory(100)->create();
        Cart::factory(10)->create();
        Order::factory(10)->create();
        OrderDetail::factory(10)->create();
        OwnerCourse::factory(10)->create();
    }
}
