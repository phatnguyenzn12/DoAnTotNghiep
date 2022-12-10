<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Certificate;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Models\Mentor;
use App\Models\Skill;
use App\Services\UploadFileService;
use Http\Message\Authentication\Chain;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $min_price = Course::where('mentor_id',auth()->guard('mentor')->user()->id)->min('price');
        $max_price = Course::where('mentor_id',auth()->guard('mentor')->user()->id)->max('price');
        return view('screens.mentor.course.list',compact('min_price','max_price'));
    }

    public function filterData(Request $request)
    {

        $courses = Course::select('*')
        ->where('mentor_id',auth()->guard('mentor')->user()->id)
        ->sortdata($request)
        ->search($request)
        ->isactive($request)
        ->price($request)
        ->paginate($request->record);
        
        $html = view('components.mentor.course.list-course' ,compact('courses'))->render();
        return response()->json($html,200);
    }

    public function program($course_id)
    {
        return view('screens.mentor.course.edit-program', compact('course_id'));
    }

    public function filterDataChapter(Request $request)
    {
        $chapters = Chapter::select('*')
        ->where('course_id', $request->course_id)
        // ->orderBy('id', 'DESC')
        ->sortdata($request)
        ->search($request)
        ->paginate($request->record);
        
        $html = view('components.mentor.chapter.list-chapter' ,compact('chapters'))->render();
        return response()->json($html,200);
    }

    // Route::get('edit-program/{course_id}', 'program')->name('program');
    //     Route::get('edit-course/{id}', 'edit')->name('edit');
    //     Route::put('update-course/{course}', 'update')->name('update');

    public function edit($id)
    {
        $certificates = auth()->guard('mentor')->user()->load('certificates')->certificates()->get();
        $skills = Skill::select('id', 'title')->get();
        $course = Course::findOrFail($id);
        $cateCourses = CateCourse::select('id', 'name')->get();

        return view('screens.mentor.course.edit-course', compact('course', 'cateCourses', 'id', 'skills', 'certificates'));
    }
    public function create()
    {
        $cateCourses = CateCourse::select('id', 'name')->get();
        $skills = Skill::select('id', 'title')->get();

        return view('screens.mentor.course.create', compact('cateCourses', 'skills'));
    }

    public function store(Request $request)
    {
        $image = UploadFileService::storage_image($request->image);

        $course = Course::create(
            array_merge(
                $request->only([
                    'title',
                    'content',
                    'video',
                    'price',
                    'discount',
                    'status',
                    'slug',
                    'cate_course_id',
                    'skill_id',
                    'language',
                    'certificate',
                    'description',
                    'description_details',
                    'certificate_id'
                ]),
                ['tags' => implode(', ', collect(json_decode($request->tags))->pluck('value')->toArray())],
                ['image' => $image],
                ['mentor_id' => auth()->guard('mentor')->user()->id],
            )
        );

        return redirect()
            ->back()
            ->with('success', 'Thêm khóa học thành công');
    }

    public function destroy($id)
    {
        $data = Course::destroy($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, Course $course)
    {
        $course->title = $request->title;
        $course->content = $request->content;
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->skill_id = $request->skill_id;
        $course->language = $request->language;
        $course->tags = ['tags' => implode(', ', collect(json_decode($request->tags))->pluck('value')->toArray())];
        $course->description = $request->description;
        $course->description_details = $request->description_details;
        $course->certificate_id =  $request->certificate_id;

        if ($request->image) {
            $image = UploadFileService::storage_image($request->image);
            $course->image = $image;
        }

        $course->save();

        return redirect()
            ->back()
            ->with('success', 'sửa khóa học thành công');
    }
}
