<form action="{{ route('teacher.lesson.put', $lesson->id) }}" class="has-validation-ajax" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
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
    <div id="progress_video">

    </div>
    <div class="mt-5 ">
        <button class=" btn btn-success d-block  m-auto">Thêm mới video</button>
    </div>

</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
    integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

</script>
