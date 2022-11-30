<form action="{{ route('mentor.lesson.add') }}" class="has-validation-ajax" method="POST">
    @csrf
    <p class="text-danger errors system"></p>

    <div class="form-group">
        <label>Tên bài học</label>
        <input type="text" class="form-control" placeholder="Nhập tên bài học" name="title">
        <p class="text-danger errors title"></p>
    </div>

    <div class="form-group">
        <label>Chương học</label>
        <select name="chapter_id" id="section_id" class="form-control">
            @foreach ($chapters as $chapter)
                <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
            @endforeach
        </select>
        <p class="text-danger errors section_id"></p>
    </div>

    <button class="btn btn-success d-block m-auto">Thêm bài học</button>
</form>
