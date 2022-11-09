<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
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
        $index = Banner::all();
        // dd($index);
        return view('screens.admin.banner.list', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.admin.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Banner();
        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('Banners');
            $imgPath = str_replace('public/', '', $imgPath);
            $store->image = $imgPath;
        }
        $store->fill($request->all());
        $store->save();
        return redirect()->route('admin.banner.index')->with('success', 'Thêm mới thành công');
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
        if(!$edit){
            return back();
        }
        return view('screens.admin.banner.update', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Banner::find($id);
        if(!$update){
            return back();
        }
        if($request->hasFile('image')){
            Storage::delete($update->image);

            $imgPath = $request->file('image')->store('Banners');
            $imgPath = str_replace('public/', '', $imgPath);
            $update->image = $imgPath;
        }
        $update->fill($request->all());
        $update->save();
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
        if(!empty($destroy->image)){
            $imgPath = str_replace('storage/', 'public/', $destroy->image);
            Storage::delete($imgPath);
        }
        $destroy->delete();
        
        return redirect()->route('admin.banner.index')->with('success', 'Xoá thành công');
    }
}
