<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
use App\Models\Order;
use Illuminate\Http\Request;

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
    function addToCart(Course $course)
    {
        Cart::firstOrCreate(
            [
                'user_id' =>  auth()->user()->id,
                'course_id' => $course->id
            ],
            [
                'user_id' =>  auth()->user()->id,
                'course_id' => $course->id
            ],
        );

        return redirect()->back()->with('success', 'Thêm giỏ hàng thành công');
    }

    function removeCart($id)
    {
        Cart::destroy($id);
    }

    public function pay(Request $course)
    {
        $courses = Course::whereIn('id', $course->products)->get();
        return view('screens.client.order.pay', compact('courses'));
    }

    public function handlePay(Request $request)
    {
        $courses = Course::whereIn('id', $request->course_id)->get();

        $courses->transform(
            function ($course) {
                $course->price = $course->current_price;
                return [...$course->only('price'), ...['course_id' => $course->id]];
            }
        );

        $total_price = $courses->sum('price');

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'total_price' => $total_price,
            'status' => 1
        ]);

        $order->orderDetails()->attach($courses->toArray());

        auth()->user()->load('courses')
        ->courses()
        ->attach($request->course_id);

        Cart::destroy($request->course_id);

        return redirect()->route('client.order.cartList')->with('success','Bạn mua các khóa học thành công');
    }
}
