<form action="{{ route('admin.course.deactiveCourse', ['course' => $course_id]) }}" method="post">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="" class="form-label">Lý do ngừng hoạt động</label>
        <input type="text" name="status" hidden value="1">
        <textarea type="text" name="content" placeholder="Nhập nội dung" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary font-weight-bold">Gửi</button>
</form>
