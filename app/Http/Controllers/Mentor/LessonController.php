<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lead\LessonValidateRequest;
use App\Models\Admin;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LessonController extends Controller
{

    // public function index() //bo di ca giao dien
    // {
    //     $courses = Course::where('mentor_id', auth()->guard('mentor')->user()->id)->orderBy('id', 'DESC')->get();
    //     return view('screens.mentor.lesson.list-video', compact('courses'));
    // }

    // public function list($id)
    // {
    //     $chapter = Chapter::where('id', $id)->orderBy('id', 'DESC')->first();
    //     return view('screens.mentor.lesson.list-video-id', compact('id', 'chapter'));
    // }

    public function filterDataLesson(Request $request)
    {
        $lessons = Lesson::select('*')
            ->where('chapter_id', $request->chapter_id)
            // ->orderBy('id', 'DESC')
            ->sortdata($request)
            ->search($request)
            ->isactive($request)
            ->paginate($request->record);

        $html = view('components.mentor.lesson.list-video', compact('lessons', 'request'))->render();
        return response()->json($html, 200);
    }


    public function create(Request $course_id)
    {
        $chapters = Chapter::where('course_id', $course_id->course)->get();
        $data = view('components.mentor.course.modal.lesson.add', compact('chapters', 'course_id'))->render();
        return response()->json($data, 200);
    }

    public function store(LessonValidateRequest $request)
    {
        
        $lesson = $request->only(
            'title',
            'content',
            'chapter_id'
        );

        $lesson ['is_edit'] = 0; 
        $lesson['sort'] = Lesson::where('chapter_id', $request->chapter_id)->max('sort') + 1 ?? 0;

        $lesson = Lesson::create($lesson);

        LessonVideo::create(
            ['lesson_id' => $lesson->id],
        );

        if ($request->ajax()) {
            session()->flash('success', 'Thêm bài học thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'Thêm bài học thành công');
    }

    public function show(Request $request, Lesson $lesson)
    {
        $chapters = Course::findOrFail($request->course)->chapters;
        $data = view('components.mentor.course.modal.lesson.edit', compact('lesson', 'chapters'))->render();
        return response()->json($data, 200);
    }

    public function update(Request $request, $lesson)
    {
        try {
            $lesson = Lesson::findOrFail($lesson);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 401);
        }

        $lesson->update($request->only(
            [
                'title',
                'content',
                'chapter_id'
            ]
        ));

        if ($request->ajax()) {
            session()->flash('success', 'Sửa bài học thành công');
            return response()->json(['success' => true], 201);
        }

        return redirect()
            ->back()
            ->with('success', 'Sửa bài học thành công');
    }

    public function destroy($lesson)
    {
        try {
            $data = Lesson::destroy($lesson);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 401);
        }

        return response()->json(null, 200);
    }


    public function showSort($chapter)
    {
        try {
            $chapter = Chapter::findOrFail($chapter);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 401);
        }

        $data = view('components.mentor.course.modal.lesson.sort', compact('chapter'))->render();
        return response()->json($data, 201);
    }

    public function sort(Request $request)
    {
        foreach ($request->lessons as $key => $lesson_id) {
            $lesson = Lesson::findOrFail($lesson_id);
            $lesson->sort = ++$key;
            $lesson->save();
        }
        if ($request->ajax()) {
            session()->flash('success', 'Sắp xếp chương học thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'Sắp xếp chương học thành công');
    }

//     public function actived(LessonVideo $lesson_video, $check)
//     {
//         $lesson_video->is_check = $check;
//         $lesson_video->save();
//         $lesson =  Lesson::where('id', $lesson_video->lesson_id)->first();
//         return redirect()->route('mentor.lesson.index')->with('success', 'Cập nhập thành công');
//     }

//     public function actived_id(Lesson $lesson, $check)
//     {
//         $lesson->is_check = $check;
//         $lesson->save();

//         if ($lesson->is_check == 0) {
//             // gửi mail teacher
//             Mail::send('screens.email.mentor.browse-lesson', compact('lesson'), function ($email) use ($lesson) {
//                 $email->subject('Duyệt bài học');
//                 $email->to($lesson->chapter->mentor->email, $lesson->chapter->mentor->name);
//             });
//         }
//         if ($lesson->is_check == 2) {
//             Mail::send('screens.email.mentor.browse-lesson', compact('lesson'), function ($email) use ($lesson) {
//                 $email->subject('Duyệt bài học');
//                 $email->to($lesson->chapter->mentor->email, $lesson->chapter->mentor->name);
//             });
//         }


//         //duyệt đủ bài chương học teach
//         $item = 0;
//         foreach ($lesson->chapter->lessons as $lesson) {
//             if ($lesson->is_check != 1) {
//                 $item++;
//             }
//         }
//         if ($item == 0) {
//             Mail::send('screens.email.mentor.full-lesson', compact('lesson'), function ($email) use ($lesson) {
//                 $email->subject('Duyệt bài học');
//                 $email->to($lesson->chapter->mentor->email, $lesson->chapter->mentor->name);
//             });
//         }

//         //duyệt all bài học gửi admin
//         $itemAll = 0;
//         foreach ($lesson->chapter->course->chapters as $chapter) {
//             foreach ($chapter->lessons as $less) {
//                 if ($less->is_check != 1) {
//                     $itemAll++;
//                 }
//             }
//         }
//         if ($itemAll == 0) {
//             $admins = Admin::all();
//             foreach ($admins as $admin) {
//                 Mail::send('screens.email.mentor.browse-course', compact('lesson', 'admin'), function ($email) use ($admin) {
//                     $email->subject('Duyệt khóa học');
//                     $email->to($admin->email, $admin->name);
//                 });
//             }
//         }
//         return redirect()->route('mentor.lesson.list', $lesson->chapter_id)->with('success', 'Cập nhập thành công');
//     }

//     public function activedLesson(Lesson $lesson, $check)
//     {
//         $lesson->is_edit = $check;
//         $lesson->save();

//         Mail::send('screens.email.mentor.active-lesson', compact('lesson'), function ($email) use ($lesson) {
//             $email->subject('Duyệt bài học');
//             $email->to($lesson->chapter->mentor->email, $lesson->chapter->mentor->name);
//         });


//         return redirect()->route('mentor.lesson.list', $lesson->chapter->id)->with('success', 'Cập nhập thành công');
//     }

//     public function activedAllLesson(Chapter $chapter)
//     {
//         $item = 0;
//         foreach ($chapter->lessons as $lesson) {
//             if ($lesson->is_edit == 0) {
//                 $item++;
//                 $lesson->update(['is_edit' => 1]);
//             }
//         }
//         if ($item > 0) {
//             Mail::send('screens.email.mentor.active-lesson', compact('chapter'), function ($email) use ($chapter) {
//                 $email->subject('Duyệt bài học');
//                 $email->to($chapter->mentor->email, $chapter->mentor->name);
//             });
//         }

//         return redirect()->route('mentor.lesson.list', $lesson->chapter->id)->with('success', 'Cập nhập thành công');
//     }
}
