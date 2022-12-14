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
    <section class="py-0 position-relative">

        <div class="row g-0">
            <div class="d-flex">

                <div class="overflow-hidden fullscreen-video w-100" id="show-video">
                    @include('components.client.mentor-lesson.video')
                </div>

                <!-- Page content START -->
                <div class="justify-content-end position-relative" id="show-sidebar">
                    @include('components.client.mentor-lesson.sidebar')
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
                                            <a href="#"> <img class="avatar-img rounded-circle"
                                                    src="/frontend/images/avatar/09.jpg" alt=""> </a>
                                        </div>

                                        <form class="w-100 d-flex has-validation-ajax" method="POST"
                                            action="{{ route('client.mentorLesson.parentComment', $lesson->id) }}">
                                            @csrf
                                            <textarea class="one form-control pe-4 bg-light" name="comment" id="autoheighttextarea" rows="1"
                                                placeholder="Thêm bình luận..."></textarea>
                                            <button class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i
                                                    class="fas fa-paper-plane fs-5"></i></button>
                                        </form>
                                    </div>
                                    <div class="comment-show-list">
                                        @include('components.client.mentor-lesson.comment')
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
@endsection
@section('js-links')
<script src="/js/tags.js"></script>
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
                    course_id: {{ $course->id }}
                },
                success: function(res) {
                    $('#modal-example').find('.modal-body').html(res)
                }
            })
        }

        $(document).on('submit', 'form.has-validation-ajax', function(e) {
            e.preventDefault()
            $('#modal-example').find('.modal-body').html(
                '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
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
                    // window.location.href = _redirect
                    $('.comment-show-list').html(res)
                },
                error: function(err) {
                    $('p.errors.system').text('Có lỗi xảy ra, vui lòng thử lại')
                    let errors = err.responseJSON.errors
                    Object.keys(errors).forEach(key => {
                        $(_form).find('.errors.' + key.replace('\.', '')).text(errors[key][0])
                    })
                }
            })
        })

        $(document).on('submit', 'form.has-validation-ajax-child', function(e) {
            e.preventDefault()
            $('#modal-example').find('.modal-body').html(
                '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
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
                    $('p.errors.system').text('Có lỗi xảy ra, vui lòng thử lại')
                    let errors = err.responseJSON.errors
                    Object.keys(errors).forEach(key => {
                        $(_form).find('.errors.' + key.replace('\.', '')).text(errors[key][0])
                    })
                }
            })
        })
    </script>
@endpush
