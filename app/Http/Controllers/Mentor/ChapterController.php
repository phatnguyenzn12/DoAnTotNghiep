<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChapterController extends Controller
{
    public function create(Request $course_id)
    {
        $mentor = Mentor::get();
        $course_id = $course_id->course;
        $data = view('components.mentor.course.modal.chapter.add', compact('course_id', 'mentor'))->render();
        return response()->json($data);
    }

    public function store(Request $request)
    {

        $course = Course::where('id', $request->course_id);
        Chapter::create(
            array_merge(
                $request->all('title', 'mentor_id', 'number_chapter', 'course_id'),
                // ['sort' => Chapter::where('course_id', $request->course_id)->max('sort') + 1 ?? 0]
            )
        );
        $chapter = Chapter::where('title', 'like', $request->title)->first();
        Mail::send('screens.email.mentor.acceptTeach', compact('chapter'), function ($email) use ($chapter) {
            $email->subject('Bạn được giao 1 chương học');
            $email->to($chapter->mentor->email, $chapter->mentor->name);
        });
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
        $data = Chapter::destroy($chapter);
        return response()->json(null, 200);
    }

    public function show(Chapter $chapter)
    {
        $mentors = Mentor::all();
        $data = view('components.mentor.course.modal.chapter.edit', compact('chapter','mentors'))->render();
        return response()->json($data, 200);
    }

    public function update(Request $request, $chapter)
    {
        $data = Chapter::findOrFail($chapter);
        $data->title = $request->title;
        $data->number_chapter = $request->number_chapter;
        $data->mentor_id = $request->mentor_id;
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
        $data = view('components.mentor.course.modal.chapter.sort', compact('course'))->render();
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
