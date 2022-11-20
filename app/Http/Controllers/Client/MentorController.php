<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MentorController extends Controller
{
    public function index()
    {
        return view('screens.client.mentor.apply');
    }

    public function apply(Request $request)
    {
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

            $apply = new Apply();
            $res = $apply->saveNew($params);
            if ($res == null) {
                return redirect()->route('client.mentor.index');
            } else if ($res > 0) {
                $admins = DB::table('admins')->get();
                $db = DB::table('applys')->where('email', 'like', $request['email'])->first();
                Mail::send('screens.email.activedMentor', compact('admins', 'db'), function ($email) use ($admins) {
                    foreach ($admins as $admin) {
                        $email->subject('Yêu cầu đăng ký giảng viên');
                        $email->to($admin->email, $admin->name);
                    }
                });
                return redirect()->route('client.mentor.index')->with('success', 'Yêu cầu đăng ký giảng viên thành công');
            } else {
                return redirect()->route('client.mentor.index')->with('failed', 'Lỗi thêm mới');
            }
        }
        return view('screens.mentor.auth.register', compact('cateCourses'));
    }

    public function list()
    {
        return view('screens.client.mentor.list');
    }

    public function show(Mentor $mentor)
    {
        return view('screens.client.mentor.intro');
    }
}
