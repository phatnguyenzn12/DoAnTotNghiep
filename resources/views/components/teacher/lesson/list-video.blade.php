    <table class="table table-separate table-head-custom table-checkable">
        <thead>
            <tr>
                <th>Tên khóa học</th>
                <th>Tên bài học</th>
                <th>Nội dung</th>
                <th>Video</th>
                {{-- <th>Công khai</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->chapter->course->title }}</td>
                    <td>{{ $lesson->title }}</td>
                    <td>{{ $lesson->content }}</td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-example"
                            onclick="showModal({{ $lesson->lessonVideo->video_path }})">Xem
                            video</button>
                    </td>
                    {{-- <th>
                        @if ($lesson->lessonVideo->is_demo == 1)
                            <span class="label label-lg label-light-success label-inline">Học
                                thử</span>
                        @else
                            <span class="label label-lg label-light-danger label-inline">Không học
                                thử</span>
                        @endif
                    </th> --}}
                </tr>
            @endforeach
        </tbody>
        @php
            $pagination = $lessons;
        @endphp
    </table>
    <div class="p-3 mb-5 card">
        @include('components.admin.pagination-basic')
    </div>
