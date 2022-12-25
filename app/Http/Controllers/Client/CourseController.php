<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\CommentCourse;
use App\Models\Course;
use App\Models\LessonVideo;
use App\Models\Mentor;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function index(){
        $cate_courses = CateCourse::all();
        $skills = Skill::all();
        $teachers = Mentor::role('teacher')->get();
        $min_price = Course::where('status',2)->min('price');
        $max_price = Course::where('status',2)->max('price');
        return view('screens.client.course.list', compact('cate_courses','skills', 'teachers', 'min_price', 'max_price'));
    }

    public function filterData(Request $request)
    {
        $courses = Course::select('*')
        ->where('status',2)
        ->sortdata($request)
        ->search($request)
        ->isactive($request)
        ->category($request)
        ->skill($request)
        ->teacher($request)
        ->price($request)
        ->paginate($request->record);

        $html = view('components.client.course.list-course' ,compact('courses'))->render();
        return response()->json($html,200);
    }

    public function show($slug, Course $course)
    {
        $result_vote = CommentCourse::where('course_id', $course->id)->get();

        $user = null;

        if (auth()->user()) {
            if ($course->users()->get()->contains(auth()->user()->id)) {
                $user = true;
            } else {
                $user = false;
            }
        }

        $mentor = null;

        if (auth()->guard('mentor')->user()) {
            $mentor = true;
        }

        return view('screens.client.course.intro', compact('course', 'result_vote', 'user','mentor'));
    }

    public function filterComment(Request $request)
    {
        $course = Course::findOrFail($request->course_id);
        $comments = CommentCourse::select('*')
            ->where('course_id', $request->course_id)
            ->orderBy('id', 'DESC')
            ->category($request)
            ->price($request)
            ->paginate($request->record);
        $result_vote = CommentCourse::where('course_id', $request->course_id)->get();
        $start1 = CommentCourse::where('course_id', $request->course_id)->where('vote', 1)->get();
        $start2 = CommentCourse::where('course_id', $request->course_id)->where('vote', 2)->get();
        $start3 = CommentCourse::where('course_id', $request->course_id)->where('vote', 3)->get();
        $start4 = CommentCourse::where('course_id', $request->course_id)->where('vote', 4)->get();
        $start5 = CommentCourse::where('course_id', $request->course_id)->where('vote', 5)->get();

        $html = view('components.client.course.review', compact('course', 'comments', 'result_vote', 'start1', 'start2', 'start3', 'start4', 'start5'))->render();
        return response()->json($html, 200);
    }

    public function filterCourse(Request $request)
    {
        $courses = Course::select('*');

        if (auth()->user()) {
            $courses_id = auth()->user()->load('courses')->courses->pluck('id')->toArray();
            $courses = $courses->whereNotIn('id', $courses_id);
        }

        $courses = $courses
            // ->price($request)
            // ->title($request)
            // ->cateCourse($request)
            // ->sortData($request)
            ->paginate(5);

        $passedDown = [
            'data' => $courses
        ];

        return response()->json($passedDown, 200);
    }

    public function demo(LessonVideo $lessonVideo)
    {
        return response()->json($lessonVideo);
    }
}
