@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
    <!-- =======================
    Page content START -->
    <section class="pt-5 pb-0">
        <div class="container">
            <div class="row g-0 g-lg-5">

                <!-- Left sidebar START -->
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <!-- Instructor image START -->
                            <div class="card shadow p-2 mb-4 text-center">
                                <div class="rounded-3">
                                    <!-- Image -->
                                    <img src="/frontend/images/instructor/07.jpg" class="card-img" alt="course image">
                                </div>

                                <!-- Card body -->
                                <div class="card-body px-3">
                                    <!-- Rating -->
                                    <ul class="list-inline">
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
                                    <!-- Social media button -->
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"> <a class="btn px-2 btn-sm bg-facebook"
                                                href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
                                        <li class="list-inline-item"> <a class="btn px-2 btn-sm bg-instagram-gradient"
                                                href="#"><i class="fab fa-fw fa-instagram"></i></a> </li>
                                        <li class="list-inline-item"> <a class="btn px-2 btn-sm bg-twitter"
                                                href="#"><i class="fab fa-fw fa-twitter"></i></a> </li>
                                        <li class="list-inline-item"> <a class="btn px-2 btn-sm bg-linkedin"
                                                href="#"><i class="fab fa-fw fa-linkedin-in"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Instructor image END -->
                        </div>

                        <div class="col-md-6 col-lg-12">
                            <div class="card card-body shadow p-4 mb-4">

                                <!-- Education START -->
                                <!-- Title -->
                                <h4 class="mb-3">Education</h4>

                                <!-- Education item -->
                                <div class="d-flex align-items-center mb-4">
                                    <span class="icon-md text-dark mb-0 bg-light rounded-3"><i
                                            class="fas fa-graduation-cap"></i></span>
                                    <div class="ms-3">
                                        <h6 class="mb-0">Harvard University</h6>
                                        <p class="mb-0 small">Bachelor in Computer Graphics</p>
                                    </div>
                                </div>

                                <!-- Education item -->
                                <div class="d-flex align-items-center mb-4">
                                    <span class="icon-md text-dark mb-0 bg-light rounded-3"><i
                                            class="fas fa-graduation-cap"></i></span>
                                    <div class="ms-3">
                                        <h6 class="mb-0">University of Toronto</h6>
                                        <p class="mb-0 small">Master in Computer Graphics</p>
                                    </div>
                                </div>

                                <!-- Education item -->
                                <div class="d-flex align-items-center mb-4">
                                    <span class="icon-md text-dark mb-0 bg-light rounded-3"><i
                                            class="fas fa-graduation-cap"></i></span>
                                    <div class="ms-3">
                                        <h6 class="mb-0">East Ray University</h6>
                                        <p class="mb-0 small">Bachelor in Computer Graphics</p>
                                    </div>
                                </div>
                                <!-- Education END -->

                                <hr> <!-- Divider -->

                                <!-- Skills START -->
                                <h4 class="mb-3">Skills</h4>

                                <!-- Progress item -->
                                <div class="overflow-hidden mb-4">
                                    <h6 class="uppercase">Graphic design</h6>
                                    <div class="progress progress-sm bg-primary bg-opacity-10">
                                        <div class="progress-bar bg-primary aos" role="progressbar" data-aos="slide-right"
                                            data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out"
                                            style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-percent-simple h6 mb-0">90%</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Progress item -->
                                <div class="overflow-hidden mb-4">
                                    <h6 class="uppercase">Web design</h6>
                                    <div class="progress progress-sm bg-success bg-opacity-10">
                                        <div class="progress-bar bg-success aos" role="progressbar" data-aos="slide-right"
                                            data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out"
                                            style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-percent-simple h6 mb-0">80%</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Progress item -->
                                <div class="overflow-hidden mb-4">
                                    <h6 class="uppercase">HTML/CSS</h6>
                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                        <div class="progress-bar bg-warning aos" role="progressbar" data-aos="slide-right"
                                            data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out"
                                            style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="progress-percent-simple h6 mb-0">60%</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Progress item -->
                                <div class="overflow-hidden mb-4">
                                    <h6 class="uppercase">UI/UX</h6>
                                    <div class="progress progress-sm bg-danger bg-opacity-10">
                                        <div class="progress-bar bg-danger aos" role="progressbar" data-aos="slide-right"
                                            data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out"
                                            style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="progress-percent-simple h6 mb-0">50%</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Skills END -->

                            </div>
                        </div>
                    </div> <!-- Row End -->
                </div>
                <!-- Left sidebar END -->

                <!-- Main content START -->
                <div class="col-lg-8">

                    <!-- Title -->
                    <h5 class="mb-0">Hi, I am</h5>
                    <h1 class="mb-0">Lori Stevens</h1>
                    <p>Graphic Designer</p>
                    <!-- Content -->
                    <p class="mt-4">Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant
                        private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr
                        prevailed. Mr feeling does chiefly cordial in do.</p>
                    <p>We focus a great deal on the understanding of behavioral psychology and influence triggers which are
                        crucial for becoming a well-rounded Digital Marketer. We understand that theory is important to
                        build a solid foundation, we understand that theory alone isn’t going to get the job done so that’s
                        why this course is packed with practical hands-on examples that you can follow step by step.</p>
                    <!-- Personal info -->
                    <ul class="list-group list-group-borderless">
                        <li class="list-group-item px-0">
                            <span class="h6 fw-light"><i
                                    class="fas fa-fw fa-map-marker-alt text-primary me-1 me-sm-3"></i>Address:</span>
                            <span>2002 Horton Ford Rd, Eidson, TN, 37731</span>
                        </li>
                        <li class="list-group-item px-0">
                            <span class="h6 fw-light"><i
                                    class="fas fa-fw fa-envelope text-primary me-1 me-sm-3"></i>Email:</span>
                            <span>example@gmail.com</span>
                        </li>
                        <li class="list-group-item px-0">
                            <span class="h6 fw-light"><i
                                    class="fas fa-fw fa-headphones text-primary me-1 me-sm-3"></i>Phone number:</span>
                            <span>+896-789-546</span>
                        </li>
                        <li class="list-group-item px-0">
                            <span class="h6 fw-light"><i
                                    class="fas fa-fw fa-globe text-primary me-1 me-sm-3"></i>Website:</span>
                            <span>https://eduport.webestica.com/</span>
                        </li>
                    </ul>

                    <!-- Counter START -->
                    <div class="row mt-4 g-3">
                        <!-- Counter item -->
                        <div class="col-sm-6 col-lg-4">
                            <div class="d-flex align-items-center">
                                <span class="icon-lg text-success mb-0 bg-success bg-opacity-10 rounded-3"><i
                                        class="fas fa-play"></i></span>
                                <div class="ms-3">
                                    <div class="d-flex">
                                        <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0"
                                            data-purecounter-end="10" data-purecounter-delay="200">0</h5>
                                        <span class="mb-0 h5">+</span>
                                    </div>
                                    <p class="mb-0 h6 fw-light">Total Courses</p>
                                </div>
                            </div>
                        </div>
                        <!-- Counter item -->
                        <div class="col-sm-6 col-lg-4">
                            <div class="d-flex align-items-center">
                                <span class="icon-lg text-purple bg-purple bg-opacity-10 rounded-3 mb-0"><i
                                        class="fas fa-users"></i></span>
                                <div class="ms-3">
                                    <div class="d-flex">
                                        <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0"
                                            data-purecounter-end="36" data-purecounter-delay="200">0</h5>
                                        <span class="mb-0 h5">K+</span>
                                    </div>
                                    <p class="mb-0 h6 fw-light">Total Students</p>
                                </div>
                            </div>
                        </div>
                        <!-- Counter item -->
                        <div class="col-sm-6 col-lg-4">
                            <div class="d-flex align-items-center">
                                <span class="icon-lg text-orange bg-orange bg-opacity-10 rounded-3 mb-0"><i
                                        class="fas fa-trophy"></i></span>
                                <div class="ms-3">
                                    <div class="d-flex">
                                        <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0"
                                            data-purecounter-end="11" data-purecounter-delay="200">0</h5>
                                        <span class="mb-0 h5">+</span>
                                    </div>
                                    <p class="mb-0 h6 fw-light">Years in Experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Counter END -->

                    <!-- Course START -->
                    <div class="row g-4 mt-4">
                        <!-- Title -->
                        <h2>Courses List</h2>

                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card shadow h-100">
                                <!-- Image -->
                                <img src="/frontend/images/courses/4by3/08.jpg" class="card-img-top" alt="course image">
                                <!-- Card body -->
                                <div class="card-body pb-0">
                                    <!-- Badge and favorite -->
                                    <div class="d-flex justify-content-between mb-2">
                                        <a href="#" class="badge bg-purple bg-opacity-10 text-purple">All level</a>
                                        <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                                    </div>
                                    <!-- Title -->
                                    <h5 class="card-title fw-normal"><a href="#">Sketch from A to Z: for app
                                            designer</a></h5>
                                    <p class="mb-2 text-truncate-2">Proposal indulged no do sociable he throwing settling
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
                                        <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>12h
                                            56m</span>
                                        <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>15
                                            lectures</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->

                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card shadow h-100">
                                <!-- Image -->
                                <img src="/frontend/images/courses/4by3/02.jpg" class="card-img-top" alt="course image">
                                <div class="card-body pb-0">
                                    <!-- Badge and favorite -->
                                    <div class="d-flex justify-content-between mb-2">
                                        <a href="#" class="badge bg-info bg-opacity-10 text-info">Intermediate</a>
                                        <a href="#" class="text-danger"><i class="fas fa-heart"></i></a>
                                    </div>
                                    <!-- Title -->
                                    <h5 class="card-title fw-normal"><a href="#">Graphic Design Masterclass</a></h5>
                                    <p class="mb-2 text-truncate-2">Rooms oh fully taken by worse do Points afraid but may
                                        end Rooms
                                        Points afraid but may end Rooms</p>
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
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer pt-0 pb-3">
                                    <hr>
                                    <div class="d-flex justify-content-between ">
                                        <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>9h
                                            56m</span>
                                        <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>65
                                            lectures</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->

                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card shadow h-100">
                                <!-- Image -->
                                <img src="/frontend/images/courses/4by3/03.jpg" class="card-img-top" alt="course image">
                                <div class="card-body pb-0">
                                    <!-- Badge and favorite -->
                                    <div class="d-flex justify-content-between mb-2">
                                        <a href="#" class="badge bg-success bg-opacity-10 text-success">Beginner</a>
                                        <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                                    </div>
                                    <!-- Title -->
                                    <h5 class="card-title fw-normal"><a href="#">Create a Design System in Figma</a>
                                    </h5>
                                    <p class="mb-2 text-truncate-2">Rooms oh fully taken by worse do. Points afraid but may
                                        end afraid
                                        but may end.</p>
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
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer pt-0 pb-3">
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>5h
                                            56m</span>
                                        <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>32
                                            lectures</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->

                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card shadow h-100">
                                <!-- Image -->
                                <img src="/frontend/images/courses/4by3/07.jpg" class="card-img-top" alt="course image">
                                <div class="card-body pb-0">
                                    <!-- Badge and favorite -->
                                    <div class="d-flex justify-content-between mb-2">
                                        <a href="#" class="badge bg-success bg-opacity-10 text-success">Beginner</a>
                                        <a href="#" class="text-danger"><i class="fas fa-heart"></i></a>
                                    </div>
                                    <!-- Title -->
                                    <h5 class="card-title fw-normal"><a href="#">Deep Learning with React-Native
                                        </a></h5>
                                    <p class="mb-2 text-truncate-2">Far advanced settling say finished raillery. Offered
                                        chiefly
                                        farther..</p>
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
                                        <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>18h
                                            56m</span>
                                        <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>99
                                            lectures</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                    </div>
                    <!-- Course END -->
                </div>
                <!-- Main content END -->

            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->

    <!-- =======================
    Related instructor START -->
    <section>
        <div class="container">
            <!-- Title -->
            <div class="row mb-4">
                <h2 class="mb-0">Related Instructors</h2>
            </div>

            <!-- Slider START -->
            <div class="tiny-slider arrow-round arrow-creative arrow-blur arrow-hover">
                <div class="tiny-slider-inner" data-autoplay="false" data-arrow="true" data-dots="false" data-items="4"
                    data-items-lg="3" data-items-md="2" data-items-xs="1">

                    <!-- Card item START -->
                    <div class="card bg-transparent">
                        <div class="position-relative">
                            <!-- Image -->
                            <img src="/frontend/images/instructor/02.jpg" class="card-img" alt="course image">
                            <!-- Overlay -->
                            <div class="card-img-overlay d-flex flex-column p-3">
                                <div class="w-100 mt-auto text-end">
                                    <!-- Card category -->
                                    <a href="#" class="badge text-bg-info rounded-1"><i
                                            class="fas fa-user-graduate me-2"></i>25</a>
                                    <a href="#" class="badge text-bg-orange rounded-1"><i
                                            class="fas fa-clipboard-list me-2"></i>15</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body text-center">
                            <!-- Title -->
                            <h5 class="card-title"><a href="#">Jacqueline Miller</a></h5>
                            <p class="mb-2">Web Developer</p>
                            <!-- Rating -->
                            <ul class="list-inline hstack justify-content-center">
                                <li class="list-inline-item ms-2 h6 mb-0 fw-normal">4.5/5.0</li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card item END -->

                    <!-- Card item START -->
                    <div class="card bg-transparent">
                        <div class="position-relative">
                            <!-- Image -->
                            <img src="/frontend/images/instructor/01.jpg" class="card-img" alt="course image">
                            <!-- Overlay -->
                            <div class="card-img-overlay d-flex flex-column p-3">
                                <div class="w-100 mt-auto text-end">
                                    <!-- Card category -->
                                    <a href="#" class="badge text-bg-info rounded-1"><i
                                            class="fas fa-user-graduate me-2"></i>118</a>
                                    <a href="#" class="badge text-bg-orange rounded-1"><i
                                            class="fas fa-clipboard-list me-2"></i>09</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body text-center">
                            <!-- Title -->
                            <h5 class="card-title"><a href="#">Samuel Bishop</a></h5>
                            <p class="mb-2">Marketing Instructor</p>
                            <!-- Rating -->
                            <ul class="list-inline hstack justify-content-center">
                                <li class="list-inline-item ms-2 h6 mb-0 fw-normal">4.5/5.0</li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i>
                                </li>
                            </ul>small
                        </div>
                    </div>
                    <!-- Card item END -->

                    <!-- Card item START -->
                    <div class="card bg-transparent">
                        <div class="position-relative">
                            <!-- Image -->
                            <img src="/frontend/images/instructor/08.jpg" class="card-img" alt="course image">
                            <!-- Overlay -->
                            <div class="card-img-overlay d-flex flex-column p-3">
                                <div class="w-100 mt-auto text-end">
                                    <!-- Card category -->
                                    <a href="#" class="badge text-bg-info rounded-1"><i
                                            class="fas fa-user-graduate me-2"></i>92</a>
                                    <a href="#" class="badge text-bg-orange rounded-1"><i
                                            class="fas fa-clipboard-list me-2"></i>38</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body text-center">
                            <!-- Title -->
                            <h5 class="card-title"><a href="#">Dennis Barrett</a></h5>
                            <p class="mb-2">Maths Instructor</p>
                            <!-- Rating -->
                            <ul class="list-inline hstack justify-content-center">
                                <li class="list-inline-item ms-2 h6 mb-0 fw-normal">4.5/5.0</li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card item END -->

                    <!-- Card item START -->
                    <div class="card bg-transparent">
                        <div class="position-relative">
                            <!-- Image -->
                            <img src="/frontend/images/instructor/04.jpg" class="card-img" alt="course image">
                            <!-- Overlay -->
                            <div class="card-img-overlay d-flex flex-column p-3">
                                <div class="w-100 mt-auto text-end">
                                    <!-- Card category -->
                                    <a href="#" class="badge text-bg-info rounded-1"><i
                                            class="fas fa-user-graduate me-2"></i>82</a>
                                    <a href="#" class="badge text-bg-orange rounded-1"><i
                                            class="fas fa-clipboard-list me-2"></i>05</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body text-center">
                            <!-- Title -->
                            <h5 class="card-title"><a href="#">Carolyn Ortiz</a></h5>
                            <p class="mb-2">Economics Teacher</p>
                            <!-- Rating -->
                            <ul class="list-inline hstack justify-content-center">
                                <li class="list-inline-item ms-2 h6 mb-0 fw-normal">4.5/5.0</li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card item END -->

                    <!-- Card item START -->
                    <div class="card bg-transparent">
                        <div class="position-relative">
                            <!-- Image -->
                            <img src="/frontend/images/instructor/03.jpg" class="card-img" alt="course image">
                            <!-- Overlay -->
                            <div class="card-img-overlay d-flex flex-column p-3">
                                <div class="w-100 mt-auto text-end">
                                    <!-- Card category -->
                                    <a href="#" class="badge text-bg-info rounded-1"><i
                                            class="fas fa-user-graduate me-2"></i>50</a>
                                    <a href="#" class="badge text-bg-orange rounded-1"><i
                                            class="fas fa-clipboard-list me-2"></i>10</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body text-center">
                            <!-- Title -->
                            <h5 class="card-title"><a href="#">Billy Vasquez</a></h5>
                            <p class="mb-2">UI/UX Designer</p>
                            <!-- Rating -->
                            <ul class="list-inline hstack justify-content-center">
                                <li class="list-inline-item ms-2 h6 mb-0 fw-normal">4.5/5.0</li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card item END -->

                </div>
            </div>
            <!-- Slider END -->

        </div>
    </section>
    <!-- =======================
    Related instructor END -->
@endsection

@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
    <script type="module">

    </script>
@endpush
