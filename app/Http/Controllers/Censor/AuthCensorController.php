<?php

namespace App\Http\Controllers\Censor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCensorController extends Controller
{
    public function login()
    {
        return view('screens.censor.auth.login');
    }

    public function handleLogin(Request $request)
    {
        if (
            Auth::guard('censor')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
            // && $request->{'g-recaptcha-response'} != null
        ) {
            if(Auth::guard('censor')->user()->is_active == 0){
                return redirect()->route('censor.login')->with('failed', 'Tài khoản chưa được xét duyệt');
            }
            return redirect()->route('censor.index')->with('success', 'bạn đăng nhập thành công');
        } else {
            return redirect()->route('censor.login')->with('failed', 'bạn đăng nhập thất bại');
        }
    }

    public function logout()
    {

        if (Auth::guard('censor')->check() == true) {
            Auth::guard('censor')->logout();
            return redirect()->route('censor.login')->with('success', 'bạn đăng xuất thành công');
        }
    }
}
