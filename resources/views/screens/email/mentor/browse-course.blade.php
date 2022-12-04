<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào {{ $admin->name }}</h1>
        <h2>Khóa học: {{$lesson->chapter->course->title}}</h2>
        <p>Đã duyệt đủ bài yêu cầu thêm giá cho khóa học</p>
        <p>
            <a href="{{ route('admin.course.program', ['course_id' => $lesson->chapter->course->id]) }}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xem
                chi tiết</a>
        </p>

    </div>
</div>