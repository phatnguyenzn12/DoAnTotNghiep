<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào {{ $chapter->mentor->name }}</h1>
        <h2>Bạn đã được giao việc đăng video bài học</h2>
        <p>Chương: {{$chapter->title}}</p>
        <p>
            <a href="{{route('teacher.chapter.program',$chapter->course_id)}}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xem chi tiết</a>
        </p>

    </div>
</div>
