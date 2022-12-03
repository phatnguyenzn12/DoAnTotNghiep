<form action="{{ route('teacher.lesson.put', $lesson->id) }}" class="has-validation-ajax" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Tên bài học</label>
        <input  type="text" class="form-control" value=" {{ $lesson->title }}" disabled>
    </div>
    <div class="form-group">
        <label >Nội dung</label>
        <textarea name="content" style="padding-bottom: 250px" class="form-control" disabled>{{ $lesson->content }}</textarea>
    </div>

</form>
