@extends('layouts.client.master-lesson')

@section('title', 'Trang chủ')

@section('content')

    @if ($checkUserLesson)
        <div id="modal-example" style="margin-left: 22.5rem; display: block;" uk-modal="" class="uk-modal uk-open"
            tabindex="0">
            <div class="uk-modal-dialog uk-modal-body rounded-md shadow-xl">

                <button class="absolute block top-0 right-0 m-6 rounded-full bg-gray-300 p-2 uk-modal-close" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <div class="text-sm mb-2"> Section 2 </div>
                <h2 class="mb-5 font-semibold text-2xl"> Your First webpage </h2>
                <p class="text-base">Bạn đang xem dỡ bài 2 chọn để tiếp tục.</p>

                <div class="text-right  pt-3 mt-3">
                    <a href="#" class="py-2 inline-block px-8 rounded-md hover:bg-gray-200 uk-modal-close"> tắt </a>
                    <a href="{{ route('client.lesson.index',['course' =>  $course->id,'lesson' => $lesson->id]) }}" class="py-2 inline-block px-8 rounded-md bg-blue-600 text-white"> Tiếp tục </a>
                </div>
            </div>
        </div>
    @else
    @endif


    <div id="wrapper" class="course-watch">

        <!--  Sidebar  -->
        @include('components.client.lesson.sidebar')

        <!-- Main Contents -->
        <div class="main_content">

            <div class="relative">

                <ul class="uk-switcher relative z-10" id="video_tabs" style="touch-action: pan-y pinch-zoom;">

                    <li class="uk-active">

                        <div class="embed-video">
                            <!-- to autoplay video uk-video="automute: true" -->
                            @include('components.client.lesson.video')
                        </div>
                    </li>

                </ul>

                <div class="bg-gray-200 w-full h-full absolute inset-0 animate-pulse"></div>

            </div>

            <nav class="cd-secondary-nav border-b md:p-0 lg:px-6 bg-white uk-sticky"
                uk-sticky="cls-active:shadow-sm ; media: @s" style="">
                <ul uk-switcher="connect: #course-tabs; animation: uk-animation-fade">
                    <li class="uk-active"><a href="#" class="lg:px-2" aria-expanded="true"> Thông tin </a></li>
                    <li><a href="#" class="lg:px-2" aria-expanded="false"> Hỏi đáp </a></li>
                </ul>
            </nav>
            <div class="uk-sticky-placeholder" style="height: 68px; margin: 0px;" hidden=""></div>

            <div class="container">

                <div class="max-w-2xl lg:py-6 mx-auto uk-switcher" id="course-tabs" style="touch-action: pan-y pinch-zoom;">

                    <!--  Overview -->
                    <div class="uk-active">
                        @include('components.client.lesson.overview')
                    </div>

                    <!--  comment -->
                    <div id="comments" class="tube-card p-6">
                        @include('components.client.lesson.comment')
                    </div>


                </div>
            </div>


        </div>

        <!-- This is the modal -->
        @include('components.client.lesson.modal')


    </div>
@endsection
@section('component_bottom')

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
