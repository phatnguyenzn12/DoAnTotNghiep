<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountCodeRequest;
use App\Models\DiscountCode;
use Illuminate\Http\Request;

class DiscountCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = DiscountCode::all();
        return view('screens.admin.discount.list', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.admin.discount.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountCodeRequest $request)
    {
        DiscountCode::create(
            $request->only(
                "title",
                "slug",
                "code",
                "discount",
                "start_time",
                "end_time",
                "content",
                "status",
            )
        );

        return redirect()
            ->back()
            ->with('success', 'thêm mã giảm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = DiscountCode::findOrFail($id);
        return view('screens.admin.discount.update', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountCodeRequest $request, $id)
    {
        $discount = DiscountCode::findOrFail($id);
        $discount->title = $request->title;
        $discount->content = $request->content;
        $discount->code = $request->code;
        $discount->discount = $request->discount;
        $discount->status = $request->status;
        $discount->start_time = $request->start_time;
        $discount->end_time = $request->end_time;
        $discount->save();

        return redirect()
            ->back()
            ->with('success', 'sửa mã giảm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DiscountCode::destroy($id);
        return redirect()->back()->with('success', 'Xoa thành công');
    }
}
