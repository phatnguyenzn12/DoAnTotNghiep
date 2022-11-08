<form action="{{ route('admin.chapter.add') }}" class="has-validation-ajax" method="POST">
    @csrf
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Tên chương học</label>
        <input type="text" name="title" placeholder="Nhập tên chương học..." class="form-control">
        <input type="hidden" name="course_id" value="{{$course_id}}">
        <p class="text-danger errors title"></p>
    </div>
    <button type="submit" class="btn btn-primary font-weight-bold">Thêm</button>
</form>

