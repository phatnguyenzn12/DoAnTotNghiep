<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào {{ $chapter_old->mentor->name }}</h1>
        <h2>Chương học: {{$chapter_old->title}} của bạn đã được giao cho giáo viên khác</h2>
        <p>
            <a href="{{route('teacher.chapter.program',['mentor_id' => $chapter_old->mentor->id])}}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xem thêm</a>
        </p>

    </div>
</div>