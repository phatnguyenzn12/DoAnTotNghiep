<div class="">
    @php
        $pagination = $chapters;
    @endphp
    <div class="p-3 mb-5 card">
        @include('components.admin.pagination-basic')
    </div>

    @foreach ($chapters as $key => $chapter)
        <div class="card bg-light card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h4 class="card-label">
                        Tên chương học: <span>{{ $chapter->title }}</span>
                    </h4>
                </div>
            </div>
            <div class="card-body">
                @foreach ($chapter->lessons()->get() as $keyLesson => $lesson)
                    <div class="col-md-12 mb-3 ribbon ribbon-right">
                        @if ($lesson->is_edit == 1)
                            <div class="ribbon-target bg-primary" style="top: -20px; left: -2px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{ $lesson->edit_exit }}
                                    </font>
                                </font>
                            </div>
                        @else
                            <div class="ribbon-target bg-danger" style="top: -20px; left: -2px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{ $lesson->edit_exit }}
                                    </font>
                                </font>
                            </div>
                        @endif
                        <span class="bg-white d-flex p-5 d-flex justify-content-between align-items-center">
                            <p class="lession-name m-0 font-weight-bold">
                                @if ($lesson->lesson_type == 'exercise')
                                    <i class="fas fa-file"></i>
                                @elseif ($lesson->lesson_type == 'video')
                                    <i class="fab fa-youtube"></i>
                                @endif
                                Bài học {{ $keyLesson + 1 }} : {{ $lesson->title }}
                            </p>

                            <p class="lession-tool m-0">
                                @if ($lesson->is_edit != 0)
                                    <a class="">
                                        <span>
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-example"
                                                onclick="showModal('{{ $lesson->lessonVideo->video_path }}','Xem video')">Xem
                                                video</button>
                                        </span>
                                        <span>
                                            {{ $lesson->lessonVideo->time }}
                                        </span>
                                    </a>
                                @endif

                                <a data-toggle="modal" data-target="#modal-example" 
                                onclick="showAjaxModal('{{ route('admin.course.formEditLesson',$lesson->id) }}','Thêm mới video')"
                                    class="btn btn-text-dark-50 btn-icon-primary font-weight-bold btn-hover-bg-light">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a data-toggle="modal" data-target="#modal-example" onclick="showAjaxModal('{{ route('admin.course.detailLesson', $lesson->id) }}','Chi tiết bài học')"
                                    class="btn btn-text-dark-50 btn-icon-primary font-weight-bold btn-hover-bg-light">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Info-circle.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                    r="10" />
                                                <rect fill="#000000" x="11" y="10" width="2"
                                                    height="7" rx="1" />
                                                <rect fill="#000000" x="11" y="7" width="2"
                                                    height="2" rx="1" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                            </p>
                        </span>
                    </div>
                    @if ($lesson->type == 'exercise')
                        <div class="col-md-12 mb-3">
                            <div class="col-md-11 offset-1 p-0">
                                <span class="bg-white d-flex p-5 d-flex justify-content-between align-items-center">
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
