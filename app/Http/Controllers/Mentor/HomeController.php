<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses =  auth()->guard('mentor')->user()->load('courses')->courses;
        return view('screens.mentor.home',compact('courses'));
    }

    public function course_list()
    {
        $courses =  auth()->guard('mentor')->user()->load('courses')->courses;
        return response()->json($courses,200);
    }
}
