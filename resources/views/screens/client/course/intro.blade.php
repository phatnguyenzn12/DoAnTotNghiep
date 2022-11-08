@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
    <!-- course preview details -->
    <div class="bg-gradient-to-bl from-purple-600 to-purple-400 text-white lg:-mt-20 lg:pt-20">
        <div class="container p-0">
            <div class="lg:flex items-center lg:space-x-12 lg:py-10 p-4">

                <div class="lg:w-4/12">
                    <div class="w-full h-44 overflow-hidden rounded-lg relative lg:mb-0 mb-4">
                        <img src="/frontend/assets/images/courses/img-1.jpg" alt=""
                            class="w-full h-full absolute inset-0 object-cover">
                        <a href="#trailer-modal" class="uk-position-center" uk-toggle="" aria-expanded="false">
                            <img src="/frontend/assets/images/icon-play.svg" class="w-16 h-16" alt="">
                        </a>
                    </div>
                </div>
                <div class="lg:w-8/12">

                    <h1 class="lg:leading-10 lg:text-2xl text-white text-xl leading-8 font-semibold">{{ $course->title }}
                    </h1>
                    <p class="line-clamp-2 mt-3 md:block hidden"> Master JavaScript with the most complete Projects
                        Excellent course. we explain the core concepts in javascript
                        that are usually glossed over in other.. </p>

                    <ul class="flex text-gray-100 gap-4 mt-4 mb-1">
                        <li class="flex items-center">
                            <span class="avg bg-yellow-500 mr-2 px-2 rounded text-white font-semiold"> 4.9 </span>
                            <div class="star-rating text-yellow-200">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star-half"></ion-icon>
                            </div>
                        </li>
                        <li class="opacity-90">
                            <ion-icon name="people-outline"></ion-icon> 1200 Người tham gia
                        </li>
                    </ul>
                    <ul class="lg:flex items-center text-gray-100 mt-3 opacity-90">
                        <li> Giá khóa học -<a href="#" class="text-white fond-bold hover:underline hover:text-white">
                                {{ number_format($course->price) }} </a> </li>
                        <span class="lg:block hidden mx-3 text-2xl">·</span>
                        <li> Lần cuối cập nhật 10/2019</li>
                    </ul>

                </div>

            </div>
        </div>
    </div>

    <!--  course tabs -->
    <div class="bg-white border-b z-20 mb-4 overflow-hidden uk-sticky" uk-sticky="media: 992; offset:70" style="">
        <div class="mcontainer py-0 lg:px-20 flex justify-between items-center">

            <nav class="cd-secondary-nav nav-smal l flex-1">
                <ul class="space-x-3" uk-scrollspy-nav="closest: li; scroll: true">
                    <li class="uk-active"><a href="#Overview" uk-scroll="">Giới thiệu về khóa học</a></li>
                    <li class=""><a href="#curriculum" uk-scroll="">Nội dung khóa học</a></li>
                    <li class=""><a href="#reviews" uk-scroll="">Đánh giá về khóa học</a></li>
                </ul>
            </nav>

            <div class="flex space-x-3">
                @if ($course->users()->get()->contains(auth()->user()->id))
                    <a href="{{ route('client.lesson.index', $course->id) }}"
                        class="flex items-center justify-center h-9 px-6 rounded-md bg-blue-600 text-white"> Vào học
                    </a>
                @else
                    <a href="#" class="flex items-center justify-center h-9 px-6 rounded-md bg-gray-100"> Lưu khóa học
                    </a>
                    <form action="{{ route('client.order.addToCart', $course->id) }}" method="post">
                        @csrf
                        <button type="submit"
                            class="flex items-center justify-center h-9 px-6 rounded-md bg-blue-600 text-white">Thêm vào giỏ
                            hàng</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div class="uk-sticky-placeholder" style="height: 69px; margin: 0px 0px 16px;" hidden=""></div>

    <div class="container p-0">

        <div class="space-y-5 lg:w-9/12 mx-auto">

            <!-- course description -->
            @include('components.client.course.course-description')

            <!-- course Curriculum -->
            @include('components.client.course.course-curriculum')

            <!-- course review -->
            @include('components.client.course.review')

        </div>

    </div>


@endsection
@section('component_bot')
    @include('components.client.course.video')
@endsection
@section('js-links')

@endsection
@push('js-handles')
    <script type="module"></script>
@endpush
