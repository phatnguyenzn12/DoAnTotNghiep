@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
    <!-- =======================
                                                            Page content START -->
    <section class="pt-3 pt-xl-5">
        <div class="container" data-sticky-container>
            <div class="row g-4">
                <!-- Main content START -->
                <div class="col-xl-8">

                    <div class="row g-4">
                        <!-- Title START -->
                        <div class="col-12">
                            <!-- Title -->
                            <h2>{{ $course->title }}.</h2>
                            <p>{{ $course->content }}</p>
                            <!-- Content -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i class="fas fa-star me-2"></i>
                                    @if (count($result_vote) == 0)
                                        0
                                    @else
                                        <div hidden>
                                            {{ $resultvote = 0 }}
                                            @foreach ($result_vote as $vote)
                                                {{ $resultvote += $vote->vote }}
                                            @endforeach
                                        </div>
                                        {{ round($resultvote / count($result_vote), 0) }}
                                    @endif
                                    /5.0
                                </li>
                                <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                        class="fas fa-user-graduate me-2"></i>12k Người mua khóa học</li>
                                <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                        class="fas fa-signal me-2"></i>All levels</li>
                                <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                        class="bi bi-patch-exclamation-fill me-2"></i>Last updated 09/2021</li>
                                <li class="list-inline-item fw-light h6"><i class="fas fa-globe me-2"></i>English</li>
                            </ul>
                        </div>
                        <!-- Title END -->

                        <!-- Image and video -->
                        <div class="col-12 position-relative">
                            <div class="video-player rounded-3">
                                <video controls crossorigin="anonymous" playsinline
                                    poster="/frontend/images/videos/poster.jpg">
                                    <source src="/frontend/images/videos/360p.mp4" type="video/mp4" size="360">
                                    <source src="/frontend/images/videos/720p.mp4" type="video/mp4" size="720">
                                    <source src="/frontend/images/videos/1080p.mp4" type="video/mp4" size="1080">
                                    <!-- Caption files -->
                                    <track kind="captions" label="English" srclang="en"
                                        src="/frontend/images/videos/en.vtt" default>
                                    <track kind="captions" label="French" srclang="fr"
                                        src="/frontend/images/videos/fr.vtt">
                                </video>
                            </div>
                        </div>

                        <!-- About course START -->
                        <div class="col-12">
                            <div class="card border">
                                <!-- Card header START -->
                                <div class="card-header border-bottom">
                                    <h3 class="mb-0">Mô tả khóa học</h3>
                                </div>
                                <!-- Card header END -->

                                <!-- Card body START -->
                                <div class="card-body">
                                    <p class="mb-3">{{ $course->description }}.</p>
                                    <!-- Collapse body -->
                                    <div class="collapse" id="collapseContent">
                                        <p class="my-3">{{ $course->description }}.</p>
                                    </div>
                                    <!-- Collapse button -->
                                    <a class="p-0 mb-0 mt-2 btn-more d-flex align-items-center" data-bs-toggle="collapse"
                                        href="#collapseContent" role="button" aria-expanded="false"
                                        aria-controls="collapseContent">
                                        See <span class="see-more ms-1">more</span><span class="see-less ms-1">less</span><i
                                            class="fas fa-angle-down ms-2"></i>
                                    </a>

                                    <!-- List content -->
                                    <h5 class="mt-4"> Bạn học được gì từ khóa học này?</h5>
                                    <div class="mb-3">
                                            <ul class="list-group list-group-borderless">
                                                @foreach (explode(',',$course->description_details) as $description_detail)
                                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                                    class="fas fa-check-circle text-success me-2"></i>{{ $description_detail }}</li>
                                                @endforeach
                                            </ul>
                                    </div>
                                </div>
                                <!-- Card body START -->
                            </div>
                        </div>
                        <!-- About course END -->

                        <!-- Curriculum START -->
                        <div class="col-12">
                            <div class="card border rounded-3">
                                <!-- Card header START -->
                                <div class="card-header border-bottom">
                                    <h3 class="mb-0">Chương trình giảng dạy</h3>
                                </div>
                                <!-- Card header END -->

                                <!-- Card body START -->
                                <div class="card-body">
                                    <div class="row g-5">
                                        <!-- Lecture item START -->
                                        @foreach ($course->chapters as $key => $chapter)
                                            <div class="col-12">
                                                <!-- Curriculum item -->
                                                <h5 class="mb-4">{{ $chapter->title }} (3 lectures)</h5>
                                                @foreach ($chapter->lessons as $key2 => $lesson)
                                                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                                                        <div class="d-flex">
                                                            <a href="#"
                                                                class="btn btn-danger-soft btn-round mb-0"><i
                                                                    class="fas fa-play"></i></a>
                                                            <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                                                                <h6 class="mb-0">{{ $lesson->title }}</h6>
                                                                <p class="mb-2 mb-sm-0 small">10m 56s</p>
                                                            </div>
                                                        </div>
                                                        <!-- Button -->
                                                        @if ($lesson->lessonVideo->is_demo == 1)
                                                            <a href="#" class="btn btn-sm btn-success mb-0">Xem
                                                                thử</a>
                                                        @else
                                                            <a href="#" class="btn btn-sm btn-orange mb-0">Mua khóa
                                                                học</a>
                                                        @endif
                                                    </div>
                                                    <!-- Divider -->
                                                    <hr>
                                                @endforeach
                                            </div>
                                            <!-- Lecture item END -->
                                        @endforeach


                                        <!-- Collapse button -->
                                        <a class="mb-0 mt-4 btn-more d-flex align-items-center justify-content-center"
                                            data-bs-toggle="collapse" href="#collapseCourse" role="button"
                                            aria-expanded="false" aria-controls="collapseCourse">
                                            See <span class="see-more mx-1">more</span><span
                                                class="see-less mx-1">less</span> video<i
                                                class="fas fa-angle-down ms-2"></i>
                                        </a>

                                    </div>
                                </div>
                                <!-- Card body START -->
                            </div>
                        </div>
                        <!-- Curriculum END -->

                        <!-- Content START -->
                        <div class='col-12'>
                            <!-- Review START -->
                            <div class="row mb-4">
                                <h5 class="mb-4">Các đánh giá của sinh viên đã mua khóa học</h5>

                                <!-- Rating info -->
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <div class="text-center">
                                        <!-- Info -->
                                        <h2 class="mb-0">4.5</h2>
                                        <!-- Star -->
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item me-0"><i
                                                    class="fas fa-star-half-alt text-warning"></i></li>
                                        </ul>
                                        <p class="mb-0">(Based on todays review)</p>
                                    </div>
                                </div>

                                <!-- Progress-bar and star -->
                                <div class="col-md-8">
                                    <div class="row align-items-center text-center">
                                        <!-- Progress bar and Rating -->
                                        <div class="col-6 col-sm-8">
                                            <!-- Progress item -->
                                            <div class="progress progress-sm bg-warning bg-opacity-15">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-sm-4">
                                            <!-- Star item -->
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                            </ul>
                                        </div>

                                        <!-- Progress bar and Rating -->
                                        <div class="col-6 col-sm-8">
                                            <!-- Progress item -->
                                            <div class="progress progress-sm bg-warning bg-opacity-15">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-sm-4">
                                            <!-- Star item -->
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="far fa-star text-warning"></i></li>
                                            </ul>
                                        </div>

                                        <!-- Progress bar and Rating -->
                                        <div class="col-6 col-sm-8">
                                            <!-- Progress item -->
                                            <div class="progress progress-sm bg-warning bg-opacity-15">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-sm-4">
                                            <!-- Star item -->
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="far fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="far fa-star text-warning"></i></li>
                                            </ul>
                                        </div>

                                        <!-- Progress bar and Rating -->
                                        <div class="col-6 col-sm-8">
                                            <!-- Progress item -->
                                            <div class="progress progress-sm bg-warning bg-opacity-15">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-sm-4">
                                            <!-- Star item -->
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="far fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="far fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="far fa-star text-warning"></i></li>
                                            </ul>
                                        </div>

                                        <!-- Progress bar and Rating -->
                                        <div class="col-6 col-sm-8">
                                            <!-- Progress item -->
                                            <div class="progress progress-sm bg-warning bg-opacity-15">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-sm-4">
                                            <!-- Star item -->
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-0 small"><i
                                                        class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="far fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="far fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="far fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-0 small"><i
                                                        class="far fa-star text-warning"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Review END -->

                            <!-- Student review START -->
                            <div class="row">
                                <!-- Review item START -->
                                <div class="d-md-flex my-4">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xl me-4 flex-shrink-0">
                                        <img class="avatar-img rounded-circle" src="/frontend/images/avatar/09.jpg"
                                            alt="avatar">
                                    </div>
                                    <!-- Text -->
                                    <div>
                                        <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                            <h5 class="me-3 mb-0">Jacqueline Miller</h5>
                                            <!-- Review star -->
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item me-0"><i class="far fa-star text-warning"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Info -->
                                        <p class="small mb-2">2 days ago</p>
                                        <p class="mb-2">Perceived end knowledge certainly day sweetness why cordially.
                                            Ask a quick six seven offer see among. Handsome met debating sir dwelling age
                                            material. As style lived he worse dried. Offered related so visitors we private
                                            removed. Moderate do subjects to distance. </p>

                                        <!-- Reply button -->
                                        <a href="#" class="text-body mb-0"><i
                                                class="fas fa-reply me-2"></i>Reply</a>
                                    </div>
                                </div>
                                <!-- Divider -->
                                <hr>
                                <!-- Review item END -->

                                <!-- Review item START -->
                                <div class="d-md-flex my-4">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xl me-4 flex-shrink-0">
                                        <img class="avatar-img rounded-circle" src="/frontend/images/avatar/07.jpg"
                                            alt="avatar">
                                    </div>
                                    <!-- Text -->
                                    <div>
                                        <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                            <h5 class="me-3 mb-0">Dennis Barrett</h5>
                                            <!-- Review star -->
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item me-0"><i class="far fa-star text-warning"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Info -->
                                        <p class="small mb-2">2 days ago</p>
                                        <p class="mb-2">Handsome met debating sir dwelling age material. As style lived
                                            he worse dried. Offered related so visitors we private removed. Moderate do
                                            subjects to distance. </p>
                                        <!-- Reply button -->
                                        <a href="#" class="text-body mb-0"><i
                                                class="fas fa-reply me-2"></i>Reply</a>
                                    </div>
                                </div>
                                <!-- Review item END -->
                                <!-- Divider -->
                                <hr>
                            </div>
                            <!-- Student review END -->

                            <!-- Leave Review START -->
                            <div class="mt-2">
                                <h5 class="mb-4">Đánh giá khoá học</h5>
                                <form class="row g-3">
                                    <!-- Rating -->
                                    <div class="col-12">
                                        <select id="inputState2" class="form-select  js-choice">
                                            <option selected="">★★★★★ (5/5)</option>
                                            <option>★★★★☆ (4/5)</option>
                                            <option>★★★☆☆ (3/5)</option>
                                            <option>★★☆☆☆ (2/5)</option>
                                            <option>★☆☆☆☆ (1/5)</option>
                                        </select>
                                    </div>
                                    <!-- Message -->
                                    <div class="col-12">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Your review" rows="3"></textarea>
                                    </div>
                                    <!-- Button -->
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mb-0">Đăng bình luận</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Leave Review END -->

                        </div>
                        <!-- Content END -->

                    </div>
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-xl-4">
                    <div data-sticky data-margin-top="80" data-sticky-for="768">
                        <div class="row g-4">
                            <div class="col-md-6 col-xl-12">
                                <!-- Course info START -->
                                <div class="card card-body border p-4">
                                    <!-- Price and share button -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Price -->
                                        <div class="d-flex align-items-center">
                                            <h3 class="fw-bold mb-0 me-2">$150</h3>
                                            <span class="text-decoration-line-through mb-0 me-2">$350</span>
                                            <span class="badge text-bg-orange mb-0">60% off</span>
                                        </div>
                                        <!-- Share button with dropdown -->
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-light rounded mb-0 small"
                                                role="button" id="dropdownShare" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-fw fa-share-alt"></i>
                                            </a>
                                            <!-- dropdown button -->
                                            <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                aria-labelledby="dropdownShare">
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fab fa-facebook-square me-2"></i>Facebook</a></li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fas fa-copy me-2"></i>Copy link</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="mt-3 d-grid">
                                        @if (auth()->user())
                                            @if ($course->users()->get()->contains(auth()->user()->id) && auth()->user())
                                                <a href="{{ route('client.lesson.index', ['course' => $course->id,'lesson' => $course->chapters()->first()->lessons()->first()->id]) }}"
                                                    class="btn btn-success">
                                                    Vào học
                                                </a>
                                            @else
                                                <form action="{{ route('client.order.addToCart', $course->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-primary">Thêm vào giỏ
                                                        hàng</button>
                                                    <a href="#" class="btn btn-success">Mua ngay</a>
                                                </form>
                                            @endif
                                        @else
                                            <form action="{{ route('client.order.addToCart', $course->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary">Thêm vào giỏ
                                                    hàng</button>
                                                <a href="#" class="btn btn-success">Mua ngay</a>
                                            </form>
                                        @endif
                                    </div>
                                    <!-- Divider -->
                                    <hr>

                                    <!-- Title -->
                                    <h5 class="mb-3">Khoá học này bao gồm</h5>
                                    <ul class="list-group list-group-borderless border-0">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0"><i
                                                    class="fas fa-fw fa-book-open text-primary"></i>bài học</span>
                                            <span>30</span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0"><i
                                                    class="fas fa-fw fa-clock text-primary"></i>Thời gian</span>
                                            <span>4h 50m</span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0"><i
                                                    class="fas fa-fw fa-signal text-primary"></i>Kỹ năng</span>
                                            <span>Người bắt đầu</span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0"><i
                                                    class="fas fa-fw fa-globe text-primary"></i>Ngôn ngữ</span>
                                            <span>Tiếng việt</span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0"><i
                                                    class="fas fa-fw fa-medal text-primary"></i>Chức chỉ</span>
                                            <span>Không có</span>
                                        </li>
                                    </ul>
                                    <!-- Divider -->
                                    <hr>

                                    <!-- Instructor info -->
                                    <div class="d-sm-flex align-items-center">
                                        <!-- Avatar image -->
                                        <div class="avatar avatar-xl">
                                            <img class="avatar-img rounded-circle" src="/frontend/images/avatar/05.jpg"
                                                alt="avatar">
                                        </div>
                                        <div class="ms-sm-3 mt-2 mt-sm-0">
                                            <h5 class="mb-0"><a href="#">{{ $course->mentor->name }}</a></h5>
                                            <p class="mb-0 small">Founder Eduport company</p>
                                        </div>
                                    </div>

                                    <!-- Rating and follow -->
                                    <div class="d-sm-flex justify-content-sm-between align-items-center mt-0 mt-sm-2">
                                        <!-- Rating star -->
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-0 small"><i
                                                    class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i
                                                    class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i
                                                    class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i
                                                    class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i
                                                    class="fas fa-star-half-alt text-warning"></i></li>
                                            <li class="list-inline-item ms-2 h6 fw-light mb-0">4.5/5.0</li>
                                        </ul>

                                        <!-- button -->
                                        <a href="{{ route('client.mentor.show',$course->mentor->id) }}"
                                            class="btn btn-sm btn-primary mb-0 mt-2 mt-sm-0">Xem chi tiết</a>
                                    </div>
                                </div>
                                <!-- Course info END -->
                            </div>

                            <!-- Tags START -->
                            <div class="col-md-6 col-xl-12">
                                <div class="card card-body border p-4">
                                    <h4 class="mb-3">Popular Tags</h4>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm"
                                                href="#">blog</a> </li>
                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm"
                                                href="#">business</a> </li>
                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm"
                                                href="#">theme</a> </li>
                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm"
                                                href="#">bootstrap</a> </li>
                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm"
                                                href="#">data science</a> </li>
                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm"
                                                href="#">web development</a> </li>
                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm"
                                                href="#">tips</a> </li>
                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm"
                                                href="#">machine learning</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Tags END -->
                        </div><!-- Row End -->
                    </div>
                </div>
                <!-- Right sidebar END -->

            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
                                                            Page content END -->
@endsection
@section('js-links')

@endsection
@push('js-handles')
    <script type="module"></script>
@endpush
