<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MentorRequest;
use App\Http\Requests\Lead\AccountRequest;
use App\Models\Course;
use App\Models\Mentor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{


    public function index()
    {
        $mentor = Auth::guard('mentor')->user();
        return view('screens.mentor.account.my-account', compact('mentor'));
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

        return view('screens.mentor.account.forgot-password');
    }

    public function forgotPassword(Request $request, $id)
    {

        $mentor = Auth::guard('mentor')->user($id);
        if ($request->password == '') {
            return redirect()->back()->with('error', 'Chưa nhập mật khẩu');
        } elseif (Hash::check($request->password, $mentor->password)) {
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
        return view('screens.mentor.account.comment-teacher');
    }
    // public function uploadFile($file)
    // {
    //     $fileName = time() . '_' . $file->getClientOriginalName();  //
    //     //   dd( $file->storeAs('image', $fileName, 'public'));
    //     return $file->storeAs('images', $fileName, 'public');
    // }



}
