<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        @if (isset($lesson))
            <h1>Xin chào {{ $lesson->chapter->mentor->name }}</h1>
            @if ($lesson->is_edit == 1)
                <h2>Admin đã chấp thuận chỉnh sửa bài học: {{ $lesson->title }}</h2>
            @else
                <h2>Admin không chấp thuận chỉnh sửa bài học: {{ $lesson->title }}</h2>
            @endif
            <p>Thuộc Chương học: {{ $lesson->chapter->title }}</p>
            <p>
                <a href="{{ route('teacher.chapter.program', $lesson->chapter->course_id) }}"
                    style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xem
                    chi tiết</a>
            </p>
        @else
            <h1>Xin chào {{ $chapter->mentor->name }}</h1>
            <h2>Admin đã chấp thuận chỉnh sửa tất cả bài học</h2>
            <p>Thuộc Chương học: {{ $chapter->title }}</p>
            <p>
                <a href="{{ route('teacher.chapter.program', $chapter->course_id) }}"
                    style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xem
                    chi tiết</a>
            </p>
        @endif

    </div>
</div>
