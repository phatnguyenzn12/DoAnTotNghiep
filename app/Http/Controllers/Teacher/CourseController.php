<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class CourseController extends Controller
{
    public function index()
    {
        return view('screens.teacher.course.list');
    }
    public function filterData(Request $request)
    {
        $courses = [];
        $chapters = Chapter::where('mentor_id', auth()->guard('mentor')->user()->id)
        ->groupBy('course_id')
        ->sortdata($request)
        ->search($request)
        ->paginate($request->record);
        foreach ($chapters as $chapter) {  
            $courses[] = Course::where('id', $chapter->course_id)->first();
        }
        $html = view('components.teacher.course.list-course' ,compact('courses'))->render();
        return response()->json($html,200);
    }
}
