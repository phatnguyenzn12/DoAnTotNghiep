<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
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
    // public function list($id)
    // {
    //     $lessons = Lesson::with('chapter')->orderBy('id', 'DESC')->paginate(10);

    // //    $lesson = Lesson::where('chapter_id',$id)->get();
    //    $chapter = Chapter::where('id',$id)->first();
    //    return view('screens.mentor.lesson.list-lesson', compact('lessons','chapter'));
    // }
    // public function create(Request $course_id)
    // {
    //     $chapters = Chapter::where('course_id', $course_id->course)->get();
    //     $data = view('components.mentor.course.modal.lesson.add', compact('chapters'))->render();
    //     return response()->json($data, 200);



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
        // Mail::send('screens.email.mentor.browseLesson', compact('lesson', 'lesson_video'), function ($email) use ($lesson) {
        //     $email->subject('Duyệt bài học');
        //     $email->to($lesson->chapter->course->mentor->email, $lesson->chapter->course->mentor->name);
        // });
        return redirect()->route('mentor.lesson.index')->with('success', 'Cập nhập thành công');
    }

    public function actived_id(LessonVideo $lesson_video, $check)
    {
        $lesson_video->is_check = $check;
        $lesson_video->save();
        // $lesson =  Lesson::where('id', $lesson_video->lesson_id)->first();
        // Mail::send('screens.email.mentor.browseLesson', compact('lesson', 'lesson_video'), function ($email) use ($lesson) {
        //     $email->subject('Duyệt bài học');
        //     $email->to($lesson->chapter->course->mentor->email, $lesson->chapter->course->mentor->name);
        // });
        // dd($lesson_video->lesson->chapter->lessons);
        // $lesson = Lesson::where('id', $lesson_video->lesson_id)->first();
        // dd($lesson);
        // dd($lesson_video->lesson->chapter->lessons);
        foreach ($lesson_video->lesson->chapter->lessons as $lesson) {
            // if($lesson->lessonVideo->is_check != 1){
            //     echo '<br>thiếu thêm vào' . $lesson->lessonVideo->is_check ;
            // }
            // else {
            //     echo '<br>oke đủ'. $lesson->lessonVideo->is_check ;
            // }
            // echo '<br> oke';
        }
        if($lesson->lessonVideo->is_check != 1){
            echo '<br>thiếu thêm vào';
        }
        else {
            echo '<br> đủ';
        }


        // return redirect()->route('mentor.lesson.list', $lesson->chapter_id)->with('success', 'Cập nhập thành công');
    }
}
