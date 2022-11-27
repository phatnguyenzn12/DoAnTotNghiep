<p class="text-danger errors system"></p>
<div class="form-group">
    <label>Tên chương học</label>
    <input type="text" name="title" class="form-control"
        value="{{ $chapter->title }}" disabled>
    <label>Số bài học</label>
    <input type="text" name="number_chapter"class="form-control"
        value="{{ $chapter->number_chapter }}" disabled>
    <label>Giáo viên</label>
    <input type="text" name="mentor_id" class="form-control"
        value="{{ $chapter->mentor->name }}" disabled>
</div>