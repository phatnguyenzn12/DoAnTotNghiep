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

        $lesson = $chapters->first()->lessons()->first();

        $check_course = auth()->user()->load('course_user')->course_user->isEmpty();

        if ($check_course == true 
        ) {
            auth()->user()
                ->load('course_user')
                ->course_user()
                ->attach(['lesson_id' => $lesson->id]);
        }

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
