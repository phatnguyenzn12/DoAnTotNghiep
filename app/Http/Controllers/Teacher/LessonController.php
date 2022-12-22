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

    public function update(LessonRequest $request, Lesson $lesson, VimeoService $vimeoService)
    {
        $url =  $vimeoService->create($request->video_path, $request->title, $request->content, 0);
        $lessonVideo['video_path'] = $url;
        $lessonVideo['time'] = 0;
        $lesson->lessonVideo()->update($lessonVideo);
        $lesson->is_edit = 2;
        $lesson->is_demo = 0;
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
    public function complete_video(Request $request, Lesson $lesson)
    {
        $lesson->is_edit = 1;
        $lesson->lessonVideo->time  = $request->time;
        $lesson->save();
        $lesson->lessonVideo->save();
        session()->flash('success', ' video đã tải thành công');
        return response()->json(['success' => true], 201);
    }

    public function uploadVideo(Request $request)
    {
        dd($request->file('video_path'));
    }
}
