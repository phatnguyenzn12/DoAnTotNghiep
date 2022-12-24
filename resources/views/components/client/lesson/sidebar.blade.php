<!-- Collapse button START -->
<button class="navbar-toggler btn btn-white mt-4 plyr-toggler" type="button" data-bs-toggle="collapse"
    data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
    <span class="navbar-toggler-animation">
        <span></span>
        <span></span>
        <span></span>
    </span>
</button>
<!-- Collapse button END -->

<!-- Collapse body START -->
<div class="collapse-horizontal collapse show" id="collapseWidthExample">
    <div class="card vh-100 overflow-auto rounded-0 w-280px w-sm-400px">





        @if (auth()->guard('mentor')->user())
            <!-- Title -->
            <div class="card-header bg-light rounded-0">
                <h1 class="mt-2 fs-5">khóa học: {{ $course->title }}</h1>
            </div>
        @else
            <!-- Title -->
            <div class="card-header bg-light rounded-0">
                <h1 class="mt-2 fs-5">Hoành thành khóa học {{ $course->title }}:
                    <br>
                    {{ $course->number_lessons_complete }} bài học
                    trên {{ $course->lessons->count() }}
                </h1>
                <form action="{{ route('client.certificate.getCertificate', $course->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary mb-0">Nhận chứng chỉ</button>
                </form>
                <div class="overflow-hidden">
                    <h6 class="mb-0 text-end">{{ $course->progress }}%</h6>
                    <div class="progress progress-sm bg-primary bg-opacity-10">
                        <div class="progress-bar bg-primary aos" role="progressbar" data-aos="slide-right"
                            data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out"
                            style="width: {{ $course->progress }}%" aria-valuenow="{{ $course->progress }}"
                            aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>

            </div>
        @endif

        <div class="bg-light p-3 rounded d-flex">
            <div class="avatar avatar-sm flex-shrink-0">
                <a href="#"><img class="avatar-img rounded-circle" src="{{asset('app/'. $course->mentor->avatar)}}"
                        alt=""></a>
            </div>
            <div class="mx-3">
                <div class="me-2">
                    <h6 class="mb-1 lead fw-bold"> <a href="#!">
                        {{ $course->mentor->name }} </a></h6>
                    <p class="mb-0 mt-1">Giảng viên của khóa học
                    </p>
                </div>
            </div>
        </div>

        <!-- Course content START -->
        <div class="card-body">

            <!-- Course START -->
            <div class="row">
                <div class="col-12">
                    <!-- Accordion START -->
                    <div class="accordion accordion-flush-light accordion-flush" id="accordionExample">
                        @forelse ($chapters as $index => $chapter)
                            @if ($chapter->lessons->isEmpty() == false ? $chapter : [])
                                <!-- Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $chapter->id }}"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            <span class="mb-0 fw-bold">Chương {{ ++$index }}.
                                                {{ $chapter->title }}</span>
                                        </button>


                                    </h2>
                                    <div id="collapseOne{{ $chapter->id }}" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body px-3">
                                            <div class="vstack gap-3">
                                                @forelse ($chapter->lessons as $indexLesson => $lesson)
                                                    <!-- Course lecture -->
                                                    <div>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <div class="position-relative d-flex align-items-center">
                                                                @if (auth()->guard('mentor')->user())
                                                                    <a href="{{ route('client.lesson.show', ['course' => $course->id, 'lesson' => $lesson->id]) }}"
                                                                        class="btn btn-round btn-sm mb-0 stretched-link position-static btn-danger-soft remove-all-click">
                                                                        <i class="fas fa-play me-0"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('client.lesson.show', ['course' => $course->id, 'lesson' => $lesson->id]) }}"
                                                                        class="btn btn-round btn-sm mb-0 stretched-link position-static {{ $lesson->check_lesson_user->contains(auth()->user()->id) == true ? 'btn-danger-soft remove-all-click' : 'btn-secondary' }}">
                                                                        @if ($lesson->check_lesson_user->contains(auth()->user()->id) == true)
                                                                            <i class="fas fa-play me-0"></i>
                                                                        @else
                                                                            <i class="bi bi-lock-fill"></i>
                                                                        @endif
                                                                    </a>
                                                                @endif

                                                                <span
                                                                    class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px">Bài
                                                                    {{ ++$indexLesson }}. {{ $lesson->title }}</span>
                                                            </div>
                                                            <p class="mb-0 text-truncate">{{ $lesson->time }}</p>
                                                        </div>

                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @if ($chapter->checkChapterReview() == null)
                                        <button class="btn btn-success mb-3" data-toggle="modal"
                                            data-bs-target="#modal-example"data-bs-toggle="modal"
                                            data-bs-target="#viewReview"
                                            onclick="showAjaxModal('{{ route('client.chapter.getChapter', ['mentor' => $chapter->mentor_id,'chapter' => $chapter->id]) }}','Đánh giá chương học: {{ $chapter->title }}')">
                                            Đánh
                                            giá chương học</button>
                                    @else
                                        <button class="btn btn-success mb-3" data-toggle="modal"
                                            data-bs-target="#modal-example"data-bs-toggle="modal"
                                            data-bs-target="#viewReview"
                                            onclick="showAjaxModal('{{ route('client.chapter.getEditReview', ['chapterReview' => $chapter->chapterReview->id]) }}','Sửa đánh giá chương học: {{ $chapter->title }}')">
                                            <i class="fas fa-pen-nib"></i> sửa đánh giá</button>
                                    @endif --}}

                                </div>
                                <!--end Item -->
                            @endif
                        @empty

                        @endforelse
                    </div>

                </div>
                <!-- Accordion END -->
            </div>
        </div>
        <!-- Course END -->
    </div>
    <!-- Course content END -->

    <div class="card-footer">
        <div class="d-grid">
            <a href="{{ route('client') }}" class="btn btn-primary mb-0">Thoát khỏi khóa học</a>
        </div>
    </div>
</div>
</div>
<!-- Collapse body END -->
