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
        // if($course->users()->first()->id == auth()->user()->id){
// dd($course->lessons()->get(), $course->chapters()->get());
            $chapters = $course->chapters;
            $cmt = CommentLesson::where('lesson_id', $lesson->id)->get();
// dd($cmt);
            return view('screens.client.lesson.watch', compact('course', 'chapters', 'lesson', 'cmt'));

        // }else {
        //     return redirect()->back();
        // }

    }


    public function show(Lesson $lesson)
    {

        $data = view('components.client.lesson.video', compact('lesson'))->render();
        return response()->json($data, 201);

        // $exe = Lesson::find($id);
        // $chapters = CommentLesson::where('lesson_id', $id)->get();             // ->where('status', '!=', 1)
        // return view('screens.client.lesson.watch', ['exe' => $exe, 'cmt' => $chapters]);

    }
}
