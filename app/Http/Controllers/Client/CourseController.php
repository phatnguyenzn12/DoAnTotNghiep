<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::select('*')->paginate(5);
        return view('screens.client.course.list',compact('courses'));
    }

    public function show($slug,Course $course)
    {
        $comments = $course->commentCourses()->get();
        return view('screens.client.course.intro', compact('course', 'comments'));
        
    }
}
