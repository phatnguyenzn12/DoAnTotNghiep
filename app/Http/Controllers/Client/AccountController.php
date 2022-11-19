<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()

    {
        $cate = CateCourse::all();
        return view('screens.client.account.my-account', compact('cate'));
    }
    public function detail()
    {
        $cate = CateCourse::all();
        $user = auth()->user();
        //  return view('screens.client.account.detail-account', compact('user'));

        $courses = Course::select('*');
        if (auth()->user()) {
            $courses_id = auth()->user()->load('courses')->courses->pluck('id')->toArray();
            $courses = $courses->whereNotIn('id', $courses_id);
        }
        $courses =  $courses->get();
        return view('screens.client.account.my-account',  compact('courses', 'user', 'cate'));
    }

    public function update(Request $request, User $user, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return back();
        } else {
            $user->fill($request->except(['_method', '_token']));
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                //  $params['cols']['avatar'] = $this->upLoadFile($request->file('avatar'));
                $user->avatar =  $this->upLoadFile($request->file('avatar'));
            }

            $user->update();
            return redirect()->back()->with('success', 'sửa thành công');
        }
    }

    public function updatepass(Request $request, $id)
    {

        $user = User::find($id);
        //$pass = Hash::make($request->password);
        // dd(Hash::check($request->password,$user->password));
        // if (Hash::check($request->password, $user->password)) {
        //       Hash::make($request->password_1);
        //    //  dd($abc);
        //     Hash::make($request->password_2);
        //     //dd($bc);
        //     if (Hash::check($request->password_1, $user->password_2)) {
        //        //  dd(Hash::check($abc, $request->password_2));
        //         $passnew = Hash::make($request->password_2);
        //         $us = new User();
        //         $us->updatePass($id, $passnew);
        //         return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
        //     } 
        //     else{
        //         return redirect()->back()->with('error', 'Mật khẩu mới không khớp !');
        //     }
        if (Hash::check($request->password, $user->password)) {
            //   dd($request->password);
            $a = Hash::make($request->password_1);
            //dd($a);
            $us = new User();
            $us->updatePass($id, $a);
            return redirect()->back()->with('success', 'sửa thành công');
        } else {
            return redirect()->back()->with('error', 'Vui lòng nhập đúng mật khẩu !');
        }
    }
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();  //
        //   dd( $file->storeAs('image', $fileName, 'public'));
        return $file->storeAs('images', $fileName, 'public');
    }

    public function myCourse()
    {
        $courses = auth()->user()->load('courses')
            ->courses()
            ->select('*')
            ->get();

        return view('screens.client.account.my-course', compact('courses'));
    }
}
