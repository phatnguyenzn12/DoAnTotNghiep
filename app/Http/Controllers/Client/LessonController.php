<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\CommentLesson;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Mentor;
use App\Models\User;
use App\Notifications\CommentLessonNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Notifications;

class LessonController extends Controller
{
    public function index(Course $course)
    {
        $chapters = $course->load('chapters')->chapters()->orderBy('sort')->get();

        $lesson = $chapters->first()->lessons()->orderBy('sort')->first();

        $check_course = auth()->user()->load('course_user')->course_user->where('id', $course->id)->isEmpty();

        if ($check_course == true) {
            auth()->user()
                ->load('course_user')
                ->course_user()
                ->attach(['course_id' => $course->id], ['lesson_id' => $lesson->id]);
        }

        $comments = CommentLesson::where('lesson_id', $lesson->id)
            ->orderBy('id')
            ->where([
                ['status', '1'],
                ['reply', '0']
            ])
            ->where('status', '1')
            ->paginate(5);

        return view('screens.client.lesson.watch', compact('course', 'chapters', 'lesson', 'comments'));
    }

    public function show(Course $course, Lesson $lesson)
    {
        auth()->user()
            ->load('course_user')
            ->course_user()
            ->attach(['course_id' => $course->id], ['lesson_id' => $lesson->id]);

        $chapters = $course->load('chapters')->chapters()->get();

        $comments = CommentLesson::where('lesson_id', $lesson->id)
            ->orderBy('id', 'DESC')
            ->where([
                ['status', '1'],
                ['reply', '0']
            ])
            ->paginate(5);

        return view('screens.client.lesson.watch', compact('course', 'chapters', 'lesson', 'comments'));
    }

    public function commentDetails(Request $request, CommentLesson $comment_lesson)
    {
        $course_id = $request->course_id;

        $comment_parent = $comment_lesson;

        $comment_lesson = $comment_lesson->replies()
            ->orderBy('id', 'DESC')
            ->where('status', '1')
            ->paginate(5);

        $html = view('components.client.lesson.child-comment', compact('course_id', 'comment_lesson', 'comment_parent'))->render();

        return response()->json($html);
    }

    public function parentComment(Request $request, Lesson $lesson)
    {
        $data = $request->only('comment');
        $data['lesson_id'] = $lesson->id;
        $data['user_id'] = auth()->user()
            ? auth()->user()->id
            : auth()->guard('mentor')->user()->id;

        $comment = CommentLesson::create($data);

        $comments = CommentLesson::where('lesson_id', $lesson->id)
            ->orderBy('id', 'DESC')
            ->where('status', '1')
            ->paginate(5);

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
        $user = auth()->user()
            ? auth()->user()
            : auth()->guard('mentor')->user();

        $data['user_id'] = $user->id;

        $mentors_id = $comment_parent->replies->where('mentor_id', '!=', 0)->pluck('mentor_id');

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
            ->paginate(5);

        $html = view('components.client.lesson.child-comment', compact('course_id', 'comment_lesson', 'comment_parent'))->render();

        return response()->json($html);
    }

    // public function sendNotifications($checks_id)
    // {
    //     if ($checks_id->isEmpty() == true) {
    //         $list_id = $checks_id->whereNotNull();
    //         $users = Mentor::where('id', $list_id)->get();

    //         Notification::send(
    //             $users,
    //             new notifications(
    //                 [
    //                     'lesson_id' => $comment_parent->lesson_id,
    //                     'course_id'  => $comment_parent->course->id,
    //                     'name' => $comment_parent->name,
    //                     'user_id' => $comment_parent->user_id,
    //                     'mentor_id' => $comment_parent->mentor_id
    //                 ]
    //             )
    //         );
    //     }
    // }
}
