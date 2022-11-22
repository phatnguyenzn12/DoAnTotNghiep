<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\CateCourse;
use App\Models\CommentCourse;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MentorController extends Controller
{

    public function index()
    {
        $db_mentors = new Mentor();;
        $db = $db_mentors->loadList();
        return view('screens.admin.mentor.list', compact('db'));
    }

    public function create(Request $request)
    {
        $method_route = 'mentor.create';
        $cate = DB::table('cate_courses')->select('*')->get();
        if ($request->isMethod('post')) {
            $params = [];
            // dd($request->post());
            $params['cols'] = array_map(function ($item) {
                if ($item == '') {
                    $item = null;
                }
                if (is_string($item)) {
                    $item = trim($item);
                }
                return $item;
            }, $request->post());
            unset($params['cols']['_token'], $params['cols']['re_password']);
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $params['cols']['avatar'] = $this->upLoadFile($request->file('avatar'));
            }
            $data = array_merge($params['cols'], [
                'email_verified_at' => now(),
                'password' => Hash::make($params['cols']['password']),
                'remember_token' => Str::random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            if ($request->post('re_password') != $request->post('password')) {
                return redirect()->route($method_route)->with('failed', 'Mật khẩu không khớp');
            } else if ($request->hasFile('avatar') == null) {
                return redirect()->route($method_route)->with('failed', 'Vui lòng nhập đủ');
            } else {
                $admin = new Mentor();
                $res = $admin->saveNew($data);
                if ($res == null) {
                    return redirect()->route($method_route);
                } else if ($res > 0) {
                    return redirect()->route('mentor.index')->with('success', 'Thêm mới thành công');
                } else {
                    return redirect()->route($method_route)->with('failed', 'Lỗi thêm mới');
                }
            }
        }
        return view('screens.admin.mentor.create', compact('cate'));
    }

    public function upLoadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAS('images', $fileName, 'public');
    }

    public function actived($id)
    {
        $db = new Mentor();
        $db_mentor = $db->loadOne($id);
        $db->actived($id, $db_mentor->is_active);
        return redirect()->route('mentor.index')->with('success', 'Cập nhập thành công');
    }

    public function accept($id)
    {
        $db = Apply::find($id);
        $password = Str::random(10);
        $data = [
            'name'=>$db->name,
            'email'=>$db->email,
            'number_phone'=>$db->number_phone,       
            'email_verified_at' => now(),
            'avatar'=>'placeholder.png',
            'specialize_id'=> 2,
            'is_active'=>1,
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
            Apply::find($id)->delete();
            Mail::send('screens.email.acceptMentor', compact('db','password'), function ($email) use ($db) {
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
}
