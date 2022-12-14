<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
use App\Models\DiscountCode;
use App\Models\Mentor;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PercentagePayable;
use App\Models\User;
use App\Services\VnPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

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
            return back()->with('failed', 'Sản phẩm đã tồn tại trong giỏ');
        }
        auth()->user()->load(['carts'])->carts()->attach(['course_id' => $course->id]);
        return redirect()->back()->with('success', 'Thêm giỏ hàng thành công');
    }

    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect()->back();
    }

    public function pay()
    {
        $courses = auth()->user()->load('carts')->carts;
        return view('screens.client.order.pay', compact('courses'));
    }

    public function checkCode(Request $request)
    {
        $data = DiscountCode::where('code', $request->code)->first();
        return response()->json($data);
    }

    public function vnpay(Request $request)
    {
        $courses = auth()->user()->load('carts')->carts()->get();

        $total_price = $courses->sum('current_price');

        if ($request->code != null) {
            $discount = DiscountCode::where('code', $request->code)->first()->discount;
            $total_price = $total_price - ($total_price * ($discount / 100));
        }

        $code = Str::random(9);

        VnPayService::create($request, $code, $total_price, $request->bank);
    }

    public function resDataVnpay()
    {
        $courses = auth()->user()
            ->load('carts')
            ->carts()
            ->get()
            ->map(
                function ($val) {
                    $course = $val->only('price');
                    $course['course_id'] = $val->id;
                    return $course;
                }
            );

        $course_id = $courses->pluck('course_id')->toArray();

        $order = Order::create([
            'code' => $_GET['vnp_TxnRef'],
            'user_id' => auth()->user()->id,
            'total_price' => $_GET['vnp_Amount'],
            'status' => 1
        ]);

        $order_details = $order->courses()->attach($courses->keyby('course_id')->toArray());

        $order->order_details->transform(
            function ($order_detail) {
                $course = $order_detail->course;
                $teacher_amount = $course->amount_paid_teacher;
                $admin_amount =  $course->price - $teacher_amount;
                PercentagePayable::create(
                    [
                        'mentor_id' => $course->mentor_id,
                        'order_detail_id' => $order_detail->id,
                        'amount_paid_admin' => $admin_amount,
                        'amount_paid_teacher' => $teacher_amount,
                    ]
                );
                $mentor = $course->mentor;
                $mentor->salary_bonus = $mentor->salary_bonus + $teacher_amount;
                $mentor->save();
            }
        );



        auth()->user()->load('courses')
            ->courses()
            ->syncWithoutDetaching($course_id);

        $cart_id = Cart::whereIn('course_id', $course_id)->get()->pluck('id');

        Cart::destroy($cart_id);

        return redirect()->route('client.order.cartList')->with('success', 'Bạn mua các khóa học thành công');
    }
}
