<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
   public function index(){
    $chapter = Chapter::where('mentor_id',Auth::guard('mentor')->user()->id)->get();
    return view('screens.teacher.chapter.list', compact('chapter'));
   }
}
