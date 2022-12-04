<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function addCertificate(Course $course)
    {
        dd(auth()->user()->load('courses')->courses()->where('id', $course->id)->isEmpty(),$course->certificate->id);
        if ($course->progress == 100) {
            auth()->user()->load('certificate')->certificate()->sync($course->certificate->id);
            return redirect()->back()->with('success', 'bạn đã hoàn thành chứng chỉ');
        } else {
            return redirect()->back()->with('success', 'bạn chưa hoàn thành khóa học');
        }
    }
}
