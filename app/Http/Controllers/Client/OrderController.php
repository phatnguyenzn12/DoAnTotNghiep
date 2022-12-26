<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function cartList()
    {
        if (auth()->user()) {
            $carts = auth()->user()->load('cart')->cart;
            $carts_total = auth()->user()->load('carts')->carts;
        } else {
            $carts = [];
        }

        return view('screens.client.order.cart', compact('carts','carts_total'));
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

        $discount = 0;
        if ($request->code != null) {
            $discount = DiscountCode::where('code', $request->code)->first()->discount;
            $total_price = $total_price - ($total_price * ($discount / 100));
        }

        $code = Str::random(9);

        VnPayService::create($request, $code, $total_price, $request->bank, $discount);
    }

    public function resDataVnpay()
    {

        $courses = auth()->user()
            ->load('carts')
            ->carts()
            ->get()
            ->map(
                function ($val) {
                    $course['price'] = $val->current_price - ($val->current_price * ($_GET['discount'] / 100));
                    $course['course_id'] = $val->id;
                    $course['percentage_pay'] = $val->percentage_pay;
                    return $course;
                }
            );

        $course_id = $courses->pluck('course_id')->toArray();

        $order = Order::create([
            'code' => $_GET['vnp_TxnRef'],
            'user_id' => auth()->user()->id,
            'total_price' => (int) $courses->sum('price'),
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

        $order_details = $order->order_details()->get();

        $admin = Admin::first();
        Mail::send('screens.email.user.bill-course', compact('admin','order','order_details'), function ($email) use ($admin) {
            $email->subject('Hóa đơn khóa học');
            $email->to($admin->email, $admin->name);
        });
        $user = User::findOrFail(auth()->user()->id);
        Mail::send('screens.email.user.bill-course', compact('user','order','order_details'), function ($email) use ($user) {
            $email->subject('Hóa đơn khóa học');
            $email->to($user->email, $user->name);
        });
        // $mentors = $order->order_details;
        // foreach($mentors as $mentor){
        //     Mail::send('screens.email.user.bill-course', compact('mentor','order','array'), function ($email) use ($mentor) {
        //         $email->subject('Hóa đơn khóa học');
        //         $email->to($mentor->email, $mentor->name);
        //     });
        // }
        return redirect()->route('client.order.cartList')->with('success', 'Bạn mua các khóa học thành công');
    }
}
