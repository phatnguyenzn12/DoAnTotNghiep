<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
   public function index()
   {
      $chapter = Chapter::where('mentor_id', Auth::guard('mentor')->user()->id)->get();
      return view('screens.teacher.chapter.list', compact('chapter'));
   }

   public function program($course_id)
   {
      return view('screens.teacher.chapter.edit-program', compact('course_id'));
   }

   public function filterDataChapter(Request $request)
    {
        $chapters = Chapter::select('*')
        ->where('course_id', $request->course_id)
        ->sortdata($request)
        ->search($request)
        ->paginate($request->record);

        $html = view('components.teacher.chapter.list-chapter' ,compact('chapters'))->render();
        return response()->json($html,200);
    }

   public function show(Chapter $chapter)
   {
      $lesson = Lesson::where('chapter_id', Auth::guard('mentor')->user()->id);
      // dd( $lesson );
      $data = view('components.teacher.modal.chapter.info', compact('chapter'))->render();
      return response()->json($data, 200);
   }
}
