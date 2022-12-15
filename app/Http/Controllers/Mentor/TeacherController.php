<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lead\TeacherValidateRequest;
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
        return view('screens.mentor.teacher.list');
    }

    public function filterData(Request $request)
    {

        $mentors = Mentor::select('*')
        ->role('teacher')
        ->where('cate_course_id', auth()->guard('mentor')->user()->cate_course_id)
        ->sortdata($request)
        ->search($request)
        ->isactive($request)
        ->paginate($request->record);

        $html = view('components.mentor.teacher.list-teacher' ,compact('mentors'))->render();
        return response()->json($html,200);
    }

    public function create( TeacherValidateRequest $request )
    {
        $skills = Skill::all();
        $specializes = Specialize::all();
        if ($request->isMethod('post')) {

            $password = 12345678;

            $teacher = Mentor::create(
                array_merge(
                    $request->all(),
                    [
                        'avatar' => 'images/avatar_icon.jpg',
                        'is_active' => 1,
                        'password' => Hash::make($password),
                    ],
                    ['specializations' => implode(', ', collect(json_decode($request->specializations))->pluck('value')->toArray())],
                    ['skills' => implode(', ', collect(json_decode($request->skills))->pluck('value')->toArray())],
                    ['cate_course_id' => auth()->guard('mentor')->user()->cate_course_id],
                )
            );

            $teacher->assignRole('teacher');

            $db = Mentor::where('email', 'like', $request->email)->first();

            $skill = Skill::find($db->skills);

            $specialize = Specialize::find($db->specializations);

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

    public function detail($id)
    {
        $teacher = Mentor::find($id);
        return view('screens.mentor.teacher.detail', compact('teacher','id'));
    }
    public function update(Request $request,$id)
    {
        $teacher = Mentor::find($id);
        $teacher->name ;
        $teacher->email ;
        $teacher->number_phone = $request->number_phone;
        $teacher->educations = $request->educations;
        $teacher->years_in_experience = $request->years_in_experience;
        $teacher->specializations =  implode(', ', collect(json_decode($request->specializations))->pluck('value')->toArray());

        $teacher->save();
        // Mail::send('screens.email.mentor.update-lead', compact('teacher'), function ($email) use ($teacher) {
        //     $email->subject('Thông báo thay đổi thông tin cơ bản');
        //     $email->to($teacher->email, $teacher->name);
        // });
        //dd($mentor);
        return redirect()->route('mentor.teacher.index')->with('success', 'Cập nhật thành công');
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
    // public function subtract($mentor_id)
    // {
    //     // $chapter= Chapter::where('mentor_id', $mentor_id)->first();
    //     $mentor= Mentor::where('id', $mentor_id)->first();
    //    $total= $mentor->point -5;
    //     // dd($mentor->point -5);
    //     $mentor->update(['point'=>$total]);
    //     return redirect()->back();
    // }
}
