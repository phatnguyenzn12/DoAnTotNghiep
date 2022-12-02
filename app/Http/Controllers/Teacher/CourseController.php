<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $chapters = Chapter::where('mentor_id',auth()->guard('mentor')->user()->id)->get();
        return view('screens.teacher.course.list', compact('chapters'));
    }
}
