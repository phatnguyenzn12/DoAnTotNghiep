<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function index()
    {
        $total = Course::selectRaw('SUM(order_details.price) AS total')
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->where('courses.mentor_id', auth()->guard('mentor')->user()->id)
            ->first();

        $selling = Course::selectRaw('count(*) as number,courses.title,sum(courses.price) as total,courses.image')
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->where('courses.mentor_id', auth()->guard('mentor')->user()->id)
            ->groupBy('courses.id')
            ->orderBy('number', 'DESC')
            ->paginate(6);


        $turnoverYear  =  Course::selectRaw('SUM(order_details.price) AS total, EXTRACT(MONTH FROM order_details.created_at) AS month')
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->whereRaw('YEAR(order_details.created_at) = ' . '2019 ' . '
            AND courses.mentor_id = ' . auth()->guard('mentor')->user()->id)
            ->groupByRaw('EXTRACT(MONTH FROM order_details.created_at)')
            ->orderByRaw('EXTRACT(MONTH FROM order_details.created_at) ASC')
            ->get();

        // dd($turnoverYear);
        return view('screens.mentor.statistical.personal-income',compact('total','selling','turnoverYear'));
    }
}
