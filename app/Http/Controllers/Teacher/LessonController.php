<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Mentor;
use App\Services\VimeoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LessonController extends Controller
{
    public function list($id)
    {
        $lesson = Lesson::where('chapter_id', $id)->get();
        $chapter = Chapter::where('id', $id)->first();
        return view('screens.teacher.lesson.list', compact('lesson', 'chapter'));
    }

    public function create()
    {
        $chapters = Chapter::where('mentor_id', auth()->guard('mentor')->user()->id)->get();
        $data = view('components.teacher.modal.lesson.add', compact('chapters'))->render();
        return response()->json($data, 200);
    }

    public function store(Request $request, VimeoService $vimeoService)
    {
        $chapter = Chapter::where('id', $request->chapter_id)->first();
        if ($chapter->number_chapter <= count($chapter->lessons)) {
            session()->flash('failed', 'Bài học đã đủ');
        } else {
            if ($request->lesson_type === "video") {

                $lesson = Lesson::create(
                    $request->only(
                        [
                            'title',
                            'content',
                            'lesson_type',
                            'time',
                            'chapter_id'
                        ]
                    ),
                );
                $url = $vimeoService->create(
                    $request->video_path,
                    $request->title,
                    $request->content,
                    $request->is_demo
                );

                // $lessonVideo = $request->only([
                //     'is_demo'
                // ]);
                $lessonVideo['video_path'] = $url;


                $lesson->lessonVideo()
                    ->create($lessonVideo);
            }
            $chapter = Chapter::where('id', $request->chapter_id)->first();
            if ($chapter->number_chapter == count($chapter->lessons)) {
                Mail::send('screens.email.teacher.lessonLead', compact('chapter'), function ($email) use ($chapter) {
                    $email->subject('Duyệt chương học');
                    $email->to($chapter->course->mentor->email, $chapter->course->mentor->name);
                });
            }

            if ($request->ajax()) {
                session()->flash('success', 'Thêm bài học thành công');
                return response()->json(['success' => true], 201);
            }
            return redirect()
                ->back()
                ->with('success', 'Thêm bài học thành công');
        }
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
                [
                    'title',
                    'content',
                    'chapter_id'
                ]
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

        if ($request->ajax()) {
            session()->flash('success', 'Sửa bài học thành công');
            return response()->json(['success' => true], 201);
        }

        return redirect()
            ->back()
            ->with('success', 'Sửa bài học thành công');
    }

    public function updateDomain(Lesson $lesson)
    {
        dd($lesson);
    }
    public function show(Request $request, Lesson $lesson)
    {
        $chapters = Chapter::where('mentor_id', auth()->guard('mentor')->user()->id)->get();
        $data = view('components.teacher.modal.lesson.edit', compact('lesson', 'chapters'))->render();
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
