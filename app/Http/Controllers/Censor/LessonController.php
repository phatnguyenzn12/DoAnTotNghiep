<?php

namespace App\Http\Controllers\Censor;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function index(){
        $lessons = DB::table('lessons')->select('*')->join('lesson_videos', 'lessons.id', '=', 'lesson_videos.lesson_id')->get();
        return view('screens.censor.lesson.list-video',compact('lessons'));
    }

    public function actived($id)
    {
        $db_lesson = DB::table('lesson_videos')->where('id',$id)->first();
        if($db_lesson->is_check == 1){
            DB::table('lesson_videos')->where('id',$id)->update(['is_check'=>0]);
        }
        else{
            DB::table('lesson_videos')->where('id',$id)->update(['is_check'=>1]);
        }
        return redirect()->route('censor.lesson.index')->with('success', 'Cập nhập thành công');
    }
}
