<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialize;
use Illuminate\Http\Request;

class SpecializeController extends Controller
{
    public function index()
    {
        $index = Specialize::all();
        return view('screens.admin.specialize.list', compact('index'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $store = new Specialize();
            $store->fill($request->all());
            $store->save();
            return redirect()->route('admin.specialize.index')->with('success', 'Thêm mới thành công');
        }

        return view('screens.admin.specialize.add');
    }

    public function update($id, Request $request)
    {
        $edit = Specialize::find($id);
        if ($request->isMethod('post')) {
            $edit->fill($request->all());
            $edit->save();
            return redirect()->route('admin.specialize.index')->with('success', 'sửa thành công');
        }
        if (!$edit) {
            return back();
        }
        return view('screens.admin.specialize.update', compact('edit'));
    }

    public function destroy($id)
    {
        $destroy = Specialize::find($id);
        $destroy->delete();
        
        return redirect()->route('admin.specialize.index')->with('success', 'Xoá thành công');
    }
}
