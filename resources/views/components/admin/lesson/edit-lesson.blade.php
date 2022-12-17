<form action="#" class="has-validation-ajax" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Tên bài học</label>
        <input type="text" class="form-control" value=" {{ $lesson->title }}" disabled>
    </div>
    <div class="form-group">
        <label>Nội dung</label>
        <textarea name="content" style="padding-bottom: 250px" class="form-control" disabled>{{ $lesson->content }}</textarea>
    </div>
    <div class="form-group">
        <a type="button" class="btn btn-success btn-lg" class="btn btn-success"
            href="{{ route('admin.course.activeIsDemo', $lesson->id) }}"
            onclick="return confirm('Cho xem thử ?')">Xem thử</a>
        <a type="button" class="btn btn-danger btn-lg" class="btn btn-danger"
            href="{{ route('admin.course.deactiveIsDemo', $lesson->id) }}"
            onclick="return confirm('Không cho xem thử ?')">Không xem thử</a>
    </div>

</form>
