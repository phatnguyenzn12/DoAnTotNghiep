@extends('layouts.client.master-lesson')

@section('title', 'Trang chủ')

@section('content')
    <style>
        .block {
            display: block;
        }

        .none {
            display: none;
        }
    </style>
    @if(session('notification_route'))
    <script>
        alert(1);
    </script>
    @endif
    <section class="py-0 position-relative">

        <div class="row g-0">
            <div class="d-flex">

                <div class="overflow-hidden fullscreen-video w-100" id="show-video">
                    @include('components.client.lesson.video')
                </div>

                <!-- Page content START -->
                <div class="justify-content-end position-relative" id="show-sidebar">
                    @include('components.client.lesson.sidebar')
                </div>

            </div>
            <div class="col-12">
                <!-- Tabs START -->
                <ul class="nav nav-pills nav-pills-bg-soft px-3" id="course-pills-tab" role="tablist">
                    <!-- Tab item -->
                    <li class="nav-item me-2 me-sm-4" role="presentation">
                        <button class="nav-link mb-0" id="course-pills-tab-1" data-bs-toggle="pill"
                            data-bs-target="#course-pills-1" type="button" role="tab" aria-controls="course-pills-1"
                            aria-selected="false" tabindex="-1">Tổng quan</button>
                    </li>
                    <!-- Tab item -->
                    <li class="nav-item me-2 me-sm-4" role="presentation">
                        <button class="nav-link mb-0 active" id="course-pills-tab-4" data-bs-toggle="pill"
                            data-bs-target="#course-pills-4" type="button" role="tab" aria-controls="course-pills-4"
                            aria-selected="false" tabindex="-1">Bình luận</button>
                    </li>
                </ul>
                <!-- Tabs END -->

                <!-- Tab contents START -->
                <div class="tab-content pt-4 px-3" id="course-pills-tabContent">
                    <!-- Content START -->
                    <div class="tab-pane fade" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                        <!-- Course detail START -->
                        <!-- About course START -->
                        <div class="col-12">
                            <div class="card border">
                                <!-- Card header START -->
                                <div class="card-header border-bottom">
                                    <h3 class="mb-0">Mô tả khóa học</h3>
                                </div>
                                <!-- Card header END -->

                                <!-- Card body START -->
                                <div class="card-body">
                                    <p class="mb-3">{{ $course->description }}.</p>
                                    <!-- Collapse body -->
                                    <div class="collapse" id="collapseContent">
                                        <p class="my-3">{{ $course->description }}.</p>
                                    </div>
                                    <!-- Collapse button -->
                                    <a class="p-0 mb-0 mt-2 btn-more d-flex align-items-center" data-bs-toggle="collapse"
                                        href="#collapseContent" role="button" aria-expanded="false"
                                        aria-controls="collapseContent">
                                        See <span class="see-more ms-1">more</span><span class="see-less ms-1">less</span><i
                                            class="fas fa-angle-down ms-2"></i>
                                    </a>

                                    <!-- List content -->
                                    <h5 class="mt-4"> Bạn học được gì từ khóa học này?</h5>
                                    <div class="mb-3">
                                        <ul class="list-group list-group-borderless">
                                            @foreach (explode(',', $course->description_details) as $description_detail)
                                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                                        class="fas fa-check-circle text-success me-2"></i>{{ $description_detail }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- Card body START -->
                            </div>
                        </div>
                        <!-- About course END -->

                    </div>
                    <!-- Content END -->
                    <div class="container">

                        <!-- Content START -->
                        <div class="tab-pane fade active show" id="course-pills-4" role="tabpanel"
                            aria-labelledby="course-pills-tab-4">
                            <!-- Review START -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="mb-4">Thảo luận bài học</h5>
                                    <!-- Comment box -->
                                    <div class="d-flex mb-4">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-sm flex-shrink-0 me-2">
                                            @if (auth()->guard('mentor')->user())
                                                <a href="#"> <img class="avatar-img rounded-circle"
                                                        src="{{ asset('app/' .auth()->guard('mentor')->user()->avatar) }}"
                                                        alt="">
                                                </a>
                                            @else
                                                <a href="#"> <img class="avatar-img rounded-circle"
                                                        src="{{ asset('app/' . auth()->user()->avatar) }}" alt="">
                                                </a>
                                            @endif
                                        </div>

                                        <form class="w-100 d-flex has-validation-ajax row" method="POST"
                                            action="{{ route('client.lesson.parentComment', ['lesson' => $lesson->id, 'course' => $course->id]) }}">
                                            @csrf
                                            <div class="col-12">
                                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                                <textarea class="form-control clear-input" name="comment" id="exampleFormControlTextarea1" placeholder="Your review"
                                                    rows="3"></textarea>
                                            </div>
                                            <!-- Button -->
                                            <div class="col-12 mt-3">
                                                <button type="submit" class="btn btn-primary mb-0">Đăng bình
                                                    luận</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mt-4 row">
                                        <div class="row align-items-center">
                                            <div class="col-lg-9 col-xl-8">
                                                <div class="row align-items-center">
                                                    <div class="col-md-4 my-2 my-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <select class="form-control" id="kt_datatable_search_status"
                                                                onchange="fiterSort(this)">
                                                                <option value="0">Sắp xếp theo thời gian</option>
                                                                <option value="id_desc">Mặc định</option>
                                                                <option value="id_desc">Mới đến cũ</option>
                                                                <option value="id_asc">Cũ đến mới</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 my-2 my-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <select class="form-control" id="kt_datatable_search_status"
                                                                onchange="fiterSortReply(this)">
                                                                <option value="0">Sắp xếp trả lời bình luận</option>
                                                                <option value="reply_desc">Trả lời nhiều nhất</option>
                                                                <option value="reply_asc">Trả lời ít ít nhất</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="comment-show-list">

                                    </div>

                                </div>
                                <!-- Review END -->
                            </div>

                        </div>
                        <!-- content END -->

                    </div>
                    <!-- Tab contents END -->
                </div>

    </section>
    @php $id = $lesson->id @endphp
@endsection
@section('js-links')
    <script src="/js/tags.js"></script>
@endsection
@push('js-handles')
    <script>
        function showAjaxModal(url, title) {
            $('#modal-example').find('.modal-body').html(
                `<div class="w-100 d-flex align-content-center p-5 justify-content-center"> <div class="spinner-border text-info spinner-lg p-5  spinner-center m-lg-auto" role="status">
                    <span class="sr-only">Loading...</span>
                  </div> </div>`)
            $('#modal-example').find('.modal-title').text(title)
            $.ajax({
                url: url,
                timeout: 1000,
                data: {
                    course_id: {{ $course->id }}
                },
                success: function(res) {
                    $('#modal-example').find('.modal-body').html(res)
                },
                error: function(err) {
                    Swal.fire(
                        'Có lỗi xảy ra, vui lòng thử lại',
                        err,
                        'error'
                    )
                }
            })
        }

        $(document).on('submit', 'form.has-validation-ajax', function(e) {
            e.preventDefault()
            $('#modal-example').find('.modal-body').html(
                `<div class="w-100 d-flex align-content-center p-5 justify-content-center"> <div class="spinner-border text-info spinner-lg p-5  spinner-center m-lg-auto" role="status">
                    <span class="sr-only">Loading...</span>
                  </div> </div>`)
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
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Bạn gửi thành công bình luận',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('.comment-show-list').html(res)
                    $('.clear-input').value = ""
                },
                error: function(err) {
                    Swal.fire(
                        'Có lỗi xảy ra, vui lòng thử lại',
                        err,
                        'error'
                    )
                }
            })
        })

        $(document).on('submit', 'form.has-validation-ajax-child', function(e) {
            e.preventDefault()
            $('#modal-example').find('.modal-body').html(
                `<div class="w-100 d-flex align-content-center p-5 justify-content-center"> <div class="spinner-border text-info spinner-lg p-5  spinner-center m-lg-auto" role="status">
                    <span class="sr-only">Loading...</span>
                  </div> </div>`)
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
                    $('.modal').find('.modal-body').html(res)
                },
                error: function(err) {
                    Swal.fire(
                        'Có lỗi xảy ra, vui lòng thử lại',
                        err,
                        'error'
                    )
                }
            })
        })

        objFiter = {
            page: 1,
            record: 4,
            id: "id_desc",
            reply: 0,
            lesson_id: {{ $id }},
        }



        function showAjax(obj) {
            $.ajax({
                url: '{{ route('client.lesson.filterComment') }}',
                timeout: 1000,
                data: obj,

                success: function(res) {
                    $('.comment-show-list').html(res)
                },
                error: function(err) {
                    Swal.fire(
                        'Có lỗi xảy ra, vui lòng thử lại',
                        err,
                        'error'
                    )
                }
            })
        }
        showAjax(objFiter);

        function fiterSort(elemment) {
            objFiter.id = elemment.value
            showAjax(objFiter);
        }

        function fiterSortReply(elemment) {
            objFiter.reply = elemment.value
            showAjax(objFiter);
        }

        function pagination(page) {
            objFiter.page = page
            showAjax(objFiter);
        }


        objFiterChild = {
            page: 1,
            course_id: {{ $course->id }}
        }

        function pagination_child(url,page){
            objFiterChild.page = page
            $.ajax({
                url: url,
                timeout: 1000,
                data: objFiterChild,

                success: function(res) {
                    $('#modal-example').find('.modal-body').html(res)
                },
                error: function(err) {
                    Swal.fire(
                        'Có lỗi xảy ra, vui lòng thử lại',
                        err,
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
