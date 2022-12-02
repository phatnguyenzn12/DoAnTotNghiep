<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào {{ $lesson->chapter->course->mentor->name }}</h1>
        <h2>Giảng viên: {{ $lesson->$chapter->mentor->name }} đã đăng đủ số bài yêu cầu</h2>
        <p>Thuộc chương học: {{$lesson->$chapter->title}}</p>
        <p>
            <a href="{{route('mentor.course.program',$lesson->$chapter->course->id)}}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Kiểm duyệt</a>
        </p>

    </div>
</div>
