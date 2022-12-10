    <table class="table table-separate table-head-custom table-checkable">
        <thead>
            <tr>
                <th>Tên khóa học</th>
                <th>Tên bài học</th>
                <th>Video</th>
                <th>Công khai</th>
                <th>Active</th>
                <th>Bài học
                    <span>
                        <p hidden>{{ $item = 0 }}</p>
                        @foreach ($lessons as $lesson)
                            @if ($lesson->is_edit == 0)
                                <p hidden>{{ $item++ }}</p>
                            @endif
                        @endforeach
                        @if ($item > 0)
                            <a href="{{ route('mentor.lesson.activedAllLesson', $request->chapter_id) }}"
                                onclick="return confirm('Bạn có đồng ý sửa bài học')" class="btn btn-primary">
                                All
                            </a>
                        @endif
                    </span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->chapter->course->title }}</td>
                    <td>{{ $lesson->title }}</td>
                    <td>
                        @if ($lesson->lessonVideo->video_path != 0 && $lesson->time != 0)
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-example"
                                onclick="showModal({{ $lesson->lessonVideo->video_path }})">Xem
                                video</button>
                        @endif
                    </td>
                    <th>
                        @if ($lesson->is_demo == 1)
                            <span class="label label-lg label-light-success label-inline">Học
                                thử</span>
                        @else
                            <span class="label label-lg label-light-danger label-inline">Không học
                                thử</span>
                        @endif
                    </th>
                    <td>

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if ($lesson->is_check == 0)
                                    chưa được kiểm duyệt
                                @elseif($lesson->is_check == 2)
                                    Cần Sửa lại
                                @else
                                    đã đc kiểm duyệt
                                @endif
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                    href="{{ route('mentor.lesson.actived_id', ['lesson' => $lesson->id, 'check' => 0]) }}"
                                    onclick="return confirm('bài học chưa được kiểm duyệt')"
                                    class="btn btn-success">chưa được kiểm duyệt </a>
                                <a class="dropdown-item"
                                    href="{{ route('mentor.lesson.actived_id', ['lesson' => $lesson->id, 'check' => 2]) }}"
                                    onclick="return confirm('Bài học cần sửa lại')" class="btn btn-danger">Cần Sửa
                                    lại</a>
                                <a class="dropdown-item"
                                    href="{{ route('mentor.lesson.actived_id', ['lesson' => $lesson->id, 'check' => 1]) }}"
                                    onclick="return confirm('bài học đã đc kiểm duyệt')" class="btn btn-danger">đã đc
                                    kiểm duyệt</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if ($lesson->is_edit == 1)
                            <a href="{{ route('mentor.lesson.activedLesson', ['lesson' => $lesson->id, 'check' => 0]) }}"
                                onclick="return confirm('Bạn có chắc không sửa bài học')" class="btn btn-danger">
                                Không đồng ý
                            </a>
                        @else
                            <a href="{{ route('mentor.lesson.activedLesson', ['lesson' => $lesson->id, 'check' => 1]) }}"
                                onclick="return confirm('Bạn có chắc sửa bài học')" class="btn btn-success">
                                Đồng ý sửa bài học
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        @php
            $pagination = $lessons
        @endphp
    </table>
    <div class="p-3 mb-5 card">
        @include('components.admin.pagination-basic')
    </div>