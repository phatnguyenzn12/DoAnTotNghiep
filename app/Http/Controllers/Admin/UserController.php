<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('screens.admin.user.list');
    }

    public function filterData(Request $request)
    {
        $users = User::select('id','name','email','password')
        ->name($request)
        ->paginate($request->record);
        $passedDown = [
            'data' => $users
        ];
        return response()->json($passedDown,200);
    }

    public function delete($id)
    {
        $user = new User();
        $user->dlt($id);
        return redirect()->route('admin.user.index')->with('success','Xóa thành công');
    }

    public function detail($id)
    {
        $users = new User();
        $user = $users->loadOne($id);
        return view('screens.admin.user.detail',compact('user'));
    }
}
