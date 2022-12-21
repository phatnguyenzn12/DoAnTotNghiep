<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lead\AccountRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\PercentagePayable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $mentor = Auth::guard('mentor')->user();
        return view('screens.teacher.account.my-account', compact('mentor'));
    }
    public function update(AccountRequest $request, Mentor $mentor, $id)
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

    public function password()
    {

        return view('screens.teacher.account.forgot-password');
    }

    public function forgotPassword(Request $request, $id)
    {

        $mentor = Auth::guard('mentor')->user($id);
        if ($request->password == '') {
            return redirect()->back()->with('error', 'Chưa nhập mật khẩu');
        }
        if (Hash::check($request->password, $mentor->password)) {
            if ($request->password_1 == $request->password_2) {
                $passnew = Hash::make($request->password_2);
                $us = new Mentor();
                $us->updatePass($id, $passnew);
                return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
            } elseif ($request->password_1 != $request->password_2) {
                return redirect()->back()->with('error1', 'mật khẩu mới không khớp');
            }
        } else {
            return redirect()->back()->with('error', 'Vui lòng nhập đúng mật khẩu !');
        }
    }



    public function commentMentor()
    {
        return view('screens.teacher.account.comment-teacher');
    }
    // public function uploadFile($file)
    // {
    //     $fileName = time() . '_' . $file->getClientOriginalName();  //
    //     //   dd( $file->storeAs('image', $fileName, 'public'));
    //     return $file->storeAs('images', $fileName, 'public');
    // }

    public function salaryBonus()
    {
        $mentor = auth()->guard('mentor')->user();
        $percentages = PercentagePayable::where('mentor_id', $mentor->id)
        ->with(['order_detail:id,price,course_id', 'order_detail.course:id,title,image,percentage_pay'])
        ->paginate(10);

        $course_count = Course::selectRaw('count(id) as number')->where('mentor_id', $mentor->id)->first()->number;
        return view('screens.teacher.account.salary-bonus', compact('percentages', 'mentor', 'course_count'));
    }
}
