<form action="{{ route('admin.lesson.put', $lesson->id) }}" class="has-validation-ajax" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <p class="text-danger errors system"></p>

    <div class="form-group">
        <label>Tên bài học</label>
        <input type="text" class="form-control" placeholder="Nhập tên bài học" name="title"
            value="{{ $lesson->title }}">
        <p class="text-danger errors title"></p>
    </div>
    <div class="form-group">
        <label>Chương học</label>
        <select name="chapter_id" id="section_id" class="form-control">
            @foreach ($chapters as $chapter)
                <option value="{{ $chapter->id }}" @selected($chapter->id == $lesson->chapter_id ? true : '')>{{ $chapter->title }}</option>
            @endforeach
        </select>
        <p class="text-danger errors section_id"></p>
    </div>

    <div class="form-group">
        <label>Nội dung</label>
        <textarea name="content" class="form-control" placeholder="Nhập nội dung">{{ $lesson->content }}</textarea>
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

        <div class="form-group">
            <label>Cho học thử</label>
            <select class="custom-select form-control" name="is_demo">
                <option @selected($lesson->lessonVideo->is_demo == 0 ? true:false) value="0">Không học thử</option>
                <option @selected($lesson->lessonVideo->is_demo == 1 ? true:false)  value="1">Học thử</option>
            </select>
            <p class="text-danger errors"></p>
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

    <button class="btn btn-success d-block m-auto">Cập nhật bài học</button>
</form>
