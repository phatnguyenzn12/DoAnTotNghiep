@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
    <!-- Slideshow -->
    <div class="uk-position-relative uk-visible-toggle overflow-hidden mb-8 lg:-mt-20" tabindex="-1"
        uk-slideshow="animation: scale ;min-height: 200; max-height: 500 ;autoplay: true">

        <ul class="uk-slideshow-items rounded">
            <li>
                <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
                    <img src="/frontend/assets/images/hero-1.jpg" class="object-cover" alt="" uk-cover>
                </div>
                <div class="container relative md:p-20 md:mt-7 p-5 h-full">
                    <div uk-slideshow-parallax="scale: 1,1,0.8"
                        class="flex flex-col justify-center h-full w-full space-y-3">
                        <h1 uk-slideshow-parallax="y: 100,0,0" class="lg:text-4xl text-2xl text-white font-semibold"> Learn
                            from the best</h1>
                        <p uk-slideshow-parallax="y: 150,0,0" class="text-base text-white font-medium pb-4 lg:w-1/2"> Choose
                            from 130,000 online video courses with new additions published every month </p>
                        <a uk-slideshow-parallax="y: 200,0,50" href="#"
                            class="bg-opacity-90 bg-white py-2.5 rounded-md text-base text-center w-32"> Get Started </a>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
                    <img src="/frontend/assets/images/hero-2.jpg" class="object-cover" alt="" uk-cover>
                </div>
                <div class="container relative md:p-20 md:mt-7 p-5 h-full">
                    <div uk-slideshow-parallax="scale: 1,1,0.8"
                        class="flex flex-col justify-center h-full w-full space-y-3">
                        <h1 uk-slideshow-parallax="y: 100,0,0" class="lg:text-4xl text-2xl text-white font-semibold"> Learn
                            from the best</h1>
                        <p uk-slideshow-parallax="y: 150,0,0" class="text-base text-white font-medium pb-4 lg:w-1/2"> Choose
                            from 130,000 online video courses with new additions published every month </p>
                        <a uk-slideshow-parallax="y: 200,0,0" href="#"
                            class="bg-opacity-90 bg-white py-2.5 rounded-md text-base text-center w-32"> Get Started </a>
                    </div>
                </div>
            </li>
        </ul>

        <ul class="uk-slideshow-nav uk-dotnav absolute bottom-0 left-0 m-7 lg:flex hidden"></ul>
    </div>

    <div class="mx-auto max-w-5xl p-4">

        <!--  courses discount -->
        @include('components.client.home.discount-course')
        <!--  courses owner-->
        @include('components.client.home.onwer-course')
        <!--  courses all -->
        @include('components.client.home.all-course')

    </div>
@endsection
@section('js-links')

@endsection
@push('js-handles')
    <script type="module"></script>
@endpush
