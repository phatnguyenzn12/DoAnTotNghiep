<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Http\Requests\Admin\SkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        // $index = Skill::all();
        return view('screens.admin.skill.list');
    }

    public function filterData(Request $request)
    {

        $skills = Skill::select('*')
        ->sortdata($request)
        ->search($request)
        ->paginate($request->record);
        $passedDown = [
            'data' => $skills
        ];
        
        return response()->json($passedDown,200);
    }

    public function create(SkillRequest $request)
    {
        if ($request->isMethod('post')) {
            $store = new Skill();
            $store->fill($request->all());
            $store->save();
            return redirect()->route('admin.skill.index')->with('success', 'Thêm mới thành công');
        }

        return view('screens.admin.skill.add');
    }

    public function update($id, SkillRequest $request)
    {
        $edit = Skill::find($id);
        if ($request->isMethod('post')) {
            $edit->fill($request->all());
            $edit->save();
            return redirect()->route('admin.skill.index')->with('success', 'sửa thành công');
        }
        if (!$edit) {
            return back();
        }
        return view('screens.admin.skill.update', compact('edit'));
    }

    public function destroy($id)
    {
        $destroy = Skill::find($id);
        $destroy->delete();
        
        return redirect()->route('admin.skill.index')->with('success', 'Xoá thành công');
    }
}
