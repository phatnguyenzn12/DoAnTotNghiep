<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function create(Request $course_id)
    {
        $course_id = $course_id->course;
        $data = view('components.admin.course.modal.chapter.add',compact('course_id'))->render();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        Chapter::create(
            array_merge(
                $request->all('title', 'course_id'),
                ['sort' => Chapter::where('course_id', $request->course_id)->max('sort') + 1 ?? 0]
            )
        );
        if ($request->ajax()) {
            session()->flash('success', 'Thêm chương học thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'Thêm bài học chương công');
    }

    public function destroy($chapter)
    {
        $data = Chapter::destroy($chapter);
        return response()->json(null, 200);
    }
    
    public function show(Chapter $chapter)
    {
        $data = view('components.admin.course.modal.chapter.edit', compact('chapter'))->render();
        return response()->json($data, 200);
    }

    public function update(Request $request, $chapter)
    {
        $data = Chapter::findOrFail($chapter);
        $data->title = $request->title;
        $data->save();
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
        $data = view('components.admin.course.modal.chapter.sort', compact('course'))->render();
        return response()->json($data, 201);
    }

    public function sort(Request $request)
    {
        foreach ($request->chapters as $key => $chapter_id) {
            $chapter = Chapter::findOrFail($chapter_id);
            $chapter->sort = $key;
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
