@extends('layouts.teacher.master')

@section('title', 'Trang danh sách người dùng')
@section('content')
<form action="{{ route('mentor.lesson.add') }}" class="has-validation-ajax" method="POST">
    @csrf
    <p class="text-danger errors system"></p>

    <div class="form-group">
        <label>Tên bài học</label>
        <input type="text" class="form-control" placeholder="Nhập tên bài học" name="title">
        <p class="text-danger errors title"></p>
    </div>

    <div class="form-group">
        <label>Chương học</label>
        <input type="text" value="{{$chapters->title}}" class="form-control" placeholder="Nhập tên bài học" >
        <input type="hidden" value="{{$chapters->id}}" class="form-control"  name="chapter_id">
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
        `@include('screens.teacher.lesson.video')`
    )

    function selectLesson(elm) {
        if (elm.value == 'video') {
            $('[option-lesson]').html(
                `@include('screens.teacher.lesson.video')`
            )
        } else {
            $('[option-lesson]').html(
                `@include('screens.teacher.lesson.exercise')`
            )
        }
    }
</script>
@endsection
@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
@push('js-handles')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

