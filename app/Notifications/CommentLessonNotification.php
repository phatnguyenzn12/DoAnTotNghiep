<?php

namespace App\Notifications;

use App\Models\Lesson;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentLessonNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     public function __construct($post )
    {
        $this->post=$post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $lesson = Lesson::where('id',$this->post['lesson_id'])->first();
        $course_id = $this->post['course_id'];
        $lesson_id =  $lesson->id;
        $content =  $this->post['content'];
        $auth =  $notifiable;
        return (new MailMessage)
            ->view(
                'screens.email.comment',compact('course_id','lesson_id','auth','lesson','content')
            );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // $this->post['name'] = $notifiable->name;
        // $this->post['user_id'] = $notifiable->id;
        return $this->post;
    }
}
