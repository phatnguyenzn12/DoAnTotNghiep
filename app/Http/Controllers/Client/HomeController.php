<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Banner;
use App\Models\CateCourse;
use App\Models\CommentCourse;
use App\Models\Mentor;
use App\Models\OwnerCourse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $cate = CateCourse::all();

        $coursesAll = Course::select('*')->with('users')->where('status', 2)->get();

        $mentorAll = Mentor::select('*')->role('lead')->get();

        $studentAll = OwnerCourse::select('*')->get()->unique('user_id');

        $courses =  Course::select('*')->where('status', 2);
        if (auth()->user()) {
            $courses_id = auth()->user()->load('courses')->courses->pluck('id')->toArray();
            $courses = $courses->whereNotIn('id', $courses_id);
        }
      //  dd($courses->get());
        $courses =  $courses->orderBy('id', 'DESC')->paginate(8);

        // $courses_top = $courses;
        // dd($courses_top);
        $certificateAll = $coursesAll->filter(
            function ($val) {
                return $val->certificate()->first();
            }
        );

        $interView = Banner::select('*')->where('status', 1)->get();
        return view('screens.client.home', compact('courses', 'cate', 'interView', 'coursesAll', 'mentorAll', 'studentAll', 'certificateAll'));
    }

    public function banner()
    {
        $interView = Banner::select('*')->where('status', 1)->get();

        $getCourseInBanner = Banner::select('course_id')->get();

        return view('components.client.home.banner', compact('interView'));
    }

    public function policy()
    {

        return view('components.client.home.policy');
    }
}
