<!-- Page content START -->
<div class="justify-content-end position-relative">
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
                <h1 class="mt-2 fs-5">The Complete Digital Marketing Course - 12 Courses in 1</h1>
                <h6 class="mb-0 fw-normal"><a href="#">By Jacqueline Miller</a></h6>
            </div>

            <!-- Course content START -->
            <div class="card-body">
                <div class="d-sm-flex justify-content-sm-between">
                    <h5>Course content</h5>
                    <!-- Button -->
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                        data-bs-target="#Notemodal">
                        <i class="bi fa-fw bi-pencil-square me-2"></i>Add note
                    </button>
                </div>
                <hr> <!-- Divider -->

                <!-- Course START -->
                <div class="row">
                    <div class="col-12">
                        <!-- Accordion START -->
                        <div class="accordion accordion-flush-light accordion-flush" id="accordionExample">
                            @forelse ($chapters as $chapter)
                                <!-- Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $chapter->id }}"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            <span class="mb-0 fw-bold">{{ $chapter->title }}</span>
                                        </button>
                                    </h2>
                                    <div id="collapseOne{{ $chapter->id }}" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body px-3">
                                            <div class="vstack gap-3">
                                                @forelse ($chapter->lessons as $lesson)
                                                    <!-- Course lecture -->
                                                    <div>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <div
                                                                class="position-relative d-flex align-items-center">
                                                                <a href="{{ route('client.lesson.index',['course' => $course->id,'lesson' => $lesson->id]) }}"
                                                                    class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                    <i class="fas fa-play me-0"></i>
                                                                </a>
                                                                <span
                                                                    class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px">{{ $lesson->title }}</span>
                                                            </div>
                                                            <p class="mb-0 text-truncate">2m 10s</p>
                                                        </div>

                                                        {{-- <!-- Add note button -->
                                                <a class="btn btn-xs btn-warning" data-bs-toggle="collapse"
                                                    href="#addnote-1" role="button" aria-expanded="false"
                                                    aria-controls="addnote-1">
                                                    View note
                                                </a> --}}

                                                        <!-- Notes START -->
                                                        {{-- <div class="collapse" id="addnote-1">
                                                    <div class="card card-body p-0">

                                                        <!-- Note item -->
                                                        <div
                                                            class="d-flex justify-content-between bg-light rounded-2 p-2 mb-2">
                                                            <!-- Content -->
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge bg-dark me-2">5:20</span>
                                                                <h6
                                                                    class="d-inline-block text-truncate w-40px w-sm-150px mb-0 fw-light">
                                                                    Describe SEO Engine</h6>
                                                            </div>
                                                            <!-- Button -->
                                                            <div class="d-flex">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-light btn-round me-2 mb-0"><i
                                                                        class="bi fa-fw bi-play-fill"></i></a>
                                                                <a href="#"
                                                                    class="btn btn-sm btn-light btn-round mb-0"><i
                                                                        class="bi fa-fw bi-trash-fill"></i></a>
                                                            </div>
                                                        </div>

                                                        <!-- Note item -->
                                                        <div
                                                            class="d-flex justify-content-between bg-light rounded-2 p-2 mb-2">
                                                            <!-- Content -->
                                                            <div class="d-flex align-items-center">
                                                                <span
                                                                    class="badge bg-dark me-2">10:20</span>
                                                                <h6
                                                                    class="d-inline-block text-truncate w-40px w-sm-150px mb-0 fw-light">
                                                                    Know about all marketing</h6>
                                                            </div>
                                                            <!-- Button -->
                                                            <div class="d-flex">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-light btn-round me-2 mb-0"><i
                                                                        class="bi fa-fw bi-play-fill"></i></a>
                                                                <a href="#"
                                                                    class="btn btn-sm btn-light btn-round mb-0"><i
                                                                        class="bi fa-fw bi-trash-fill"></i></a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- Notes END --> --}}

                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end Item -->
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
                <a href="course-detail.html" class="btn btn-primary mb-0">Back to course</a>
            </div>
        </div>
    </div>
</div>
<!-- Collapse body END -->
</div>
<!-- Page content END -->
