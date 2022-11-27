<form action="{{ route('teacher.lesson.add') }}" class="has-validation-ajax" method="POST">
    @csrf
    <p class="text-danger errors system"></p>

    <div class="form-group">
        <label>Tên bài học</label>
        <input type="text" class="form-control" placeholder="Nhập tên bài học" name="title">
        <p class="text-danger errors title"></p>
    </div>

    <div class="form-group">
        <label>Chương học</label>
        <select name="chapter_id" id="section_id" class="form-control">
            @foreach ($chapters as $chapter)
                <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
            @endforeach
        </select>
        <p class="text-danger errors section_id"></p>
    </div>

    <div class="form-group">
        <label>Nội dung</label>
        <textarea name="content" class="form-control" placeholder="Nhập nội dung"></textarea>
    </div>

    <div class="form-group" data-select2-id="2">
        <label>Chọn kiểu bài học</label>
        <select class="form-control" name="lesson_type" id="exampleSelect1" onchange="selectLesson(this)">
            <option value="video">Video</option>
            <option value="exercise">Bài tập</option>
        </select>
    </div>

    <div option-lesson></div>

    <button class="btn btn-success d-block m-auto">Thêm bài học</button>
</form>

<script>
    $('[option-lesson]').html(
        `@include('components.mentor.course.modal.lesson.video')`
    )

    function selectLesson(elm) {
        if (elm.value == 'video') {
            $('[option-lesson]').html(
                `@include('components.mentor.course.modal.lesson.video')`
            )
        } else {
            $('[option-lesson]').html(
                `@include('components.mentor.course.modal.lesson.exercise')`
            )
        }
    }
</script>
