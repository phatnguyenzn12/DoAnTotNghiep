<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào {{ $chapter->mentor->name }}</h1>
        <h2>Bạn đã được giao việc upload video bài học cho:</h2>
        <p>Chương: {{$chapter->title}}</p>
        <p>Số lượng bài học trong chương: {{$chapter->number_chapter}}</p>
        <p>
            <a href="{{route('teacher.chapter.program',['mentor_id' => $chapter->mentor->id])}}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Thực hiện</a>
        </p>

    </div>
</div>
