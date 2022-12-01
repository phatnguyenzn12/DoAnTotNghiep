<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\CommentLesson;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Course $course)
    {
        $chapters = $course->load('chapters')->chapters()->orderBy('sort')->get();

        $lesson = $chapters->first()->lessons()->orderBy('sort')->first();

        $check_course = auth()->user()->load('course_user')->course_user->where('id', $course->id)->isEmpty();

        if ($check_course == true) {
            auth()->user()
                ->load('course_user')
                ->course_user()
                ->attach(['course_id' => $course->id], ['lesson_id' => $lesson->id]);
        }

        $cmt = CommentLesson::where('lesson_id', $lesson->id)->get();

        return view('screens.client.lesson.watch', compact('course', 'chapters', 'lesson', 'cmt'));
    }

    public function show(Course $course, Lesson $lesson)
    {
        auth()->user()
            ->load('course_user')
            ->course_user()
            ->attach(['course_id' => $course->id], ['lesson_id' => $lesson->id]);

        $chapters = $course->load('chapters')->chapters()->get();

        $cmt = CommentLesson::where('lesson_id', $lesson->id)->get();

        return view('screens.client.lesson.watch', compact('course', 'chapters', 'lesson', 'cmt'));
    }

    public function getCertificate()
    {

    }
}
