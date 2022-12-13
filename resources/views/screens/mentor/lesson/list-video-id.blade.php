@extends('layouts.mentor.master')

@section('title', 'Trang danh sách khóa học')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Danh Sách Video Bài Học | Chương học {{ $chapter->title }}
                            <span class="d-block text-muted pt-2 font-size-sm">Sorting &amp; pagination remote
                                datasource</span>
                        </h3>
                    </div>
                </div>

                {{-- <div class="d-flex align-items-center p-4 justify-content-center mb-5" style="column-gap:15px">
                    <button type="button" class="btn btn-outline-primary btn-pill"
                        onclick="showAjaxModal('{{ route('mentor.lesson.create') }}','Thêm bài học')"
                        data-toggle="modal" data-target="#modal-example"><i class="fas fa-plus"></i> Thêm bài
                        học chuo chươngggg</button>
                </div> --}}

                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" oninput="search(this)" class="form-control"
                                                placeholder="Search..." id="kt_datatable_search_query"
                                                filter-search-title />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Sort:</label>
                                            <select class="form-control" id="kt_datatable_search_status"
                                                onchange="fiterSort(this)">
                                                <option value="0">All</option>
                                                <option value="id_desc">Mới đến cũ</option>
                                                <option value="id_asc">Cũ đến mới</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Demo:</label>
                                            <select class="form-control" id="kt_datatable_search_status"
                                                onchange="fiterDemo(this)">
                                                <option value="0">All</option>
                                                <option value="onl">Học thử</option>
                                                <option value="off">Không học thử</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            <select class="form-control" id="kt_datatable_search_status"
                                                onchange="fiterActive(this)">
                                                <option value="0">All</option>
                                                <option value="active">Đã kiểm duyệt</option>
                                                <option value="in_active">Chưa kiểm duyệt</option>
                                                <option value="fix">Cần sửa lại</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    <div id="table-innerHtml">
                        {{-- <table class="table table-separate table-head-custom table-checkable">
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
                                            @foreach ($chapter->lessons as $lesson)
                                                @if ($lesson->is_edit == 0)
                                                    <p hidden>{{ $item++ }}</p>
                                                @endif
                                            @endforeach
                                            @if ($item > 0)
                                                <a href="{{ route('mentor.lesson.activedAllLesson', $chapter->id) }}"
                                                    onclick="return confirm('Bạn có đồng ý sửa bài học')"
                                                    class="btn btn-primary">
                                                    All
                                                </a>
                                            @endif
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chapter->lessons()->get() as $keyLesson => $lesson)
                                    <tr>
                                        <td>{{ $lesson->chapter->course->title }}</td>
                                        <td>{{ $lesson->title }}</td>
                                        <td>
                                            @if ($lesson->lessonVideo->video_path != 0 && $lesson->time != 0)
                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modal-example"
                                                    onclick="showModal({{ $lesson->lessonVideo->video_path }})">Xem
                                                    video</button>
                                            @endif
                                        </td>
                                        <th>
                                            @if ($lesson->lessonVideo->is_demo == 1)
                                                <span class="label label-lg label-light-success label-inline">Học
                                                    thử</span>
                                            @else
                                                <span class="label label-lg label-light-danger label-inline">Không học
                                                    thử</span>
                                            @endif
                                        </th>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
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
                                                        onclick="return confirm('Bài học cần sửa lại')"
                                                        class="btn btn-danger">Cần Sửa lại</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('mentor.lesson.actived_id', ['lesson' => $lesson->id, 'check' => 1]) }}"
                                                        onclick="return confirm('bài học đã đc kiểm duyệt')"
                                                        class="btn btn-danger">đã đc kiểm duyệt</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($lesson->is_edit == 1)
                                                <a href="{{ route('mentor.lesson.activedLesson', ['lesson' => $lesson->id, 'check' => 0]) }}"
                                                    onclick="return confirm('Bạn có chắc không sửa bài học')"
                                                    class="btn btn-danger">
                                                    Không đồng ý
                                                </a>
                                            @else
                                                <a href="{{ route('mentor.lesson.activedLesson', ['lesson' => $lesson->id, 'check' => 1]) }}"
                                                    onclick="return confirm('Bạn có chắc sửa bài học')"
                                                    class="btn btn-success">
                                                    Đồng ý sửa bài học
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                        {{-- @include('components.admin.pagination') --}}
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

    <!-- modal add section -->

    <!-- Modal-->
    <div class="modal fade" id="modal-example" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xem video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body" style="height: 500px;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js-links')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
@push('js-handles')
    <script></script>
    <script>
        function showModal(id_video) {
            $('#modal-example').find('.modal-body').html(
                '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
            axios.get('https://vimeo.com/api/oembed.json?url=https%3A//vimeo.com/' + id_video)
                .then(
                    res => {
                        console.log(res)
                        $('#modal-example').find('.modal-body').html(res.data.html)
                        $('iframe').css({
                            'width': '100%',
                            'height': '100%',
                        });
                    }
                )
        }

        objFiter = {
            page: 1,
            title: 0,
            record: 10,
            id: 0,
            is_demo: 0,
            is_check: 0,
            chapter_id: {{ $id }},
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('mentor.lesson.listDataLesson') }}',
                timeout: 1000,
                data: obj,

                success: function(res) {
                    $('#table-innerHtml').html(res)
                }
            })
        }
        showAjax(objFiter);

        function search(elemment) {
            objFiter.title = elemment.value
            showAjax(objFiter);
        }

        function fiterSort(elemment) {
            objFiter.id = elemment.value
            showAjax(objFiter);
        }

        function fiterDemo(elemment) {
            objFiter.is_demo = elemment.value
            showAjax(objFiter);
        }

        function fiterActive(elemment) {
            objFiter.is_check = elemment.value
            showAjax(objFiter);
        }

        function pagination(page){
            objFiter.page = page
            showAjax(objFiter);
        }
    </script>
    {{-- @endpush
@push('js-handles') --}}
@endpush
