@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')

    <div class="container">

        <div class="text-2xl font-semibold"> Bài viết </div>

        <div class="lg:flex lg:space-x-4 lg:-mx-4 mt-6">

            <div class="lg:w-10/12">
                <div class="divide-y tube-card px-6 md:m-0 -mx-5 py-2">

                    <div class="md:flex md:space-x-6 py-5">
                        <a href="blog-read.html">
                            <div class="md:w-56 w-full h-36 overflow-hidden rounded-lg relative shadow-sm">
                                <img src="/frontend/assets/images/blog/img-4.jpg" alt=""
                                    class="w-full h-full absolute inset-0 object-cover">
                                <div
                                    class="absolute bg-blue-100 font-semibold px-2.5 py-1 rounded-full text-blue-500 text-xs top-2.5 left-2.5">
                                    JavaScript
                                </div>
                            </div>
                        </a>
                        <div class="flex-1 md:pt-0 pt-4">

                            <a href="blog-read.html" class="text-lg font-semibold line-clamp-2 leading-8"> Interesting
                                JavaScript and CSS Libraries in 2021 you should be know</a>
                            <p class="line-clamp-2"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat </p>

                            <div class="flex items-center pt-2 text-sm">
                                <div class="flex items-center">
                                    <ion-icon name="thumbs-up-outline" class="text-xl mr-2"></ion-icon> 12
                                </div>
                                <div class="flex items-center mx-4">
                                    <ion-icon name="chatbubble-ellipses-outline" class="text-lg mr-2"></ion-icon> 12
                                </div>
                                <div class="flex items-center">
                                    <ion-icon name="bookmark-outline" class="text-xl mr-2"></ion-icon>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="md:flex md:space-x-6 py-5">
                        <a href="blog-read.html">
                            <div class="md:w-56 w-full h-36 overflow-hidden rounded-lg relative shadow-sm">
                                <img src="/frontend/assets/images/blog/img-1.jpg" alt=""
                                    class="w-full h-full absolute inset-0 object-cover">
                                <div
                                    class="absolute bg-yellow-100 font-semibold px-2.5 py-1 rounded-full text-yellow-500 text-xs top-2.5 left-2.5">
                                    Experiments
                                </div>
                            </div>
                        </a>
                        <div class="flex-1 md:pt-0 pt-4">

                            <a href="blog-read.html" class="text-lg font-semibold line-clamp-2 leading-8"> Top Amazing web
                                demos and experiments in 2021 Should Know About</a>
                            <p class="line-clamp-2"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat </p>

                            <div class="flex items-center pt-2 text-sm">
                                <div class="flex items-center">
                                    <ion-icon name="eye-outline" class="text-xl mr-2"></ion-icon> 43
                                </div>
                                <div class="flex items-center mx-4">
                                    <ion-icon name="thumbs-up-outline" class="text-xl mr-2"></ion-icon> 43
                                </div>
                                <div class="flex items-center">
                                    <ion-icon name="chatbubble-ellipses-outline" class="text-lg mr-2"></ion-icon> 12
                                </div>
                                <div class="flex items-center mx-4">
                                    <ion-icon name="bookmark-outline" class="text-xl mr-2"></ion-icon>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="md:flex md:space-x-6 py-5">
                        <a href="blog-read.html">
                            <div class="md:w-56 w-full h-36 overflow-hidden rounded-lg relative shadow-sm">
                                <img src="/frontend/assets/images/blog/img-2.jpg" alt=""
                                    class="w-full h-full absolute inset-0 object-cover">
                                <div
                                    class="absolute bg-purple-100 font-semibold px-2.5 py-1 rounded-full text-purple-500 text-xs top-2.5 left-2.5">
                                    Tools
                                </div>
                            </div>
                        </a>
                        <div class="flex-1 md:pt-0 pt-4">

                            <a href="blog-read.html" class="text-lg font-semibold line-clamp-2 leading-8"> Awesome Web Dev
                                Tools and Resources For 2021 in 30 Minutes </a>
                            <p class="line-clamp-2"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat </p>

                            <div class="flex items-center pt-2 text-sm">
                                <div class="flex items-center">
                                    <ion-icon name="eye-outline" class="text-xl mr-2"></ion-icon> 43
                                </div>
                                <div class="flex items-center mx-4">
                                    <ion-icon name="thumbs-up-outline" class="text-xl mr-2"></ion-icon> 43
                                </div>
                                <div class="flex items-center">
                                    <ion-icon name="chatbubble-ellipses-outline" class="text-lg mr-2"></ion-icon> 12
                                </div>
                                <div class="flex items-center mx-4">
                                    <ion-icon name="bookmark-outline" class="text-xl mr-2"></ion-icon>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="md:flex md:space-x-6 py-5">
                        <a href="blog-read.html">
                            <div class="md:w-56 w-full h-36 overflow-hidden rounded-lg relative shadow-sm">
                                <img src="/frontend/assets/images/blog/img-3.jpg" alt=""
                                    class="w-full h-full absolute inset-0 object-cover">
                                <div
                                    class="absolute bg-purple-100 font-semibold px-2.5 py-1 rounded-full text-purple-500 text-xs top-2.5 left-2.5">
                                    JavaScript
                                </div>
                            </div>
                        </a>
                        <div class="flex-1 md:pt-0 pt-4">

                            <a href="blog-read.html" class="text-lg font-semibold line-clamp-2 leading-8"> Interesting
                                JavaScript and CSS libraries for 2021 Should Know About</a>
                            <p class="line-clamp-2"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat </p>

                            <div class="flex items-center pt-2 text-sm">
                                <div class="flex items-center">
                                    <ion-icon name="eye-outline" class="text-xl mr-2"></ion-icon> 43
                                </div>
                                <div class="flex items-center mx-4">
                                    <ion-icon name="thumbs-up-outline" class="text-xl mr-2"></ion-icon> 43
                                </div>
                                <div class="flex items-center">
                                    <ion-icon name="chatbubble-ellipses-outline" class="text-lg mr-2"></ion-icon> 12
                                </div>
                                <div class="flex items-center mx-4">
                                    <ion-icon name="bookmark-outline" class="text-xl mr-2"></ion-icon>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- Pagination -->
                @include('components.client.pagination')
            </div>
            <!--  Sidebar  -->
            @include('components.client.blog.sidebar')

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
