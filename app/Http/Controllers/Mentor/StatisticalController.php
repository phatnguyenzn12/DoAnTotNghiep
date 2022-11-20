<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function index()
    {
        return view('screens.mentor.statistical.personal-income');
    }
}
