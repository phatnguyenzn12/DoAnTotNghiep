<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\ChapterReview;
use App\Models\CommentLesson;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Mentor;
use App\Models\User;
use App\Notifications\ChapterReviewNotification;
use App\Notifications\CommentLessonNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class LessonController extends Controller
{
    public function index(Course $course)
    {
        $chapters = $course->load('chapters')->chapters()->orderBy('id')->get();

        $lesson = $chapters->first()->lessons()->orderBy('id')->first();

        $mentor = $lesson->chapter->mentor;

        auth()->user()
            ->load('lesson_user')
            ->lesson_user()
            ->syncWithoutDetaching([$lesson->id => ['course_id' => $course->id]]);

        $comments = CommentLesson::where('lesson_id', $lesson->id)
            ->orderBy('id')
            ->where([
                ['status', '1'],
                ['reply', '0']
            ])
            ->where('status', '1')
            ->get();

        return view('screens.client.lesson.watch', compact('course', 'chapters', 'lesson', 'comments', 'mentor'));
    }

    public function show(Course $course, Lesson $lesson)
    {
        auth()->user()
            ->load('lesson_user')
            ->lesson_user()
            ->syncWithoutDetaching([$lesson->id => ['course_id' => $course->id]]);

        $chapters = $course->load('chapters')->chapters()->get();

        $mentor = $lesson->chapter->mentor;

        $comments = CommentLesson::where('lesson_id', $lesson->id)
            ->orderBy('id', 'DESC')
            ->where([
                ['status', '1'],
                ['reply', '0']
            ])
            ->where('status', '1')
            ->get();

        return view('screens.client.lesson.watch', compact('course', 'chapters', 'lesson', 'comments', 'mentor'));
    }

    public function commentDetails(Request $request, CommentLesson $comment_lesson)
    {
        $course_id = $request->course_id;

        $comment_parent = $comment_lesson;

        $comment_lesson = $comment_lesson->replies()
            ->orderBy('id', 'DESC')
            ->where('status', '1')
            ->get();

        $html = view('components.client.lesson.child-comment', compact('course_id', 'comment_lesson', 'comment_parent'))->render();

        return response()->json($html);
    }

    public function parentComment(Request $request, Lesson $lesson, Course $course)
    {
        $course = Course::where('id',$request->course)->first();

        $data = $request->only('comment');
        $data['lesson_id'] = $lesson->id;

        if ($mentor = auth()->guard('mentor')->user()) {
            $data['mentor_id'] = $mentor->id;
        }

        if ($user = auth()->user()) {
            $data['user_id'] = $user->id;
        }

        $comment = CommentLesson::create($data);

        $comments = CommentLesson::where('lesson_id', $lesson->id)
            ->orderBy('id', 'DESC')
            ->where('status', '1')
            ->get();

        Notification::send(
            $course->mentor,
            new CommentLessonNotification(
                [
                    'lesson_id' => $lesson->id,
                    'course_id'  => $course->id,
                    'content' => $data['comment'],
                    'name' => auth()->user()->name,
                ]
            )
        );

        $html = view('components.client.lesson.comment', compact('comments'))->render();

        return response()->json($html);
    }

    public function childComment(Request $request, $course_id, CommentLesson $comment_parent)
    {
        $data = $request->only('comment');

        $notify_parent = $comment_parent;

        $comment_parent = $comment_parent->reply_parent
            ? $comment_parent->reply_parent
            : $comment_parent;

        if ($comment_parent->reply != 0) {
            return response()->json('Bạn chọn sai đối tượng');
        }

        $data['reply'] = $comment_parent->id;
        $data['lesson_id'] = $comment_parent->lesson_id;

        if ($mentor = auth()->guard('mentor')->user()) {
            $data['mentor_id'] = $mentor->id;
        }

        if ($user = auth()->user()) {
            $data['user_id'] = $user->id;
        }

        $mentors_id = $comment_parent->replies->where('mentor_id', '!=', 0)->pluck('mentor_id');

        $users_id = $comment_parent->replies->where('user_id', '!=', 0)
            ->pluck('user_id');

        if ($mentors_id->isEmpty() == false) {

            $mentors = Mentor::whereIn('id', $mentors_id)
                ->where('id', '!=', $user->id)
                ->get();

            Notification::send(
                $mentors,
                new CommentLessonNotification(
                    [
                        'lesson_id' => $comment_parent->lesson_id,
                        'course_id'  => $course_id,
                        'content' => $data['comment'],
                        'name' => $user->name,
                        'id' => $comment_parent->id
                    ]
                )
            );
        }

        $users_id = $comment_parent->replies->where('user_id', '!=', 0)
            ->pluck('user_id');

        if ($users_id->isEmpty() == false) {

            $users = User::whereIn('id', $users_id)
                ->where('id', '!=', $user->id)
                ->get();

            Notification::send(
                $users,
                new CommentLessonNotification(
                    [
                        'lesson_id' => $comment_parent->lesson_id,
                        'course_id'  => $course_id,
                        'content' => $data['comment'],
                        'name' => $user->name,
                        'id' => $comment_parent->id
                    ]
                )
            ); // hàm notify sẽ unique các id người dùng nên là nếu nhiều id giống nhau thì chỉ có 1 id đc nhận
        }

        CommentLesson::create($data);

        $comment_lesson = $comment_parent->replies()
            ->orderBy('id', 'DESC')
            ->where('status', '1')
            ->get();

        $html = view('components.client.lesson.child-comment', compact('course_id', 'comment_lesson', 'comment_parent'))->render();

        return response()->json($html);
    }

    public function removeComment(CommentLesson $commentLesson)
    {
        if (!$commentLesson) {
            return redirect()->back()->with('failed', 'Bình luận không tồn tại');
        }
        if (auth()->guard('mentor')->user()) {
            $commentLesson->delete();
            return redirect()->back()->with('success', 'Bạn xóa thành công bình luận');
        }
        if (auth()->user()->id == $commentLesson->id) {
            $commentLesson->delete();
            return redirect()->back()->with('success', 'Bạn xóa thành công bình luận');
        }
    }
}
