<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        @if (isset($course))
            <h1>Xin chào {{ $course->mentor->name }}</h1>
            <p>Khóa học: {{ $course->title }} đã được thêm giá</p>
        @else
            <h1>Xin chào {{ $course_type->mentor->name }}</h1>
            <p>Khóa học: {{ $course_type->title }} đã được duyệt</p>
        @endif
        <p>
            <a href="{{ route('mentor.course.index') }}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xem chi tiết</a>
        </p>
    </div>
</div>
