<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Jobs\Notification as JobsNotification;
use App\Models\CommentLesson;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Mentor;
use App\Models\User;
use App\Notifications\CommentLessonNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class LessonController extends Controller
{
    public function index(Course $course)
    {
        if ($course->lessons->isEmpty()) {
            return redirect()->back()->with('failed', 'Khóa học này chưa có bài học');
        }

        $chapters = $course->load('chapters')->chapters()->orderBy('id')->get();

        $lesson = $chapters->first()->lessons()->orderBy('id')->first();

        $mentor = $lesson->chapter->mentor;

        if (auth()->user()) {
            auth()->user()
                ->load('lesson_user')
                ->lesson_user()
                ->syncWithoutDetaching([$lesson->id => ['course_id' => $course->id]]);
        }

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

    public function show(Course $course, Lesson $lesson)
    {
        if (auth()->user()) {
            auth()->user()
                ->load('lesson_user')
                ->lesson_user()
                ->syncWithoutDetaching([$lesson->id => ['course_id' => $course->id]]);
        }

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
        $data = $request->only('comment');
        $data['lesson_id'] = $lesson->id;

        if ($mentor = auth()->guard('mentor')->user()) {
            $auth = auth()->user();
            $data['mentor_id'] = $mentor->id;
        }

        if ($user = auth()->user()) {
            $auth = auth()->user();
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
                    'content' => 'Đã trả lời: ' . $data['comment'],
                ]
            )
        );

        $html = view('components.client.lesson.comment', compact('comments', 'course', 'lesson'))->render();

        return response()->json($html);
    }

    public function childComment(Request $request, $course_id, CommentLesson $comment_parent)
    {
        $data = $request->only('comment');

        $parent = $comment_parent;

        $comment_parent = $comment_parent->reply_parent
            ? $comment_parent->reply_parent
            : $comment_parent;

        if ($comment_parent->reply != 0) {
            return response()->json('Bạn chọn sai đối tượng');
        }

        $data['reply'] = $comment_parent->id;
        $data['lesson_id'] = $comment_parent->lesson_id;

        if (auth()->guard('mentor')->user()) {
            $auth = auth()->guard('mentor')->user();
            $data['mentor_id'] = $auth->id;
        }

        if (auth()->user()) {
            $auth = auth()->user();
            $data['user_id'] = $auth->id;
        }

        if ($comment_parent->user_id == null) {
            $account_parent = Mentor::where('id', $comment_parent->mentor_id)->first();
        } else {
            $account_parent = User::where('id', $comment_parent->user_id)->first();
        }

        $mentors = $this->get_mentors($comment_parent, $auth);
        $users = $this->get_users($comment_parent, $auth);

        $accounts = $mentors->merge($users);

        // dd($accounts,$account_parent,$course_id);

        dispatch(new JobsNotification($this->send_notification(
            $accounts,
            $comment_parent->lesson_id,
            $comment_parent->id,
            $course_id,
            $data['comment']
        )));

        CommentLesson::create($data);

        $comment_lesson = $comment_parent->replies()
            ->orderBy('id', 'DESC')
            ->where('status', '1')
            ->get();

        $html = view('components.client.lesson.child-comment', compact('course_id', 'comment_lesson', 'comment_parent'))->render();

        return response()->json($html);
    }

    public function send_notification($accounts, int $lesson_id, $parent_user_id, int $course_id, string $content)
    {
        if ($accounts->isEmpty() == false) {
            Notification::send(
                $accounts,
                new CommentLessonNotification(
                    [
                        'lesson_id' => $lesson_id,
                        'course_id'  => $course_id,
                        'content' => 'Đã trả lời: ' . $content,
                        'id' => $parent_user_id
                    ]
                )
            ); // hàm notify sẽ unique các id người dùng nên là nếu nhiều id giống nhau thì chỉ có 1 id đc nhận
        }

        return 0;
    }

    public function get_users($comment_parent, $auth)
    {
        $users_id = $comment_parent->replies
            ->where('user_id', '!=', 0);

        if (auth()->user()) {
            $users_id = $users_id->where('user_id', '!=', $auth->id);
        }
        $users_id  = $users_id->unique('user_id')
            ->pluck('user_id');

        $users = User::whereIn('id', $users_id)
            ->get();

        return $users;
    }

    public function get_mentors($comment_parent, $auth)
    {
        $mentors_id = $comment_parent->replies
            ->where('mentor_id', '!=', 0);

        if (auth()->guard('mentor')->user()) {
            $mentors_id = $mentors_id->where('mentor_id', '!=', $auth->id);
        }

        $mentors_id = $mentors_id->unique('mentor_id')
            ->pluck('mentor_id');

        $mentors = Mentor::whereIn('id', $mentors_id)
            ->get();

        return $mentors;
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
