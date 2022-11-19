<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CommentLesson;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Course $course,  Lesson $lesson)
    {

        // collect(auth()->user()->load('course_user')->course_user)->where('id', $course->id)->first() == null ?
        //     auth()->user()->load('course_user')->course_user()->attach([$course->id => ['lesson_id' => $lesson->id]]) :
        //     auth()->user()->load('course_user')->course_user()->updateExistingPivot($course->id, ['lesson_id' => $lesson->id]);

        $chapters = $course->chapters;
        $cmt = CommentLesson::where('lesson_id', $lesson->id)->get();
        return view('screens.client.lesson.watch', compact('course', 'chapters', 'lesson', 'cmt'));
    }
}
