<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Certificate;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
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
            // ->orderBy('id', 'DESC')
            ->sortdata($request)
            ->search($request)
            ->isactive($request)
            ->category($request)
            ->price($request)
            ->paginate($request->record);

        $html = view('components.admin.course.list-course', compact('courses'))->render();
        return response()->json($html, 200);
    }

    public function actived(Request $request, Course $course)
    {
        if ($course->price == null) {
            return redirect()->back()->with('failed', 'Đã chưa thêm giá vào khóa học');
        }
        $course->status = $request->status;
        $course->save();
        if ($course->status == 2) {
            Mail::send('screens.email.teacher.actived-course', compact('course'), function ($email) use ($course) {
                $email->subject('Khóa học đã được kích hoạt và sử dụng');
                $email->to($course->mentor->email, $course->mentor->name);
            });
            return redirect()->back()->with('success', 'Cập nhập thành công khóa học đã được kích hoạt');
        } elseif ($course->status == 1) {
            Mail::send('screens.email.teacher.actived-course', compact('course'), function ($email) use ($course, $request) {
                $email->subject($request->content);
                $email->to($course->mentor->email, $course->mentor->name);
            });
            return redirect()->back()->with('failed', 'Đã bỏ kích hoạt khóa học');
        }
    }

    public function program($course_id)
    {
        $chapters = Chapter::select('*')
            ->where('course_id', $course_id)
            ->paginate(10);
        return view('screens.admin.course.edit-program', compact('chapters', 'course_id'));
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

    public function update(Request $request, Course $course)
    {
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->percentage_pay = $request->percentage_pay;
        $course->save();
        // Mail::send('screens.email.admin.actived-course', compact('course'), function ($email) use ($course) {
        //     $email->subject('Duyệt giá khóa học');
        //     $email->to($course->mentor->email, $course->mentor->name);
        // });

        return redirect()
            ->route('admin.course.program',$course->id)
            ->with('success', 'Sửa khóa học thành công');
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
