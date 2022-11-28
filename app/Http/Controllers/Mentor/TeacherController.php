<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
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
            Mail::send('screens.email.teacher.activedTeacher', compact('db', 'password', 'skill', 'specialize'), function ($email) use ($db) {
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
        $db = Mentor::find($id);
        if($db->is_active == 0){
            $db->update(['is_active'=>1]);
        }
        else{
            $db->update(['is_active'=>0]);
        }
        return redirect()->route('mentor.teacher.index')->with('success', 'Cập nhập thành công');
    }

    public function delete($id)
    {
        $delete = Mentor::find($id);
        $delete->delete();

        return redirect()->route('mentor.teacher.index')->with('success', 'Xoá thành công');
    }
}
