@if (isset($lesson))
    <form action="{{ route('teacher.lesson.editRequest', $lesson->id) }}" class="has-validation-ajax" method="POST"
        enctype="multipart/form-data">
    @else
        <form action="{{ route('teacher.lesson.editAllRequest', $chapter->id) }}" class="has-validation-ajax" method="POST" enctype="multipart/form-data">
@endif
@csrf
@method('PUT')
<p class="text-danger errors system"></p>
<div class="form-group">
    <label>Lý do chỉnh sửa</label>
    <textarea name="edit" class="form-control" placeholder="Nhập lý do"></textarea>
</div>
<button class="btn btn-success d-block m-auto">Gửi yêu cầu</button>
</form>
