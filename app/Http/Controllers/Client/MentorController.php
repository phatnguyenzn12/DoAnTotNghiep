<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MentorController extends Controller
{
    public function index()
    {
        return view('screens.client.mentor.apply');
    }

    public function apply(Request $request)
    {
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = array_map(function ($item) {
                if ($item == '') {
                    $item = null;
                }
                if (is_string($item)) {
                    $item = trim($item);
                }
                return $item;
            }, $request->post());
            unset($params['cols']['_token']);

            $apply = new Apply();
            $res = $apply->saveNew($params);
            if ($res == null) {
                return redirect()->route('client.mentor.index');
            } else if ($res > 0) {
                $admins = DB::table('admins')->get();
                $db = DB::table('applys')->where('email', 'like', $request['email'])->first();
                Mail::send('screens.email.activedMentor', compact('admins', 'db'), function ($email) use ($admins) {
                    foreach ($admins as $admin) {
                        $email->subject('Yêu cầu đăng ký giảng viên');
                        $email->to($admin->email, $admin->name);
                    }
                });
                return redirect()->route('client.mentor.index')->with('success', 'Yêu cầu đăng ký giảng viên thành công');
            } else {
                return redirect()->route('client.mentor.index')->with('failed', 'Lỗi thêm mới');
            }
        }
        return view('screens.mentor.auth.register', compact('cateCourses'));
    }

    public function list()
    {
        return view('screens.client.mentor.list');
    }

    public function filterData(Request $request)
    {

        $mentors = Mentor::select('*')
        ->role('lead')
        ->sortdata($request)
        ->search($request)
        ->paginate($request->record);

        $html = view('components.client.mentor.list-mentor' ,compact('mentors'))->render();
        return response()->json($html,200);
    }

    public function show(Mentor $mentor)
    {
        $mentorRelated = Mentor::role('teacher')->where('specializations',$mentor->specializations)->get();
        return view('screens.client.mentor.intro',compact('mentor','mentorRelated'));
    }


      // public function getChapter(Mentor $mentor, Chapter $chapter)
    // {
    //     $html = view('components.client.lesson.chapter-review', compact('chapter', 'mentor'))->render();
    //     return response()->json($html, 200);
    // }

    // public function postReview(Request $request, Chapter $chapter)
    // {
    //     if ($chapter->userLessonsComplete()->count() != $chapter->lessons->count()) {
    //         return redirect()->back()->with('failed', 'Bạn phải hoàn thành chương học mới được đánh giá');
    //     }

    //     $chapterReview = $request->only('votes');

    //     $chapterReview['chapter_id'] = $chapter->id;

    //     $chapterReview['user_id'] = auth()->user()->id;

    //     $chapterReview['content'] = $request->content
    //         ? $request->content
    //         : null;

    //     $chapterReview = ChapterReview::create($chapterReview);

    //     Notification::send(
    //         $chapter->mentor,
    //         new ChapterReviewNotification(
    //             [
    //                 'content' => 'đánh giá chương học ' . $chapterReview->chapter->title . ' của bạn với số điểm là ' . $chapterReview->votes,
    //                 'name' => auth()->user()->name,
    //             ]
    //         )
    //     );

    //     return redirect()->back()->with('success', 'Cảm ơn bạn đã đánh giá chương ' . $chapter->title);
    // }

    // public function getEditReview(Request $request, $chapterReview) //
    // {
    //     try {
    //         $chapterReview = ChapterReview::FindOrFail($chapterReview);
    //     } catch (ModelNotFoundException $exception) {
    //         return response()->json($exception->getMessage(), 401);
    //     }

    //     $mentor = $chapterReview->chapter->mentor;

    //     $chapter = $chapterReview->chapter;

    //     $html = view('components.client.lesson.edit-chapter-review', compact('chapter', 'mentor', 'chapterReview'))->render();

    //     return response()->json($html, 200);
    // }

    // public function editReview(Request $request, $review)
    // {
    //     try {
    //         $chapterReview = ChapterReview::findOrFail($review);
    //     } catch (ModelNotFoundException $exception) {
    //         return response()->json($exception->getMessage(), 401);
    //     }

    //     $chapterReview->votes = $request->votes;

    //     $chapterReview->user_id = auth()->user()->id;

    //     $chapterReview->content = $request->content
    //         ? $request->content
    //         : null;

    //     $chapterReview->save();

    //     Notification::send(
    //         $chapterReview->chapter->mentor,
    //         new ChapterReviewNotification(
    //             [
    //                 'content' => 'đánh giá lại chương học ' . $chapterReview->chapter->title . ' của bạn với số điểm là ' . $chapterReview->votes,
    //                 'name' => auth()->user()->name,
    //             ]
    //         )
    //     );

    //     return redirect()->back()->with('success', 'Bạn đã sửa lại đánh giá thành công');
    // }
}
