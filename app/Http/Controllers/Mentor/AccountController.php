<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
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
        return view('screens.mentor.account.my-account',compact('mentor'));
    }
    public function update(Request $request, Mentor $mentor, $id)
    {
        $mentor = Auth::guard('mentor')->user($id);
        if (!$mentor) {
            return back();
        } else {
            $mentor->fill($request->except(['_method', '_token']));
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                //  $params['cols']['avatar'] = $this->upLoadFile($request->file('avatar'));
                $mentor->avatar =  $this->upLoadFile($request->file('avatar'));
            }

            $mentor->update();
            return redirect()->back()->with('success', 'sửa thành công');
        }
    }
    
      public function password(){
      
        return view('screens.mentor.account.forgot-password');
      }
    
    public function forgotPassword(Request $request, $id)
    {

        $mentor = Auth::guard('mentor')->user($id);
        if (Hash::check($request->password, $mentor->password)) {
            // Hash::make($request->password_1);
            //  dd($abc);
            //  Hash::make($request->password_2);
            //dd($bc);
            if ($request->password_1 == $request->password_2) {
                //  dd(Hash::check($abc, $request->password_2));
                $passnew = Hash::make($request->password_2);
                $us = new Mentor();
                $us->updatePass($id, $passnew);
                return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
            } else {
                return redirect()->back()->with('error1', 'Mật khẩu mới không khớp !');
            }
        } else {
            return redirect()->back()->with('error', 'Vui lòng nhập đúng mật khẩu !');
        }
    }

    public function listStudent()
    {
        return view('screens.mentor.account.student-list');
    }

    public function commentMentor()
    {
        return view('screens.mentor.account.comment-teacher');
    }
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();  //
        //   dd( $file->storeAs('image', $fileName, 'public'));
        return $file->storeAs('images', $fileName, 'public');
    }
}
