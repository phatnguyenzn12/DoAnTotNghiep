@extends('layouts.admin.master')

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
                                <a class="nav-link active" href="{{ route('admin.course.program', $course_id) }}">
                                    <span class="nav-icon"><i class="fas fa-align-left"></i></span>
                                    <span class="nav-text">Chương Trình Học</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.course.edit', $course_id) }}">
                                    <span class="nav-icon"><i class="far fa-bookmark"></i></span>
                                    <span class="nav-text">Thông Tin Khóa Học</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($chapters as $key => $chapter)
                        <div class="card bg-light card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4 class="card-label">
                                        Chương {{ $key + 1 }}: {{ $chapter->title }}
                                    </h4>
                                    <h5 class="card-label">
                                        | Giáo viên : {{ $chapter->mentor->name }}, Điểm: {{ $chapter->mentor->point }}
                                    </h5>
                                    <h5 class="card-label">
                                        | Deadline: {{ $chapter->deadline }}
                                    </h5>

                                    @if ($chapter->deadline < now())
                                        <nav class="deadline">
                                            <ul>
                                                <li>
                                                    <input style="backround-color: red;" type="button" value="Quá hạn"
                                                        name="nav_button" id="nav_button" />
                                                    <ul>
                                                        <li><a onclick="alert('Đã trừ 5 điểm')" href="{{route('mentor.teacher.subtract',$chapter->mentor->id )}}">Trừ 5 điểm</a></li>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </nav>
                                    @endif
                                    <p hidden>{{$item=0}}</p>
                                    @foreach($chapter->lessons as $lesson)
                                    @if($lesson->lessonVideo->video_path ==0)
                                        <p hidden>{{$item++}}</p>
                                    @endif
                                    @endforeach
                                    @if ($item==0)
                                        hoàn thành
                                    @endif

                                </div>
                            </div>
                            <div class="card-header">
                                <div class="card-title">
                                    <p hidden>{{ $count = 0 }}</p>
                                    @foreach ($chapter->lessons()->get() as $lesson)
                                        @if ($lesson->lessonVideo->video_path != 0)
                                            <p hidden>{{ $count++ }}</p>
                                        @endif
                                    @endforeach
                                    <p class="card-label">
                                        Giáo viên đã đăng: {{ $count }}
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($chapter->lessons()->get() as $keyLesson => $lesson)
                                    <div class="col-md-12 mb-3 ribbon ribbon-right">
                                        <div class="ribbon-target bg-primary" style="top: -20px; left: -2px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $lesson->lessonVideo->active }}
                                                </font>
                                            </font>
                                        </div>
                                        <span class="bg-white d-flex p-5 d-flex justify-content-between align-items-center">
                                            <p class="lession-name m-0 font-weight-bold">
                                                @if ($lesson->lesson_type == 'exercise')
                                                    <i class="fas fa-file"></i>
                                                @elseif ($lesson->lesson_type == 'video')
                                                    <i class="fab fa-youtube"></i>
                                                @endif
                                                Bài học {{ $keyLesson + 1 }} : {{ $lesson->title }}
                                            </p>
                                            @if ($lesson->lessonVideo->video_path != 0 && $lesson->time != 0)
                                                    <div class="text-center">
                                                        <span>
                                                            <button class="btn btn-primary" data-toggle="modal"
                                                                data-target="#modal-example"
                                                                onclick="showModal({{ $lesson->lessonVideo->video_path }})">Xem
                                                                video</button>
                                                        </span>
                                                        <span>
                                                            {{ $lesson->time }}
                                                        </span>
                                                    </div>
                                                @endif
                                            <form action=""  method="POST" id="delete-lesson1" class="d-inline" hidden>
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                            <p class="lession-tool m-0">
                                                <a data-toggle="modal" data-target="#modal-example"
                                                        onclick="showAjaxModal('{{ route('admin.course.detailLesson', $lesson->id) }}','Bài học')"
                                                        class="btn btn-text-dark-50 btn-icon-primary font-weight-bold btn-hover-bg-light">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Info-circle.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24"
                                                                        height="24" />
                                                                    <circle fill="#000000" opacity="0.3" cx="12"
                                                                        cy="12" r="10" />
                                                                    <rect fill="#000000" x="11" y="10"
                                                                        width="2" height="7" rx="1" />
                                                                    <rect fill="#000000" x="11" y="7"
                                                                        width="2" height="2" rx="1" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </a>
                                                <button form="delete-lesson1"
                                                    class="btn btn-text-dark-50 btn-icon-danger font-weight-bold btn-hover-bg-light delete-item">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </p>
                                        </span>
                                    </div>
                                    @if ($lesson->type == 'exercise')
                                        <div class="col-md-12 mb-3">
                                            <div class="col-md-11 offset-1 p-0">
                                                <span
                                                    class="bg-white d-flex p-5 d-flex justify-content-between align-items-center">
                                                    <p class="lession-name m-0 font-weight-bold"><i
                                                            class="flaticon-questions-circular-button"></i>
                                                        Câu hỏi: 32435</p>
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach

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
