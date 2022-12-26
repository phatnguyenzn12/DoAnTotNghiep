@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
    <!--Main Banner START -->

    <!-- Main Banner END -->
    @include('components.client.home.banner')

    <div class="container">
        <h4>Khóa học chất lượng cao được sản xuất bởi Eduport</h4>
        <p>Những khóa học được Eduport sản xuất theo tiêu chuẩn chất lượng cao đối với học tập trực tuyến dựa trên ba trụ
            cột:
            Học liệu chất lượng quốc tế; Giảng viên & chuyên gia chất lượng cao, uy tín, kinh nghiệm; Mô hình học tập đa
            tương
            tác & định hướng kết quả đầu ra được tích hợp công nghệ giáo dục tiên tiến, cập nhật nhất.</p>
    </div>

    <section class="py-0 py-xl-5">
        <div class="container">
            <div class="row g-4">
                <!-- Counter item -->
                <div class="col-sm-6 col-xl-3">
                    <div class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-15 rounded-3">
                        <span class="display-6 lh-1 text-warning mb-0"><i class="fas fa-tv"></i></span>
                        <div class="ms-4 h6 fw-normal mb-0">
                            <div class="d-flex">
                                <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0"
                                    data-purecounter-end="{{ $coursesAll->count() }}"
                                    data-purecounter-delay="{{ $coursesAll->count() }}"></h5>
                                <span class="mb-0 h5">+</span>
                            </div>
                            <p class="mb-0">Các khóa học trực tuyến</p>
                        </div>
                    </div>
                </div>
                <!-- Counter item -->
                <div class="col-sm-6 col-xl-3">
                    <div class="d-flex justify-content-center align-items-center p-4 bg-blue bg-opacity-10 rounded-3">
                        <span class="display-6 lh-1 text-blue mb-0"><i class="fas fa-user-tie"></i></span>
                        <div class="ms-4 h6 fw-normal mb-0">
                            <div class="d-flex">
                                <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0"
                                    data-purecounter-end="{{ $mentorAll->count() }}"
                                    data-purecounter-delay="{{ $mentorAll->count() }}"></h5>
                                <span class="mb-0 h5">+</span>
                            </div>
                            <p class="mb-0">Các gia sư chuyên nghiệp</p>
                        </div>
                    </div>
                </div>
                <!-- Counter item -->
                <div class="col-sm-6 col-xl-3">
                    <div class="d-flex justify-content-center align-items-center p-4 bg-purple bg-opacity-10 rounded-3">
                        <span class="display-6 lh-1 text-purple mb-0"><i class="fas fa-user-graduate"></i></span>
                        <div class="ms-4 h6 fw-normal mb-0">
                            <div class="d-flex">
                                <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0"
                                    data-purecounter-end="{{ $studentAll->count() }}"
                                    data-purecounter-delay="{{ $studentAll->count() }}"></h5>
                                <span class="mb-0 h5">+</span>
                            </div>
                            <p class="mb-0">Các sinh viên đã đăng ký</p>
                        </div>
                    </div>
                </div>
                <!-- Counter item -->
                <div class="col-sm-6 col-xl-3">
                    <div class="d-flex justify-content-center align-items-center p-4 bg-info bg-opacity-10 rounded-3">
                        <span class="display-6 lh-1 text-info mb-0"><i class="bi bi-patch-check-fill"></i></span>
                        <div class="ms-4 h6 fw-normal mb-0">
                            <div class="d-flex">
                                <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0"
                                    data-purecounter-end="{{ $certificateAll->count() }}"
                                    data-purecounter-delay="{{ $certificateAll->count() }}"></h5>
                                <span class="mb-0 h5">+</span>
                            </div>
                            <p class="mb-0">Các khóa học đã được chứng nhận</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <!-- Title -->
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="fs-1">Khoá học mới nhất</h2>
                    <p class="mb-0">Chọn từ hàng trăm khóa học từ các tổ chức chuyên gia</p>
                </div>
            </div>

            <!-- Tabs content START -->
            <div class="tab-content" id="course-pills-tabContent">
                <!-- Content START -->
                <div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel"
                    aria-labelledby="course-pills-tab-1">
                    <div class="row g-4">
                        @forelse($courses as $course)
                            <!-- Card item START -->
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="card shadow h-100">
                                    <!-- Image -->
                                    <img src="{{ asset('app/' . $course->image) }}" class="card-img-top" alt="course image"
                                        style="width: 300px; height: 160px;">
                                    @if ($course->discount != 0)
                                        <div class="ribbon mt-3 text-danger  fs-5"><span>{{ $course->discount }}%</span>
                                        </div>
                                    @endif
                                    <!-- Card body -->
                                    <div class="card-body pb-0">
                                        <!-- Badge and favorite -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <a href="#"
                                                class="badge bg-purple bg-opacity-10 text-purple">{{ $course->skill->title }}</a>
                                        </div>
                                        <!-- Title -->
                                        <h5 class="card-title fw-normal"><a
                                                href="{{ route('client.course.show', ['slug' => $course->slug, 'course' => $course->id]) }}">{{ $course->title }}</a>
                                        </h5>
                                        <p class="mb-2 text-truncate-2">{{ $course->content }}.</p>
                                        <!-- Rating star -->
                                        <ul class="list-inline mb-0">
                                            @for ($i = 1; $i <= (int) $course->current_rating; $i++)
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i>
                                                </li>
                                            @endfor

                                            <li class="list-inline-item ms-2 h6 fw-light mb-0">
                                                {{ $course->current_rating }}/5.0
                                            </li>
                                            <span class="h6 fw-light mb-0"><i
                                                    class="fas fa-table text-orange me-2"></i>{{ $course->lessons()->count() }}
                                                (Bài)
                                            </span>
                                        </ul>
                                    </div>
                                    <!-- Card footer -->
                                    <div class="card-footer pt-0 action-trigger-hover bg-transparent">
                                        <hr>
                                        <!-- Avatar and Price -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Avatar -->
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-1"
                                                        src="{{ asset('app/' . $course->mentor->avatar) }}" alt="avatar">
                                                </div>
                                                <p class="mb-0 ms-2"><a href="#"
                                                        class="h6 fw-light mb-0">{{ $course->mentor->name }}</a></p>
                                            </div>

                                            <!-- Price -->
                                            <div>
                                                <h5 class="text-success mb-0 item-show">
                                                    {{ number_format($course->price) }}đ</h5>

                                                <form action="{{ route('client.order.addToCart', $course->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-success-soft item-show-hover"><i
                                                            class="fas fa-shopping-cart me-1"></i>Thêm vào</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card item END -->
                        @empty
                        @endforelse
                    </div>
                </div>
                <!-- Content END -->
            </div>
            <!-- Card item END -->
        </div>
        <!-- Tabs content END -->
        </div>
    </section>
    <!-- =======================
                                                                                                                                                                                                                                                                                                                    Popular course END -->

    <!-- =======================
                                                                                                                                                                                                                                                                                                                    Action box START -->
    <section class="pt-0 pt-lg-5">
        <div class="container position-relative">
            <!-- SVG decoration START -->
            <figure class="position-absolute top-50 start-50 translate-middle ms-2">
                <svg>
                    <path class="fill-white opacity-4"
                        d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z" />
                    <path class="fill-white opacity-4"
                        d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z" />
                    <path class="fill-white opacity-4"
                        d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z" />
                    <path class="fill-white opacity-4"
                        d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z" />
                </svg>
            </figure>
            <!-- SVG decoration END -->

            <div class="row">
                <div class="col-12">
                    <div class="bg-info p-4 p-sm-5 rounded-3">
                        <div class="row position-relative">
                            <!-- Svg decoration -->
                            <figure class="fill-white opacity-1 position-absolute top-50 start-0 translate-middle-y">
                                <svg width="141px" height="141px">
                                    <path
                                        d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z" />
                                </svg>
                            </figure>
                            <!-- Action box -->
                            <div class="col-11 mx-auto position-relative">
                                <div class="row align-items-center">
                                    <!-- Title -->
                                    <div class="col-lg-7">
                                        <h3 class="text-white">Xem khóa học của Eduport </h3>
                                        <p class="text-white mb-3 mb-lg-0">Các khóa học của Eduport gồm: FrontEnd, BackEnd
                                            và các ngôn ngữ lập trình đa dạng khác nhau</p>
                                    </div>
                                    <!-- Content and input -->
                                    <div class="col-lg-5 text-lg-end">
                                        <a href="{{ route('client.course.list') }}"
                                            class="btn btn-outline-warning mb-0">Tất cả </a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Row END -->
                    </div>
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
                                                                                                                                                                                                                                                                                                                    Action box END -->

    <!-- =======================
                                                                                                                                                                                                                                                                                                                    Trending courses START -->
    <section class="pb-5 pt-0 pt-lg-5">
        <div class="container">
            <!-- Title -->
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="fs-1">Các khóa được mua nhiều nhất</h2>
                    <p class="mb-0">Xem hầu hết 🔥 các khóa học trên thị trường</p>
                </div>
            </div>
            <div class="row">
                <!-- Slider START -->
                <div class="tiny-slider arrow-round arrow-blur arrow-hover">
                    <div class="tiny-slider-inner pb-1" data-autoplay="true" data-arrow="true" data-edge="2"
                        data-dots="false" data-items="3" data-items-lg="2" data-items-sm="1">
                        <!-- Card item START -->
                        @forelse($courses as $course)
                            <div>

                                <div class="card action-trigger-hover border bg-transparent">
                                    <!-- Image -->
                                    <img src="{{ asset('app/' . $course->image) }}" class="card-img-top"
                                        alt="course image" style="width: 400px; height: 215px;">
                                    <!-- Ribbon -->
                                    @if ($course->discount != 0)
                                        <div class="ribbon mt-3 text-danger  fs-5"><span>{{ $course->discount }}%</span>
                                        </div>
                                    @endif
                                    <!-- Card body -->
                                    <div class="card-body pb-0">
                                        <!-- Badge and favorite -->
                                        <div class="d-flex justify-content-between mb-3">
                                            <span class="hstack gap-2">
                                                <a href="#"
                                                    class="badge bg-primary bg-opacity-10 text-primary">{{ $course->skill->title }}</a>
                                            </span>
                                        </div>
                                        <!-- Title -->
                                        <h5 class="card-title"><a
                                                href="{{ route('client.course.show', ['slug' => $course->slug, 'course' => $course->id]) }}">{{ $course->title }}</a>
                                        </h5>
                                        <!-- Rating -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <div class="hstack gap-2">
                                                <p class="text-warning m-0"> {{ $course->current_rating }}<i
                                                        class="fas fa-star text-warning ms-1"></i>
                                                </p>
                                                <span class="small">({{ $course->commentCourses->count() }})</span>
                                            </div>
                                            <div class="hstack gap-2">
                                                <p class="h6 fw-light mb-0 m-0">{{ $course->users->count() }}</p>
                                                <span class="small">(Lượt mua)</span>
                                            </div>
                                        </div>
                                        <!-- Time -->
                                        <div class="hstack gap-3">
                                            {{-- <span class="h6 fw-light mb-0"><i
                                                    class="far fa-clock text-danger me-2"></i>{{ $course->total_time }}</span> --}}
                                            <span class="h6 fw-light mb-0"><i
                                                    class="fas fa-table text-orange me-2"></i>{{ $course->lessons->count() }}
                                                (Bài học)
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Card footer -->
                                    <div class="card-footer pt-0 bg-transparent">
                                        <hr>
                                        <!-- Avatar and Price -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Avatar -->
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-1"
                                                        src="{{ asset('app/' . $course->mentor->avatar) }}"
                                                        alt="avatar">
                                                </div>
                                                <p class="mb-0 ms-2"><a href="#"
                                                        class="h6 fw-light mb-0">{{ $course->mentor->name }}</a></p>
                                            </div>
                                            <!-- Price -->

                                            <div>
                                                <h4 class="text-success mb-0 item-show">
                                                    {{ number_format($course->price) }}đ</h4>
                                                <form action="{{ route('client.order.addToCart', $course->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-success-soft item-show-hover"><i
                                                            class="fas fa-shopping-cart me-1"></i>Thêm vào</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Card item END -->
                    </div>
                </div>
                <!-- Slider END -->
            </div>
        </div>
    </section>

@endsection
@section('js-links')

@endsection
@push('js-handles')
    <script type="module"></script>
@endpush
