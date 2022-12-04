<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Mentor;
use App\Models\Skill;
use App\Models\Specialize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    public function index()
    {
        $db = Mentor::all();
        return view('screens.mentor.teacher.list', compact('db'));
    }

    public function create(Request $request)
    {
        $skills = Skill::all();
        $specializes = Specialize::all();
        if ($request->isMethod('post')) {
            $password = 12345678;
            $teacher = Mentor::create(
                array_merge(
                    $request->all(),
                    [
                        'avatar' => 'images/placeholder.png',
                        'is_active' => 1,
                        'password' => Hash::make($password),
                    ],
                )
            );
            $teacher->assignRole('teacher');
            $db = Mentor::where('email', 'like', $request->email)->first();
            $skill = Skill::find($db->skills);
            $specialize = Specialize::find($db->specialize_id);
            Mail::send('screens.email.mentor.activedTeacher', compact('db', 'password', 'skill', 'specialize'), function ($email) use ($db) {
                $email->subject('Yêu cầu đăng ký giảng viên');
                $email->to($db->email, $db->name);
            });
            return redirect()
                ->route('mentor.teacher.index')
                ->with('success', 'Thêm giảng viên thành công');
        }
        return view('screens.mentor.teacher.create',compact('skills','specializes'));
    }

    public function actived($id)
    {
        $mentor = Mentor::find($id);
        if($mentor->is_active == 0){
            $mentor->update(['is_active'=>1]);
        }
        else{
            $mentor->update(['is_active'=>0]);
        }
        Mail::send('screens.email.mentor.activedTeacher', compact('mentor'), function ($email) use ($mentor) {
            $email->subject('Cập nhật trạng thái tài khoản');
            $email->to($mentor->email, $mentor->name);
        });
        return redirect()->route('mentor.teacher.index')->with('success', 'Cập nhập thành công');
    }

    public function delete($id)
    {
        $delete = Mentor::find($id);
        $delete->delete();

        return redirect()->route('mentor.teacher.index')->with('success', 'Xoá thành công');
    }
    public function subtract($mentor_id)
    {
        // $chapter= Chapter::where('mentor_id', $mentor_id)->first();
        $mentor= Mentor::where('id', $mentor_id)->first();
       $total= $mentor->point -5;
        // dd($mentor->point -5);
        $mentor->update(['point'=>$total]);
        return redirect()->back();
    }
}
