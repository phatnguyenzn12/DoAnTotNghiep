<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
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
                $request->all('title', 'mentor_id', 'course_id','deadline'),
                // ['sort' => Chapter::where('course_id', $request->course_id)->max('sort') + 1 ?? 0]
            )
        );
        $chapter = Chapter::where('title', 'like', $request->title)->first();
        Mail::send('screens.email.mentor.chapterTeacher', compact('chapter'), function ($email) use ($chapter) {
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
        // return view('screens.mentor.course.edit', compact('chapter','mentors'));
        $data = view('components.mentor.course.modal.chapter.edit', compact('chapter','mentors'))->render();
        return response()->json($data, 200);
    }

    public function update(Request $request, $chapter)
    {
        $chapter_old = Chapter::where('id',$chapter)->first();
        $chapter = Chapter::findOrFail($chapter);

        $chapter->title = $request->title;
        $chapter->deadline = $request->deadline;
        $chapter->mentor_id = $request->mentor_id;
        $chapter->save();
        
        if($chapter->mentor->id != $chapter_old->mentor->id){
            foreach($chapter->lessons as $lesson){
                $lesson->update(['is_edit' => 0]);
            }
            Mail::send('screens.email.mentor.changeTeacher', compact('chapter_old'), function ($email) use ($chapter_old) {
                $email->subject('Chương học thay đổi');
                $email->to($chapter_old->mentor->email, $chapter_old->mentor->name);
            });
            Mail::send('screens.email.mentor.chapterTeacher', compact('chapter'), function ($email) use ($chapter) {
                $email->subject('Bạn được giao 1 chương học');
                $email->to($chapter->mentor->email, $chapter->mentor->name);
            });
        }
        
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
