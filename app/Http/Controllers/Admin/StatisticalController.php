<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CateCourse;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function home()
    {
        $courses = Course::get();

        $selling = Course::select(
            DB::raw('(100 - order_details.percentage_pay) as percentage_pay_admin'),
            DB::raw('courses.title as title,courses.image as image'),
            DB::raw('count(*) as number'),
            DB::raw('CAST( SUM( order_details.price - (order_details.price * 0.8) ) AS UNSIGNED ) as total'),
        )
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->groupBy('courses.id')
            ->orderBy('courses.id', 'DESC')
            ->get()->count();

        $number_course_sold = OrderDetail::whereIn('course_id', $courses->pluck('id')->toArray())->count();

        $student_number = Course::selectRaw('owner_course.user_id')
            ->join('owner_course', 'owner_course.course_id', '=', 'courses.id')
            ->groupBy('owner_course.user_id')
            ->get()
            ->count();

        $orders = Order::get()->count();
        $cate_courses = CateCourse::get()->count();
        $banners = Banner::get()->count();
        $teachers = Mentor::role('teacher')->get()->count();

        return view('screens.admin.home', compact('courses', 'selling', 'number_course_sold', 'student_number', 'orders', 'cate_courses', 'banners', 'teachers'));
    }

    public function apiTurnoverYear(Request $request)
    {

        $turnoverTotal = [
            'admin' => $this->turnover_role($request, 'admin'),
            'teacher' => $this->turnover_role($request, 'teacher'),
            'all' => $this->turnover_role($request, 'all'),
        ];

        return response()->json($turnoverTotal);
    }

    public function turnover_role(Request $request, $auth)
    {
        $turnoverNewYear =  Course::select(
            DB::raw('SUM(order_details.price) AS total'),
            DB::raw('EXTRACT(MONTH FROM order_details.created_at) AS month'), //sua sau neu lam thong ke theo ngay
        )
            ->selectRawTurnover($auth)
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->checkYear($request)
            ->checkCourse($request)
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

        return $turnoverNewYear->pluck('total')->toArray();
    }

    public function apiCourseSelling()
    {
        $selling = Course::selectRaw('count(*) as number,courses.title,sum(order_details.price) as total,courses.image')
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->groupBy('courses.id')
            ->orderBy('number', 'DESC')
            ->paginate(10);

        $html = view('components.base.selling',compact('selling'))->render();

        return response()->json($html);
    }

    public function CourseSellingIndex()
    {
        return view('screens.admin.statistical.top-selling');
    }

    public function CourseSellingdetail()
    {
        return view('screens.admin.statistical.top-selling-detail');
    }
}
