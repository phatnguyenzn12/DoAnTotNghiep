<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lead\ChapterValidateRequest;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChapterController extends Controller
{
    public function create(Request $request)
    {
        $course_id = $request->course;

        $data = view('components.mentor.course.modal.chapter.add', compact('course_id'))->render();

        return response()->json($data);
    }

    public function store(ChapterValidateRequest $request)
    {
        Chapter::create(
            array_merge(
                $request->only(
                    'title',
                    'course_id'
                ),
                ['sort' => Chapter::where('course_id', $request->course_id)->max('sort') + 1 ?? 0]
            )
        );

        if ($request->ajax()) {
            session()->flash('success', 'Thêm chương học thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'Thêm chương học thành công');
    }

    public function destroy($chapter)
    {
        try {
            $data = Chapter::destroy($chapter);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 401);
        }

        return response()->json(null, 200);
    }

    public function show(Chapter $chapter)
    {
        $data = view('components.mentor.course.modal.chapter.edit', compact('chapter'))->render();
        return response()->json($data, 200);
    }

    public function update(ChapterValidateRequest $request, $chapter)
    {
        try {
            $chapter = Chapter::findOrFail($chapter);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 401);
        }

        $chapter->title = $request->title;
        $chapter->save();

        if ($request->ajax()) {
            session()->flash('success', 'Sửa chương học thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'Sửa chương học thành công');
    }

    public function showSort(Course $course)
    {
        $data = view('components.mentor.course.modal.chapter.sort', compact('course'))->render();
        return response()->json($data, 201);
    }

    public function sort(Request $request)
    {
        foreach ($request->chapters as $key => $chapter_id) {
            try {
                $chapter = Chapter::findOrFail($chapter_id);
            } catch (\Throwable $th) {
                return response()->json(['error' => $th], 401);
            }
            $chapter->sort = ++$key;
            $chapter->save();
        }
        if ($request->ajax()) {
            session()->flash('success', 'Sắp xếp chương học thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'Sắp xếp chương học thành công');
    }
}
