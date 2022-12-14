<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Certi;
use App\Models\Certificate;
use App\Models\Course;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
use  PDF;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function getCertificate(Course $course)
    {
        if (!$course->certificate) {
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

    public function exportpdf()
    {
        $certificate = auth()->user()->certificate;
        $course = $certificate->first()->course;
        $pdf = PDF::loadView('screens.client.certificate.certi',['data' => $course]);     //->setOption('A5', 'landscape')
        return $pdf->download('certificate.pdf');

    }
}
