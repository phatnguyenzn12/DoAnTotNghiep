<div class="row g-4 justify-content-center">

    @forelse ($courses as $course)
        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="{{asset('app/'.$course->image)}}" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a
                                        href="{{ route('client.course.show', ['slug' => $course->slug, 'course' => $course->id]) }}">{{ $course->title }}</a>
                                </h5>
                                <!-- Wishlist icon -->
                                <a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
                            </div>
                            <!-- Content -->
                            <!-- Info -->
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="far fa-clock text-danger me-2"></i>21h 16m</li>
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="fas fa-table text-orange me-2"></i>{{ $course->lessons->count() }}
                                    bài học</li>
                                <li class="list-inline-item h6 fw-light"><i
                                        class="fas fa-signal text-success me-2"></i>{{ $course->participant }}
                                </li>
                            </ul>
                            <!-- Rating -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                                </li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                                </li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                                </li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                                </li>
                                <li class="list-inline-item me-0 small"><i
                                        class="fas fa-star-half-alt text-warning"></i></li>
                                <li class="list-inline-item ms-2 h6 fw-light">4.5/5.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->
    @empty
    @endforelse
    @php
        $pagination = $courses;
    @endphp
</div>
<!-- Course list END -->

<!-- Pagination START -->
<div class="col-12">
    <nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
        <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
            <li class="page-item mb-0"><a class="page-link"  onclick="pagination(1)"><i
                        class="fas fa-angle-double-left"></i></a></li>
            @for ($i = 1; $i <= $pagination->lastPage(); $i++)
                <li class="page-item mb-0"><a class="page-link" onclick="pagination('{{ $i }}')">{{ $i }}</a></li>
            @endfor
            <li class="page-item mb-0"><a class="page-link" onclick="pagination('{{ $pagination->lastPage() }}')"><i class="fas fa-angle-double-right"></i></a>
            </li>
        </ul>
    </nav>
</div>
<!-- Pagination END -->
