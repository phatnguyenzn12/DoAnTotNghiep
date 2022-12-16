<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào bạn</h1>
        <h2>Người trả bình luận bài học: {{ $auth->name }}</h2>
        <h2>Nội dung bình luận {{ $content }}</h2>
        <p>Thuộc bài học: {{$lesson->title}}</p>
        <p>
            <a href="{{ route('client.lesson.show', ['course' => $course_id, 'lesson' =>  $lesson_id ]) }}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Kiểm duyệt</a>
        </p>
    </div>
</div>
