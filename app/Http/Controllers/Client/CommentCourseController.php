<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CommentCourse;
use Illuminate\Http\Request;

class CommentCourseController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'comment'=>'required',
        ]);

        $input['user_id'] = auth()->user()->id;

        CommentCourse::create($input);

        return back();
    }
}
