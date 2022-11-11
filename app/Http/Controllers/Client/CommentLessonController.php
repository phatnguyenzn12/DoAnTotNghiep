<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CommentLesson;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentLessonController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {

            $lesson = Lesson::where('id', $request->lesson_id)->first();
            if ($lesson) {
                CommentLesson::create([
                    'lesson_id' => $lesson->id,
                    'user_id' => Auth::user()->id,
                    'comment' => $request->comment
                ]);
                // dd($lesson);
                return redirect()->back();
            } else {
                return redirect()->back()->with('message', 'No such ');
            }
        } else {
            return redirect()->back()->with('message', 'Login');
        }
    }

    public function reply($id_comment, Request $request)
    {
        $lesson = Lesson::where('id', $request->lesson_id)->first();

        $cmt = CommentLesson::create([
            'lesson_id' => $lesson->id,
            'user_id' => Auth::user()->id,
            'comment' => $request->replycmt,
            'reply' => $id_comment
        ]);
        // dd($cmt);
        return redirect()->back();
    }
}
