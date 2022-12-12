<form action="{{ route('teacher.lesson.put', $lesson->id) }}" class="has-validation-ajax" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <p class="text-danger errors system"></p>
    <input type="text" name="title" value="{{ $lesson->title }}" hidden>
    <input type="text" name="chapter_id" value="{{ $lesson->chapter_id }}" hidden>
    <div class="form-group">
        <label hidden>Nội dung</label>
        <textarea name="content" class="form-control" hidden placeholder="Nhập nội dung">{{ $lesson->content }}</textarea>
    </div>
    {{-- <div class="form-group">
        <label>Thời lượng video</label>
        <input type="time" class="form-control" name="time" value="{{ $lesson->time }}">
        <p class="text-danger errors time"></p>
    </div> --}}
    <div class="form-group" video>
        <label>Tải video lên</label>
        <div class="custom-file">
            <input type="file" name="video_path" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <p class="text-danger errors video_path"></p>
    </div>
    <button class="btn btn-success d-block m-auto">Thêm mới video</button>
</form>
