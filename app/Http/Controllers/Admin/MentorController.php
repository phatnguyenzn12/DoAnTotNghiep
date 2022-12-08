<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\CateCourse;
use App\Models\CommentCourse;
use App\Models\Mentor;
use App\Models\Skill;
use App\Models\Specialize;
use App\Services\UploadFileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MentorController extends Controller
{

    public function index()
    {
        $db = Mentor::all();
        return view('screens.admin.mentor.list', compact('db'));
    }

    public function teacher($id)
    {
        $db = Mentor::where('cate_course_id',$id)->get();
        return view('screens.admin.mentor.list-teacher', compact('db'));
    }

    public function apply()
    {
        $db = Apply::all();
        return view('screens.admin.mentor.list-apply', compact('db'));
    }

    public function create(Request $request)
    {
        $cate_courses = DB::table('cate_courses')->select('*')->get();
        $skills = Skill::all();
        $specializes = Specialize::all();
        if ($request->isMethod('post')) {
            $avatar = UploadFileService::storage_image($request->avatar);
            $password = 12345678;
            $mentor = Mentor::create(
                array_merge(
                    $request->all(),
                    [
                        'is_active' => 1,
                        'email_verified_at' => now(),
                        'avatar' => $avatar,
                        'password' => Hash::make($password),
                    ],
                    ['specializations' => implode(', ', collect(json_decode($request->specializations))->pluck('value')->toArray())],
                    ['skills' => implode(', ', collect(json_decode($request->skills))->pluck('value')->toArray())],
                )
            );
            $mentor->assignRole('lead');
            $db = Mentor::where('email', 'like', $request->email)->first();
            $skill = Skill::find($db->skills);
            $specialize = Specialize::find($db->specializations);
            Mail::send('screens.email.admin.actived-lead', compact('db', 'password', 'skill', 'specialize'), function ($email) use ($db) {
                $email->subject('Yêu cầu đăng ký giảng viên');
                $email->to($db->email, $db->name);
            });
            return redirect()->route('mentor.index')->with('success', 'Thêm mới thành công');
        }
        return view('screens.admin.mentor.create', compact('cate_courses','skills','specializes'));
    }

    public function detail($id){
       $mentor = Mentor::find($id);
       dd($mentor);
    }
    public function update(Request $request, Mentor $mentor, $id)
    {
        $mentor = Auth::guard('mentor')->user($id);
        if (!$mentor) {
            return back();
        } else {
            $mentor->fill($request->except(['_method', '_token']));
            if ($request->hasFile('avatar')) {
                $imgPath = $request->file('avatar')->store('images');
                $imgPath = str_replace('public/', '', $imgPath);
                $mentor->avatar = $imgPath;
            }
            $mentor->update();
            return redirect()->back()->with('success', 'sửa thành công');
        }
    }
    public function actived($id)
    {
        $db = new Mentor();
        $db_mentor = $db->loadOne($id);
        $db->actived($id, $db_mentor->is_active);
        $mentor = Mentor::find($id);
        Mail::send('screens.email.admin.actived-lead', compact('mentor'), function ($email) use ($mentor) {
            $email->subject('Cập nhật trạng thái tài khoản');
            $email->to($mentor->email, $mentor->name);
        });
        return redirect()->route('mentor.index')->with('success', 'Cập nhập thành công');
    }

    public function accept($id)
    {
        $db = Apply::find($id);
        $password = Str::random(10);
        $data = [
            'name' => $db->name,
            'email' => $db->email,
            'number_phone' => $db->number_phone,
            'email_verified_at' => now(),
            'avatar' => 'placeholder.png',
            'specializations' => 2,
            'is_active' => 1,
            'password' => Hash::make($password),
            'remember_token' => null,
            'created_at' => $db->created_at,
            'updated_at' => $db->updated_at,
        ];
        $mentor = new Mentor();
        $res = $mentor->saveNew($data);
        if ($res == null) {
            return redirect()->route('mentor.index');
        } else if ($res > 0) {
            Mail::send('screens.email.acceptMentor', compact('db', 'password'), function ($email) use ($db) {
                $email->subject('Yêu cầu đăng ký giảng viên');
                $email->to($db->email, $db->name);
            });
            return redirect()->route('mentor.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('mentor.index')->with('failed', 'Lỗi thêm mới');
        }
    }

    public function commentLesson($id)
    {
        $cate_course_id = $id;
        $comments = DB::table('cate_courses')->select('*')->where('cate_courses.id', $id)->join('courses', 'cate_courses.id', '=', 'courses.id')->join('chapters', 'courses.id', '=', 'chapters.course_id')->join('lessons', 'chapters.id', '=', 'lessons.chapter_id')->join('comment_lessons', 'lessons.id', '=', 'comment_lessons.lesson_id')->get();
        return view('screens.admin.mentor.list-comment', compact('comments', 'cate_course_id'));
    }

    public function hideComment($id, $cate_course_id)
    {
        $status = DB::table('comment_lessons')->select('status')->where('id', $id)->first();
        if ($status->status == 1) {
            DB::table('comment_lessons')->where('id', $id)->update(['status' => 0]);
            return redirect()->route('mentor.commentLesson', ['id' => $cate_course_id])->with('success', 'Ẩn thành công');
        } else {
            DB::table('comment_lessons')->where('id', $id)->update(['status' => 1]);
            return redirect()->route('mentor.commentLesson', ['id' => $cate_course_id])->with('success', 'Hiện thành công');
        }
    }

    public function delete($id)
    {
        $delete = Mentor::find($id);
        $delete->delete();

        return redirect()->route('mentor.index')->with('success', 'Xoá thành công');
    }

    public function deleteApply($id)
    {
        $delete = Apply::find($id);
        $delete->delete();

        return redirect()->route('mentor.apply')->with('success', 'Xoá thành công');
    }
}
