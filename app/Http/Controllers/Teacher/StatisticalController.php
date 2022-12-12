<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function index()
    {
        $courses = Course::where('mentor_id',auth()->guard('mentor')->user()->id)->get();
        return view('screens.teacher.statistical.personal-income',compact('courses'));
    }

    public function listStudent()
    {

        return view('screens.teacher.statistical.student-list');
    }

    public function apiListStudent()
    {
        $students = User::selectRaw("orders.user_id,users.*,COUNT(*) AS number,SUM(order_details.price) AS price")
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->join('courses', 'order_details.course_id', '=', 'courses.id')
            ->where('courses.mentor_id', auth()->guard('mentor')->user()->id)
            ->groupBy('orders.user_id')
            ->orderBy('number', 'DESC')
            ->paginate(8);

        $html = view('components.teacher.statistical.student-list',compact('students'))->render();

        return response()->json($html);
    }

    public function apiTurnoverYear(Request $request)
    {
        $turnoverNewYear =  Course::selectRaw('SUM(order_details.price) AS total, EXTRACT(MONTH FROM order_details.created_at) AS month')
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->checkYear($request)
            ->checkCourse($request)
            ->whereRaw('courses.mentor_id = ' . auth()->guard('mentor')->user()->id)
            ->groupByRaw('EXTRACT(MONTH FROM order_details.created_at)')
            ->orderByRaw('EXTRACT(MONTH FROM order_details.created_at) ASC')
            ->get();

        $monthAll = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
        $turnoverNewYear = $monthAll->map(
            function ($val, $key) use ($turnoverNewYear) {
                return $turnoverNewYear->where('month', $val)->first() == null
                    ? ['month' => $val, 'total' => 0] :
                    $turnoverNewYear->where('month', $val)->first()->toArray();
            }
        )->sortBy('month');

        $turnoverTotal = $turnoverNewYear->pluck('total')->toArray();

        return response()->json($turnoverTotal);
    }

    public function apiCourseSelling()
    {
        $selling = Course::selectRaw('count(*) as number,courses.title,sum(order_details.price) as total,courses.image')
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->where('courses.mentor_id', auth()->guard('mentor')->user()->id)
            ->groupBy('courses.id')
            ->orderBy('number', 'DESC')
            ->paginate(10);

        return response()->json($selling);
    }

    public function apiCourseSellingTop()
    {
        $selling = Course::selectRaw('count(*) as number,courses.title,sum(order_details.price) as total,courses.image')
        ->join('order_details', 'order_details.course_id', '=', 'courses.id')
        ->where('courses.mentor_id', auth()->guard('mentor')->user()->id)
        ->groupBy('courses.id')
        ->orderBy('number', 'DESC')
        ->take(3)
        ->get();

        return response()->json(['title' => $selling->pluck('title')->toArray(),'total' => $selling->pluck('total')->toArray()]);
    }
}
