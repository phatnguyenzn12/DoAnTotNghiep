<?php

namespace App\Http\Controllers\Censor;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonVideo;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function index(){
        $lessons = Lesson::with('chapter')->orderBy('id', 'DESC')->paginate(10);
        return view('screens.censor.lesson.list-video',compact('lessons'));
    }

    public function actived(LessonVideo $lesson_video,$check)
    {
        $lesson_video->is_check = $check;
        $lesson_video->save();
        return redirect()->route('censor.lesson.index')->with('success', 'Cập nhập thành công');
    }
}
