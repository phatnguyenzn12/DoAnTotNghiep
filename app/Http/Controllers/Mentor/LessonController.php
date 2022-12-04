<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Services\VimeoService;
use Dotenv\Parser\Lexer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LessonController extends Controller
{

    public function index()
    {
        $courses = Course::where('mentor_id', auth()->guard('mentor')->user()->id)->orderBy('id', 'DESC')->get();
        // $lessons = Lesson::with('chapter')->orderBy('id', 'DESC')->paginate(10);
        return view('screens.mentor.lesson.list-video', compact('courses'));
    }

    public function list($id)
    {
        $chapter = Chapter::where('id', $id)->orderBy('id', 'DESC')->first();
        return view('screens.mentor.lesson.list-video-id', compact('chapter'));
    }
    public function create(Request $course_id)
    {
        $chapters = Chapter::where('course_id', $course_id->course)->get();
        $data = view('components.mentor.course.modal.lesson.add', compact('chapters', 'course_id'))->render();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $lesson = Lesson::create(
            $request->all()
        );

        LessonVideo::create(
            ['lesson_id' => $lesson->id],
        );

        if ($request->ajax()) {
            session()->flash('success', 'Thêm bài học thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'Thêm bài học thành công');
    }

    public function actived(LessonVideo $lesson_video, $check)
    {
        $lesson_video->is_check = $check;
        $lesson_video->save();
        $lesson =  Lesson::where('id', $lesson_video->lesson_id)->first();
        return redirect()->route('mentor.lesson.index')->with('success', 'Cập nhập thành công');
    }

    public function actived_id(Lesson $lesson, $check)
    {
        $lesson->is_check = $check;
        $lesson->save();

        if ($lesson->is_check == 0) {
            // gửi mail teacher
            Mail::send('screens.email.mentor.browse-lesson', compact('lesson'), function ($email) use ($lesson) {
                $email->subject('Duyệt bài học');
                $email->to($lesson->chapter->mentor->email, $lesson->chapter->mentor->name);
            });
        }
        if ($lesson->is_check == 2) {
            Mail::send('screens.email.mentor.browse-lesson', compact('lesson'), function ($email) use ($lesson) {
                $email->subject('Duyệt bài học');
                $email->to($lesson->chapter->mentor->email, $lesson->chapter->mentor->name);
            });
        }


        //duyệt đủ bài chương học teach
        $item = 0;
        foreach ($lesson->chapter->lessons as $lesson) {
            if ($lesson->is_check != 1) {
                $item++;
            }
        }
        if ($item == 0) {
            Mail::send('screens.email.mentor.full-lesson', compact('lesson'), function ($email) use ($lesson) {
                $email->subject('Duyệt bài học');
                $email->to($lesson->chapter->mentor->email, $lesson->chapter->mentor->name);
            });
        }

        //duyệt all bài học gửi admin
        $itemAll = 0;
        foreach ($lesson->chapter->course->chapters as $chapter) {
            foreach ($chapter->lessons as $less) {
                if ($less->is_check != 1) {
                    $itemAll++;
                }
            }
        }
        if($itemAll == 0){
            $admins = Admin::all();
            foreach($admins as $admin){
                Mail::send('screens.email.mentor.browse-course', compact('lesson','admin'), function ($email) use ($admin) {
                    $email->subject('Duyệt khóa học');
                    $email->to($admin->email, $admin->name);
                });
            }
        }
        return redirect()->route('mentor.lesson.list', $lesson->chapter_id)->with('success', 'Cập nhập thành công');
    }

    public function activedLesson(Lesson $lesson, $check)
    {
        $lesson->is_edit = $check;
        $lesson->save();

        Mail::send('screens.email.mentor.active-lesson', compact('lesson'), function ($email) use ($lesson) {
            $email->subject('Duyệt bài học');
            $email->to($lesson->chapter->mentor->email, $lesson->chapter->mentor->name);
        });


        return redirect()->route('mentor.lesson.list', $lesson->chapter->id)->with('success', 'Cập nhập thành công');
    }

    public function activedAllLesson(Chapter $chapter)
    {
        $item = 0;
        foreach ($chapter->lessons as $lesson) {
            if ($lesson->is_edit == 0) {
                $item++;
                $lesson->update(['is_edit' => 1]);
            }
        }
        if ($item > 0) {
            Mail::send('screens.email.mentor.active-lesson', compact('chapter'), function ($email) use ($chapter) {
                $email->subject('Duyệt bài học');
                $email->to($chapter->mentor->email, $chapter->mentor->name);
            });
        }

        return redirect()->route('mentor.lesson.list', $lesson->chapter->id)->with('success', 'Cập nhập thành công');
    }
}
