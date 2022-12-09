<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CateCourseRequest;
use App\Models\CateCourse;
use App\Models\Course;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CateCourseController extends Controller
{
    public  function index()
    {
        return view('screens.admin.catecourse.list');
    }

    public function filterData(Request $request)
    {
        $cate_courses = CateCourse::select('*')
        ->sortdata($request)
        ->search($request)
        ->paginate($request->record);

        $html = view('components.admin.catecourse.list-catecourse' ,compact('cate_courses'))->render();
        return response()->json($html,200);
    }

    public function create()
    {
        return view('components.admin.catecourse.create');
    }

    public function store(CateCourseRequest $request)
    {
        $cate = new CateCourse();
        $cate->fill($request->all());
        $cate->save();
        return redirect()->route('admin.cate-course.index')->with('success','thêm mới thành công');
    }
   
    public function edit($id)
    {
        $cate = CateCourse::find($id);
        return view('components.admin.catecourse.edit',compact('cate'));
    }
    public function update(CateCourseRequest $request, CateCourse $cateCourse,$id)
    {
        $cateCourse = CateCourse::find($id);
        $cateCourse->fill($request->except(['_method', '_token']));
        $cateCourse->update();
        return redirect()->route('admin.cate-course.index')->with('success','sửa thành công');

    }
     
    public function destroy($id)
    {
        //dd(catecourse::max('id'));
        $cate = CateCourse::find($id);
        
        $cate->delete();

        return redirect()->route('admin.cate-course.index')->with('success','Xóa thành công');
    }
   
}
