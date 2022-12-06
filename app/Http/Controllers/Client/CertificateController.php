<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function getCertificate(Course $course)
    {
        if(!$course->certificate){
            return redirect()->back()->with('failed', 'Khóa học không có chứng chỉ');
        }

        if ($course->progress == 100) {
            auth()->user()->load('certificate')->certificate()->syncWithoutDetaching($course->certificate->id);
            return redirect()->route('client.certificate.index', $course->certificate->id)->with('success', 'bạn đã hoàn thành và nhận thành công chứng chỉ');
        } else {
            return redirect()->back()->with('failed', 'bạn chưa hoàn thành khóa học');
        }
    }

    public function index(Certificate $certificate)
    {
        $certificate = auth()->user()->load('certificate')->certificate->where('id', $certificate->id);

        if ($certificate->isEmpty() == true) {
            return redirect()->back()->with('failed', 'bạn chưa chưa có chứng chỉ');
        }

        $course = $certificate->first()->course;

        return view('screens.client.account.certificate', compact('course'));
    }
}
