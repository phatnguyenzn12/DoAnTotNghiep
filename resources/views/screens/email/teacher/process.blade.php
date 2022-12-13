<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào {{ $course->mentor->name }}</h1>
        <h2>Giảng viên: {{ $course->mentor->name }} đã đăng đủ số bài yêu cầu</h2>
        <p>Thuộc chương học: {{$course->title}}</p>
        <p>
            <a href="{{route('mentor.course.program',$course->id)}}" class="btn btn-bg-success">Kiểm duyệt</a>
        </p>

    </div>
</div>
