<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        @if (isset($lesson))
            <h1>Xin chào {{ $lesson->chapter->course->mentor->name }}</h1>
            <h2>Giảng viên: {{ $lesson->chapter->mentor->name }}</h2>
            <p>Yêu cầu chỉnh sửa bài học: {{ $lesson->title }}</p>
            <p>Lý do: {{ $request->edit }}</p>
            <p>
                <a href="{{ route('mentor.lesson.list', $lesson->chapter->id) }}"
                    style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xem
                    chi tiêt</a>
            </p>
        @else
            <h1>Xin chào {{ $chapter->course->mentor->name }}</h1>
            <h2>Giảng viên: {{ $chapter->mentor->name }}</h2>
            <p>Yêu cầu chỉnh sửa các bài học:
                @foreach ($chapter->lessons as $lesson)
                    @if ($lesson->is_edit == 0)
                        <span>{{ $lesson->title }}. </span>
                    @endif
                @endforeach
            </p>
            <p>Lý do: {{ $request->edit }}</p>
            <p>
                <a href="{{ route('mentor.lesson.list', $chapter->id) }}"
                    style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xem
                    chi tiêt</a>
            </p>
        @endif
    </div>
</div>
