@extends('layouts.mentor.master')

@section('title', 'Trang danh sách người dùng')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header card-header-tabs-line justify-content-center">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('teacher.chapter.program', $course_id) }}">
                                    <span class="nav-icon"><i class="fas fa-align-left"></i></span>
                                    <span class="nav-text">Chương Trình Học</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-body">

                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-xl-12">
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
                                            <label class="mr-3 mb-0 d-none d-md-block">Sắp xếp:</label>
                                            <select class="form-control" id="kt_datatable_search_status"
                                                onchange="fiterSort(this)">
                                                <option value="0">Mặc định</option>
                                                <option value="id_desc">Mới đến cũ</option>
                                                <option value="id_asc">Cũ đến mới</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <form action="{{ route('teacher.chapter.sendProcess', $course_id) }}"
                                                method="post" id="send-notification">
                                                @csrf
                                            </form>
                                            <label class="mr-3 mb-0 d-none d-md-block">Gửi thông báo hoàn thành cho
                                                lead:</label>
                                            <button form="send-notification" class="btn btn-bg-success text-white">Gửi thông
                                                báo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="table-innerHtml"></div>
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
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Đóng</button>
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
        function upload_video() {
            $('#customFile').on('change', function() {
                let form = $('form.has-validation-ajax')[0]
                let data = new FormData(form)
                let _method = $(form).attr('method')
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            console.log(evt);
                            if (evt.lengthComputable) {
                                console.log(evt.lengthComputable);
                                var percentComplete = evt.loaded / evt.total;
                            }
                        }, false);

                        xhr.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                            }
                        }, false);

                        return xhr;
                    },
                    url: '{{ route('teacher.lesson.uploadVideo') }}',
                    timeout: 1000,
                    type: _method,
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        console.log(res);
                    }
                })

                // let data = new FormData(this)
            })
        }

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
                    // upload_video()
                }
            })
        }

        $(document).on('submit', 'form.has-validation-ajax', function(e) {
            e.preventDefault()
            $('#progress_video').html(`
            <div class="progress mt-3">
                <div  class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
            style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>`)
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
                    $('#progress_video').html(`
            <div class="progress mt-3">
                <div  class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
            style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>  `)
                    setTimeout(() => {
                            window.location.href = _redirect
                        },
                        1000);

                },
                error: function(err) {
                    Swal.fire(
                        'Có lỗi xảy ra, vui lòng thử lại',
                        err,
                        'error'
                    )
                    $('#progress_video').html(` `);
                    let errors = err.responseJSON.errors
                    Object.keys(errors).forEach(key => {
                        $(_form).find('.errors.' + key.replace('\.', '')).text(errors[key][0])
                    })
                }
            })
        })



        function showModal(id_video, title) {
            $('#modal-example').find('.modal-title').text(title)
            $('#modal-example').find('.modal-body').html(
                '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
            axios.get('https://vimeo.com/api/oembed.json?url=https%3A//vimeo.com/' + id_video)
                .then(
                    res => {
                        $('#modal-example').find('.modal-body').html(res.data.html)
                        $('iframe').css({
                            'width': '100%',
                            'height': '100%',
                        });
                    }
                )
                .catch(
                    res => {
                        Swal.fire(
                            'chưa tải xong video, vui lòng đợi',
                            res.message,
                            'error'
                        )
                    }
                )
        }

        function checkvideo(url, id_video) {
            let _redirect = $(this).data('redirect') ?? ""
            axios.get('https://vimeo.com/api/oembed.json?url=https%3A//vimeo.com/' + id_video)
                .then(
                    res => {
                        console.log(res);
                        const date = new Date(null);
                        date.setSeconds(res.data.duration); // specify value for SECONDS here
                        const time = date.toISOString().slice(11, 19);
                        axios.get(url, {
                            params: {
                                time: time
                            }
                        }).then(
                            (res) => {
                                window.location.href = _redirect
                            }
                        )
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
                url: '{{ route('teacher.chapter.listDataChapter') }}',
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
