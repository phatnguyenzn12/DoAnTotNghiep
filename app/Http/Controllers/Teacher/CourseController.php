<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $min_price = Course::where('mentor_id', auth()->guard('mentor')->user()->id)->min('price');
        $max_price = Course::where('mentor_id', auth()->guard('mentor')->user()->id)->max('price');
        return view('screens.teacher.course.list', compact('min_price', 'max_price'));
    }
    public function filterData(Request $request)
    {
        $courses = Course::select('*')
            ->where('mentor_id', auth()->guard('mentor')->user()->id)
            ->sortdata($request)
            ->search($request)
            ->isactive($request)
            ->price($request)
            ->paginate($request->record);

        $html = view('components.teacher.course.list-course', compact('courses'))->render();
        return response()->json($html, 200);
    }
}
