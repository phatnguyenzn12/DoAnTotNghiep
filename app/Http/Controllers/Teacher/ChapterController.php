<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
   public function index()
   {
      $chapter = Chapter::where('mentor_id', Auth::guard('mentor')->user()->id)->get();
      return view('screens.teacher.chapter.list', compact('chapter'));
   }

   public function program($mentor_id)
   {
      $chapters = Chapter::select('*')
         ->where('mentor_id', $mentor_id)
         ->paginate(10);
      return view('screens.teacher.chapter.edit-program', compact('chapters', 'mentor_id'));
   }

   public function show(Chapter $chapter)
   {
      $data = view('components.teacher.modal.chapter.info', compact('chapter'))->render();
      return response()->json($data, 200);
   }
}