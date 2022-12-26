<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMentorController extends Controller
{

    public function login()
    {
        return view('screens.mentor.auth.login');
    }

    public function handleLogin(AuthRequest $request)
    {
        if (
            Auth::guard('mentor')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
            // && $request->{'g-recaptcha-response'} != null
        ) {
            if (Auth::guard('mentor')->user()->is_active == 0) {
                return redirect()->route('mentor.login')->with('failed', 'Tài khoản chưa được xét duyệt');
            } else if (Auth::guard('mentor')->user()->hasRole('lead')) {
                return redirect()->route('mentor.course.index')->with('success', 'Bạn đăng nhập tài khoản lead thành công');
            } else if (Auth::guard('mentor')->user()->hasRole('teacher')) {
                return redirect()->route('teacher.course.index')->with('success', 'Bạn đăng nhập tài khoản teacher thành công');
            }

            // return redirect()->route('mentor.home')->with('success', 'bạn đăng nhập thành công');
        } else {
            return redirect()->route('mentor.login')->with('failed', 'bạn đăng nhập thất bại');
        }
    }

    public function logout()
    {
        Auth::guard('mentor')->logout();
        return redirect()->route('mentor.login')->with('success', 'bạn đăng xuất thành công');
        // if (Auth::guard('mentor')->check() == true) {
        //     Auth::guard('mentor')->logout();
        //     return redirect()->route('mentor.login')->with('success', 'bạn đăng xuất thành công');
        // }
    }
}
