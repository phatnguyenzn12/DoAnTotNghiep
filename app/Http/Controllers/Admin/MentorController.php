<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MentorRequest;
use App\Models\Apply;
use App\Models\Course;
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
        return view('screens.admin.mentor.list');
    }
    public function filterData(Request $request)
    {

        $mentors = Mentor::select('*')
        ->role('lead')
        ->sortdata($request)
        ->search($request)
        ->isactive($request)
        ->paginate($request->record);

        $html = view('components.admin.mentor.list-mentor' ,compact('mentors'))->render();
        return response()->json($html,200);
    }


    public function listCourse($id)
    {
        // $db = Course::where('cate_course_id', $id)->get();
        return view('screens.admin.mentor.list-course',compact('id'));
    }

    public function filterDataCourse(Request $request)
    {

        $courses = Course::select('*')
        ->where('mentor_id', $request->mentor_id)
        ->sortdata($request)
        ->search($request)
        ->isactive($request)
        ->category($request)
        ->price($request)
        ->paginate($request->record);

        $html = view('components.admin.mentor.list-course' ,compact('courses'))->render();
        return response()->json($html,200);
    }

    public function apply()
    {
        $db = Apply::all();
        return view('screens.admin.mentor.list-apply', compact('db'));
    }

    public function create(MentorRequest $request)
    {
        $cate_courses = DB::table('cate_courses')->select('*')->get();
        if ($request->isMethod('post')) {
        //    $avatar = UploadFileService::storage_image($request->avatar);
            $password = 12345678;
            $mentor = Mentor::create(
                array_merge(
                    $request->all(),
                    [
                        'is_active' => 1,
                        'email_verified_at' => now(),
                        'avatar' => 'images/placeholder.png',
                        'password' => Hash::make($password),
                    ],
                    ['specializations' => implode(', ', collect(json_decode($request->specializations))->pluck('value')->toArray())],
                )
            );
            $mentor->assignRole('lead');
            $db = Mentor::where('email', 'like', $request->email)->first();
            Mail::send('screens.email.admin.actived-lead', compact('db', 'password'), function ($email) use ($db) {
                $email->subject('Yêu cầu đăng ký giảng viên');
                $email->to($db->email, $db->name);
            });
            return redirect()->route('mentor.index')->with('success', 'Thêm mới thành công');
        }
        return view('screens.admin.mentor.create', compact('cate_courses'));
    }


    public function detail($id)
    {
        $cate_courses = DB::table('cate_courses')->select('*')->get();
        $mentor = Mentor::find($id);
        return view('screens.admin.mentor.detail', compact('mentor','id', 'cate_courses'));
    }
    public function update(MentorRequest $request, $id)
    {
        $mentor = Mentor::find($id);
        $mentor->name;
        $mentor->email;
        $mentor->number_phone = $request->number_phone;
        $mentor->address = $request->address;
        $mentor->educations = $request->educations;
        $mentor->years_in_experience = $request->years_in_experience;
        $mentor->specializations =  implode(', ', collect(json_decode($request->specializations))->pluck('value')->toArray());
        $mentor->cate_course_id = $request->cate_course_id;
        $mentor->save();
        //dd($mentor);
        // Mail::send('screens.email.admin.update-lead', compact('mentor'), function ($email) use ($mentor) {
        //     $email->subject('Thông báo thay đổi thông tin cơ bản');
        //     $email->to($mentor->email, $mentor->name);
        // });
        return redirect()->back()->with('success', 'Cập nhật thành công');
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
