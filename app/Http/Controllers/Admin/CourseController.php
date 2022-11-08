<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Chapter;
use App\Models\Course;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::select('*')->get();
        return view('screens.admin.course.list', compact('courses'));
    }

    public function program($course_id)
    {
        $chapters = Chapter::select('*')
            ->where('course_id', $course_id)
            ->orderBy('sort')
            ->paginate();

        return view('screens.admin.course.edit-program', compact('chapters', 'course_id'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $cateCourses = CateCourse::select('id', 'name')->get();
        return view('screens.admin.course.edit-course', compact('course', 'cateCourses', 'id'));
    }
    public function create()
    {
        $cateCourses = CateCourse::select('id', 'name')->get();
        return view('screens.admin.course.create', compact('cateCourses'));
    }

    public function store(Request $request, UploadFileService $upload)
    {
        $image = $upload
            ->storage_image($request->file);

        Course::create(
            array_merge(
                $request->all(),
                ['image' => $image]
            )
        );

        return redirect()
            ->back()
            ->with('success', 'thêm khóa học thành công');
    }

    public function destroy($id)
    {
        $data = Course::destroy($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id, UploadFileService $upload)
    {
        $course = Course::findOrFail($id);
        $course->title = $request->title;
        $course->content = $request->content;
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->status = $request->status;
        $course->slug = $request->slug;
        if ($request->image) {
            $image = $upload->storage_image($request->image);
            $course->image = $image;
        }
        $course->save();
        return redirect()
            ->back()
            ->with('success', 'sửa khóa học thành công');
    }
}
