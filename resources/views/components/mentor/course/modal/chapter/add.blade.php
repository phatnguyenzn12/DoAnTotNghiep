<form action="{{ route('mentor.chapter.add') }}" class="has-validation-ajax" method="POST">
    @csrf
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Tên chương học</label>
        <input type="text" name="title" placeholder="Nhập tên chương học..." class="form-control">
        <label>Số lượng bài học </label>
        <input type="number" name="title" placeholder="Nhập số bài học của chương ..." class="form-control">
        <label for="">Giao cho GV</label>
        <select name="" id="">
            <optgroup label="">
                @foreach ($mentor as $cateCourse)
                    <option value="{{ $cateCourse->id }}">{{ $cateCourse->name }}</option>
                @endforeach
            </optgroup>
        </select>
        {{-- <input type="hidden" name="mentor_id" value="{{$mentor_id}}"> --}}
        <input type="hidden" name="course_id" value="{{$course_id}}">
        <p class="text-danger errors title"></p>
    </div>
    <button type="submit" class="btn btn-primary font-weight-bold">Thêm</button>
</form>

