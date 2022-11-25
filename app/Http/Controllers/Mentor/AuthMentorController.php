<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class AuthMentorController extends Controller
{

    public function login()
    {
        return view('screens.mentor.auth.login');
    }

    public function handleLogin(Request $request)
    {
        if (
            Auth::guard('mentor')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
            // && $request->{'g-recaptcha-response'} != null
        ) {
            $mentor = Mentor::where('id',Auth::guard('mentor')->user()->id)->first();
            if ($mentor->is_active == 0) {
                return redirect()->route('mentor.login')->with('failed', 'Tài khoản chưa được xét duyệt');
            }
            else if ($mentor->hasRole('lead')) {
                return redirect()->route('mentor.home')->with('success', 'bạn đăng nhập thành công');
            }
            return redirect()->route('teacher.home')->with('success', 'bạn đăng nhập thành công');
        } else {
            return redirect()->route('mentor.login')->with('failed', 'bạn đăng nhập thất bại');
        }
    }

    public function logout()
    {
        if (Auth::guard('mentor')->check() == true) {
            Auth::guard('mentor')->logout();
            return redirect()->route('mentor.login')->with('success', 'bạn đăng xuất thành công');
        }
    }
}
