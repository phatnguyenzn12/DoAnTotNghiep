<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Services\VimeoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LessonController extends Controller
{

    public function index(){
        $courses = Course::where('mentor_id',auth()->guard('mentor')->user()->id)->get();
        // $lessons = Lesson::with('chapter')->orderBy('id', 'DESC')->paginate(10);
        return view('screens.mentor.lesson.list-video',compact('courses'));
    }

    public function list($id){
        $chapter = Chapter::where('id',$id)->first();
        return view('screens.mentor.lesson.list-video-id',compact('chapter'));
    }

    public function actived(LessonVideo $lesson_video,$check)
    {
        $lesson_video->is_check = $check;
        $lesson_video->save();
        $lesson =  Lesson::where('id',$lesson_video->lesson_id)->first();
        Mail::send('screens.email.mentor.browseLesson', compact('lesson','lesson_video'), function ($email) use ($lesson) {
            $email->subject('Duyệt bài học');
            $email->to($lesson->chapter->course->mentor->email, $lesson->chapter->course->mentor->name);
        });
        return redirect()->route('mentor.lesson.index')->with('success', 'Cập nhập thành công');
    }

    public function actived_id(LessonVideo $lesson_video,$check)
    {
        $lesson_video->is_check = $check;
        $lesson_video->save();
        $lesson =  Lesson::where('id',$lesson_video->lesson_id)->first();
        Mail::send('screens.email.mentor.browseLesson', compact('lesson','lesson_video'), function ($email) use ($lesson) {
            $email->subject('Duyệt bài học');
            $email->to($lesson->chapter->course->mentor->email, $lesson->chapter->course->mentor->name);
        });
        return redirect()->route('mentor.lesson.list',$lesson->chapter_id)->with('success', 'Cập nhập thành công');
    }
}
