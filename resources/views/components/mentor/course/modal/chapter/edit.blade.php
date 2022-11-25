<form action="{{ route('mentor.chapter.put', $chapter->id) }}" class="has-validation-ajax" method="POST">
    @csrf
    @method('PUT')
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Tên chương học</label>
        <input type="text" name="title" placeholder="Nhập tên chương học..." class="form-control"
            value="{{ $chapter->title }}">
        <p class="text-danger errors title"></p>
        <label>Số lượng bài học</label>
        <input type="text" name="number_chapter" placeholder="Số lượng bài học..." class="form-control"
            value="{{ $chapter->number_chapter }}">
        <label>Giáo viên phụ trách </label>
        <select name="mentor_id" id="">
            <optgroup label="">
                @foreach ($mentor as $gv)
                    @if ($gv->hasRole('teacher'))
                        <option value="{{ $gv->id }}">{{ $gv->name }}</option>
                    @endif
                @endforeach
            </optgroup>
        </select>
        <input type="hidden" index value="{{$chapter->id}}">
    </div>
    <button type="submit"  class="btn btn-primary font-weight-bold">cập nhật</button>
</form>
