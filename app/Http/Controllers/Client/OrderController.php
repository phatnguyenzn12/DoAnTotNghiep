<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
use App\Models\DiscountCode;
use App\Models\Order;
use App\Services\VnPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function cartList()
    {
        if (auth()->user()) {
            $carts = auth()->user()->load('carts')->carts;
        } else {
            $carts = [];
        }

        return view('screens.client.order.cart', compact('carts'));
    }

    //ngăn chăn id khóa học đã mua
    public function addToCart(Request $request, Course $course)
    {
        $carts = auth()->user()->load('carts')->carts;
        if ($carts->contains('id', $course->id)) {
            return back()->with('error', 'Sản phẩm đã tồn tại trong giỏ');
        }
        auth()->user()->load(['carts'])->carts()->attach(['course_id' => $course->id]);
        return redirect()->back()->with('success', 'Thêm giỏ hàng thành công');
    }

    public function removeCart($id)
    {
        Cart::destroy($id);
        return response()->json('remove success', 200);
    }

    public function pay(Request $course)
    {
        $courses = Course::whereIn('id', $course->products)->get();
        return view('screens.client.order.pay', compact('courses'));
    }

    public function checkCode(Request $request)
    {
        $data = DiscountCode::where('code', $request->code)->first();
        return response()->json($data);
    }

    public function vnpay(Request $request)
    {
        $courses = Course::whereIn('id', $request->course_id)->get();

        $courses->transform(
            function ($course) {
                $course->price = $course->current_price;
                return [...$course->only('price'), ...['course_id' => $course->id]];
            }
        );

        $total_price = $courses->sum('price');

        if ($request->code != null) {
            $discount = DiscountCode::where('code', $request->code)->first()->discount;
            $total_price = $total_price - ($total_price * ($discount / 100));
        }

        $id = Order::select('id')->max('id');
        $code = '#' . str_pad($id == null ? 0 : $id, 8, "0", STR_PAD_LEFT);

        Cookie::queue('courses', json_encode($courses->toArray()), 3600 * 1000);

        VnPayService::create($request, $code, $total_price);
    }

    public function resDataVnpay()
    {
        $courses = collect(json_decode(Cookie::get('courses'), true));
        $course_id = $courses->pluck('course_id')->toArray();

        $order = Order::create([
            'code' => $_GET['vnp_TxnRef'],
            'user_id' => auth()->user()->id,
            'total_price' => $_GET['vnp_Amount'],
            'status' => 1
        ]);

        $order->orderDetails()->attach($courses->toArray());

        auth()->user()->load('courses')
            ->courses()
            ->attach($course_id);

        Cart::destroy($course_id);



        Cookie::queue('courses', 0);

        return redirect()->route('client.order.cartList')->with('success', 'Bạn mua các khóa học thành công');
    }
}
