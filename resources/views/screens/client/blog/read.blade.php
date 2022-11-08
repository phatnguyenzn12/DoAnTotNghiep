@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')

    <div class="container p-0">

        <div class="lg:flex lg:space-x-4 lg:-mx-4">

            <div class="lg:w-9/12 lg:space-y-6">

                <div class="tube-card">

                    <div class="h-44 mb-4 md:h-72 overflow-hidden relative rounded-t-lg w-full">
                        <img src="/frontend/assets/images/blog/img-5.jpg" alt=""
                            class="w-full h-full absolute inset-0 object-cover">
                    </div>

                    <div class="md:p-6 p-4">

                        <h1 class="lg:text-2xl text-xl font-semibold mb-6"> Your Best Friend Before Google in Python! </h1>

                        <div class="flex items-center space-x-3 my-3 pb-4 border-b">
                            <img src="/frontend/assets/images/avatars/avatar-2.jpg" alt=""
                                class="w-10 rounded-full">
                            <div>
                                <div class="text-base font-semibold"> Stella Johnson </div>
                                <div class="text-xs"> Published on Feb 22, 2021 </div>
                            </div>
                        </div>


                        <div class="space-y-3">
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                                nostrud exerci tation
                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            </p>
                            <h3 class="text-xl font-semibold pt-2"> Maecenas Pretium Lorem Fermentum</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                                nostrud exerci tation
                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                                nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod
                                mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            </p>
                            <p>
                                Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            </p>
                        </div>


                        <div class="relative flex justify-between">
                            <a href="#" class="mt-3 inline-flex items-center space-x-3" aria-expanded="false">
                                <ion-icon name="share-social-outline" class="p-2 rounded-md text-lg bg-gray-200"></ion-icon>
                                <div> Intersting? <span class="text-blue-600"> Share it </span> </div>
                            </a>

                            <div class="bg-white w-96 shadow-md hidden mx-auto p-2 mt-12 rounded-md text-gray-500 border uk-drop"
                                uk-drop="mode: hover;pos: right-center;animation: uk-animation-slide-right-small; offset:15">

                                <div class="grid grid-flow-col text-sm w-full">
                                    <a href="#"
                                        class="p-2 text-center hover:bg-gray-100 rounded-md text-sm space-y-1">
                                        <ion-icon name="logo-facebook" class="text-4xl"></ion-icon>
                                        <div> Facebook </div>
                                    </a>
                                    <a href="#"
                                        class="p-2 text-center hover:bg-gray-100 rounded-md text-sm space-y-1">
                                        <ion-icon name="logo-facebook" class="text-4xl"></ion-icon>
                                        <div> Facebook </div>
                                    </a>
                                    <a href="#"
                                        class="p-2 text-center hover:bg-gray-100 rounded-md text-sm space-y-1">
                                        <ion-icon name="logo-google" class="text-4xl"></ion-icon>
                                        <div> Facebook </div>
                                    </a>
                                    <a href="#"
                                        class="p-2  text-center hover:bg-gray-100 rounded-md text-sm space-y-1">
                                        <ion-icon name="logo-twitter" class="text-4xl"></ion-icon>
                                        <div> Facebook </div>
                                    </a>
                                </div>
                            </div>
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

                <!-- related articles -->
                <div class="tube-card md:p-6 p-3 relative">

                    <h1 class="block text-xl font-semibold"> Related Articales </h1>

                    <div class="relative uk-slider" uk-slider="finite: true">

                        <div class="uk-slider-container px-1 py-3">
                            <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-2 uk-grid-small uk-grid"
                                style="transform: translate3d(0px, 0px, 0px);">
                                <li tabindex="-1" class="uk-active">
                                    <div>
                                        <a href="blog-read.html"
                                            class="w-full md:h-32 h-28 overflow-hidden rounded-lg relative block">
                                            <img src="/frontend/assets/images/blog/img-1.jpg" alt=""
                                                class="w-full h-full absolute inset-0 object-cover">
                                        </a>
                                        <div class="pt-3">
                                            <a href="blog-read.html" class="font-semibold line-clamp-2"> Top Amazing web
                                                demos and experiments in 2021 Should Know About</a>
                                            <div class="pt-2">
                                                <p class="text-sm"> Denise Marie</p>
                                                <div class="flex space-x-2 items-center text-xs">
                                                    <div> Feb 4, 2020 </div>
                                                    <div class="md:block hidden">·</div>
                                                    <div class="flex items-center">
                                                        <ion-icon name="chatbox-ellipses-outline"
                                                            class="text-base leading-0 mr-2"></ion-icon> 12
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li tabindex="-1" class="uk-active">
                                    <div>
                                        <a href="blog-read.html"
                                            class="w-full md:h-32 h-28 overflow-hidden rounded-lg relative block">
                                            <img src="/frontend/assets/images/blog/img-3.jpg" alt=""
                                                class="w-full h-full absolute inset-0 object-cover">
                                        </a>
                                        <div class="pt-3">
                                            <a href="blog-read.html" class="font-semibold line-clamp-2"> Interesting
                                                JavaScript and CSS libraries for 2021 Should Know About</a>
                                            <div class="pt-2">
                                                <p class="text-sm"> Anoundi hellows</p>
                                                <div class="flex space-x-2 items-center text-xs">
                                                    <div> May 2, 2020 </div>
                                                    <div class="md:block hidden">·</div>
                                                    <div class="flex items-center">
                                                        <ion-icon name="chatbox-ellipses-outline"
                                                            class="text-base leading-0 mr-2"></ion-icon> 12
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li tabindex="-1" class="uk-active">
                                    <div>
                                        <a href="blog-read.html"
                                            class="w-full md:h-32 h-28 overflow-hidden rounded-lg relative block">
                                            <img src="/frontend/assets/images/blog/img-4.jpg" alt=""
                                                class="w-full h-full absolute inset-0 object-cover">
                                        </a>
                                        <div class="pt-3">
                                            <a href="blog-read.html" class="font-semibold line-clamp-2"> Interesting
                                                JavaScript and CSS Libraries in 2021 you should be know</a>
                                            <div class="pt-2">
                                                <p class="text-sm"> Anoundi hellows</p>
                                                <div class="flex space-x-2 items-center text-xs">
                                                    <div> Jun 5, 2020 </div>
                                                    <div class="md:block hidden">·</div>
                                                    <div class="flex items-center">
                                                        <ion-icon name="chatbox-ellipses-outline"
                                                            class="text-base leading-0 mr-2"></ion-icon> 12
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li tabindex="-1">
                                    <div>
                                        <a href="blog-read.html"
                                            class="w-full md:h-32 h-28 overflow-hidden rounded-lg relative block">
                                            <img src="/frontend/assets/images/blog/img-2.jpg" alt=""
                                                class="w-full h-full absolute inset-0 object-cover">
                                        </a>
                                        <div class="pt-3">
                                            <a href="blog-read.html" class="font-semibold line-clamp-2"> Awesome Web Dev
                                                Tools and Resources For 2021 in 30 Minutes </a>
                                            <div class="pt-2">
                                                <p class="text-sm"> Anoundi hellows</p>
                                                <div class="flex space-x-2 items-center text-xs">
                                                    <div> May 4, 2020 </div>
                                                    <div class="md:block hidden">·</div>
                                                    <div class="flex items-center">
                                                        <ion-icon name="chatbox-ellipses-outline"
                                                            class="text-base leading-0 mr-2"></ion-icon> 12
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <a class="absolute bg-white top-16 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white uk-invisible"
                                href="#" uk-slider-item="previous">
                                <ion-icon name="chevron-back-outline"></ion-icon>
                            </a>
                            <a class="absolute bg-white top-16 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                                href="#" uk-slider-item="next">
                                <ion-icon name="chevron-forward-outline"></ion-icon>
                            </a>

                        </div>

                    </div>

                </div>

                <div class="tube-card p-6">

                    <h1 class="block text-xl font-semibold mb-6"> Comments (12) </h1>

                    <div class="space-y-5">

                        <div class="flex gap-x-4 relative rounded-md">
                            <img src="/frontend/assets/images/avatars/avatar-4.jpg" alt=""
                                class="rounded-full shadow w-12 h-12">
                            <a href="#"
                                class="bg-gray-100 py-1.5 px-4 rounded-full absolute right-5 top-0">Replay</a>
                            <div>
                                <h4 class="text-base m-0 font-semibold"> Stella Johnson</h4>
                                <span class="text-gray-700 text-sm">10th, April 2021</span>
                                <p class="mt-3 md:ml-0 -ml-16">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam ut laoreet dolore
                                    magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                </p>

                            </div>
                        </div>

                        <div class="flex gap-x-4 relative rounded-md">
                            <a href="#"
                                class="bg-gray-100 py-1.5 px-4 rounded-full absolute right-5 top-0">Replay</a>
                            <img src="/frontend/assets/images/avatars/avatar-3.jpg" alt=""
                                class="rounded-full shadow w-12 h-12">
                            <div>
                                <h4 class="text-base m-0 font-semibold"> Alex Dolgove</h4>
                                <span class="text-gray-700 text-sm"> 14th, April 2021 </span>
                                <p class="mt-3 md:ml-0 -ml-16">
                                    elit, sed diam ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                                    ipsum dolor sit
                                    amet, consectetuer adipiscing elit, sed diam ut laoreet dolore
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-x-4 relative rounded-md lg:ml-16">
                            <a href="#"
                                class="bg-gray-100 py-1.5 px-4 rounded-full absolute right-5 top-0">Replay</a>
                            <img src="/frontend/assets/images/avatars/avatar-1.jpg" alt=""
                                class="rounded-full shadow w-12 h-12">
                            <div>
                                <h4 class="text-base m-0 font-semibold"> Stella Johnson</h4>
                                <span class="text-gray-700 text-sm"> 13th, May 2021 </span>
                                <p class="mt-3 md:ml-0 -ml-16">
                                    elit, sed diam ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                                    ipsum dolor sit
                                    amet, consectetuer adipiscing elit, sed diam ut laoreet dolore
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="flex justify-center mt-9">
                        <a href="#"
                            class="bg-gray-50 border hover:bg-gray-100 px-4 py-1.5 rounded-full text-sm">More Comments
                            ..</a>
                    </div>

                </div>


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
