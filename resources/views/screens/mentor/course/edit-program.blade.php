@extends('layouts.mentor.master')
@section('head-links')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
@endsection
@section('title', 'Trang danh sách người dùng')
@section('content')
    <style>
        .deadline ul {
            list-style: none;
        }

        .deadline ul ul {
            display: none;
        }

        .deadline ul li input {
            color: #f1cd39;
            background-color: #e93838;
            border: none;
            border-radius: 10px
        }

        .deadline ul li a:hover {
            color: #e93838;
        }

        .deadline ul li:hover>ul {
            display: block;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header card-header-tabs-line justify-content-center">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('mentor.course.program', $course_id) }}">
                                    <span class="nav-icon"><i class="fas fa-align-left"></i></span>
                                    <span class="nav-text">Chương Trình Học</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mentor.course.edit', $course_id) }}">
                                    <span class="nav-icon"><i class="far fa-bookmark"></i></span>
                                    <span class="nav-text">Sửa thông Tin Khóa Học</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                    <div class="d-flex align-items-center p-4 justify-content-center mb-5" style="column-gap:15px">
                        <button type="button" class="btn btn-outline-primary btn-pill"
                            onclick="showAjaxModal('{{ route('mentor.chapter.create') }}','Thêm chương học')"
                            data-toggle="modal" data-target="#modal-example"><i class="fas fa-plus"></i> Thêm chương
                            học</button>
                        <button type="button" class="btn btn-outline-primary btn-pill"
                            onclick="showAjaxModal('{{ route('mentor.lesson.create') }}','Thêm bài học')"
                            data-toggle="modal" data-target="#modal-example"><i class="fas fa-plus"></i> Thêm bài
                            học</button>
                        <button type="button" class="btn btn-outline-primary btn-pill"
                            onclick="showAjaxModal('{{ route('mentor.chapter.showSort', ['course' => $course_id]) }}','Sắp xếp chương học')"
                            data-toggle="modal" data-target="#modal-example"><i class="fas fa-sort-amount-down-alt"></i>
                            Sắp xếp chương học</button>
                    </div>
                        <div class="mb-12">
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-xl-8">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" oninput="search(this)" class="form-control"
                                                    placeholder="Search..." id="kt_datatable_search_query"
                                                    filter-search-title />
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block">Sort:</label>
                                                <select class="form-control" id="kt_datatable_search_status"
                                                    onchange="fiterSort(this)">
                                                    <option value="0">Mặc định</option>
                                                    <option value="id_desc">Mới đến cũ</option>
                                                    <option value="id_asc">Cũ đến mới</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                                    <a href="#"
                                                        class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($course->chapters->count() != 0)
                                    <div class="col-4">
                                        <form action="{{ route('mentor.course.courseTeach', $course_id) }}" method="POST">
                                            @csrf
                                            <div class="row align-items-center">
                                                <div class="col-md-8 my-2 my-md-0">
                                                    <div class="d-flex align-items-center">
                                                        <select class="form-control" name="mentor_id">
                                                            @if ($course->mentor)
                                                                <option value="{{ $course->mentor->id }}">
                                                                    {{ $course->mentor->name }}</option>
                                                            @else
                                                                <option value="">Chọn giảng viên</option>
                                                            @endif
                                                            @if ($course->mentor)
                                                                @forelse ($teachers as $teacher)
                                                                    @if ($teacher->id != $course->mentor->id)
                                                                        <option value="{{ $teacher->id }}">Tên giảng viên:
                                                                            {{ $teacher->name }}
                                                                            / email: {{ $teacher->email }}</option>
                                                                    @endif
                                                                @empty
                                                                    <option value="">Chưa có giảng viên</option>
                                                                @endforelse
                                                            @else
                                                                @forelse ($teachers as $teacher)
                                                                    <option value="{{ $teacher->id }}">Tên giảng viên:
                                                                        {{ $teacher->name }}
                                                                        / email: {{ $teacher->email }}</option>
                                                                @empty
                                                                    <option value="">Chưa có giảng viên</option>
                                                                @endforelse
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 my-2 my-md-0">
                                                    <div class="d-flex align-items-center">
                                                        <button type="submit"
                                                            class="btn btn-light-primary px-6 font-weight-bold">Gửi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if ($course->mentor_id)
                            <div class="row mb-4">
                                <div class="avatar avatar-xxl position-relative mt-n3">
                                    <img class="avatar-img rounded-circle border border-white border-3 shadow"
                                        src="{{ asset('app/' . $course->mentor->avatar) }}" alt="" width="50px"
                                        height="50px">
                                </div>
                                <div class="my-2">
                                    <h5>Giảng viên: {{ $course->mentor->name }}</h5>
                                </div>
                            </div>
                        @endif

                    <div id="table-innerHtml">

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- modal add section -->
    <!-- Modal-->
    <div class="modal fade" id="modal-example" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Loading...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
    <script>
        function showAjaxModal(url, title) {
            $('#modal-example').find('.modal-title').text(title)
            $('#modal-example').find('.modal-body').html(
                '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
            $.ajax({
                url: url,
                timeout: 1000,
                data: {
                    course: {{ $course_id }}
                },
                success: function(res) {
                    $('#modal-example').find('.modal-body').html(res)
                }
            })
        }
        $(document).on('submit', 'form.has-validation-ajax', function(e) {
            e.preventDefault()
            // $('#modal-example').find('.modal-body').html(
            //     '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
            $(this).find('.errors').text('')
            let _form = $(this)
            let data = new FormData(this)
            let _url = $(this).attr('action')
            let _method = $(this).attr('method')
            let _redirect = $(this).data('redirect') ?? ""
            $.ajax({
                url: _url,
                type: _method,
                data: data,
                contentType: false,
                processData: false,
                success: function(res) {
                    window.location.href = _redirect
                },
                error: function(err) {
                    Swal.fire(
                        'Có lỗi xảy ra, vui lòng thử lại',
                        err,
                        'error'
                    )
                    let errors = err.responseJSON.errors
                    Object.keys(errors).forEach(key => {
                        $(_form).find('.errors.' + key.replace('\.', '')).text(errors[key][0])
                    })
                }
            })
        })

        $(document).on('click', '.button-delete', function(e) {
            e.preventDefault();
            console.log(e)
            let _action = $(this).attr('href');
            let _method = 'POST'
            Swal.fire({
                title: 'Bạn muốn xóa?',
                text: "Nếu bạn xóa sẽ mất dữ liệu này!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'không xóa',
                confirmButtonText: 'Đúng, tôi muốn xóa nó!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: _action,
                        method: _method,
                        success: function(res) {
                            console.log(res);
                            Swal.fire(
                                'xóa thành công!',
                                'Bạn đã xóa thành công .',
                                'success'
                            ).then(function() {
                                window.location.href = ''
                            });
                        },
                        error: function(error) {
                            console.log(error);
                            Swal.fire(
                                'Không xóa được',
                                'xóa đã bị lỗi',
                                'error'
                            )
                        }
                    })
                }

            })
        })


        function showModal(id_video,title) {
            $('#modal-example').find('.modal-title').text(title)
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
                .catch(
                    res => {
                        console.log(res);
                        Swal.fire(
                            'chưa tải xong video, vui lòng đợi',
                            res.message,
                            'error'
                        )
                    }
                )
        }


        objFiter = {
            page: 1,
            title: 0,
            record: 10,
            id: 0,
            course_id: {{ $course_id }},
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('mentor.course.listDataChapter') }}',
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

        function pagination(page) {
            objFiter.page = page
            showAjax(objFiter);
        }
    </script>
@endpush
