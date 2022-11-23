<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Banner;
use App\Models\CateCourse;
use App\Models\Mentor;
use App\Models\OwnerCourse;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $cate = CateCourse::all();

        $coursesAll = Course::select('*')->get();

        $mentorAll = Mentor::select('*')->get();

        $studentAll = OwnerCourse::select('*')->get()->unique('user_id');

        $courses =  Course::select('*');

        if (auth()->user()) {
            $courses_id = auth()->user()->load('courses')->courses->pluck('id')->toArray();
            $courses = $courses->whereNotIn('id', $courses_id);
        }

        $courses =  $courses->paginate(8);

        $interView = Banner::select('*')->where('status', 1)->get();

        $getCourseInBanner = Banner::select('course_id')->get();

        $certificateAll = $coursesAll->filter(
            function ($val) {
                return $val->certificate()->first();
            }
        );

        $discount = Banner::first()->discountCode;

        return view('screens.client.home', compact('courses', 'interView', 'cate', 'coursesAll', 'mentorAll', 'studentAll','certificateAll','discount'));
    }
}
