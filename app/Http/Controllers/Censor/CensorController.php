<?php

namespace App\Http\Controllers\Censor;

use App\Http\Controllers\Controller;
use App\Models\Censor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CensorController extends Controller
{
    public function index()
    {
        $db_censor = new Censor();;
        $db = $db_censor->loadList();
        return view('screens.admin.censor.list', compact('db'));
    }

    public function create(Request $request)
    {
        $method_route = 'admin.censor.create';
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
                'remember_token' => Str::random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            if ($request->post('re_password') != $request->post('password')) {
                return redirect()->route($method_route)->with('failed', 'Mật khẩu không khớp');
            } else if ($request->hasFile('avatar') == null) {
                return redirect()->route($method_route)->with('failed', 'Vui lòng nhập đủ');
            } else {
                $censor = new Censor();
                $res = $censor->saveNew($data);
                if ($res == null) {
                    return redirect()->route($method_route);
                } else if ($res > 0) {
                    return redirect()->route('admin.censor.index')->with('success', 'Thêm mới thành công');
                } else {
                    return redirect()->route($method_route)->with('failed', 'Lỗi thêm mới');
                }
            }
        }
        return view('screens.admin.censor.create');
    }

    public function edit(Request $request)
    {
        // dd(Auth::guard('censor')->user()->id);
        $censor = DB::table('censors')->select('*')->where('id', Auth::guard('censor')->user()->id)->first();
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
            $params['cols']['id'] = Auth::guard('censor')->user()->id;
            $objUser = new Censor();
            $res = $objUser->saveUpdate($params);

            if ($res == null) {
                return redirect()->route('censor.index');
            } else if ($res > 0) {
                return redirect()->route('censor.index')->with('success', 'Cập nhật thành công');
            } else {
                return redirect()->route('censor.edit')->with('failed', 'Cập nhật không thành công');
            }
        }
        return view('screens.censor.censor.edit', compact('censor'));
    }

    public function upLoadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAS('images', $fileName, 'public');
    }

    public function actived($id)
    {
        $db = new censor();
        $db_censor = $db->loadOne($id);
        $db->actived($id, $db_censor->is_active);
        return redirect()->route('admin.censor.index')->with('success', 'Cập nhập thành công');
    }
}
