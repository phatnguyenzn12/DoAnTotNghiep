<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseValidateRequest;
use App\Models\CateCourse;
use App\Models\Certificate;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\OrderDetail;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    public function index()
    {
        $cate_courses = CateCourse::all();
        $min_price = Course::min('price');
        $max_price = Course::max('price');
        return view('screens.admin.course.list-course', compact('cate_courses', 'min_price', 'max_price'));
    }

    public function filterData(Request $request)
    {
        $courses = Course::select('*')
            ->sortdata($request)
            ->search($request)
            ->isactive($request)
            ->category($request)
            ->price($request)
            ->paginate($request->record);

        $html = view('components.admin.course.list-course', compact('courses'))->render();
        return response()->json($html, 200);
    }

    public function actived(Request $request, $course)
    {
        $course_active = Course::findOrFail($course);
        if ($course_active->price == null) {
            return redirect()->back()->with('failed', 'Chưa thêm giá vào khóa học');
        }
        if ($course_active->status == 0) {
            return redirect()->back()->with('failed', 'Khóa học chưa được duyệt');
        }
        if ($course_active->status == 2) {
            return redirect()->back()->with('failed', 'Khóa học đã kích hoạt');
        }
        $course_active->status = $request->status;
        $course_active->save();
        if ($course_active->status == 2) {
            Mail::send('screens.email.admin.actived-course', compact('course_active'), function ($email) use ($course_active) {
                $email->subject('Khóa học đã được kích hoạt và sử dụng');
                $email->to($course_active->mentor->email, $course_active->mentor->name);
            });
            return redirect()->back()->with('success', 'Kích hoạt thành công');
        }
    }

    public function formDeactiveCourse(Request $request, $course_id)
    {
        $data = view('components.admin.course.actived-course', compact('course_id'))->render();

        return response()->json($data);
    }

    public function deactiveCourse(Request $request, Course $course)
    {
        if ($course->price == null) {
            return redirect()->back()->with('failed', 'Chưa thêm giá vào khóa học');
        }
        if ($course->status == 1) {
            return redirect()->back()->with('failed', 'Khóa học đang ngừng kích hoạt');
        }
        $course->status = $request->status;
        $course->save();
        if ($course->status == 1) {
            Mail::send('screens.email.admin.actived-course', compact('course', 'request'), function ($email) use ($course) {
                $email->subject('Khóa học đã ngừng kích hoạt và sử dụng');
                $email->to($course->mentor->email, $course->mentor->name);
            });

            // $order_details = OrderDetail::where('course_id', $course->id)->get();
            // foreach ($order_details as $order_detail) {
            //     Mail::send('screens.email.admin.actived-course', compact('order_detail','request'), function ($email) use ($order_detail) {
            //         $email->subject('Khóa học đã ngừng kích hoạt và sử dụng');
            //         $email->to($order_detail->order->user->email, $order_detail->order->user->name);
            //     });
            // }
            return redirect()->back()->with('success', 'Cập nhập thành công khóa học ngừng kích hoạt');
        }
    }

    public function program($course_id)
    {
        $course = Course::findOrFail($course_id);
        $chapters = Chapter::select('*')
            ->where('course_id', $course_id)
            ->paginate(10);
        return view('screens.admin.course.edit-program', compact('chapters', 'course_id', 'course'));
    }

    public function filterDataChapter(Request $request)
    {
        $chapters = Chapter::select('*')
            ->where('course_id', $request->course_id)
            ->sortdata($request)
            ->search($request)
            ->paginate($request->record);

        $html = view('components.admin.course.list-chapter', compact('chapters'))->render();
        return response()->json($html, 200);
    }

    public function edit($id)
    {
        // $certificates = auth()->guard('mentor')->user()->load('certificates')->certificates()->get();
        $skills = Skill::select('id', 'title')->get();
        $course = Course::findOrFail($id);
        $cateCourses = CateCourse::select('id', 'name')->get();
        return view('screens.admin.course.edit-course', compact('course', 'cateCourses', 'id', 'skills'));
    }

    public function update(CourseValidateRequest $request, Course $course)
    {
        if (!$course->mentor) {
            return redirect()->back()->with('failed', 'Khóa học chưa có giảng viên');
        }
        if ($course->chapters->count() == 0) {
            return redirect()->back()->with('failed', 'Khóa học chưa có nội dung');
        }
        if ($course->price != $request->price || $course->discount != $request->discount) {
            $course_price = $course;
            $course_price->price = $request->price;
            $course_price->discount = $request->discount;
            $course_price->percentage_pay = $request->percentage_pay;
            $course_price->save();
            Mail::send('screens.email.admin.actived-course', compact('course_price'), function ($email) use ($course_price) {
                $email->subject('Duyệt giá khóa học');
                $email->to($course_price->mentor->email, $course_price->mentor->name);
            });
        }
        return redirect()
            ->route('admin.course.program', $course->id)
            ->with('success', 'Cập nhật giá khóa học thành công');
    }

    public function create($id)
    {
        // dd($id);

        return view('screens.admin.certificate.create', compact('id'));
    }

    public function store(Request $request, $id)
    {
        // dd(Certificate::where('course_id', $id)->doesntExist() == true);
        if (Certificate::where('course_id', $id)->doesntExist() == true) {
            Certificate::create([
                'title' => $request->title,
                'description' => $request->description,
                'course_id' => $id
            ]);

            return redirect()->route('admin.course.index')->with('success', 'thêm mới thành công');
        }
        // Certificate::updateOrCreate([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'course_id' => $id
        // ]);
        return redirect()->route('admin.course.index')->with('success', 'đã tồn tại');
    }

    public function detailLesson(Request $request, Lesson $lesson)
    {
        $data = view('components.admin.lesson.detail', compact('lesson'))->render();
        return response()->json($data, 200);
    }

    public function formEditLesson(Request $request, Lesson $lesson)
    {
        $data = view('components.admin.lesson.edit-lesson', compact('lesson'))->render();
        return response()->json($data, 200);
    }

    public function activeIsDemo(Lesson $lesson)
    {
        if ($lesson->is_demo == 1) {
            return redirect()->back()->with('failed', 'Video đang xem thử');
        }
        if ($lesson->lessonVideo->video_path == 0) {
            return redirect()->back()->with('failed', 'Không có video');
        }
        $lesson->is_demo = 1;
        $lesson->save();

        return redirect()
            ->back()
            ->with('success', 'Cập nhập xem thử video');
    }
    public function deactiveIsDemo(Lesson $lesson)
    {
        if ($lesson->is_demo == 0) {
            return redirect()->back()->with('failed', 'Video đang không xem thử');
        }
        if ($lesson->lessonVideo->video_path == 0) {
            return redirect()->back()->with('failed', 'Không có video');
        }
        $lesson->is_demo = 0;
        $lesson->save();
        return redirect()
            ->back()
            ->with('success', 'Cập nhập không xem thử video');
    }

    // public function create(Request $course_id){
    //     $certificates = Certificate::where('course_id', $course_id->course)->get();
    //     return view('screens.admin.certificate.create', compact('certificates','course_id'));
    // }

    // public function store(Request $request)
    // {
    //     Certificate::create(
    //         $request->all()
    //     );
    //     return redirect()
    //         ->back()
    //         ->route('admin.course.index')
    //         ->with('success', 'Thêm bài học thành công');
    // }

}
