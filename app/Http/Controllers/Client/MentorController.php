<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        return view('screens.client.mentor.apply');
    }

    public function list()
    {
        return view('screens.client.mentor.list');
    }

    public function show(Mentor $mentor)
    {
        return view('screens.client.mentor.intro',compact('mentor'));
    }
}
