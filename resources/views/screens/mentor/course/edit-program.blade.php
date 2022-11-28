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
                                <a class="nav-link active" href="{{ route('mentor.course.program', $course_id) }}">
                                    <span class="nav-icon"><i class="fas fa-align-left"></i></span>
                                    <span class="nav-text">Chương Trình Học</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mentor.course.edit', $course_id) }}">
                                    <span class="nav-icon"><i class="far fa-bookmark"></i></span>
                                    <span class="nav-text">Thông Tin Khóa Học</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                    {{-- <a href="{{route('mentor/chapter/create', $chapter->id )}}">Tạo mới chương học</a> --}}
                    <div class="d-flex align-items-center p-4 justify-content-center mb-5" style="column-gap:15px">
                        <button type="button" class="btn btn-outline-primary btn-pill"

                            onclick="showAjaxModal('{{ route('mentor.chapter.create') }}','Thêm chương học')"
                            data-toggle="modal" data-target="#modal-example"><i class="fas fa-plus"></i> Thêm chương
                            học</button>
                        {{-- <button type="button" class="btn btn-outline-primary btn-pill"
                            onclick="showAjaxModal('{{ route('mentor.lesson.create') }}','Thêm bài học')"
                            data-toggle="modal" data-target="#modal-example"><i class="fas fa-plus"></i> Thêm bài
                            học</button> --}}
                        <button type="button" class="btn btn-outline-primary btn-pill"
                            onclick="showAjaxModal('{{ route('mentor.chapter.showSort', ['course' => $course_id]) }}','Sắp xếp chương học')"
                            data-toggle="modal" data-target="#modal-example"><i class="fas fa-sort-amount-down-alt"></i>
                            Sắp xếp chương học</button>
                    </div>
                    <div>
                        <h1>Danh sách Chương học của {{ $course_id }}</h1>
                        <div>
                            @foreach ($chapters as $chapter)
                            {{-- @dd($chapter->id); --}}
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6" >
                                    <!--begin::Card-->
                                    <div class="card card-custom gutter-b card-stretch" >
                                        <!--begin::Body-->
                                        <a class="card-body pt-4 ribbon ribbon-right"
                                            href="{{ route('mentor.lesson.list', $chapter->id) }}">
                                            <div class="ribbon-target bg-primary" style="top: 10px; right: -2px;">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">{{ $chapter->active }}</font>
                                                </font>
                                            </div>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-7"
                                                style="aspect-ratio:1/1;overflow:hidden">
                                                <img src="{{ $chapter->image }}"
                                                    style="width: 100%;height:100%;object-fit:cover" alt="image">
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Desc-->
                                            <h4 class="mb-7 font-weight-bold"><a class="text-dark text-hover-primary"
                                                    href="">{{ $chapter->title }}</a> </h4>
                                            <!--end::Desc-->
                                            <!--begin::Info-->
                                            <div class="mb-7">

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-dark-75 mr-2">Số lượng bài học</span>
                                                    <span
                                                        class="text-dark font-weight-bolder font-weight-bold">{{ $chapter->number_chapter }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-dark-75 mr-2">Số bài học đã upvideo</span>
                                                    <span
                                                        class="text-dark font-weight-bolder font-weight-bold">{{ $chapter->lessons->count() }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-dark-75 mr-2">Giảng viên phụ trách</span>
                                                    <span class="text-dark font-weight-bolder font-weight-bold">{{$chapter->mentor_id}}</span>
                                                </div>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::Body-->
                                    </div>
                                    <!--end:: Card-->
                                </div>
                            @endforeach

                        </div>

                    </div>


                    {{-- @include('components.mentor.course.list-program') --}}

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
                    window.location.href = _redirect
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
