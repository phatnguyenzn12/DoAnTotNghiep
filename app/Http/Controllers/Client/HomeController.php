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

class HomeController extends Controller
{
    public function index()
    {
        $cate = CateCourse::all();

        $coursesAll = Course::select('*')->where('status', 1)->get();

        $mentorAll = Mentor::select('*')->get();

        $studentAll = OwnerCourse::select('*')->get()->unique('user_id');

        $courses =  Course::select('*');
        
        if (auth()->user()) {
            $courses_id = auth()->user()->load('courses')->courses->pluck('id')->toArray();
            $courses = $courses->whereNotIn('id', $courses_id);
        }

        $courses =  $courses->orderBy('id','DESC')->paginate(8);

        
        $certificateAll = $coursesAll->filter(
            function ($val) {
                return $val->certificate()->first();
            }
        );

        $interView = Banner::select('*')->where('status', 1)->get();
        return view('screens.client.home', compact('courses', 'cate','interView', 'coursesAll', 'mentorAll', 'studentAll','certificateAll'));
    }

    public function banner(){
        $interView = Banner::select('*')->where('status', 1)->get();

        $getCourseInBanner = Banner::select('course_id')->get();

        return view('components.client.home.banner', compact( 'interView'));

    }
}
