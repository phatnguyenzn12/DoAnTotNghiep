<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\AuthRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthAdminController extends Controller
{
    public function login()
    {
        return view('screens.admin.auth.login');
    }

    public function index()
    {
        $admins = Admin::select('*')->get();
        return view('screens.admin.admin.list', compact('admins'));
    }

    public function update($id, Request $request)
    {
        $admin = DB::table('admins')->select('*')->where('id', $id)->first();
        if ($request->isMethod('post')) {
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
            unset($params['cols']['_token']);
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $params['cols']['avatar'] = $this->upLoadFile($request->file('avatar'));
            }
            $params['cols']['id'] = $id;
            $objUser = new Admin();
            $res = $objUser->saveUpdate($params);

            if ($res == null) {
                return redirect()->route('admins.index');
            } else if ($res > 0) {
                return redirect()->route('admins.index')->with('success','Cập nhật thành công');
            } else {
                return redirect()->route('admins.update', ['id' => $id])->with('failed','Cập nhật không thành công');
            }
        }
        return view('screens.admin.admin.update', compact('admin'));
    }

    public function handleLogin(AuthRequest $request)
    {

        if (
            Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
        ) {
            if (!Auth::guard('admin')->user()->remember_token == null) {
                return redirect()->route('admin.login')->with('success', 'Vui lòng xác minh tài khoản');
            }
            return redirect()->route('admin.statistical.home')->with('success', 'bạn đăng nhập thành công');
        } else {
            return redirect()->route('admin.login')->with('failed', 'bạn đăng nhập thất bại');
        }
    }

    public function register(Request $request)
    {
        $method_route = 'admin.register';
        if ($request->isMethod('post')) {
            $params = [];
            // dd($request->post());
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
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $params['cols']['avatar'] = $this->upLoadFile($request->file('avatar'));
            }
            $data = array_merge($params['cols'], [
                'email_verified_at' => now(),
                'password' => Hash::make($params['cols']['password']),
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            if ($request->post('re_password') != $request->post('password')) {
                return redirect()->route($method_route)->with('failed', 'Mật khẩu không khớp');
            } else if ($request->hasFile('avatar') == null) {
                return redirect()->route($method_route)->with('failed', 'Vui lòng nhập đủ');
            } else {
                $admin = new Admin();
                $res = $admin->saveNew($data);
                $db = DB::table('admins')->where('name', 'like', $data['name'])->first();
                if ($res == null) {
                    return redirect()->route($method_route);
                } else if ($res > 0) {
                    // Mail::send('screens.email.activedAdmin', compact('db'), function ($email) use ($db) {
                    //     $email->subject('Xác minh tài khoản');
                    //     $email->to($db->email, $db->name);
                    // });
                    return redirect()->route('admin.login')->with('success', 'Thêm mới thành công vui lòng xác minh tài khoản');
                } else {
                    return redirect()->route($method_route)->with('failed', 'Lỗi thêm mới');
                }
            }
        }
        return view('screens.admin.auth.register');
    }
    public function upLoadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAS('images', $fileName, 'public');
    }

    public function actived($id, $token)
    {
        $db = new Admin();
        $db_admin = $db->loadOne($id);
        if ($db_admin->remember_token === $token) {
            $db_admin = new Admin();
            $db_admin->active_account($id);
            return redirect()->route('admin.login')->with('success', 'Xác minh thành công vui lòng đăng nhập');
        } else {
            return redirect()->route('admin.login')->with('failed', 'Mã xác minh không hợp lệ');
        }
    }

    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $db = DB::table('admins')->where('email', 'like', $request->email)->first();
            $token = Str::random(10);
            $db_admin = new Admin();
            $db_admin->updateToken($db->id, $token);
            $db = $db_admin->loadOne($db->id);

            Mail::send('screens.email.adminChangePassword', compact('db'), function ($email) use ($db) {
                $email->subject('Quên mật khẩu');
                $email->to($db->email, $db->name);
            });
            return redirect()->route('admin.login')->with('success', 'Vui lòng xác nhận email quên mật khẩu');
        }
        return view('screens.admin.auth.forgot_password');
    }

    public function handleChangePassword($id, $token, Request $request)
    {
        if ($request->isMethod('post')) {
            $password = Hash::make($request->password);
            $db = new Admin();
            $db_admin = $db->loadOne($id);
            if ($db_admin->remember_token === $token) {
                $db_admin = new Admin();
                $db_admin->updatePass($id, $password);
                return redirect()->route('admin.login')->with('success', 'Đổi mật khẩu thành công');
            } else {
                return redirect()->route('admin.login')->with('failed', 'Mã xác minh không hợp lệ');
            }
        }
        return view('screens.admin.auth.change_password');
    }

    public function logout()
    {
        if (Auth::guard('admin')->check() == true) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('success', 'bạn đăng xuất thành công');
        }
    }
}
