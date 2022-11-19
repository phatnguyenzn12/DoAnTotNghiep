@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
<!-- =======================
Page Banner START -->
<section class="bg-dark align-items-center d-flex"
style="background:url(/frontend/images/pattern/04.png) no-repeat center center; background-size:cover;">
<!-- Main banner background image -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Title -->
            <h1 class="text-white">Course List Minimal</h1>
            <!-- Breadcrumb -->
            <div class="d-flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Courses</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</section>
<!-- =======================
Page Banner END -->

<!-- =======================
Page content START -->
<section class="pt-5">
<div class="container">
    <!-- Search option START -->
    <div class="row mb-4 align-items-center">
        <!-- Search bar -->
        <div class="col-sm-6 col-xl-4">
            <form class="border rounded p-2">
                <div class="input-group input-borderless">
                    <input class="form-control me-1" type="search" placeholder="Search course">
                    <button type="button" class="btn btn-primary mb-0 rounded"><i
                            class="fas fa-search"></i></button>
                </div>
            </form>
        </div>

        <!-- Select option -->
        <div class="col-sm-6 col-xl-3 mt-3 mt-lg-0">
            <form class="border rounded p-2 input-borderless">
                <select class="form-select form-select-sm js-choice" aria-label=".form-select-sm">
                    <option value="">Category</option>
                    <option>All</option>
                    <option>Development</option>
                    <option>Design</option>
                    <option>Accounting</option>
                    <option>Translation</option>
                    <option>Finance</option>
                    <option>Legal</option>
                    <option>Photography</option>
                    <option>Writing</option>
                    <option>Marketing</option>
                </select>
            </form>
        </div>

        <!-- Select option -->
        <div class="col-sm-6 col-xl-3 mt-3 mt-xl-0">
            <form class="border rounded p-2 input-borderless">
                <select class="form-select form-select-sm js-choice" aria-label=".form-select-sm">
                    <option value="">Sort by</option>
                    <option>Free</option>
                    <option>Most viewed</option>
                    <option>Popular</option>
                </select>
            </form>
        </div>

        <!-- Button -->
        <div class="col-sm-6 col-xl-2 mt-3 mt-xl-0 d-grid">
            <a href="#" class="btn btn-lg btn-primary mb-0">Filter Results</a>
        </div>
    </div>
    <!-- Search option END -->

    <!-- Course list START -->
    <div class="row g-4 justify-content-center">

        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="/frontend/images/courses/4by3/01.jpg" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#">The Complete Digital Marketing
                                        Course - 12 Courses in 1</a></h5>
                                <!-- Wishlist icon -->
                                <a href="#"><i class="fas fa-heart text-danger"></i></a>
                            </div>
                            <!-- Content -->
                            <!-- Info -->
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="far fa-clock text-danger me-2"></i>6h 56m</li>
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="fas fa-table text-orange me-2"></i>82 lectures</li>
                                <li class="list-inline-item h6 fw-light"><i
                                        class="fas fa-signal text-success me-2"></i>Beginner</li>
                            </ul>
                            <!-- Rating -->
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
                                <li class="list-inline-item ms-2 h6 fw-light">4.5/5.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->

        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="/frontend/images/courses/4by3/02.jpg" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#">Graphic Design Masterclass</a></h5>
                                <!-- Wishlist icon -->
                                <a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
                            </div>
                            <!-- Content -->
                            <!-- Info -->
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="far fa-clock text-danger me-2"></i>9h 56m</li>
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="fas fa-table text-orange me-2"></i>65 lectures</li>
                                <li class="list-inline-item h6 fw-light"><i
                                        class="fas fa-signal text-success me-2"></i>All level</li>
                            </ul>
                            <!-- Rating -->
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
                                <li class="list-inline-item ms-2 h6 fw-light">4.0/5.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->

        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="/frontend/images/courses/4by3/03.jpg" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#">Create a Design System in Figma</a>
                                </h5>
                                <!-- Wishlist icon -->
                                <a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
                            </div>
                            <!-- Content -->
                            <!-- Info -->
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="far fa-clock text-danger me-2"></i>7h 16m</li>
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="fas fa-table text-orange me-2"></i>32 lectures</li>
                                <li class="list-inline-item h6 fw-light"><i
                                        class="fas fa-signal text-success me-2"></i>Intermediate</li>
                            </ul>
                            <!-- Rating -->
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
                                <li class="list-inline-item ms-2 h6 fw-light">4.0/5.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->

        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="/frontend/images/courses/4by3/05.jpg" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#">The Complete Web Development in
                                        python</a></h5>
                                <!-- Wishlist icon -->
                                <a href="#"><i class="fas fa-heart text-danger"></i></a>
                            </div>
                            <!-- Content -->
                            <!-- Info -->
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="far fa-clock text-danger me-2"></i>7h 16m</li>
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="fas fa-table text-orange me-2"></i>32 lectures</li>
                                <li class="list-inline-item h6 fw-light"><i
                                        class="fas fa-signal text-success me-2"></i>Intermediate</li>
                            </ul>
                            <!-- Rating -->
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
                                <li class="list-inline-item ms-2 h6 fw-light">4.0/5.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->

        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="/frontend/images/courses/4by3/06.jpg" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#">Angular – The Complete Guider</a>
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
                                        class="fas fa-table text-orange me-2"></i>68 lectures</li>
                                <li class="list-inline-item h6 fw-light"><i
                                        class="fas fa-signal text-success me-2"></i>All level</li>
                            </ul>
                            <!-- Rating -->
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
                                <li class="list-inline-item ms-2 h6 fw-light">4.5/5.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->

        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="/frontend/images/courses/4by3/07.jpg" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#">Deep Learning with React-Native</a>
                                </h5>
                                <!-- Wishlist icon -->
                                <a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
                            </div>
                            <!-- Content -->
                            <!-- Info -->
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="far fa-clock text-danger me-2"></i>10h 16m</li>
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="fas fa-table text-orange me-2"></i>21 lectures</li>
                                <li class="list-inline-item h6 fw-light"><i
                                        class="fas fa-signal text-success me-2"></i>Advance</li>
                            </ul>
                            <!-- Rating -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-0 small"><i
                                        class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i
                                        class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i
                                        class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i
                                        class="fas fa-star-half-alt text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i
                                        class="far fa-star text-warning"></i></li>
                                <li class="list-inline-item ms-2 h6 fw-light">3.5/5.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->

        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="/frontend/images/courses/4by3/09.jpg" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#">JavaScript: Full Understanding</a>
                                </h5>
                                <!-- Wishlist icon -->
                                <a href="#"><i class="fas fa-heart text-danger"></i></a>
                            </div>
                            <!-- Content -->
                            <!-- Info -->
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="far fa-clock text-danger me-2"></i>7h 16m</li>
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="fas fa-table text-orange me-2"></i>12 lectures</li>
                                <li class="list-inline-item h6 fw-light"><i
                                        class="fas fa-signal text-success me-2"></i>Beginner</li>
                            </ul>
                            <!-- Rating -->
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
                                <li class="list-inline-item ms-2 h6 fw-light">4.0/5.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->

        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="/frontend/images/courses/4by3/11.jpg" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#">Build Responsive Websites with
                                        HTML</a></h5>
                                <!-- Wishlist icon -->
                                <a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
                            </div>
                            <!-- Content -->
                            <!-- Info -->
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="far fa-clock text-danger me-2"></i>15h 16m</li>
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="fas fa-table text-orange me-2"></i>38 lectures</li>
                                <li class="list-inline-item h6 fw-light"><i
                                        class="fas fa-signal text-success me-2"></i>All level</li>
                            </ul>
                            <!-- Rating -->
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
                                <li class="list-inline-item ms-2 h6 fw-light">4.0/5.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->

        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="/frontend/images/courses/4by3/12.jpg" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#">Build Websites with CSS</a></h5>
                                <!-- Wishlist icon -->
                                <a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
                            </div>
                            <!-- Content -->
                            <!-- Info -->
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="far fa-clock text-danger me-2"></i>22h 16m</li>
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="fas fa-table text-orange me-2"></i>16 lectures</li>
                                <li class="list-inline-item h6 fw-light"><i
                                        class="fas fa-signal text-success me-2"></i>Advance</li>
                            </ul>
                            <!-- Rating -->
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
                                <li class="list-inline-item ms-2 h6 fw-light">4.5/5.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->

        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="/frontend/images/courses/4by3/13.jpg" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#">PHP with - CMS Project</a></h5>
                                <!-- Wishlist icon -->
                                <a href="#"><i class="fas fa-heart text-danger"></i></a>
                            </div>
                            <!-- Content -->
                            <!-- Info -->
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="far fa-clock text-danger me-2"></i>10h 16m</li>
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                        class="fas fa-table text-orange me-2"></i>9 lectures</li>
                                <li class="list-inline-item h6 fw-light"><i
                                        class="fas fa-signal text-success me-2"></i>Intermediate</li>
                            </ul>
                            <!-- Rating -->
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
                                <li class="list-inline-item ms-2 h6 fw-light">4.5/5.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->
    </div>
    <!-- Course list END -->

    <!-- Pagination START -->
    <div class="col-12">
        <nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
            <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i
                            class="fas fa-angle-double-left"></i></a></li>
                <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                <li class="page-item mb-0"><a class="page-link" href="#">..</a></li>
                <li class="page-item mb-0"><a class="page-link" href="#">6</a></li>
                <li class="page-item mb-0"><a class="page-link" href="#"><i
                            class="fas fa-angle-double-right"></i></a></li>
            </ul>
        </nav>
    </div>
    <!-- Pagination END -->

</div>
</section>
<!-- =======================
Page content END -->

<!-- =======================
Action box START -->
<section class="pt-0">
<div class="container position-relative">
    <!-- SVG -->
    <figure class="position-absolute top-50 start-50 translate-middle ms-3">
        <svg>
            <path
                d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z"
                fill="#fff" fill-rule="evenodd" opacity=".502" />
            <path
                d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z"
                fill="#fff" fill-rule="evenodd" opacity=".102" />
            <path
                d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z"
                fill="#fff" fill-rule="evenodd" opacity=".2" />
            <path
                d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z"
                fill="#fff" fill-rule="evenodd" opacity=".2" />
        </svg>
    </figure>

    <div class="bg-success p-4 p-sm-5 rounded-3">
        <div class="row justify-content-center position-relative">
            <!-- Svg -->
            <figure class="fill-white opacity-1 position-absolute top-50 start-0 translate-middle-y">
                <svg width="141px" height="141px">
                    <path
                        d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z" />
                </svg>
            </figure>
            <!-- Action box -->
            <div class="col-11 position-relative">
                <div class="row align-items-center">
                    <!-- Title -->
                    <div class="col-lg-7">
                        <h3 class="text-white">Become an Instructor!</h3>
                        <p class="text-white mb-3 mb-lg-0">Speedily say has suitable disposal add boy. On
                            forth doubt miles of child. Exercise joy man children rejoiced. Yet uncommonly
                            his ten who diminution astonished.</p>
                    </div>
                    <!-- Button -->
                    <div class="col-lg-5 text-lg-end">
                        <a href="#" class="btn btn-dark mb-0">Start Teaching today</a>
                    </div>
                </div>
            </div>
        </div> <!-- Row END -->
    </div>
</div>
</section>
<!-- =======================
Action box END -->

@endsection

@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
    <script type="module">

    </script>
@endpush
