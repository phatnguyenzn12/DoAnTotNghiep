<form action="{{ route('mentor.chapter.add') }}" class="has-validation-ajax" method="POST">
    @csrf
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Tên chương học</label>
        <input type="text" name="title" placeholder="Nhập tên chương học..." class="form-control">
    </div>
    <div class="form-group">
        <label>Deadline</label>
        <input type="datetime-local" name="deadline" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Giáo viên</label>
        <select name="mentor_id" id="" class="form-control">
            @foreach ($mentor as $gv)
                @if ($gv->hasRole('teacher'))
                    <option value="{{ $gv->id }}">{{ $gv->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <input type="text" name="course_id" value="{{ $course_id }}">
    <p class="text-danger errors title"></p>
    </div>
    <button type="submit" class="btn btn-primary font-weight-bold">Thêm</button>
</form>
