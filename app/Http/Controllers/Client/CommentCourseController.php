<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CommentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentCourseController extends Controller
{
    public function store(Request $request)
    {
        // $result_vote = DB::table('comment_courses')->select('vote')->get();
        $input = $request->all();

        $request->validate([
            'comment'=>'required',
        ]);

        $input['user_id'] = auth()->user()->id;

        CommentCourse::create($input);

        return back();
    }
}
