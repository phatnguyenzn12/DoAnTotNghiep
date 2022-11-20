<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{


    public function index()
    {
        return view('screens.mentor.account.my-account');
    }
    public function forgotPassword()
    {
        return view('screens.mentor.account.forgot-password');
    }

    public function listStudent()
    {
        return view('screens.mentor.account.student-list');
    }

    public function commentMentor()
    {
        return view('screens.mentor.account.comment-teacher');
    }
}
