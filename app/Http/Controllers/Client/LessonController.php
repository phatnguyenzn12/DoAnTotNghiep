<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Course $course)
    {
        // if($course->users()->first()->id == auth()->user()->id){
            $chapters = $course->chapters;
            return view('screens.client.lesson.watch', compact('course', 'chapters'));
        // }else {
        //     return redirect()->back();
        // }
    }


    public function show(Lesson $lesson)
    {
        $data = view('components.client.lesson.video', compact('lesson'))->render();
        return response()->json($data, 201);
    }
}
