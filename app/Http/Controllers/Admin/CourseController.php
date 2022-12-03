<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Certificate;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Skill;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CourseController extends Controller
{
    public function index(Mentor $mentor){
        $courses = Course::paginate(40);
        return view('screens.admin.course.list-course',compact('courses','mentor'));
    }

    public function actived(Course $course,$status)
    {
        $course->type = $status;
        $course->save();
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
        if(Certificate::where('course_id', $id)->doesntExist()){
            Certificate::create([
            'title' => $request->title,
            'description' => $request->description,
            'course_id' => $id
        ]);
        }
        // Certificate::updateOrCreate([
        //     'title' => $request->title,
        //     'description' => $request->description],
        //     ['course_id' => $id
        // ]);
        return redirect()->route('admin.course.index')->with('success', 'Thêm mới thành công');
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
