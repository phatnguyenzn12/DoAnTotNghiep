<form action="{{ route('mentor.chapter.put', $chapter->id) }}" class="has-validation-ajax" method="POST">
    @csrf
    @method('PUT')
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Tên chương học</label>
        <input type="text" name="title" placeholder="Nhập tên chương học..." class="form-control"
            value="{{ $chapter->title }}">
    </div>
    <div class="form-group">
        <label>Số bài học</label>
        <input type="text" name="number_chapter" placeholder="Nhập số bài học " class="form-control"
            value="{{ $chapter->number_chapter }}">
    </div>
    <div class="form-group">
        <label>Giáo viên</label>
        <select name="mentor_id" id="" class="form-control">
            @foreach ($mentors as $mentor)
                @if ($mentor->hasRole('teacher'))
                    <option value="{{ $mentor->id }}" @selected($mentor->id == $chapter->mentor_id ? true : '')>{{ $mentor->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <p class="text-danger errors title"></p>
    <input type="hidden" index value="{{ $chapter->id }}">
    </div>
    <button type="submit" class="btn btn-primary font-weight-bold">cập nhật</button>
</form>
