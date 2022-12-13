<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\LessonRequest;
use App\Jobs\UploadVideo;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Models\Mentor;
use App\Services\VimeoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LessonController extends Controller
{

    public function update(Request $request, Lesson $lesson, VimeoService $vimeoService)
    {
        $url =  $vimeoService->create($request->video_path, $request->title, $request->content, $request->is_demo);
        $lessonVideo['video_path'] = $url;
        $lesson->lessonVideo()->update($lessonVideo);
        $lesson->is_edit = 1;
        $lesson->save();
        if ($request->ajax()) {
            session()->flash('success', 'Bạn tạo video bài học thành công');
            return response()->json(['success' => true], 201);
        }

        return redirect()
            ->back()
            ->with('success', 'Bạn tạo video bài học thành công');
    }

    public function request(Lesson $lesson)
    {
        $data = view('components.teacher.modal.lesson.edit-request', compact('lesson'))->render();
        return response()->json($data, 200);
    }

    public function editRequest(Request $request, Lesson $lesson)
    {
        if ($lesson->is_edit == 0) {
            Mail::send('screens.email.teacher.edit-lesson', compact('lesson', 'request'), function ($email) use ($lesson) {
                $email->subject('Yêu cầu chỉnh sửa');
                $email->to($lesson->chapter->course->mentor->email, $lesson->chapter->course->mentor->name);
            });
            return redirect()
                ->back()
                ->with('success', 'Gửi yêu cầu thành công');
        }
    }

    public function show(Request $request, Lesson $lesson)
    {
        $data = view('components.teacher.modal.lesson.edit', compact('lesson'))->render();
        return response()->json($data, 200);
    }
    public function detail(Request $request, Lesson $lesson)
    {
        $data = view('components.teacher.modal.lesson.detail', compact('lesson'))->render();
        return response()->json($data, 200);
    }
}
