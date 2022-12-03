<form action="{{ route('teacher.lesson.put', $lesson->id) }}" class="has-validation-ajax" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <p class="text-danger errors system"></p>
    <input type="text" name="title" value="{{ $lesson->title }}" hidden>
    <input type="text" name="chapter_id" value="{{ $lesson->chapter_id }}" hidden>
    <div class="form-group">
        <label hidden>Nội dung</label>
        <textarea name="content" class="form-control" hidden placeholder="Nhập nội dung">{{ $lesson->content }}</textarea>
    </div>
    <div class="form-group">
        <label>Thời lượng video</label>
        <input type="time" class="form-control" name="time" value="{{ $lesson->time }}">
    </div>
    @if ($lesson->lesson_type == 'video')
        <div class="form-group" video>
            <label>Tải video lên</label>
            <div class="custom-file">
                <input type="file" name="video_path" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <p class="text-danger errors video_url"></p>
        </div>
    @else
        <div class="d-flex align-content-center justify-content-around">
            <div class="form-group">
                <label>Tìm kiếm các câu hỏi</label>
                <input type="text" class="form-control search-quiz" placeholder="Tìm kiếm câu hỏi...">
            </div>
            <div class="form-group">
                <label>Tìm kiếm câu hỏi theo Thẻ</label>
                <input type="text" class="form-control search-quiz" placeholder="Tìm kiếm câu hỏi...">
            </div>
        </div>

        <table class="table" id="style-11" data-scroll="true" data-wheel-propagation="true"
            style="max-height: 400px;overflow-y:auto;display: block">
            <thead>
                <tr>
                    <th style="width:5%">
                        <p>Chọn</p>
                    </th>
                    <th>
                        <p>Câu hỏi</p>
                    </th>
                    <th>
                        <p>Thẻ</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label class="checkbox">
                            <input type="checkbox" value="" name="quizs[]">
                            <span></span></label>
                    </td>
                    <td class="font-weight-bold title">sdasdasd</td>
                    <td class="font-weight-bold">JAVASCRIPT</td>
                </tr>
                <tr>
                    <td>
                        <label class="checkbox">
                            <input type="checkbox" value="" name="quizs[]">
                            <span></span></label>
                    </td>
                    <td class="font-weight-bold title">sdasdasd</td>
                    <td class="font-weight-bold">PHP</td>
                </tr>

            </tbody>
        </table>
        <p class="text-danger errors quizs"></p>
    @endif
    <button class="btn btn-success d-block m-auto">Thêm mới video</button>
</form>
