<div class="row g-4">
    @forelse ($courses as $course)
    <!-- Card item START -->
    <div class="col-sm-6 col-xl-4">
        <div class="card shadow h-100">
            <!-- Image -->
            <img src="{{asset('app/'.$course->image)}}" class="card-img-top" alt="course image">
            <!-- Card body -->
            <div class="card-body pb-0">
                <!-- Badge and favorite -->
                <div class="d-flex justify-content-between mb-2">
                    <a href="#" class="badge bg-purple bg-opacity-10 text-purple">{{ $course->skill->title }}</a>
                </div>
                <!-- Title -->
                <h5 class="card-title"><a href="{{ route('client.course.show', ['slug' => $course->slug, 'course' => $course->id]) }}">{{$course->title}}</a></h5>
                <p class="mb-2 text-truncate-2">{{$course->content}}
                </p>
                <!-- Rating star -->
                <ul class="list-inline mb-0">
                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                    </li>
                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                    </li>
                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                    </li>
                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                    </li>
                    <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i>
                    </li>
                    <li class="list-inline-item ms-2 h6 fw-light mb-0">4.0/5.0</li>
                </ul>
            </div>
            <!-- Card footer -->
            <div class="card-footer pt-0 pb-3">
                <hr>
                <div class="d-flex justify-content-between">
                    <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>{{ $course->lessons->count() }} (Bài học)</span>
                    <span class="h6 fw-light mb-0">{{number_format($course->price)}}đ</span>
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
