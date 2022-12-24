<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PercentagePayable;

class StatisticalController extends Controller
{
    public function index()
    {
        $courses = Course::where('mentor_id', auth()->guard('mentor')->user()->id)->get();
        return view('screens.teacher.statistical.personal-income', compact('courses'));
    }

    public function listStudent()
    {

        return view('screens.teacher.statistical.student-list');
    }

    public function studentDetail()
    {
        $student = User::selectRaw("orders.user_id,users.*,COUNT(courses.id) AS number,SUM(order_details.price) AS price")
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->join('courses', 'order_details.course_id', '=', 'courses.id')
            ->where('courses.mentor_id', auth()->guard('mentor')->user()->id)
            ->groupBy('orders.user_id')
            ->orderBy('number', 'DESC')
            ->paginate(8);

        return view('screens.teacher.statistical.student-detail');
    }

    public function apiListStudent(Request $request)
    {
        $students = User::selectRaw("orders.user_id,users.*,COUNT(courses.id) AS number,SUM(order_details.price) AS price")
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->join('courses', 'order_details.course_id', '=', 'courses.id')
            ->where('courses.mentor_id', auth()->guard('mentor')->user()->id)
            ->groupBy('orders.user_id')
            ->orderBy('number', 'DESC')
            ->sortdata($request)
            ->search($request)
            ->paginate(8);

        $html = view('components.teacher.statistical.student-list', compact('students'))->render();

        return response()->json($html);
    }

    public function apiStudentDetail()
    {

        $html = view('components.teacher.statistical.student-detail', compact('students'))->render();
    }

    public function salaryBonus()
    {
        $mentor = auth()->guard('mentor')->user();

        $course_count = Course::selectRaw('count(id) as number')
            ->where('mentor_id', $mentor->id)
            ->first()
            ->number;

        $max = PercentagePayable::max('created_at');
        $min = PercentagePayable::min('created_at');

        return view('screens.teacher.statistical.salary-bonus', compact('mentor', 'course_count','max','min'));
    }

    public function apiCourseSellingTop(Request $request)
    {
        $myCourseSale = Course::select(
            DB::raw('count(order_details.id) as number'),
            DB::raw('courses.title,courses.id,courses.image,courses.percentage_pay as percentage_pay'),
            DB::raw('sum(percentage_payable.amount_paid_teacher) as price_teacher'),
            // DB::raw('sum(order_details.price) as total'),
        )
            ->join('order_details', 'order_details.course_id', '=', 'courses.id')
            ->join('percentage_payable', 'percentage_payable.order_detail_id', '=', 'order_details.id')
            ->where('courses.mentor_id', auth()->guard('mentor')->user()->id)
            ->groupBy('order_details.course_id')
            ->search($request)
            ->time('percentage_payable.created_at', $request)
            ->orderBy('number', 'DESC')
            ->paginate(4);

        $html = view('components.teacher.statistical.list-salary-bonus', compact('myCourseSale'))->render();

        return response()->json($html);
    }

    public function salaryBonusDetail(Course $course)
    {
        $max = PercentagePayable::max('created_at');
        $min = PercentagePayable::min('created_at');
        return view('screens.teacher.statistical.salary-bonus-detail', compact('course', 'max', 'min'));
    }

    public function apiSalaryBonusDetail(Request $request)
    {

        $course_id = $request->course;

        $students = User::select(
            DB::raw('users.id,name,email,avatar'),
            DB::raw('order_details.created_at as created_at'),
            DB::raw('percentage_payable.amount_paid_teacher as price_teacher'),
        )
            ->join('orders', 'orders.user_id', '=', 'users.id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->join('percentage_payable', 'percentage_payable.order_detail_id', '=', 'order_details.id')
            ->where('order_details.course_id', $course_id)
            ->sortdata($request)
            ->search($request)
            ->time('percentage_payable.created_at', $request)
            ->paginate(5);

        $html = view('components.teacher.statistical.list-salary-bonus-detail', compact('students'))->render();
        return response()->json($html);
    }
}
