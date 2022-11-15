<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $courses = Course::select('*');
        if(auth()->user()){
            $courses_id = auth()->user()->load('courses')->courses->pluck('id')->toArray();
            $courses = $courses->whereNotIn('id',$courses_id);
        }
        $courses =  $courses->get();
// dd($courses->toArray());
        $courses->transform(
            function (Course $course) {
                return [
                    ...$course->toArray(),
                    ...['chapter' => $course->with('chapters')->count()],
                    ...['lesson' => $course->with('lessons')->count()]
                ];
            }
        )->toJson();

        $courses = json_decode($courses);

        $interView = Banner::select('*')->where('status', 1)->get();
        $getCourseInBanner = Banner::select('course_id')->get();
        // dd($getCourseInBanner);
        return view('screens.client.home', compact('courses', 'interView'));
    }

}
