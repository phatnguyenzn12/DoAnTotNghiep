<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CommentLesson;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class LessonController extends Controller
{
    public function index( Course $course,  Lesson $lesson)
    {
        // if($course->users()->first()->id == auth()->user()->id){
// dd($course->lessons()->get(), $course->chapters()->get());
            // $idnoti= DB::table('notifications')->where('data->comment_id', $lesson)->pluck('id');
            // DB::table('notifications')->where('id', $idnoti)->update(['read_at'=>now()]);
            // dd($idnoti);
            // $id= Notification::where('data', '=', )->get();
// dd($id);
            // Notification::where('id',$id)->update(['read_at'=>now()]);
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
