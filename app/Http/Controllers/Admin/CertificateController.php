<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(){
        $certificate = Certificate::all();
        return view('screens.admin.certificate.list', compact('certificate'));
    }

    public function create()
    {
        $course = Course::select('id', 'title')->get('id');
        
        // dd($course);
        return view('screens.admin.certificate.create', compact('course'));
    }

    public function store(Request $request)
    {
        $certificate = new Certificate();
        $certificate->fill($request->all());
        $certificate->save();
        return redirect()->route('admin.certificate.index')->with('success', 'Thêm mới thành công');
    }

    public function destroy($id)
    {
        $destroy = Certificate::find($id);
        $destroy->delete();
        return redirect()->route('admin.certificate.index')->with('success', 'Xoá thành công');
    }
}
