<form action="{{ route('mentor.chapter.put', $chapter->id) }}" class="has-validation-ajax" method="POST">
    @csrf
    @method('PUT')
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Tên chương học</label>
        <input type="text" name="title" placeholder="Nhập tên chương học..." class="form-control"
            value="{{ $chapter->title }}">
    </div>
    <p class="text-danger errors title"></p>
    <button type="submit" class="btn btn-primary font-weight-bold">cập nhật</button>
</form>
