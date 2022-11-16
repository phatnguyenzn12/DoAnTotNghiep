<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\CommentCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $cateCourses = CateCourse::get();
        return view('screens.client.course.list', compact('cateCourses'));
    }

    public function show($slug, Course $course)
    {
        $result_vote= CommentCourse::where('course_id', $course->id)->get();
        $start1= CommentCourse::where('course_id', $course->id)->where('vote',1)->get();
        $start2= CommentCourse::where('course_id', $course->id)->where('vote',2)->get();
        $start3= CommentCourse::where('course_id', $course->id)->where('vote',3)->get();
        $start4= CommentCourse::where('course_id', $course->id)->where('vote',4)->get();
        $start5= CommentCourse::where('course_id', $course->id)->where('vote',5)->get();
        // dd($result_vote);
        $cmt = CommentCourse::where('course_id', $course->id)->get();
        $comments = $course->commentCourses()->get();
        return view('screens.client.course.intro', compact('course', 'comments', 'result_vote', 'cmt','start1', 'start2', 'start3', 'start4','start5'));
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

        $passedDown = [
            'data' => $courses
        ];

        return response()->json($passedDown, 200);
    }
}
