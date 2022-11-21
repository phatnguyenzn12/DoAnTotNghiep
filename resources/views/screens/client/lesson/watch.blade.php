@extends('layouts.client.master-lesson')

@section('title', 'Trang chủ')

@section('content')
    <section class="py-0 position-relative">

        <div class="row g-0">
            <div class="d-flex">
                <div class="overflow-hidden fullscreen-video w-100">
                    <!-- Full screen video START -->

                    <div class="video uk-responsive-width">

                        <iframe
                            src="https://player.vimeo.com/video/772157924?h=6d83673606&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                            frameborder="0" allow="fullscreen; picture-in-picture" allowfullscreen
                            style="position:absolute;top:0;left:0;width:100%;height:100%;" title="tải xuống"></iframe>
                    </div>

                    <script src="https://player.vimeo.com/api/player.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                    <script>
                        axios.get('https://vimeo.com/api/oembed.json?url=https%3A//vimeo.com/' + '{{ $lesson->lessonVideo->video_path }}')
                            .then(
                                res => {
                                    console.log(res)
                                    $('.video.uk-responsive-width .content').html(res.data.html)
                                    $('iframe').css({
                                        'width': '100%',
                                        'height': '100%',
                                        'position': 'absolute',
                                        'top': 0,
                                        'left': 0
                                    });
                                }
                            )
                    </script>
                    <!-- Full screen video END -->

                    <!-- Plyr resources and browser polyfills are specified in the pen settings -->
                </div>

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
                                            <!-- Item -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        <span class="mb-0 fw-bold">Introduction of Digital Marketing</span>
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body px-3">
                                                        <div class="vstack gap-3">
                                                            <!-- Course lecture -->
                                                            <div>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                    <div
                                                                        class="position-relative d-flex align-items-center">
                                                                        <a href="#"
                                                                            class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                            <i class="fas fa-play me-0"></i>
                                                                        </a>
                                                                        <span
                                                                            class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px">Introduction</span>
                                                                    </div>
                                                                    <p class="mb-0 text-truncate">2m 10s</p>
                                                                </div>

                                                                <!-- Add note button -->
                                                                <a class="btn btn-xs btn-warning" data-bs-toggle="collapse"
                                                                    href="#addnote-1" role="button" aria-expanded="false"
                                                                    aria-controls="addnote-1">
                                                                    View note
                                                                </a>

                                                                <!-- Notes START -->
                                                                <div class="collapse" id="addnote-1">
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
                                                                <!-- Notes END -->

                                                            </div>

                                                            <!-- Course lecture -->
                                                            <div>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                    <div
                                                                        class="position-relative d-flex align-items-center">
                                                                        <a href="#"
                                                                            class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                            <i class="fas fa-play me-0"></i>
                                                                        </a>
                                                                        <span
                                                                            class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px">
                                                                            What is Digital Marketing What is Digital
                                                                            Marketing</span>
                                                                    </div>
                                                                    <p class="mb-0 text-truncate">15m 10s</p>
                                                                </div>

                                                                <!-- Add note button -->
                                                                <a class="btn btn-xs btn-warning" data-bs-toggle="collapse"
                                                                    href="#addnote-2" role="button" aria-expanded="false"
                                                                    aria-controls="addnote-2">
                                                                    View note
                                                                </a>

                                                                <!-- Notes START -->
                                                                <div class="collapse" id="addnote-2">
                                                                    <div class="card card-body p-0">

                                                                        <!-- Note item -->
                                                                        <div
                                                                            class="d-flex justify-content-between bg-light rounded-2 p-2 mb-2">
                                                                            <!-- Content -->
                                                                            <div class="d-flex align-items-center">
                                                                                <span
                                                                                    class="badge bg-dark me-2">5:20</span>
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
                                                                <!-- Notes END -->
                                                            </div>

                                                            <!-- Course lecture -->
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="position-relative d-flex align-items-center">
                                                                    <a href="#"
                                                                        class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                        <i class="fas fa-play me-0"></i>
                                                                    </a>
                                                                    <span
                                                                        class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px">Type
                                                                        of Digital Marketing</span>
                                                                </div>
                                                                <p class="mb-0 text-truncate">18m 10s</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end Item -->
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
        </div>
        <div class="col-12">
            <!-- Tabs START -->
            <ul class="nav nav-pills nav-pills-bg-soft px-3" id="course-pills-tab" role="tablist">
                <!-- Tab item -->
                <li class="nav-item me-2 me-sm-4" role="presentation">
                    <button class="nav-link mb-0" id="course-pills-tab-1" data-bs-toggle="pill"
                        data-bs-target="#course-pills-1" type="button" role="tab" aria-controls="course-pills-1"
                        aria-selected="false" tabindex="-1">Overview</button>
                </li>
                <!-- Tab item -->
                <li class="nav-item me-2 me-sm-4" role="presentation">
                    <button class="nav-link mb-0 active" id="course-pills-tab-4" data-bs-toggle="pill"
                        data-bs-target="#course-pills-4" type="button" role="tab" aria-controls="course-pills-4"
                        aria-selected="false" tabindex="-1">Comment</button>
                </li>
            </ul>
            <!-- Tabs END -->

            <!-- Tab contents START -->
            <div class="tab-content pt-4 px-3" id="course-pills-tabContent">
                <!-- Content START -->
                <div class="tab-pane fade" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                    <!-- Course detail START -->
                    <h5 class="mb-3">Course Description</h5>
                    <p class="mb-3">Welcome to the <strong> Digital Marketing Ultimate Course Bundle - 12 Courses in 1
                            (Over 36 hours of content)</strong></p>
                    <p class="mb-3">In this practical hands-on training, you’re going to learn to become a digital
                        marketing expert with this <strong> ultimate course bundle that includes 12 digital marketing
                            courses in 1!</strong></p>
                    <p class="mb-3">If you wish to find out the skills that should be covered in a basic digital
                        marketing course syllabus in India or anywhere around the world, then reading this blog will help.
                        Before we delve into the advanced <strong><a href="#"
                                class="text-reset text-decoration-underline">digital marketing course</a></strong>
                        syllabus, let’s look at the scope of digital marketing and what the future holds.</p>
                    <p class="mb-0">We focus a great deal on the understanding of behavioral psychology and influence
                        triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory
                        is important to build a solid foundation, we understand that theory alone isn’t going to get the job
                        done so that’s why this course is packed with practical hands-on examples that you can follow step
                        by step.</p>

                    <!-- List content -->
                    <h5 class="mt-4">What you’ll learn</h5>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <ul class="list-group list-group-borderless">
                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                        class="fas fa-check-circle text-success me-2"></i>Digital marketing course
                                    introduction</li>
                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                        class="fas fa-check-circle text-success me-2"></i>Customer Life cycle</li>
                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                        class="fas fa-check-circle text-success me-2"></i>What is Search engine
                                    optimization(SEO)</li>
                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                        class="fas fa-check-circle text-success me-2"></i>Facebook ADS</li>
                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                        class="fas fa-check-circle text-success me-2"></i>Facebook Messenger Chatbot</li>
                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                        class="fas fa-check-circle text-success me-2"></i>Search engine optimization tools
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <ul class="list-group list-group-borderless">
                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                        class="fas fa-check-circle text-success me-2"></i>Why SEO</li>
                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                        class="fas fa-check-circle text-success me-2"></i>URL Structure</li>
                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                        class="fas fa-check-circle text-success me-2"></i>Featured Snippet</li>
                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                        class="fas fa-check-circle text-success me-2"></i>SEO tips and tricks</li>
                                <li class="list-group-item h6 fw-light d-flex mb-0"><i
                                        class="fas fa-check-circle text-success me-2"></i>Google tag manager</li>
                            </ul>
                        </div>
                    </div>

                    <p class="mb-0">As it so contrasted oh estimating instrument. Size like body someone had. Are conduct
                        viewing boy minutes warrant the expense? Tolerably behavior may admit daughters offending her ask
                        own. Praise effect wishes change way and any wanted. Lively use looked latter regard had. Do he it
                        part more last in. </p>
                    <!-- Course detail END -->

                </div>
                <!-- Content END -->





                <div class="container">
                    <!-- Content START -->
                    <div class="tab-pane fade active show" id="course-pills-4" role="tabpanel"
                        aria-labelledby="course-pills-tab-4">
                        <!-- Review START -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="mb-4">Ask Your Question</h5>

                                <!-- Comment box -->
                                <div class="d-flex mb-4">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-sm flex-shrink-0 me-2">
                                        <a href="#"> <img class="avatar-img rounded-circle"
                                                src="/frontend/images/avatar/09.jpg" alt=""> </a>
                                    </div>

                                    <form class="w-100 d-flex" action="{{ route('client.lesson.storecmt') }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                        <textarea class="one form-control pe-4 bg-light" name="comment" id="autoheighttextarea" rows="1"
                                            placeholder="Add a comment..."></textarea>
                                        <button type="submit"
                                            class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i
                                                class="fas fa-paper-plane fs-5"></i></button>
                                    </form>
                                </div>

                                <!-- Comment item START -->
                                <div class="border p-2 p-sm-4 rounded-3 mb-4">
                                    @foreach ($cmt as $item)
                                        @if ($item->reply == null)
                                            <ul class="list-unstyled mb-0">
                                                <li class="comment-item">
                                                    <div class="d-flex mb-3 ">
                                                        <!-- Avatar -->
                                                        <div class="avatar avatar-sm flex-shrink-0">
                                                            <a href="#"><img class="avatar-img rounded-circle"
                                                                    src="{{ Auth::user()->avatar }}" alt=""></a>
                                                        </div>
                                                        <div class="ms-2">
                                                            <!-- Comment by -->
                                                            <div class="bg-light p-3 rounded">
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="me-2">
                                                                        <h6 class="mb-1 lead fw-bold"> <a href="#!">
                                                                                {{ DB::table('users')->where('id', '=', $item->user_id)->first()->name }}
                                                                                (Giảng viên)
                                                                            </a></h6>
                                                                        <p class="h6 mb-0"> {{ $item->comment }}
                                                                        </p>
                                                                    </div>
                                                                    <small>
                                                                        {{ date('d/m/Y', strtotime($item->created_at)) }}</small>
                                                                </div>
                                                            </div>
                                                            <!-- Comment react -->
                                                            <ul class="nav nav-divider py-2 small">
                                                                <li class="nav-item"> <a class="text-primary-hover"
                                                                        href="#">
                                                                        Like (3)</a> </li>
                                                                <li class="nav-item"> <a class="text-primary-hover"
                                                                        data-bs-toggle="collapse" href="#collapseComment1"
                                                                        role="button" aria-expanded="false"
                                                                        aria-controls="collapseComment">
                                                                        Reply</a> </li>
                                                                <li class="nav-item"> <a class="text-primary-hover"
                                                                        href="#">
                                                                        View 5 replies</a> </li>
                                                            </ul>
                                                            {{-- end lisst cooment  --}}
                                                            @foreach ($cmt as $i)
                                                                @if ($i->reply == $item->id)
                                                                    <div class="bg-light p-3 rounded" style="margin-left: 50px">
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="avatar avatar-sm flex-shrink-0">
                                                                                <a href="#"><img
                                                                                        class="avatar-img rounded-circle"
                                                                                        src="/frontend/images/avatar/05.jpg"
                                                                                        alt=""></a>
                                                                            </div>
                                                                            <div class="me-2">
                                                                                <h6 class="mb-1 lead fw-bold"> <a
                                                                                        href="#!">
                                                                                        {{ DB::table('users')->where('id', '=', $i->user_id)->first()->name }}
                                                                                    </a></h6>
                                                                                <p class="h6 mb-0">{{ $i->comment }}
                                                                                </p>
                                                                            </div>
                                                                            <small>5hr</small>
                                                                        </div>
                                                                        <ul class="nav nav-divider py-2 small">
                                                                            <li class="nav-item"> <a
                                                                                    class="text-primary-hover" href="#">
                                                                                    Like (3)</a> </li>
                                                                            <li class="nav-item"> <a
                                                                                    class="text-primary-hover"
                                                                                    data-bs-toggle="collapse"
                                                                                    href="#collapseComment1" role="button"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="collapseComment">
                                                                                    Reply</a> </li>
                                                                            <li class="nav-item"> <a
                                                                                    class="text-primary-hover" href="#">
                                                                                    View 5 replies</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    @endif
                                                                @endforeach
                                                                    <!-- Comment react -->

                                                            <form style="display: none" action="{{ route('client.lesson.reply', $item->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="collapse show" id="collapseComment1">
                                                                    <div class="d-flex mt-3">
                                                                        <input type="hidden" name="course_id"
                                                                            value="{{ $course->id }}">
                                                                        <input type="hidden" name="lesson_id"
                                                                            value="{{ $lesson->id }}">
                                                                        <textarea class="form-control mb-0" name="replycmt" placeholder="Add a comment..." rows="2"
                                                                            spellcheck="false"></textarea>
                                                                        <button
                                                                            class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i
                                                                                class="fas fa-paper-plane fs-5"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                            {{-- end lisst cooment  --}}
                                                            {{-- <div class="bg-light p-3 rounded">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="me-2">
                                                            <h6 class="mb-1 lead fw-bold"> <a href="#!"> Frances
                                                                    Guerrero (Giảng viên) </a></h6>
                                                            <p class="h6 mb-0">Removed demands expense account in
                                                                outward
                                                                tedious do. Particular way thoroughly unaffected
                                                                projection?
                                                            </p>
                                                        </div>
                                                        <small>5hr</small>
                                                    </div>
                                                </div> --}}
                                                            <!-- Comment react -->
                                                            {{-- <ul class="nav nav-divider py-2 small">
                                                                <li class="nav-item"> <a class="text-primary-hover"
                                                                        href="#">
                                                                        Like (3)</a> </li>
                                                                <li class="nav-item"> <a class="text-primary-hover"
                                                                        data-bs-toggle="collapse" href="#collapseComment1"
                                                                        role="button" aria-expanded="false"
                                                                        aria-controls="collapseComment">
                                                                        Reply</a> </li>
                                                                <li class="nav-item"> <a class="text-primary-hover"
                                                                        href="#">
                                                                        View 5 replies</a> </li>
                                                            </ul> --}}

                                                            <!-- collapse textarea -->
                                                            {{-- <form {{ route('client.lesson.reply', $item->id) }} method="post">
                                                    @csrf
                                                    <div class="collapse show" id="collapseComment1">
                                                        <div class="d-flex mt-3">
                                                            <textarea class="form-control mb-0" name="replycmt" placeholder="Add a comment..." rows="2"
                                                                spellcheck="false"></textarea>
                                                            <button
                                                                class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i
                                                                    class="fas fa-paper-plane fs-5"></i></button>
                                                        </div>
                                                    </div>
                                                </form> --}}
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                    </div>

                                <!-- Comment item nested START -->
                                <ul class="list-unstyled ms-4">
                                    <!-- Comment item START -->
                                    <li class="comment-item">
                                        {{-- <div class="d-flex">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-xs flex-shrink-0">
                                                <a href="#"><img class="avatar-img rounded-circle"
                                                        src="/frontend/images/avatar/06.jpg" alt=""></a>
                                            </div>
                                            <!-- Comment by -->
                                            <div class="ms-2">
                                                <div class="bg-light p-3 rounded">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="me-2">
                                                            <h6 class="mb-1  lead fw-bold"> <a href="#">
                                                                    Lori Stevens </a> </h6>
                                                            <p class=" mb-0">See resolved goodness felicity
                                                                shy
                                                                civility domestic had but Drawings offended yet
                                                                answered Jennings perceive. Domestic had but
                                                                Drawings offended yet answered Jennings
                                                                perceive.
                                                            </p>
                                                        </div>
                                                        <small>2hr</small>
                                                    </div>
                                                </div>
                                                <!-- Comment react -->
                                                <ul class="nav nav-divider py-2 small">
                                                    <li class="nav-item"><a class="text-primary-hover" href="#!">
                                                            Like (5)</a></li>
                                                    <li class="nav-item"><a class="text-primary-hover" href="#!">
                                                            Reply</a> </li>
                                                </ul>
                                            </div>
                                        </div> --}}
                                    </li>
                                    <!-- Comment item END -->
                                </ul>
                                <!-- Comment item nested END -->
                                </li>
                                </ul>
                            </div>
                            <!-- Comment item END -->

                            <!-- Comment item START -->
                            <div class="border p-2 p-sm-4 rounded-3">
                                <ul class="list-unstyled mb-0">
                                    <li class="comment-item">
                                        <div class="d-flex">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm flex-shrink-0">
                                                <a href="#"><img class="avatar-img rounded-circle"
                                                        src="/frontend/images/avatar/02.jpg" alt=""></a>
                                            </div>
                                            <div class="ms-2">
                                                <!-- Comment by -->
                                                <div class="bg-light p-3 rounded">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="me-2">
                                                            <h6 class="mb-1 lead fw-bold"> <a href="#!"> Louis
                                                                    Ferguson </a></h6>
                                                            <p class="h6 mb-0">Removed demands expense account in
                                                                outward
                                                                tedious do. Particular way thoroughly unaffected
                                                                projection?
                                                            </p>
                                                        </div>
                                                        <small>5hr</small>
                                                    </div>
                                                </div>
                                                <!-- Comment react -->
                                                <ul class="nav nav-divider py-2 small">
                                                    <li class="nav-item"> <a class="text-primary-hover" href="#">
                                                            Like</a> </li>
                                                    <li class="nav-item"> <a class="text-primary-hover" href="#">
                                                            Reply</a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Comment item END -->

                        </div>

                    </div>
                </div>
                <!-- Content END -->
            </div>
        </div>
        <!-- Tab contents END -->
        </div>


    </section>
@endsection
@section('js-links')

@endsection
@push('js-handles')
    <script>
        // function showAjax(url) {
        //     $.ajax({
        //         url: url,
        //         timeout: 1000,
        //         success: function(res) {
        //             $('.embed-video').html(res)
        //         }
        //     })
        // }
    </script>
@endpush
