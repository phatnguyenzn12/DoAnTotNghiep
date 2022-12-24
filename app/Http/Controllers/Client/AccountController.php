<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Course;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()

    {
        $cate = CateCourse::all();
        return view('screens.client.account.my-account', compact('cate'));
    }
    public function detail()
    {
        $cate = CateCourse::all();
        $user = auth()->user();
        //  return view('screens.client.account.detail-account', compact('user'));

        $courses = Course::select('*');
        if (auth()->user()) {
            $courses_id = auth()->user()->load('courses')->courses->pluck('id')->toArray();
            $courses = $courses->whereNotIn('id', $courses_id);
        }
        $courses =  $courses->get();
        return view('screens.client.account.my-account',  compact('courses', 'user', 'cate'));
    }

    public function update(Request $request, User $user, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return back();
        } else {
            $user->fill($request->except(['_method', '_token']));
            if ($request->hasFile('avatar')) {
                $imgPath = $request->file('avatar')->store('images');
                $imgPath = str_replace('public/', '', $imgPath);
                $user->avatar = $imgPath;
            }
            //  $user->fill($request->all());

            $user->update();
            // dd($user);
            return redirect()->back()->with('success', 'sửa thành công');
        }
    }

    public function updatepass(Request $request, $id)
    {

        $user = User::find($id);
        if (Hash::check($request->password, $user->password)) {
            if ($request->password_1 == $request->password_2) {
                $passnew = Hash::make($request->password_2);
                $us = new User();
                $us->updatePass($id, $passnew);
                return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
            }elseif ($request->password_1 != $request->password_2) {
                return redirect()->back()->with('failed', 'Mật khẩu mới không khớp');
            }
        } else {
            return redirect()->back()->with('failed', 'Vui lòng nhập đúng mật khẩu !');
        }
    }

    // public function uploadFile($file)
    // {
    //     $fileName = time() . '_' . $file->getClientOriginalName();  //
    //     //   dd( $file->storeAs('image', $fileName, 'public'));
    //     return $file->storeAs('images', $fileName, 'public');
    // }

    public function myCourse()
    {
        $courses = auth()->user()->load('courses')
            ->courses()->where('status', 2)->get();

        $user = auth()->user();

        return view('screens.client.account.my-course', compact('courses','user'));
    }

    public function filterMyCourse(Request $request)
    {
        $courses = auth()->user()->load('courses')
            ->courses()
            ->where('status', 2)
            ->sortdata($request)
            ->search($request)
            ->paginate(3);

        $html = view('components.client.account.list-my-course', compact('courses'))->render();
        return response()->json($html, 200);
    }

    public function myOrder()
    {
        $orders = auth()->user()->load('orders')->orders;

        $user = auth()->user();

        return view('screens.client.account.my-course', compact(['orders','user']));
    }

    public function show(OrderDetail $orderDetail)
    {
        $data = view('screens.client.account.order-detail', compact('orderDetail'))->render();
        return response()->json($data, 200);
    }
}
