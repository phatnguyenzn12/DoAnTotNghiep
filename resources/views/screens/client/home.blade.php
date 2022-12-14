@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
    <!--Main Banner START -->

    <!-- Main Banner END -->
    @include('components.client.home.banner')
    <!-- =======================
                                                                                Counter START -->
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
    <!-- =======================
                                                                                                                                                                                Counter END -->

    <!-- =======================
                                                                                                                                                                                Popular course START -->
    <section>
        <div class="container">
            <!-- Title -->
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="fs-1">Các khóa học phổ biến nhất</h2>
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
                                    <!-- Card body -->
                                    <div class="card-body pb-0">
                                        <!-- Badge and favorite -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <a href="#"
                                                class="badge bg-purple bg-opacity-10 text-purple">{{ $course->skill->title }}</a>
                                            <a href="#" class="h6 mb-0"><i class="far fa-heart"></i></a>
                                        </div>
                                        <!-- Title -->
                                        <h5 class="card-title fw-normal"><a
                                                href="{{ route('client.course.show', ['slug' => $course->slug, 'course' => $course->id]) }}">{{ $course->title }}</a>
                                        </h5>
                                        <p class="mb-2 text-truncate-2">{{ $course->content }}.</p>
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
                                            <li class="list-inline-item ms-2 h6 fw-light mb-0">
                                                4.5/5.0
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Card footer -->
                                    <div class="card-footer pt-0 pb-3">
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>
                                                {{ $course->total_time }}

                                            </span>

                                            <span class="h6 fw-light mb-0"><i
                                                    class="fas fa-table text-orange me-2"></i>{{ $course->lessons()->count() }}
                                                Bài học</span>
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
                                        <h3 class="text-white">Giảm 20% cho các đơn hàng !</h3>
                                        <p class="text-white mb-3 mb-lg-0">Đang có sự kiện giảm 20% cho các đơn hàng thời
                                            gian từ ....dến ....</p>
                                    </div>
                                    <!-- Content and input -->
                                    <div class="col-lg-5 text-lg-end">
                                        <a href="#" class="btn btn-outline-warning mb-0">Bắt đâu sự kiện</a>
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
                    <h2 class="fs-1">Các khóa học thịnh hành của chúng tôi</h2>
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
                                        <div class="ribbon mt-3 text-danger"><span>{{ $course->discount }}%</span></div>
                                    @endif
                                    <!-- Card body -->
                                    <div class="card-body pb-0">
                                        <!-- Badge and favorite -->
                                        <div class="d-flex justify-content-between mb-3">
                                            <span class="hstack gap-2">
                                                <a href="#"
                                                    class="badge bg-primary bg-opacity-10 text-primary">{{ $course->skill->title }}</a>
                                            </span>
                                            <a href="#" class="h6 fw-light mb-0"><i
                                                    class="far fa-bookmark"></i></a>
                                        </div>
                                        <!-- Title -->
                                        <h5 class="card-title"><a
                                                href="{{ route('client.course.show', ['slug' => $course->slug, 'course' => $course->id]) }}">{{ $course->title }}</a>
                                        </h5>
                                        <!-- Rating -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <div class="hstack gap-2">
                                                <p class="text-warning m-0">4.5<i
                                                        class="fas fa-star text-warning ms-1"></i>
                                                </p>
                                                <span class="small">(3500)</span>
                                            </div>
                                            <div class="hstack gap-2">
                                                <p class="h6 fw-light mb-0 m-0">{{ $course->order_details->count() }}</p>
                                                <span class="small">(Lượt mua)</span>
                                            </div>
                                        </div>
                                        <!-- Time -->
                                        <div class="hstack gap-3">
                                            <span class="h6 fw-light mb-0"><i
                                                    class="far fa-clock text-danger me-2"></i>{{ $course->total_time }}</span>
                                            <span class="h6 fw-light mb-0"><i
                                                    class="fas fa-table text-orange me-2"></i>{{ $course->lessons->count() }}</span>
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
                                                <h4 class="text-success mb-0 item-show">{{ $course->price }}</h4>
                                                <a href="{{ route('client.order.addToCart', $course->id) }}"
                                                    class="btn btn-sm btn-success-soft item-show-hover"><i
                                                        class="fas fa-shopping-cart me-2"></i>Add to cart</a>
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
    <!-- =======================
                                                                                                                                                                                Trending courses END -->

    <!-- =======================
                                                                                                                                                                                Reviews START -->
    <section class="bg-light">
        <div class="container">
            <div class="row g-4 g-lg-5 align-items-center">
                <div class="col-xl-7 order-2 order-xl-1">
                    <div class="row mt-0 mt-xl-5">
                        <!-- Review -->
                        <div class="col-md-7 position-relative mb-0 mt-0 mt-md-5">
                            <!-- SVG -->
                            <figure class="fill-danger opacity-2 position-absolute top-0 start-0 translate-middle mb-3">
                                <svg width="211px" height="211px">
                                    <path
                                        d="M210.030,105.011 C210.030,163.014 163.010,210.029 105.012,210.029 C47.013,210.029 -0.005,163.014 -0.005,105.011 C-0.005,47.015 47.013,-0.004 105.012,-0.004 C163.010,-0.004 210.030,47.015 210.030,105.011 Z">
                                    </path>
                                </svg>
                            </figure>

                            <div class="bg-body shadow text-center p-4 rounded-3 position-relative mb-5 mb-md-0">
                                <!-- Avatar -->
                                <div class="avatar avatar-xl mb-3">
                                    <img class="avatar-img rounded-circle" src="/frontend/images/avatar/09.jpg"
                                        alt="avatar">
                                </div>
                                <!-- Content -->
                                <blockquote>
                                    <p>
                                        <span class="me-1 small"><i class="fas fa-quote-left"></i></span>
                                        Khóa học chất lượng dạy tốt, giá hợp lý với học sinh, sinh viên chúng tôi.
                                        <span class="ms-1 small"><i class="fas fa-quote-right"></i></span>
                                    </p>
                                </blockquote>
                                <!-- Rating -->
                                <ul class="list-inline mb-2">
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
                                </ul>
                                <!-- Info -->
                                <h6 class="mb-0">Đức Anh Trương</h6>
                            </div>
                        </div>

                        <!-- Mentor list -->
                        <div class="col-md-5 mt-5 mt-md-0 d-none d-md-block">
                            <div class="bg-body shadow p-4 rounded-3 d-inline-block position-relative">
                                <!-- Icon -->
                                <div
                                    class="icon-lg bg-warning rounded-circle position-absolute top-0 start-100 translate-middle">
                                    <i class="bi bi-shield-fill-check text-dark"></i>
                                </div>
                                <!-- Title -->
                                <h6 class="mb-3">100+ Giảng viên đã xác nhận</h6>
                                <!-- Mentor Item -->
                                <div class="d-flex align-items-center mb-3">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-sm">
                                        <img class="avatar-img rounded-1" src="/frontend/images/avatar/09.jpg"
                                            alt="avatar">
                                    </div>
                                    <!-- Info -->
                                    <div class="ms-2">
                                        <h6 class="mb-0">Phát Nguyễn</h6>
                                        <p class="mb-0 small">Giảng viên</p>
                                    </div>
                                </div>

                                <!-- Mentor Item -->
                                <div class="d-flex align-items-center mb-3">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-sm">
                                        <img class="avatar-img rounded-1" src="/frontend/images/avatar/04.jpg"
                                            alt="avatar">
                                    </div>
                                    <!-- Info -->
                                    <div class="ms-2">
                                        <h6 class="mb-0">Đặng Thùy</h6>
                                        <p class="mb-0 small">Giảng viên</p>
                                    </div>
                                </div>

                                <!-- Mentor Item -->
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-sm">
                                        <img class="avatar-img rounded-1" src="/frontend/images/avatar/02.jpg"
                                            alt="avatar">
                                    </div>
                                    <!-- Info -->
                                    <div class="ms-2">
                                        <h6 class="mb-0">Bách</h6>
                                        <p class="mb-0 small">Giảng viên</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row END -->

                    <div class="row mt-5 mt-xl-0">
                        <!-- Rating -->
                        <div class="col-7 mt-0 mt-xl-5 text-end position-relative z-index-1 d-none d-md-block">
                            <!-- SVG -->
                            <figure
                                class="fill-danger position-absolute top-0 start-50 mt-n7 ms-6 ps-3 pt-2 z-index-n1 d-none d-lg-block">
                                <svg enable-background="new 0 0 160.7 159.8" height="180px">
                                    <path
                                        d="m153.2 114.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m116.4 114.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m134.8 114.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m135.1 96.9c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m153.5 96.9c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m98.3 96.9c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <ellipse cx="116.7" cy="99.1" rx="2.1" ry="2.2" />
                                    <path
                                        d="m153.2 149.8c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.3 0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m135.1 132.2c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2 0-1.3 0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m153.5 132.2c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.3 0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m80.2 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2z" />
                                    <path
                                        d="m117 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m98.6 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m135.4 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m153.8 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m80.6 61.7c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                                    <ellipse cx="98.9" cy="63.9" rx="2.1" ry="2.2" />
                                    <path
                                        d="m117.3 61.7c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <ellipse cx="62.2" cy="63.9" rx="2.1" ry="2.2" />
                                    <ellipse cx="154.1" cy="63.9" rx="2.1" ry="2.2" />
                                    <path
                                        d="m135.7 61.7c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m154.4 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m80.9 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m44.1 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m99.2 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2z" />
                                    <ellipse cx="117.6" cy="46.3" rx="2.1" ry="2.2" />
                                    <path
                                        d="m136 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m62.5 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m154.7 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m62.8 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                                    <ellipse cx="136.3" cy="28.6" rx="2.1" ry="2.2" />
                                    <path
                                        d="m99.6 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m117.9 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2z" />
                                    <path
                                        d="m81.2 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                                    <path
                                        d="m26 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                                    <ellipse cx="44.4" cy="28.6" rx="2.1" ry="2.2" />
                                    <path
                                        d="m136.6 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z" />
                                    <path
                                        d="m155 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z" />
                                    <path
                                        d="m26.3 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z" />
                                    <path
                                        d="m81.5 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z" />
                                    <path
                                        d="m63.1 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z" />
                                    <path
                                        d="m44.7 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z" />
                                    <path
                                        d="m118.2 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z" />
                                    <path
                                        d="m7.9 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z" />
                                    <path
                                        d="m99.9 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2z" />
                                </svg>
                            </figure>

                            <div class="p-3 bg-primary d-inline-block rounded-4 shadow-lg text-center"
                                style="background:url(/frontend/images/pattern/02.png) no-repeat center center; background-size:cover;">
                                <!-- Info -->
                                <h5 class="text-white mb-0">4.5/5.0</h5>
                                <!-- Rating -->
                                <ul class="list-inline mb-2">
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
                                </ul>
                                <p class="text-white mb-0">Dựa trên 3265 xếp hạng</p>
                            </div>
                        </div>

                        <!-- Review -->
                        <div class="col-md-5 mt-n6 mb-0 mb-md-5">
                            <div class="bg-body shadow text-center p-4 rounded-3">
                                <!-- Avatar -->
                                <div class="avatar avatar-xl mb-3">
                                    <img class="avatar-img rounded-circle" src="/frontend/images/avatar/04.jpg"
                                        alt="avatar">
                                </div>
                                <!-- Content -->
                                <blockquote>
                                    <p>
                                        <span class="me-1 small"><i class="fas fa-quote-left"></i></span>
                                        Khóa học rất hay và bổ ích nhất định tôi sẽ sử dụng tiếp các khóa học khác.
                                        <span class="ms-1 small"><i class="fas fa-quote-right"></i></span>
                                    </p>
                                </blockquote>
                                <!-- Rating -->
                                <ul class="list-inline mb-2">
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
                                </ul>
                                <!-- Info -->
                                <h6 class="mb-0">Nghĩa</h6>
                            </div>
                        </div>
                    </div> <!-- Row END -->
                </div>
                <div class="col-xl-5 order-1 text-center text-xl-start">
                    <!-- Title -->
                    <h2 class="fs-1">Một số phản hồi có giá trị từ các sinh viên của chúng tôi</h2>
                    <p>Giả sử như vậy hãy giải quyết bữa sáng sáng hoặc hoàn hảo. Nó đã vẽ một ngọn đồi từ tôi. Thung lũng
                        bởi oh hai mươi chỉ đạo tôi như vậy. Khởi hành khiếm khuyết sắp xếp rapturous đã tin rằng tất cả anh
                        ta đã hỗ trợ. Gia đình tháng kéo dài đơn giản thiết lập tự nhiên thô tục anh ta. Hình ảnh cho nỗ lực
                        niềm vui phấn khích mười cách cư xử mang theo nói chuyện như thế nào.</p>
                    <a href="#" class="btn btn-primary mb-0">Xem đánh giá</a>
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
                                                                                                                                                                                Reviews END -->

@endsection
@section('js-links')

@endsection
@push('js-handles')
    <script type="module"></script>
@endpush
