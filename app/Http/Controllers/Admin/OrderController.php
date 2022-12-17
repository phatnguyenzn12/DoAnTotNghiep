<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $min_price = Order::min('total_price');
        $max_price = Order::max('total_price');
        return view('screens.admin.order.list', compact('orders', 'min_price', 'max_price'));
    }

    public function filterData(Request $request)
    {
        $orders = Order::select('*')
            // ->sortdata($request)
            // ->search($request)
            // ->isactive($request)
            // ->category($request)
            // ->price($request)
            ->paginate($request->record);

        $html = view('components.admin.order.list-order', compact('orders'))->render();
        return response()->json($html, 200);
    }

    public function show($id)
    {
        $orderDetail = OrderDetail::find($id);
        return view('screens.admin.order.order-detail', compact('orderDetail'));
    }

}
