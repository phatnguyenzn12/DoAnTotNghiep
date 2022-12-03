<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        // $chapters = Chapter::where('mentor_id',auth()->guard('mentor')->user()->id)->get();
        // foreach ($chapters as $a){
        //     $course = Course::where('menter_id',$a->);
        // }

        //   $chapters  = Chapter::select('title','lesson_id','')
        $u = [];

        $chapters = Chapter::where('mentor_id', auth()->guard('mentor')->user()->id)->groupBy('course_id')->get();
   //     dd($chapters);
        foreach ($chapters as $a) {  
                $u[] = Course::where('id', $a->course_id)->first();
        }
    // dd($u);



        return view('screens.teacher.course.list', compact('u'));
    }
}
