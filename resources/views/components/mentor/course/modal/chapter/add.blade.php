<form action="{{ route('mentor.chapter.add') }}" class="form has-validation-ajax" method="POST">
    @csrf
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Tên chương học</label>
        <input type="text" name="title" placeholder="Nhập tên chương học..." class="form-control">
        <p class="text-danger errors title"></p>
    </div>

    <div class="form-group">
        <label>Số lượng bài học</label>
        <input type="number" name="number" placeholder="Nhập số lượng bài học..." class="form-control">
        <p class="text-danger errors number"></p>
    </div>

    <div class="form-group">
        <label for="">Giáo viên</label>
        <select name="mentor_id" id="" class="form-control">
            <option value="">--.--</option>
            @foreach ($mentor as $gv)
                @if ($gv->hasRole('teacher'))
                    <option value="{{ $gv->id }}">{{ $gv->name }}</option>
                @endif
            @endforeach
        </select>
        <p class="text-danger errors mentor_id"></p>
    </div>
    <input type="text" name="course_id" value="{{ $course_id }}" hidden>
    </div>
    <button type="submit"  class="btn btn-primary font-weight-bold">Thêm</button>
</form>


