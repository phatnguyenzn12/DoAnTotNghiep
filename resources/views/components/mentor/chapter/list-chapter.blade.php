<div>
    <div class="p-3 mb-5 card">
        @php
            $pagination = $chapters;
        @endphp
        @include('components.admin.pagination-basic')
    </div>
    @foreach ($chapters as $key => $chapter)
        <div class="card bg-light card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h4 class="card-label">
                        Chương {{ $chapter->sort }}: <a>{{ $chapter->title }}</a>
                    </h4>

                </div>
                <div class="card-toolbar">
                    <div class="card-toolbar">
                        <a data-toggle="modal" data-target="#modal-example"
                            onclick="showAjaxModal('{{ route('mentor.chapter.show', $chapter->id) }}' ,'Cập nhật chương học')"
                            class="btn btn-icon btn-sm btn-primary mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a data-toggle="modal" data-target="#modal-example"
                            onclick="showAjaxModal('{{ route('mentor.lesson.showSort', ['chapter' => $chapter->id]) }}','Sắp xếp bài học')"
                            class="btn btn-icon btn-sm btn-success mr-1">
                            <i class="fas fa-sort-amount-down-alt"></i>
                        </a>

                        <button href="{{route('mentor.chapter.delete',$chapter->id)}}"
                            class="btn btn-icon btn-sm btn-danger button-delete">
                            <i class="ki ki-close icon-nm"></i>
                        </button>

                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($chapter->lessons()->get() as $keyLesson => $lesson)
                    <div class="col-md-12 mb-3 ribbon ribbon-right">
                        {{-- <div class="ribbon-target bg-primary" style="top: -20px; left: -2px;">
                            @if ($lesson->lessonVideo->video_path != 0)
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{ $lesson->edit }}
                                    </font>
                                </font>
                            @else
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        {{ $lesson->lessonVideo->video }}
                                    </font>
                                </font>
                            @endif
                        </div> --}}
                        <span class="bg-white d-flex p-5 d-flex justify-content-between align-items-center">
                            <p class="lession-name m-0 font-weight-bold">
                                @if ($lesson->lesson_type == 'exercise')
                                    <i class="fas fa-file"></i>
                                @elseif ($lesson->lesson_type == 'video')
                                    <i class="fab fa-youtube"></i>
                                @endif
                                Bài học {{ $keyLesson + 1 }} : {{ $lesson->title }}
                            </p>
                            {{-- <form action="{{route('mentor.lesson.delete',$chapter->id)}}" method="GET" id="delete-lesson{{ $lesson->id }}" class="d-inline"
                                hidden>
                                @method('DELETE')
                                @csrf
                            </form> --}}
                            <p class="lession-tool m-0">
                                <button type="button" data-toggle="modal"  data-target="#modal-example" onclick="showAjaxModal('{{ route('mentor.lesson.show', $lesson->id) }}','Sửa bài học {{ $lesson->title }}')"
                                    class="btn btn-text-warning-50 btn-icon-warning font-weight-bold btn-hover-bg-light">
                                    <i class="fas fa-pen-square"></i>
                                </button>

                                {{-- <button form="delete-lesson{{ $lesson->id }}"
                                    class="btn btn-text-dark-50 btn-icon-danger font-weight-bold btn-hover-bg-light button-delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button> --}}
                                <button href="{{route('mentor.lesson.delete',$lesson->id)}}"
                                    class="btn btn-icon btn-sm btn-danger button-delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
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
