<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function handleLogin(Request $request)
    {
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
            && $request->{'g-recaptcha-response'} != null
        ) {

            $user = User::where('id', Auth::user()->id)->first();

            if ($user->hasRole('student')) {
                return redirect()->route('client')->with('success', 'bạn đăng nhập thành công');
            }
            return redirect()->route('admin')->with('success', 'bạn đăng nhập thành công');
        } else {
            return redirect()->route('auth.login')->with('failed', 'bạn đăng nhập thất bại');
        }
    }
    public function logout()
    {
        if (Auth::check() == true) {
            Auth::logout();
        }
        return redirect()->route('auth.login')->with('success', 'bạn đăng xuất thành công');
    }
    public function handleRegister(Request $request)
    {
    }

    public function forgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function changePassword()
    {
        return view('auth.change_Password');
    }

    public function handleChangePassword(Request $request)
    {
        dd($request);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLogin()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $finduser = User::where('social_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect()->route('client')->with('success', 'bạn đăng nhập thành công');
        } else {

            $newUser = User::updateOrCreate(['email' => $user->email], [
                'name' => $user->name,
                'social_id' => $user->id,
                'social_type' => 'google',
                'password' => encrypt('123456dummy')
            ]);

            $newUser->assignRole('student');

            Auth::login($newUser);

            return redirect()->route('client')->with('success', 'bạn đăng nhập thành công');
        }
    }
}
