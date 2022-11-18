<?php

namespace App\Http\Controllers\Mentor;

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
        $courses =  auth()->guard('mentor')->user()->load('courses')->courses;
        return view('screens.mentor.course.list', compact('courses'));
    }

    public function program($course_id)
    {
        $chapters = Chapter::select('*')
            ->where('course_id', $course_id)
            ->orderBy('sort')
            ->paginate();

        return view('screens.mentor.course.edit-program', compact('chapters', 'course_id'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $cateCourses = CateCourse::select('id', 'name')->get();
        return view('screens.mentor.course.edit-course', compact('course', 'cateCourses', 'id'));
    }
    public function create()
    {
        $cateCourses = CateCourse::select('id', 'name')->get();
        return view('screens.mentor.course.create', compact('cateCourses'));
    }

    public function store(Request $request, UploadFileService $upload)
    {
        $image = $upload
            ->storage_image($request->file);

        $course = Course::create(
            array_merge(
                $request->only([
                    'title',
                    'content',
                    'video',
                    'price',
                    'discount',
                    'status',
                    'slug',
                    'participant',
                    'cate_course_id'
                ]),
                ['image' => $image],
                ['mentor_id' => auth()->guard('mentor')->user()->id]
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
