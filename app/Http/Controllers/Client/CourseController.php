<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        
        $cateCourses = CateCourse::get();
        return view('screens.client.course.list',compact('cateCourses'));
    }

    public function show($slug, Course $course)
    {

        $comments = $course->commentCourses()->get();
        return view('screens.client.course.intro', compact('course', 'comments'));
    }

    public function filterCourse(Request $request)
    {
        $courses = Course::select('*');
        if (auth()->user()) {
            $courses_id = auth()->user()->load('courses')->courses->pluck('id')->toArray();
            $courses = $courses->whereNotIn('id', $courses_id);
        }
        $courses = $courses
            ->price($request)
            ->title($request)
            ->cateCourse($request)
            ->sortData($request)
            ->paginate(5);

        $html = view('components.client.course.course-list', compact('courses'))->render();

        return response()->json($html, 200);
    }
}
