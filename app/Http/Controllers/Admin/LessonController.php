<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Services\VimeoService;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create(Request $course_id)
    {
        $chapters = Chapter::where('course_id', $course_id->course)->get();
        $data = view('components.admin.course.modal.lesson.add', compact('chapters'))->render();
        return response()->json($data, 200);
    }

    public function store(Request $request, VimeoService $vimeoService)
    {
        if ($request->lesson_type === "video") {

            $lesson = Lesson::create(
                array_merge(
                    $request->only(
                        [
                            'title',
                            'content',
                            'lesson_type',
                            'attachment',
                            'chapter_id'
                        ]
                    ),
                    ['sort' => Lesson::where('chapter_id', $request->chapter_id)->max('sort') + 1 ?? 0]
                )
            );

            $url = $vimeoService->create(
                $request->video_path,
                $request->title,
                $request->content,
                $request->is_demo
            );

            $lessonVideo = $request->only([
                'is_demo'
            ]);
            $lessonVideo['video_path'] = $url;

            $lesson->lessonVideo()
                ->create($lessonVideo);
        }

        if ($request->ajax()) {
            session()->flash('success', 'Thêm bài học thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'Thêm bài học thành công');
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
                    'attachment',
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
        $chapters = Course::findOrFail($request->course)->chapters;
        $data = view('components.admin.course.modal.lesson.edit', compact('lesson', 'chapters'))->render();
        return response()->json($data, 200);
    }

    public function showSort(Chapter $chapter)
    {
        $data = view('components.admin.course.modal.lesson.sort', compact('chapter'))->render();
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
