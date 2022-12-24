<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CateCourse;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PercentagePayable;
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
            DB::raw('CAST( SUM( order_details.price - (order_details.price * 0.8) ) AS UNSIGNED ) as total')
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

        $total_course = Order::select(
            DB::raw('SUM(total_price) as total')
        )
            ->first()->total;

        $amount_price_teacher = OrderDetail::select(
            DB::raw('SUM(percentage_payable.amount_paid_teacher) as amount_price_teacher')
        )
            ->join('percentage_payable', 'order_details.id', '=', 'percentage_payable.order_detail_id')
            ->first()->amount_price_teacher;

        $amount_price_admin = OrderDetail::select(
            DB::raw('SUM(percentage_payable.amount_paid_admin) as amount_price_admin')
        )
            ->join('percentage_payable', 'order_details.id', '=', 'percentage_payable.order_detail_id')
            ->first()->amount_price_admin;

        return view(
            'screens.admin.home',
            compact(
                'courses',
                'selling',
                'number_course_sold',
                'student_number',
                'orders',
                'cate_courses',
                'banners',
                'teachers',
                'amount_price_teacher',
                'amount_price_admin',
                'total_course'
            )
        );
    }

    public function apiAmount(Request $request)
    {

        $total_course = Order::select(
            DB::raw('SUM(total_price) as total')
        )
            ->time('orders.created_at',$request)
            ->first()->total;

        $amount_price_teacher = OrderDetail::select(
            DB::raw('SUM(percentage_payable.amount_paid_teacher) as amount_price_teacher')
        )
            ->join('percentage_payable', 'order_details.id', '=', 'percentage_payable.order_detail_id')
            ->time('percentage_payable.created_at',$request)
            ->first()->amount_price_teacher;

        $amount_price_admin = OrderDetail::select(
            DB::raw('SUM(percentage_payable.amount_paid_admin) as amount_price_admin')
        )
            ->join('percentage_payable', 'order_details.id', '=', 'percentage_payable.order_detail_id')
            ->time('percentage_payable.created_at',$request)
            ->first()->amount_price_admin;

        $data = [
            'total_course' => number_format($total_course),
            'amount_price_teacher' => number_format($amount_price_teacher),
            'amount_price_admin' => number_format($amount_price_admin)
        ];

        return response()->json($data);
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

    // public function turnover_role(Request $request, $auth)
    // {
    //     $turnoverNewYear =  Course::select(
    //         DB::raw('SUM(order_details.price) AS total'),
    //         DB::raw('EXTRACT(MONTH FROM order_details.created_at) AS month'), //sua sau neu lam thong ke theo ngay
    //     )
    //         ->selectRawTurnover($auth)
    //         ->join('order_details', 'order_details.course_id', '=', 'courses.id')
    //         ->checkYear($request)
    //         ->checkCourse($request)
    //         ->groupByRaw('EXTRACT(MONTH FROM order_details.created_at)')
    //         ->orderByRaw('EXTRACT(MONTH FROM order_details.created_at) ASC')
    //         ->get();

    //     $monthAll = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
    //     $turnoverNewYear = $monthAll->map(
    //         function ($val, $key) use ($turnoverNewYear) {
    //             return $turnoverNewYear->where('month', $val)->first() == null
    //                 ? ['month' => $val, 'total' => 0] :
    //                 $turnoverNewYear->where('month', $val)->first()->toArray();
    //         }
    //     )->sortBy('month');

    //     return $turnoverNewYear->pluck('total')->toArray();
    // }

    public function teacherList()
    {
        $teachers = PercentagePayable::all();
        $min = $teachers->min('created_at');
        $max = $teachers->max('created_at');
        return view('screens.admin.statistical.teacher-list',compact('min','max'));
    }

    public function apiTeacherList(Request $request)
    {
        $teachers = Mentor::role('teacher')
            ->select(
                DB::raw('name,avatar,email,salary_bonus,educations'),
                DB::raw('SUM(percentage_payable.amount_paid_teacher) as amount_paid_teacher,
                SUM(percentage_payable.amount_paid_admin) as amount_paid_admin,
                SUM(percentage_payable.amount_paid_admin + percentage_payable.amount_paid_teacher) as total_price'),
                DB::raw('percentage_payable.created_at')
            )
            ->join('percentage_payable', 'percentage_payable.mentor_id', '=', 'mentors.id')
            ->groupBy('mentors.id')
            ->time('percentage_payable.created_at', $request)
            ->paginate(10);

        $html = view('components.admin.statistical.teacher-list', compact('teachers'))->render();

        return response()->json($html);
    }

    public function CourseSellingIndex()
    {
        $courses = Course::all();
        return view('screens.admin.statistical.top-selling',compact('courses'));
    }

    public function apiCourseSelling(Request $request)
    {
        $selling = Course::select(
            DB::raw('count(percentage_payable.id) as number,courses.title,courses.image as image,courses.percentage_pay as percentage_pay'),
            DB::raw('SUM(percentage_payable.amount_paid_admin + percentage_payable.amount_paid_teacher) as total,
            SUM(percentage_payable.amount_paid_admin) as amount_price_admin,
            SUM(percentage_payable.amount_paid_teacher) as amount_price_teacher'),
            DB::raw('courses.created_at','courses.id'),
        )
            ->join('mentors', 'mentors.id', '=', 'courses.mentor_id')
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->join('percentage_payable', 'percentage_payable.order_detail_id', '=', 'order_details.id')
            ->groupBy('courses.id')
            ->orderBy('number', 'DESC')
            ->search($request)
            ->sortdatacourse($request)
            ->time('percentage_payable.created_at',$request)
            ->paginate($request->record);

        $html = view('components.base.selling', compact('selling'))->render();

        return response()->json($html);
    }
    // public function CourseSellingdetail()
    // {
    //     return view('screens.admin.statistical.top-selling-detail');
    // }
}
