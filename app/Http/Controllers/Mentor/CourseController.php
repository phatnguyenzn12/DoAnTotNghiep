<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lead\CourseValidateRequest;
use App\Models\Admin;
use App\Models\CateCourse;
use App\Models\Certificate;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Models\Mentor;
use App\Models\Skill;
use App\Services\UploadFileService;
use Http\Message\Authentication\Chain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{

    public function index()
    {
        $min_price = Course::where('mentor_id', auth()->guard('mentor')->user()->id)->min('price');
        $max_price = Course::where('mentor_id', auth()->guard('mentor')->user()->id)->max('price');
        return view('screens.mentor.course.list', compact('min_price', 'max_price'));
    }

    public function filterData(Request $request)
    {
        $courses = Course::select('*')
            ->where('cate_course_id', auth()->guard('mentor')->user()->cate_course_id)
            ->sortdata($request)
            ->search($request)
            ->isactive($request)
            ->price($request)
            ->paginate($request->record);

        $html = view('components.mentor.course.list-course', compact('courses'))->render();
        return response()->json($html, 200);
    }

    public function program($course_id)
    {
        return view('screens.mentor.course.edit-program', compact('course_id'));
    }

    public function filterDataChapter(Request $request)
    {
        $chapters = Chapter::select('*')
            ->where('course_id', $request->course_id)
            ->sortdata($request)
            ->search($request)
            ->paginate($request->record);

        $html = view('components.mentor.chapter.list-chapter', compact('chapters'))->render();
        return response()->json($html, 200);
    }

    public function actived(Request $request, Course $course)
    {
        if ($course->status == 2) {
            return redirect()->back()->with('failed', 'Khóa học đã được kích hoạt');
        }
        $course->status = $request->status;
        $course->save();
        if ($course->status == 1) {
            Mail::send('screens.email.teacher.actived-course', compact('course'), function ($email) use ($course) {
                $email->subject('Đã duyệt khóa học');
                $email->to($course->mentor->email, $course->mentor->name);
                $email->to(Admin::first()->email, Admin::first()->name);
            });
            return redirect()->back()->with('success', 'Cập nhập thành công');
        } elseif ($course->status == 0) {
            Mail::send('screens.email.teacher.actived-course', compact('course'), function ($email) use ($course, $request) {
                $email->subject($request->content);
                $email->to($course->mentor->email, $course->mentor->name);
            });
            return redirect()->back()->with('success', 'Tắt duyệt khóa học');
        }
        return redirect()->back()->with('success', 'Bạn đã duyệt khóa học rồi');
    }

    public function edit($id)
    {
        $skills = Skill::select('id', 'title')->get();
        $course = Course::findOrFail($id);
        $cateCourses = CateCourse::select('id', 'name')->get();
        $teachers = Mentor::role('teacher')->where('cate_course_id', auth()->guard('mentor')->user()->cate_course_id)->get();

        return view('screens.mentor.course.edit-course', compact('course', 'cateCourses', 'id', 'skills', 'teachers'));
    }

    public function create()
    {
        $cateCourses = CateCourse::select('id', 'name')->get();
        $skills = Skill::select('id', 'title')->get();
        $teachers = Mentor::role('teacher')->where('cate_course_id', auth()->guard('mentor')->user()->cate_course_id)->get();

        return view('screens.mentor.course.create', compact('cateCourses', 'skills', 'teachers'));
    }

    public function store(CourseValidateRequest $request)
    {
        $image = UploadFileService::storage_image($request->image);
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
                    'cate_course_id',
                    'skill_id',
                    'language',
                    'mentor_id',
                    'certificate',
                    'description',
                    'certificate_id'
                ]),
                ['description_details' => implode(', ', collect(json_decode($request->description_details))->pluck('value')->toArray())],
                ['image' => $image],
            )
        );

        return redirect()
            ->route('mentor.course.index')
            ->with('success', 'Thêm khóa học thành công');
    }

    public function destroy($id)
    {
        $data = Course::destroy($id);
        return response()->json($data, 200);
    }

    public function update(CourseValidateRequest $request, Course $course)
    {
        $course->title = $request->title;
        $course->content = $request->content;
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->skill_id = $request->skill_id;
        $course->language = $request->language;
        $course->description = $request->description;
        $course->description_details = implode(', ', collect(json_decode($request->description_details))->pluck('value')->toArray());
        $course->certificate_id =  $request->certificate_id;
        $course->mentor_id =  $request->mentor_id;

        $course->fill($request->except(['_method', '_token']));
        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('images');
            $imgPath = str_replace('public/', '', $imgPath);
            $course->image = $imgPath;
        }

        $course->save();

        return redirect()
            ->route('mentor.course.program',$course->id)
            ->with('success', 'Sửa khóa học thành công');
    }
}
