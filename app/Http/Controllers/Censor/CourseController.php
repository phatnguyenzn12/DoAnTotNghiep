<?php

namespace App\Http\Controllers\Censor;

use App\Http\Controllers\Controller;
use App\Models\Censor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index(){
        $courses = DB::table('courses')->get();
        return view('screens.censor.course.list-course',compact('courses'));
    }

    public function actived($id)
    {
        $db_course = DB::table('courses')->where('id',$id)->first();
        if($db_course->status == 1){
            DB::table('courses')->where('id',$id)->update(['status'=>0]);
        }
        else{
            DB::table('courses')->where('id',$id)->update(['status'=>1]);
        }
        return redirect()->route('censor.course.index')->with('success', 'Cập nhập thành công');
    }
}
