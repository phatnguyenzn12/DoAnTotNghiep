<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        if (
            Auth::guard('web')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
            // && $request->{'g-recaptcha-response'} != null
        ) {
            // if (!Auth::guard('web')->user()->remember_token == null) {
            //     return redirect()->route('auth.login')->with('success', 'Vui lòng xác minh tài khoản');
            // }
            return redirect()->route('client')->with('success', 'bạn đăng nhập thành công');
        } else {
            return redirect()->route('auth.login')->with('failed', 'bạn đăng nhập thất bại');
        }
    }

    public function register(Request $request)
    {
        $method_route = 'auth.register';
        if ($request->isMethod('post')) {
            // dd($request);
            $params = [];
            $params['cols'] = array_map(function ($item) {
                if ($item == '') {
                    $item = null;
                }
                if (is_string($item)) {
                    $item = trim($item);
                }
                return $item;
            }, $request->post());
            unset($params['cols']['_token'], $params['cols']['re_password']);
            // if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            //     $params['cols']['avatar'] = $this->upLoadFile($request->file('avatar'));
            // }
            $data = array_merge($params['cols'], [
                'avatar' => 'placeholder.png',
                'about_me' => 'Nam',
                'education' => 'Cao đẳng',
                'location' => 'Hà Nội',
                'email_verified_at' => now(),
                'password' => Hash::make($params['cols']['password']),
                'remember_token' => Str::random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            if ($request->post('re_password') != $request->post('password')) {
                return redirect()->route($method_route)->with('failed', 'Mật khẩu không khớp');
            }
            // else if ($request->hasFile('avatar') == null) {
            //     return redirect()->route($method_route)->with('failed', 'Vui lòng nhập đủ');
            // }
            else {
                $admin = new User();
                $res = $admin->saveNew($data);
                $db = DB::table('users')->where('name', 'like', $data['name'])->first();
                if ($res == null) {
                    return redirect()->route($method_route);
                } else if ($res > 0) {
                    Mail::send('screens.email.activedUser', compact('db'), function ($email) use ($db) {
                        $email->subject('Xác minh tài khoản');
                        $email->to($db->email, $db->name);
                    });
                    return redirect()->route('auth.login')->with('success', 'Thêm mới thành công vui lòng xác minh tài khoản');
                } else {
                    return redirect()->route($method_route)->with('failed', 'Lỗi thêm mới');
                }
            }
        }
        return view('auth.register');
    }
    public function upLoadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAS('images', $fileName, 'public');
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

    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            if (DB::table('users')->where('email', 'like', $request->email)->first()) {
                $db = DB::table('users')->where('email', 'like', $request->email)->first();
                $token = Str::random(10);
                $db_user = new User();
                $db_user->updateToken($db->id, $token);
                $db = $db_user->loadOne($db->id);

                Mail::send('screens.email.userChangePassword', compact('db'), function ($email) use ($db) {
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

    public function handleChangePassword($id, $token, Request $request)
    {
        $db = new User();
        $db_user = $db->loadOne($id);
        if($db_user->remember_token === $token){
            if ($request->isMethod('post')) {
                if ($request->password == $request->password_1) {
                    $password = Hash::make($request->password);
                    $db_user = new User();
                    $db_user->updatePass($id, $password);
                    return redirect()->route('auth.login')->with('success', 'Đổi mật khẩu thành công');
                }
                else {
                    return redirect()->route('auth.handleChangePassword', ['id' => $id, 'token' => $token])->with('failed', 'Mật khẩu không đúng');
                }
            }
        }
        else{
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
        // dd($user);
        if ($finduser) {

            Auth::login($finduser);

            return redirect()->route('client')->with('success', 'bạn đăng nhập thành công');
        } else {

            $newUser = User::updateOrCreate(['email' => $user->email], [
                'name' => $user->name,
                'social_id' => $user->id,
                'social_type' => 'google',
                'about_me' => 'null',
                'education' => 'null',
                'location' => 'null',
                'password' => Hash::make('12345678')
            ]);

            Auth::login($newUser);

            return redirect()->route('client')->with('success', 'bạn đăng nhập thành công');
        }
    }
}
