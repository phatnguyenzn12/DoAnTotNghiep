<?php

namespace App\Http\Controllers\Censor;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::paginate(9);
        return view('screens.censor.course.list-course',compact('courses'));
    }

    public function actived(Course $course,$status)
    {
        $course->type = $status;
        $course->save();
        return redirect()->route('censor.course.index')->with('success', 'Cập nhập thành công');
    }
}
