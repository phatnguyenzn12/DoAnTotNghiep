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
    
    public function filterData($search = 0,$record = 10)
    {
        $users = User::select('id','name','email','password');
        if($search != 0) {
            $users = $users->where('name','LIKE',"%$search%");
        }
        $users = $users->paginate($record);
        $passedDown = [
            'data' => $users
        ];
        return response()->json($passedDown,200);
    }
}
