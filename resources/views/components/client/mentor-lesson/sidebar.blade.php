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
        <!-- Title -->
        <div class="card-header bg-light rounded-0">
            <h1 class="mt-2 fs-5">khóa học {{ $course->title }}
            </h1>
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
                                                                <a href="{{ route('client.mentorLesson.show', ['course' => $course->id, 'lesson' => $lesson->id]) }}"
                                                                    class="btn btn-round btn-sm mb-0 stretched-link position-static btn-danger-soft remove-all-click">
                                                                    <i class="fas fa-play me-0"></i>
                                                                </a>
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
            <a href="course-detail.html" class="btn btn-primary mb-0">Thoát khỏi khóa học</a>
        </div>
    </div>
</div>
</div>
<!-- Collapse body END -->
