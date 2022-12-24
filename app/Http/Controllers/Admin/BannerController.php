<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use App\Models\Course;
use App\Models\DiscountCode;
use App\Services\UploadFileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('screens.admin.banner.list');
    }

    public function filterData(Request $request)
    {
        $banners = Banner::select('*')
        ->sortdata($request)
        ->search($request)
        ->paginate($request->record);
        $passedDown = [
            'data' => $banners
        ];

        return response()->json($passedDown,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::select('id', 'title')->get();
        $coupons = DiscountCode::select('id', 'title')->get();
        return view('screens.admin.banner.add', compact('courses', 'coupons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $imgPath = UploadFileService::storage_image($request->image);

        $banner = $request->only(
            [
                "title",
                "content",
                "type",
                "status",
                "discount_code_id"
            ]
        );
        $banner['sort'] =  1;
        $banner['image'] =  $imgPath;

        Banner::create($banner);

        return redirect()->back()->with('success', 'Thêm mới thành công');
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
        $edit = Banner::find($id);
        $discountCodes = DiscountCode::get();
        return view('screens.admin.banner.update', compact('edit','discountCodes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $update = Banner::find($id);
        $banner = $request->only(
            "title",
            "content",
            "type",
            "status",
            "discount_code_id"
        );
        if ($request->has('image')) {
            $imgPath = UploadFileService::storage_image($request->image);
            $banner['image'] = $imgPath;
        }
        $update->update($banner);
        return redirect()->route('admin.banner.index')->with('success', 'sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Banner::find($id);
        if (!empty($destroy->image)) {
            $imgPath = str_replace('storage/', 'public/', $destroy->image);
            Storage::delete($imgPath);
        }
        $destroy->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Xoá thành công');
    }
}
