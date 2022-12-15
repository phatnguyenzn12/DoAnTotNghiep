<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChapterController extends Controller
{
   //    public function index()
   //    {
   //       $chapters = Chapter::where('mentor_id', Auth::guard('mentor')->user()->id)->get();
   //       return view('screens.teacher.chapter.list', compact('chapter'));
   //    }

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

      $html = view('components.teacher.chapter.list-chapter', compact('chapters'))->render();
      return response()->json($html, 200);
   }

   public function show(Chapter $chapter)
   {
      $lesson = Lesson::where('chapter_id', Auth::guard('mentor')->user()->id);
      // dd( $lesson );
      $data = view('components.teacher.modal.chapter.info', compact('chapter'))->render();
      return response()->json($data, 200);
   }

   public function sendProcess(Course $course)
   {
      if ($course->lessons()->where('is_edit', 0)->get()->isEmpty() == false) {

         return redirect()
            ->back()
            ->with('success', 'Bạn chưa thêm đủ video bài học');
      } elseif ($course->lessons()->where('is_edit', 2)->get()->isEmpty() == false) {
         return redirect()
            ->back()
            ->with('failed', 'Có video chưa tải lên hoặc chưa được kiểm tra');
      }
      Mail::send('screens.email.teacher.process', compact('course'), function ($email) use ($course) {
         $email->subject('Yêu cầu chỉnh sửa');
         $email->to(
            $course->cateCourse()
               ->first()
               ->leader()
               ->email
         );
      });
      return redirect()
         ->back()
         ->with('success', 'Gửi yêu cầu thành công');
   }
}
