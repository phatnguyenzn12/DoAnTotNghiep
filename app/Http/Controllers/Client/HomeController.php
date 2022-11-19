<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Banner;
use App\Models\CateCourse;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $cate = CateCourse::all();

        $courses = Course::select('*');
        if(auth()->user()){
            $courses_id = auth()->user()->load('courses')->courses->pluck('id')->toArray();
            $courses = $courses->whereNotIn('id',$courses_id);
        }
        $courses =  $courses->paginate(8);

        $courses->transform(
            function (Course $course) {
                return [
                    ...$course->toArray(),
                    ...['lesson' => $course->with('lessons')->count()]
                ];
            }
        );

        $interView = Banner::select('*')->where('status', 1)->get();
        $getCourseInBanner = Banner::select('course_id')->get();
        // dd($getCourseInBanner);
        return view('screens.client.home', compact('courses', 'interView','cate'));
    }

}
