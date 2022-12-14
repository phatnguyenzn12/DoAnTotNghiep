<form action="{{ route('mentor.chapter.add') }}" class="form has-validation-ajax" method="POST">
    @csrf
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Tên chương học</label>
        <input type="text" name="title" placeholder="Nhập tên chương học..." class="form-control">
        <p class="text-danger errors title"></p>
    </div>
    <input type="text" name="course_id" value="{{ $course_id }}" hidden>
    </div>
    <button type="submit"  class="btn btn-primary font-weight-bold">Thêm</button>
</form>


