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

        $result_votes = CommentCourse::all();
        $start1 = CommentCourse::where('vote', 1)->get();
        $start2 = CommentCourse::where('vote', 2)->get();
        $start3 = CommentCourse::where('vote', 3)->get();
        $start4 = CommentCourse::where('vote', 4)->get();
        $start5 = CommentCourse::where('vote', 5)->get();
        
        $interView = Banner::select('*')->where('status', 1)->get();
        return view('screens.client.home', compact('courses', 'cate','interView', 'coursesAll', 'mentorAll', 'studentAll','certificateAll','result_votes', 'start1', 'start2', 'start3', 'start4', 'start5'));
    }

    public function banner(){
        $interView = Banner::select('*')->where('status', 1)->get();

        $getCourseInBanner = Banner::select('course_id')->get();

        return view('components.client.home.banner', compact( 'interView'));

    }
}
