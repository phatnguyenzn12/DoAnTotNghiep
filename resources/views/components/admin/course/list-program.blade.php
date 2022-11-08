@foreach ($chapters as $key => $chapter)
    <div class="card bg-light card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h4 class="card-label">
                    Chương {{ $key + 1 }}: {{ $chapter->title }}
                </h4>
            </div>
            <div class="card-toolbar">
                <div class="card-toolbar">
                    <a data-toggle="modal" data-target="#modal-example"
                        onclick="showAjaxModal('{{ route('admin.chapter.show', $chapter->id) }}' ,'Cập nhật chương học')"
                        class="btn btn-icon btn-sm btn-primary mr-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a data-toggle="modal" data-target="#modal-example"
                        onclick="showAjaxModal('{{ route('admin.lesson.showSort', ['chapter' => $chapter->id]) }}','Sắp xếp bài học')"
                        class="btn btn-icon btn-sm btn-success mr-1">
                        <i class="fas fa-sort-amount-down-alt"></i>
                    </a>
                    <form action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-icon btn-sm btn-danger delete-item">
                            <i class="ki ki-close icon-nm"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            @foreach ($chapter->lessons()->orderBy('sort')->get() as $keyLesson => $lesson)
                <div class="col-md-12 mb-3">
                    <span class="bg-white d-flex p-5 d-flex justify-content-between align-items-center">
                        <p class="lession-name m-0 font-weight-bold">
                            @if ($lesson->lesson_type == 'exercise')
                                <i class="fas fa-file"></i>
                            @elseif ($lesson->lesson_type == 'video')
                                <i class="fab fa-youtube"></i>
                            @endif
                            Bài học {{ $keyLesson + 1 }} : {{ $lesson->title }}
                        </p>
                        <form action="" method="POST" id="delete-lesson1" class="d-inline" hidden>
                            @method('DELETE')
                            @csrf
                        </form>
                        <p class="lession-tool m-0">
                            <a data-toggle="modal" data-target="#modal-example"
                                onclick="showAjaxModal('{{ route('admin.lesson.show', $lesson->id) }}','Cập nhật bài học')"
                                class="btn btn-text-dark-50 btn-icon-primary font-weight-bold btn-hover-bg-light">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-text-warning-50 btn-icon-warning font-weight-bold btn-hover-bg-light">
                                <i class="flaticon-refresh"></i>
                            </button>
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
