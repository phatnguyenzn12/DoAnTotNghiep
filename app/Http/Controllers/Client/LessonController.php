<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CommentLesson;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Course $course)
    {
        $chapters = $course->load('chapters')->chapters()->get();

<<<<<<< HEAD
        $lesson = $chapters->first()->lessons()->first();

        $check_course = auth()->user()->load('course_user')->course_user->isEmpty();

        if ($check_course == true 
        ) {
            auth()->user()
                ->load('course_user')
                ->course_user()
                ->attach(['lesson_id' => $lesson->id]);
        }
=======
        // dd(auth()->user()->load('lesson_user')->lesson_user()->where('course_id', $course->id)->first());

        // dd( $lessonId = auth()->user()->load('course_user')
        // ->course_user()->where('id', $course->id)->first()
        // ->chapters()->first()
        // ->lessons()->first()); // khi khong dung ajax

        // dung ajax $course->chapters()->first()->lessons()->first()->id]

        auth()->user()->load('course_user')->course_user()->where('id', $course->id)->first() == null ??
            auth()->user()
            ->load('course_user')
            ->course_user()
            ->attach([$course->id => ['lesson_id' => $lesson->id]]);
>>>>>>> 24d0ed59da037fb5a01abaf4f3b371cfe00911ef

        $cmt = CommentLesson::where('lesson_id', $lesson->id)->get();

        return view('screens.client.lesson.watch', compact('course', 'chapters', 'lesson', 'cmt'));
    }

    public function show(Lesson $lesson)
    {
        $data = [
           'video' =>  view('components.client.lesson.video', compact('lesson'))->render()
        ];

        return response()->json($data);
    }
}
