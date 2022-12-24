@extends('layouts.client.master')

@section('head-links')
@endsection
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
                            @php $id = $course->id @endphp
                            <h2>{{ $course->title }}.</h2>
                            <p>{{ $course->content }}</p>
                            <!-- Content -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0">
                                    <i class="fas fa-star text-warning"></i>
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
                                        class="fas fa-user-graduate me-2"></i>{{ $course->users()->count() }} Người mua khóa
                                    học</li>
                                <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                        class="fas fa-signal me-2"></i>{{ $course->skill->title }}</li>
                                <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                        class="bi bi-patch-exclamation-fill me-2"></i>Cập nhật mới nhất
                                    {{ $course->updated_at }}</li>
                                <li class="list-inline-item fw-light h6"><i
                                        class="fas fa-globe me-2"></i>{{ $course->language_rule }}</li>
                            </ul>
                        </div>
                        <!-- Title END -->

                        <!-- Image and video -->
                        <iframe width="100%" height="400" src="{{ $course->video }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>

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
                                        Xem thêm <span class="see-more ms-1">more</span><span
                                            class="see-less ms-1">less</span><i class="fas fa-angle-down ms-2"></i>
                                    </a>

                                    <!-- List content -->
                                    <h5 class="mt-4"> Bạn học được gì từ khóa học này?</h5>
                                    <div class="mb-3">
                                        <ul class="list-group list-group-borderless">
                                            @foreach (explode(',', $course->description_details) as $description_detail)
                                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                                        class="fas fa-check-circle text-success me-2"></i>{{ $description_detail }}
                                                </li>
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
                                            @if ($chapter->lessons->count() > 0)
                                                <div class="col-12">
                                                    <!-- Curriculum item -->
                                                    <h5 class="mb-4">{{ $chapter->title }}
                                                        ({{ $chapter->lessons->count() }} Bài)</h5>
                                                    @foreach ($chapter->lessons as $key2 => $lesson)
                                                        <div
                                                            class="d-sm-flex justify-content-sm-between align-items-center">
                                                            <div class="d-flex">
                                                                <a href="#"
                                                                    class="btn btn-danger-soft btn-round mb-0"><i
                                                                        class="fas fa-play"></i></a>
                                                                <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                                                                    <h6 class="mb-0">{{ $lesson->title }}</h6>
                                                                    <p class="mb-2 mb-sm-0 small"> {{ $lesson->time }}</p>
                                                                </div>
                                                            </div>
                                                            <!-- Button -->
                                                            @if ($lesson->is_demo == 1)
                                                                <a class="btn btn-sm btn-success mb-0" data-toggle="modal"
                                                                    data-bs-target="#modal-example"data-bs-toggle="modal"
                                                                    data-bs-target="#viewReview"
                                                                    onclick="showAjaxModal('{{ route('client.course.lesson', $lesson->id) }}','Xem thử video')">Xem
                                                                    thử</a>
                                                            @endif
                                                        </div>
                                                        <!-- Divider -->
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            @endif
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
                        <div id="table-innerHtml">

                        </div>
                        {{-- @include('components.client.course.review') --}}


                    </div>
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-xl-4">
                    <div data-sticky data-margin-top="80" data-sticky-for="768">
                        <div class="row g-4">
                            <div class="col-md-6 col-xl-12">
                                @if ($user == null)
                                    <!-- Course info START -->
                                    <div class="card card-body border p-4">
                                        <!-- Price and share button -->
                                        <div class="d-flex justify-content-between align-items-center">

                                            <!-- Price -->
                                            <div class="d-flex align-items-center">
                                                <h3 class="fw-bold mb-0 me-2">{{ number_format($course->current_price) }}đ
                                                </h3>
                                                @if ($course->discount != 0)
                                                    <span
                                                        class="text-decoration-line-through mb-0 me-2">{{ number_format($course->price) }}đ</span>
                                                    <span class="badge text-bg-orange mb-0">{{ $course->discount }}%
                                                        off</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Buttons -->
                                <div class="mt-3 d-grid">
                                    @if ($user == true || $mentor == true)
                                        <a href="{{ route('client.lesson.index', $course->id) }}" class="btn btn-success">
                                            Tham gia học
                                        </a>
                                    @else
                                    @endif

                                    @if ($user == false && $mentor == null)
                                        <form action="{{ route('client.order.addToCart', $course->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Thêm vào giỏ
                                                hàng</button>
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
                                                class="fas fa-fw fa-book-open text-primary"></i>bài
                                            học</span>
                                        <span>{{ $course->lessons->count() }}</span>
                                    </li>
                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-clock text-primary"></i>Thời
                                            gian</span>
                                        <span>{{ $course->totalTime }}</span>
                                    </li>
                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-signal text-primary"></i>Kỹ
                                            năng</span>
                                        <span>{{ $course->skill->title }}</span>
                                    </li>
                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-globe text-primary"></i>Ngôn
                                            ngữ</span>
                                        <span>{{ $course->language_rule }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i
                                                class="fas fa-fw fa-medal text-primary"></i>Chứng
                                            chỉ</span>
                                        <span>{{ $course->certificate ? 'Có' : 'Không' }}</span>
                                    </li>
                                </ul>
                                <!-- Divider -->
                                <hr>

                                <!-- Instructor info -->
                                <div class="d-sm-flex align-items-center">
                                    <!-- Avatar image -->
                                    <div class="avatar avatar-xl">
                                        <img class="avatar-img rounded-circle" src="{{asset('app/'.$course->mentor->avatar)}}"
                                            alt="avatar">
                                    </div>
                                    <div class="ms-sm-3 mt-2 mt-sm-0">
                                        <h5 class="mb-0"><a href="#">{{ $course->mentor->name }} <span
                                                    class="text-danger">(giảng viên)</span></a></h5>
                                        <p class="mb-0 small">{{ $course->mentor->specializations }}</p>
                                    </div>
                                </div>

                                <!-- Rating and follow -->
                                <div class="d-sm-flex justify-content-sm-between align-items-center mt-0 mt-sm-2">
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
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star-half-alt text-warning"></i></li>
                                        <li class="list-inline-item ms-2 h6 fw-light mb-0">4.5/5.0</li>
                                    </ul>

                                    <!-- button -->
                                    <a href="{{ route('client.mentor.show', $course->mentor->id) }}"
                                        class="btn btn-sm btn-primary mb-0 mt-2 mt-sm-0">Xem chi tiết</a>
                                </div>
                            </div>
                            <!-- Course info END -->
                        </div>
                        <!-- Tags END -->
                    </div><!-- Row End -->
                </div>
            </div>
            <!-- Right sidebar END -->

        </div><!-- Row END -->
        </div>
    </section>


    <!-- Modal-->
    <div class="modal fade " id="modal-example" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Loading...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe
                        src="https://player.vimeo.com/video/772157924?h=6d83673606&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                        frameborder="0" allow="fullscreen; picture-in-picture" allowfullscreen
                        style="position:absolute;top:0;left:0;width:100%;height:100%;" title="tải xuống"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js-links')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="/js/tags.js"></script>
@endsection
@push('js-handles')
    <script>
        function showAjaxModal(url, title) {
            $('#modal-example').find('.modal-title').text(title)
            $('#modal-example').find('.modal-body').html(
                '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
            $.ajax({
                url: url,
                timeout: 1000,
                success: function(res) {
                    console.log(res);
                    $.ajax({
                        url: url,
                        timeout: 1000,
                        success: function(res) {
                            axios.get('https://vimeo.com/api/oembed.json?url=https%3A//vimeo.com/' +
                                    res.video_path)
                                .then(
                                    res => {
                                        $('#modal-example').find('.modal-body').html(res.data.html)
                                        $('.modal-body').find('iframe').css({
                                            'width': '100%',
                                            'height': '500px',
                                            'top': 0,
                                            'left': 0
                                        });
                                    }
                                )
                        }
                    })
                },
                error: function(err) {
                    Swal.fire(
                        'Có lỗi xảy ra, vui lòng thử lại',
                        err,
                        'error'
                    )
                }
            })
        }

        objFiter = {
            page: 1,
            record: 5,
            course_id: {{ $id }},
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('client.course.filterComment') }}',
                timeout: 1000,
                data: obj,

                success: function(res) {
                    $('#table-innerHtml').html(res)
                },
                error: function(err) {
                    Swal.fire(
                        'Có lỗi xảy ra, vui lòng thử lại',
                        err,
                        'error'
                    )
                }
            })
        }
        showAjax(objFiter);

        function pagination(page) {
            objFiter.page = page
            showAjax(objFiter);
        }
    </script>
@endpush
