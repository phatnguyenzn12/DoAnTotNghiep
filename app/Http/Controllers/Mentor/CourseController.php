<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lead\CourseValidateRequest;
use App\Models\Admin;
use App\Models\CateCourse;
use App\Models\Certificate;
use App\Models\Chapter;
use App\Models\CommentCourse;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Models\Mentor;
use App\Models\Skill;
use App\Models\User;
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

    public function commentCourse()
    {
        $comment = CommentCourse::all();
        return view('screens.mentor.course.list-comment', compact('comment'));
    }

    public function deleteComment($id)
    {
        $delete = CommentCourse::find($id);
        $delete->delete();

        return redirect()->back()->with('success', 'Xoá thành công');
    }

    public function filterComment(Request $request)
    {
        // dd(auth()->guard('mentor')->user()->id);
        $comments = CommentCourse::select('*')
            ->where('mentor_id', auth()->guard('mentor')->user()->id)
            ->sortdata($request)
            ->search($request)
            ->isactive($request)
            ->paginate($request->record);

        $html = view('components.mentor.course.list-comment', compact('comments'))->render();
        return response()->json($html, 200);
    }

    public function activecomment(Request $request,CommentCourse $comment)
    {
        if ($comment->status == 1) {
            return redirect()->back()->with('failed', 'Bình luận đã hiển thị');
        }
        $comment->status = $request->status;
        $comment->save();
        return redirect()->back()->with('success', 'Hiển thị bình luận thành công');
    }
    public function deactivecomment(Request $request,CommentCourse $comment)
    {
        if ($comment->status == 0) {
            return redirect()->back()->with('failed', 'Bình luận đã ẩn');
        }
        $comment->status = $request->status;
        $comment->save();
        return redirect()->back()->with('success', 'Ẩn bình luận thành công');
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
        $course = Course::findOrFail($course_id);
        $teachers = Mentor::role('teacher')->where('cate_course_id', auth()->guard('mentor')->user()->cate_course_id)->get();
        return view('screens.mentor.course.edit-program', compact('course_id', 'teachers', 'course'));
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

    public function actived(Request $request, $course)
    {
        $course_active = Course::findOrFail($course);
        if(!$course_active->mentor){
            return redirect()->back()->with('failed', 'Khóa học chưa có giảng viên');
        }
        if ($course_active->status == 2) {
            return redirect()->back()->with('failed', 'Khóa học đang kích hoạt');
        }
        if ($course_active->status == 1) {
            return redirect()->back()->with('failed', 'Khóa học đã được duyệt');
        }
        $course_active->status = $request->status;
        $course_active->save();
        if ($course_active->status == 1) {
            $admin = Admin::first();
            Mail::send('screens.email.mentor.actived-course', compact('course_active','admin'), function ($email) use ($admin) {
                $email->subject('Đã duyệt khóa học');
                $email->to($admin->email, $admin->name);
            });
            Mail::send('screens.email.mentor.actived-course', compact('course_active'), function ($email) use ($course_active) {
                $email->subject('Đã duyệt khóa học');
                $email->to($course_active->mentor->email, $course_active->mentor->name);
            });
            return redirect()->back()->with('success', 'Duyệt khóa học thành công');
        }
    }

     public function formDeactiveCourse(Request $request, $course_id)
    {
        $data = view('components.mentor.course.actived-course', compact('course_id'))->render();

        return response()->json($data);
    }

    public function deactiveCourse(Request $request, Course $course)
    {
        if ($course->status == 2) {
            return redirect()->back()->with('failed', 'Khóa học đang kích hoạt');
        }
        if ($course->status == 0) {
            return redirect()->back()->with('failed', 'Khóa học đang chờ xử lý');
        }
        $course->status = $request->status;
        $course->save();
        if ($course->status == 0) {
            Mail::send('screens.email.mentor.actived-course', compact('course','request'), function ($email) use ($course) {
                $email->subject('Khóa học đã ngừng kích hoạt và sử dụng');
                $email->to($course->mentor->email, $course->mentor->name);
            });

            return redirect()->back()->with('success', 'Cập nhập bỏ duyệt khóa học');
        }
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

        return view('screens.mentor.course.create', compact('cateCourses', 'skills'));
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
        $course->fill($request->except(['_method', '_token']));
        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('images');
            $imgPath = str_replace('public/', '', $imgPath);
            $course->image = $imgPath;
        }

        $course->save();

        return redirect()
            ->route('mentor.course.program', $course->id)
            ->with('success', 'Sửa khóa học thành công');
    }

    public function courseTeach($id, Request $request)
    {
        $course = Course::findOrFail($id);
        $course_old = $course->mentor_id;
        $course->mentor_id = $request->mentor_id;
        $course->save();
        if ($course_old != $course->mentor_id) {
            Mail::send('screens.email.mentor.course-teacher', compact('course'), function ($email) use ($course) {
                $email->subject('Giao khóa học');
                $email->to($course->mentor->email, $course->mentor->name);
            });
            return redirect()
                ->route('mentor.course.program', $id)
                ->with('success', 'Thêm giảng viên thành công');
        }
        return redirect()
            ->route('mentor.course.program', $id)
            ->with('failed', 'Giảng viên đang được giao khóa học');
    }

}
