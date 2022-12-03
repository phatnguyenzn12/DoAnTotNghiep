<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào {{ $lesson->chapter->mentor->name }}</h1>
        @if ($lesson->is_check == 0)
            <p>Bài học {{ $lesson->title }} chưa được phê duyệt</p>
        @else
            <p>Bài học {{ $lesson->title }} yêu cầu cần được chỉnh sửa</p>
        @endif
        <p>
            <a href="{{ route('mentor.course.program', ['course_id' => $lesson->chapter->course->id]) }}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xem
                chi tiết</a>
        </p>

    </div>
</div>
