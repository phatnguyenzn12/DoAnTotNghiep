<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::where('mentor_id', auth()->guard('mentor')->user()->id)->get();

        $course_sold = OrderDetail::whereIn('course_id', $courses->pluck('id')->toArray())->count();

        $student_number = Course::selectRaw('owner_course.user_id')
            ->join('owner_course', 'owner_course.course_id', '=', 'courses.id')
            ->where('mentor_id', auth()->guard('mentor')->user()->id)
            ->groupBy('owner_course.user_id')
            ->get()
            ->count();
            // 'count(*) as number,courses.title,sum(courses.price) as total,courses.image'
        $selling = Course::selectRaw('count(*) as number,courses.title,sum(courses.price) as total,courses.image')
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->where('courses.mentor_id', auth()->guard('mentor')->user()->id)
            ->groupBy('courses.id')
            ->orderBy('number', 'DESC')
            ->paginate(10);

        $turnoverNewYear =  Course::selectRaw('SUM(order_details.price) AS total, EXTRACT(MONTH FROM order_details.created_at) AS month')
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->whereRaw('YEAR(order_details.created_at) = (SELECT YEAR(MAX(order_details.created_at)) FROM `order_details`)
            AND courses.mentor_id = ' . auth()->guard('mentor')->user()->id)
            ->groupByRaw('EXTRACT(MONTH FROM order_details.created_at)')
            ->orderByRaw('EXTRACT(MONTH FROM order_details.created_at) ASC')
            ->get();

        return view('screens.mentor.home', compact('courses', 'student_number', 'course_sold', 'selling'));
    }
}
