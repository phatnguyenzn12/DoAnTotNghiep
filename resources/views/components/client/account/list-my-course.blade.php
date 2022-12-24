<div class="table-responsive border-0">
    <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
        <!-- Table head -->
        <thead>
            <tr>
                <th scope="col" class="border-0 rounded-start">Tên khóa học</th>
                <th scope="col" class="border-0">Tổng bài học</th>
                <th scope="col" class="border-0">Số bài học hoàn thành</th>
                <th scope="col" class="border-0">Hoạt động</th>
                <th scope="col" class="border-0 rounded-end">Chứng chỉ</th>
            </tr>
        </thead>

        <!-- Table body START -->
        <tbody>
            @forelse($courses as $course)
                <!-- Table item -->
                <tr>
                    <!-- Table data -->
                    <td>
                        <div class="d-flex align-items-center">
                            <!-- Image -->
                            <div class="w-100px">
                                <img src="{{ asset('app/' . $course->image) }}" class="rounded" alt="">
                            </div>
                            <div class="mb-0 ms-2">
                                <!-- Title -->
                                <h6><a
                                        href="{{ route('client.course.show', ['slug' => $course['slug'], 'course' => $course['id']]) }}">
                                        {{ $course->title }}</a></h6>
                                <!-- Info -->
                                <div class="overflow-hidden">
                                    <h6 class="mb-0 text-end">{{ $course->progress }}%</h6>
                                    <div class="progress progress-sm bg-primary bg-opacity-10">
                                        <div class="progress-bar bg-primary aos" role="progressbar"
                                            data-aos="slide-right" data-aos-delay="200" data-aos-duration="1000"
                                            data-aos-easing="ease-in-out" style="width: {{ $course->progress }}%"
                                            aria-valuenow="{{ $course->progress }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- Table data -->
                    <td>{{ $course->lessons->count() }}</td>

                    <!-- Table data -->
                    <td>{{ $course->number_lessons_complete }}</td>

                    <!-- Table data -->
                    <td>
                        <a href="{{ route('client.course.show', ['slug' => $course['slug'], 'course' => $course['id']]) }}"
                            class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0"><i
                                class="bi bi-play-circle me-1"></i>Tiếp tục</a>
                    </td>
                    @if ($course->certificate)
                        <td>
                            <a href="{{ route('client.certificate.index', $course->certificate->id) }}"
                                class="btn btn-primary">Xem chứng chỉ</a>
                        </td>
                    @else
                        <td>
                            <a class="btn btn-danger">không chứng chỉ</a>
                        </td>
                    @endif

                </tr>
            @empty
            @endforelse

        </tbody>
        <!-- Table body END -->
    </table>
</div>
@php
    $pagination = $courses;
@endphp
<!-- Pagination START -->
<div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
    <!-- Pagination -->
    <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
        <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
            <li class="page-item mb-0"><a class="page-link" onclick="pagination(1)"><i
                        class="fas fa-angle-double-left"></i></a></li>
            @for ($i = 1; $i <= $pagination->lastPage(); $i++)
                <li class="page-item mb-0"><a class="page-link"
                        onclick="pagination('{{ $i }}')">{{ $i }}</a></li>
            @endfor
            <li class="page-item mb-0"><a class="page-link" onclick="pagination('{{ $pagination->lastPage() }}')"><i
                        class="fas fa-angle-double-right"></i></a>
            </li>
        </ul>
    </nav>
</div>
<!-- Pagination END -->
