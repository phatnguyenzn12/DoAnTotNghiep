<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Skill;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $courses = auth()->guard('mentor')
            ->user()
            ->load('courses')
            ->courses;

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
        $skills = Skill::select('id', 'title')->get();
        $course = Course::findOrFail($id);
        $cateCourses = CateCourse::select('id', 'name')->get();

        return view('screens.mentor.course.edit-course', compact('course', 'cateCourses', 'id', 'skills'));
    }
    public function create()
    {
        $cateCourses = CateCourse::select('id', 'name')->get();
        $skills = Skill::select('id', 'title')->get();

        return view('screens.mentor.course.create', compact('cateCourses', 'skills'));
    }

    public function store(Request $request, UploadFileService $upload)
    {
        $image = $upload
            ->storage_image($request->image);
        $certificate = $upload
            ->storage_image($request->certificate);

        Course::create(
            array_merge(
                $request->only([
                    'title',
                    'content',
                    'video',
                    'price',
                    'discount',
                    'status',
                    'slug',
                    'cate_course_id',
                    'skill_id',
                    'language',
                    'certificate',
                    'tags',
                    'description',
                    'description_details',
                ]),
                ['image' => $image],
                ['mentor_id' => auth()->guard('mentor')->user()->id],
                ['certificate' => $certificate]
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
        $course->skill_id = $request->skill_id;
        $course->language = $request->language;
        $course->tags = $request->tags;
        $course->description = $request->description;
        $course->description_details = $request->description_details;
        if ($request->image) {
            $image = $upload->storage_image($request->image);
            $course->image = $image;
        }
        if ($request->certificate) {
            $certificate = $upload->storage_image($request->certificate);
            $course->certificate = $certificate;
        }
        $course->save();
        return redirect()
            ->back()
            ->with('success', 'sửa khóa học thành công');
    }
}
