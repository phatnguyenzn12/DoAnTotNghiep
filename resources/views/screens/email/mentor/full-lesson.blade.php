<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào {{ $lesson->chapter->mentor->name }}</h1>
        <h2>Mentor Lead đã duyệt tất cả bài học</h2>
        <h3>Thuộc chương học: {{$lesson->chapter->title}} bạn được giao</h3>
        <p>
            <a href="{{route('teacher.chapter.program',$lesson->chapter->course->id)}}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xem chi tiết</a>
        </p>
    </div>
</div>