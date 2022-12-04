<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Certificate;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Mentor;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::orderBy('id', 'DESC')->get();
        return view('screens.admin.course.list-course',compact('courses'));
    }

    public function actived(Course $course,$status)
    {
        $course->type = $status;
        $course->save();
        $course_type = Course::where('id',$course->id)->first();
        Mail::send('screens.email.admin.actived-course', compact('course_type'), function ($email) use ($course_type) {
            $email->subject('Duyệt khóa học');
            $email->to($course_type->mentor->email, $course_type->mentor->name);
        });
        return redirect()->route('admin.course.index')->with('success', 'Cập nhập thành công');
    }

    public function program($course_id)
    {
        $chapters = Chapter::select('*')
            ->where('course_id', $course_id)
            ->paginate(10);
        return view('screens.admin.course.edit-program', compact('chapters', 'course_id'));
    }

    public function edit($id)
    {
        // $certificates = auth()->guard('mentor')->user()->load('certificates')->certificates()->get();
        $skills = Skill::select('id', 'title')->get();
        $course = Course::findOrFail($id);
        $cateCourses = CateCourse::select('id', 'name')->get();
        return view('screens.admin.course.edit-course', compact('course', 'cateCourses', 'id', 'skills'));
    }

    public function update(Request $request, Course $course, Certificate $certificate)
    {
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->save();
        Mail::send('screens.email.admin.actived-course', compact('course'), function ($email) use ($course) {
            $email->subject('Duyệt giá khóa học');
            $email->to($course->mentor->email, $course->mentor->name);
        });

        return redirect()
            ->back()
            ->with('success', 'Sửa khóa học thành công');
    }

    public function create($id){
        // dd($id);
        
        return view('screens.admin.certificate.create', compact('id'));
    }

    public function store(Request $request, $id)
    {
        // dd(Certificate::where('course_id', $id)->doesntExist() == true);
        if(Certificate::where('course_id', $id)->doesntExist() == true){
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
