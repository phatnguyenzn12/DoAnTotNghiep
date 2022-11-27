<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CommentLesson;
use App\Models\Lesson;
use App\Models\Mentor;
use App\Models\User;
use App\Notifications\notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CommentLessonController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {

            $lesson = Lesson::where('id', $request->lesson_id)->first();
            $comment_lesson = new CommentLesson();
            $comment_lesson->lesson_id= $lesson->id;
            $comment_lesson->mentor_id= Auth::guard('mentor')->user()->id ?? null;
            $comment_lesson->user_id= Auth::guard('web')->user()->id ?? null;
            $comment_lesson->comment= $request->comment;

            if ($request->hasFile('image')) {
                $imgPath = $request->file('image')->store('images');
                $imgPath = str_replace('public/', '', $imgPath);
                $comment_lesson->image = $imgPath;
            }
            $mentor= Mentor::where('id','=', $request->mentor_id)->first();
            //     // dd($users);
            Notification::send($mentor, new notifications($request->lesson_id,$request->course_id,  $request->comment, Auth::id()));

            $comment_lesson->save();
            return redirect()->back();
            // if ($lesson) {
            //     CommentLesson::create([
            //         'lesson_id' => $lesson->id,
            //         'mentor_id' => Auth::guard('mentor')->user()->id ?? null ,
            //         'user_id' => Auth::guard('web')->user()->id ?? null ,
            //         'comment' => $request->comment,
            //     ]);

            //     // dd($lesson);
            //     //Notification
            //     $users= User::where('id', '=', auth()->user()->id)->first();
            //     $mentor= Mentor::where('id','=', $request->mentor_id)->first();
            //     // dd($users);
            //     Notification::send($mentor, new notifications($request->lesson_id,$request->course_id,  $request->comment, Auth::id()));

            //     return redirect()->back();
            // } else {
            //     return redirect()->back()->with('message', 'No such ');
            // }
        } else {
            return redirect()->back()->with('message', 'Login');
        }
    }

    public function reply($id_comment, Request $request)
    {
        $lesson = Lesson::where('id', $request->lesson_id)->first();

        $cmt = new CommentLesson();
        $cmt->lesson_id= $lesson->id;
        $cmt->mentor_id= Auth::guard('mentor')->user()->id ?? null;
        $cmt->user_id= Auth::guard('web')->user()->id ?? null;
        $cmt->comment= $request->replycmt;
        $cmt->reply=  $id_comment;

        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('images');
            $imgPath = str_replace('public/', '', $imgPath);
            $cmt->image = $imgPath;
        }
        $cmt->save();

        // $cmt = CommentLesson::create([
        //     'lesson_id' => $lesson->id,
        //     'mentor_id' => Auth::guard('mentor')->user()->id ?? null  ,
        //     'user_id' => Auth::guard('web')->user()->id ?? null  ,
        //     'comment' => $request->replycmt,
        //     'reply' => $id_comment
        // ]);

        $mentor= Mentor::where('id','=', $request->mentor_id)->first();

        // $users= User::where('id', '=', auth()->user()->id)->first();
        //         // dd($users);
        // Notification::send($users, new notifications($request->lesson_id,$request->course_id,  $request->replycmt, Auth::id()));

        // dd($cmt);
        return redirect()->back();
    }
}
