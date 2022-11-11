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
}
