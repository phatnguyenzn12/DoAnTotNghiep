<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CommentCourse;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentCourseController extends Controller
{
    public function store(Request $request)
    {
        // $result_vote = DB::table('comment_courses')->select('vote')->get();
        $cmt = new CommentCourse();
        $cmt->comment = $request->comment;
        $cmt->mentor_id = $request->mentor_id;
        $cmt->vote = $request->vote;
        $cmt->course_id = $request->course_id;
        $cmt->status = 1;
        $cmt->user_id = auth()->user()->id;

        $cmt->save();

        return redirect()->back()->with('success', 'Cảm ơn bạn đã đánh giá');
    }
}
