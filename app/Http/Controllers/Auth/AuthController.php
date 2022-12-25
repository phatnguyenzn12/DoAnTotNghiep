<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(AuthRequest $request)
    {
        if (
            Auth::guard('web')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
        ) {
            if(Session::get('backUrl')){
                $url = Session::get('backUrl');
                Session::forget('backUrl');
                return redirect($url)->with('success', 'bạn đăng nhập thành công');
            }
            return redirect()->route('client')->with('success', 'bạn đăng nhập thành công');
        } else {
            return redirect()->route('auth.login')->with('failed', 'bạn đăng nhập thất bại');
        }
    }

    public function register(AuthRequest $request)
    {
        if ($request->isMethod('post')) {
            if ($request->post('re_password') != $request->post('password')) {
                return redirect()->route('auth.register')->with('failed', 'Mật khẩu không khớp');
            } else {
                $password = $request->password;
                $user = User::create(
                    array_merge(
                        $request->all(),
                        [
                            'avatar' => 'images/avatar_icon.png',
                            'password' => Hash::make($request->password),
                            'email_verified_at' => now(),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ],
                    )
                );
                $db = User::where('email', 'like', $request->email)->first();
                Mail::send('screens.email.user.actived-user', compact('db', 'password'), function ($email) use ($db) {
                    $email->subject('Đăng ký tài khoản Eduport');
                    $email->to($db->email, $db->name);
                });
                return redirect()->route('auth.login')->with('success', 'Tạo tài khoản thành công');
            }
        }
        return view('auth.register');
    }

    public function actived($id, $token)
    {
        $db = new User();
        $db_user = $db->loadOne($id);
        if ($db_user->remember_token === $token) {
            $db_user = new User();
            $db_user->active_account($id);
            return redirect()->route('auth.login')->with('success', 'Xác minh thành công vui lòng đăng nhập');
        } else {
            return redirect()->route('auth.login')->with('failed', 'Mã xác minh không hợp lệ');
        }
    }

    public function forgotPassword(AuthRequest $request)
    {
        if ($request->isMethod('post')) {
            if (DB::table('users')->where('email', 'like', $request->email)->first()) {
                $db = DB::table('users')->where('email', 'like', $request->email)->first();
                $token = Str::random(10);
                $db_user = new User();
                $db_user->updateToken($db->id, $token);
                $db = $db_user->loadOne($db->id);

                Mail::send('screens.email.user.userChangePassword', compact('db'), function ($email) use ($db) {
                    $email->subject('Quên mật khẩu');
                    $email->to($db->email, $db->name);
                });
                return redirect()->route('auth.login')->with('success', 'Vui lòng xác nhận email quên mật khẩu');
            } else {
                return redirect()->route('auth.forgotPassword')->with('failed', 'Email không tồn tại');
            }
        }
        return view('auth.forgot_password');
    }

    public function handleChangePassword($id, $token, AuthRequest $request)
    {
        $db = new User();
        $db_user = $db->loadOne($id);
        if ($db_user->remember_token === $token) {
            if ($request->isMethod('post')) {
                if ($request->password == $request->re_password) {
                    $password = Hash::make($request->password);
                    $db_user = new User();
                    $db_user->updatePass($id, $password);
                    return redirect()->route('auth.login')->with('success', 'Đổi mật khẩu thành công');
                } else {
                    return redirect()->route('auth.handleChangePassword', ['id' => $id, 'token' => $token])->with('failed', 'Mật khẩu không đúng');
                }
            }
        } else {
            return redirect()->route('auth.login')->with('failed', 'Mã xác minh không hợp lệ');
        }

        return view('auth.change_password');
    }

    public function logout()
    {
        if (Auth::guard('web')->check() == true) {
            Auth::guard('web')->logout();
            return redirect()->route('auth.login')->with('success', 'bạn đăng xuất thành công');
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLogin()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $finduser = User::where('social_id', $user->id)->first();
        if (isset($finduser)) {

            Auth::login($finduser);

            return redirect()->route('client')->with('success', 'bạn đăng nhập thành công');
        } else {
            $password_gg = 12345678;
            $newUser = User::updateOrCreate(['email' => $user->email], [
                'name' => $user->name,
                'social_id' => $user->id,
                'social_type' => 'google',
                'avatar' => 'images/avatar_icon.jpg',
                'password' => Hash::make($password_gg),
                'email_verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $user_gg = User::where('email', 'like', $newUser->email)->first();
            Mail::send('screens.email.user.actived-user', compact('user_gg','password_gg'), function ($email) use ($user_gg) {
                $email->subject('Đăng ký tài khoản Eduport');
                $email->to($user_gg->email, $user_gg->name);
            });

            Auth::login($newUser);

            return redirect()->route('client')->with('success', 'bạn đăng nhập thành công');
        }
    }
}
