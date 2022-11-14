<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()
    {
        return view('screens.client.account.my-account');
    }
    public function detail($id)
    {
        $user = User::find($id);
        return view('screens.client.account.detail-account', compact('user'));
    }
    public function update(Request $request, User $user, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return back();
        } else {
            $user->fill($request->except(['_method', '_token']));
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                //  $params['cols']['avatar'] = $this->upLoadFile($request->file('avatar'));
                $user->avatar =  $this->upLoadFile($request->file('avatar'));
            }
            $user->update();
            return redirect()->back()->with('success', 'sửa thành công');
        }
    }

    public function updatepass(Request $request, $id)
    {
        $user = User::find($id);
        //$pass = Hash::make($request->password);
        // dd(Hash::check($request->password,$user->password));
        if (Hash::check($request->password, $user->password)) {
            //   dd($request->password);
            $passnew = Hash::make($request->password_2);
            //dd($a);
            $us = new User();
            $us->updatePass($id, $passnew);
            return redirect()->route('client')->with('success', 'sửa thành công');
        } else {
            return redirect()->back()->with('error', 'Vui lòng nhập đúng mật khẩu !');
        }
    }
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();  //
        //   dd( $file->storeAs('image', $fileName, 'public'));
        return $file->storeAs('images', $fileName, 'public');
    }
}
