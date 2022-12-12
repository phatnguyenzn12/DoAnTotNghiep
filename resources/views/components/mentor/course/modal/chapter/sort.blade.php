<form action="{{ route('mentor.chapter.sort', ['course' => $course->id]) }}" class="has-validation-ajax" method="POST">
    @csrf
    @method('PUT')
    <div class="card bg-light card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h4 class="card-label">
                    Khóa học: {{ $course->title }}
                </h4>
            </div>
        </div>
        <div class="card-body chapters">
            @foreach ($course->chapters()->orderBy('sort')->get() as $chapter)
                <div class="col-md-12 mb-3">
                    <input type="hidden" name="chapters[]" value="{{ $chapter->id }}">
                    <span class="bg-white d-flex p-5 d-flex justify-content-between align-content-center">
                        <p class="lession-name">Chương học {{ $chapter->sort }}: {{ $chapter->title }}</p>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
    <button type="submit" class="btn btn-primary d-block m-auto">Lưu lại</button>
</form>
<script>
    $(document).ready(function() {
        $('.card-body.chapters').sortable({
            cursor: "move"
        })
    })
</script>
