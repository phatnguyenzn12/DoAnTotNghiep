<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MentorController extends Controller
{
    
    public function index(){
        $db_mentors = new Mentor();;
        $db = $db_mentors->loadList();

        return view('screens.admin.mentor.list',compact('db'));
    }

    public function create(Request $request)
    {
        $method_route = 'mentor.create';
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
                $admin = new Mentor();
                $res = $admin->saveNew($data);
                if ($res == null) {
                    return redirect()->route($method_route);
                } else if ($res > 0) {
                    return redirect()->route('mentor.index')->with('success', 'Thêm mới thành công');
                } else {
                    return redirect()->route($method_route)->with('failed', 'Lỗi thêm mới');
                }
            }
        }
        return view('screens.admin.mentor.create');
    }
    public function upLoadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAS('images', $fileName, 'public');
    }

    public function actived($id)
    {
        $db = new Mentor();
        $db_mentor = $db->loadOne($id);
        $db->actived($id, $db_mentor->is_active);
        return redirect()->route('mentor.index')->with('success', 'Cập nhập thành công');
    }


}
