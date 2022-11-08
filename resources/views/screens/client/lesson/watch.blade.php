@extends('layouts.client.master-lesson')

@section('title', 'Trang chủ')

@section('content')
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
                            {{-- @include('components.client.lesson.video') --}}
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
    function showAjax(url) {
        $.ajax({
            url: url,
            timeout: 1000,
            success: function(res) {
                $('.embed-video').html(res)
            }
        })
    }
</script>
@endpush
