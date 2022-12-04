<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
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
    public function list($id)
    {
        $chapter = Chapter::where('id', $id)->first();
        return view('screens.teacher.lesson.list-video', compact('chapter'));
    }

    public function destroy($lesson)
    {
        $data = Lesson::destroy($lesson);
        return response()->json(null, 200);
    }

    public function update(Request $request, Lesson $lesson, VimeoService $vimeoService)
    {
        if ($lesson->lesson_type == "video") {

            $lesson->update($request->only(
                'content',
                'time',
            ));

            $lessonVideo = $request->only([
                'is_demo'
            ]);

            if ($request->video_path) {
                $url = $vimeoService->create($request->video_path, $request->title, $request->content, $request->is_demo);
                $lessonVideo['video_path'] = $url;
            } else {
                $vimeoService->update($lesson->lessonVideo->video_path, $request->title, $request->content, $request->is_demo);
                $lessonVideo['video_path'] = $lesson->lessonVideo->video_path;
            }
            $lesson->lessonVideo()->update($lessonVideo);
        }
        $lessons = Lesson::where('chapter_id', $request->chapter_id)->get();
        $item = 0;
        foreach ($lessons as $lesson) {
            if ($lesson->lessonVideo->video_path == 0) {
                $item++;
            }
        }
        if ($item == 0) {
            $chapter = Chapter::where('id', $request->chapter_id)->first();
            Mail::send('screens.email.teacher.lessonLead', compact('chapter'), function ($email) use ($chapter) {
                $email->subject('Duyệt bài học');
                $email->to($chapter->course->mentor->email, $chapter->course->mentor->name);
            });
        }

        if ($request->ajax()) {
            session()->flash('success', 'Sửa bài học thành công');
            return response()->json(['success' => true], 201);
        }

        return redirect()
            ->back()
            ->with('success', 'Sửa bài học thành công');
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

    public function requestAll(Chapter $chapter)
    {
        $data = view('components.teacher.modal.lesson.edit-request', compact('chapter'))->render();
        return response()->json($data, 200);
    }

    public function editAllRequest(Request $request, Chapter $chapter)
    {
        $item = 0;
        foreach ($chapter->lessons as $lesson) {
            if ($lesson->is_edit == 0) {
                $item++;
            }
        }
        if ($item > 0) {
            Mail::send('screens.email.teacher.edit-lesson', compact('chapter', 'request'), function ($email) use ($lesson) {
                $email->subject('Yêu cầu chỉnh sửa');
                $email->to($lesson->chapter->course->mentor->email, $lesson->chapter->course->mentor->name);
            });
        }

        return redirect()
            ->back()
            ->with('success', 'Gửi yêu cầu thành công');
    }

    public function updateDomain(Lesson $lesson)
    {
        dd($lesson);
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

    public function showSort(Chapter $chapter)
    {
        $data = view('components.mentor.course.modal.lesson.sort', compact('chapter'))->render();
        return response()->json($data, 201);
    }

    public function sort(Request $request)
    {
        foreach ($request->lessons as $key => $lesson_id) {
            $lesson = Lesson::findOrFail($lesson_id);
            $lesson->sort = $key;
            $lesson->save();
        }
        if ($request->ajax()) {
            session()->flash('success', 'sắp xếp thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'sắp xếp thành công');
    }
}
