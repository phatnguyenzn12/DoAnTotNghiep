<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Course;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CateCourseController extends Controller
{
    public  function index()
    {
        $cate = CateCourse::where('type','!=' ,1)->get(); 
        return view('screens.admin.catecourse.list', compact('cate'));
    }
    public  function listdelete()
    {
        $cate = CateCourse::where('type','!=' ,1)->get();
        $course = Course::where('type','!=' ,0)->get(); 
        return view('components.admin.catecourse.listdelete', compact('course','cate'));
    }
    public function create()
    {

        return view('components.admin.catecourse.create');
    }
    public function store(Request $request)
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
        // return view('components.admin.catecourse.edit');
    }
    public function update(Request $request, CateCourse $cateCourse,$id)
    {
        $cateCourse = CateCourse::find($id);
        $cateCourse->fill($request->except(['_method', '_token']));
        $cateCourse->update();
        return redirect()->route('admin.cate-course.index')->with('success','sửa thành công');

    }
    // public function destroy1($id)
    // {
    //     $data =CateCourse::destroy($id);
    //     DB::table('courses')->where('cate_course_id', $id)->delete();
    //     return redirect()->back();
    // }
    public function destroy($id)
    {
        $model = new CateCourse();
        $res = $model->Xoa($id);
        return redirect()->back();
    }
    public function restore( Request $request, $id)
    {
      //  dd($request->all());
        $model = new CateCourse();
        $res = $model->restore($id,$request->input('cate_course_id'));
        return redirect()->back();
    }
}
