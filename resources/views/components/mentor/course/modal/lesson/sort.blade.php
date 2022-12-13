<form action="{{route('mentor.lesson.sort',$chapter->id)}}" class="has-validation-ajax" method="POST">
    @csrf
    @method('PUT')
    <div class="card bg-light card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h4 class="card-label">
                    Chương học: {{ $chapter->title }}
                </h4>
            </div>
        </div>
        <div class="card-body lessons">
            @foreach ($chapter->lessons()->orderBy('sort')->get() as $lesson)
                <div class="col-md-12 mb-3">
                    <input type="hidden" name="lessons[]" value="{{ $lesson->id }}">
                    <span class="bg-white d-flex p-5 d-flex justify-content-between align-content-center">
                        <p class="lession-name">Bài học {{ $lesson->sort }}: {{ $lesson->title }}</p>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
    <button type="submit" class="btn btn-primary d-block m-auto">Lưu lại</button>
</form>
<script>
    $(document).ready(function() {
        $('.card-body.lessons').sortable({
            cursor: "move"
        })
    })
</script>
