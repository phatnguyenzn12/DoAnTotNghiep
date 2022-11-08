@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')

    <div class="container">

        <div class="md:flex justify-between items-center mb-8">

            <div>
                <div class="text-xl font-semibold"> Danh sách các khóa học </div>
                <div class="text-sm mt-2 font-medium text-gray-500 leading-6"> Học lập trình online với fpt poly </div>
            </div>

            <div class="flex items-center justify-end">

                <div class="bg-gray-100 border inline-flex p-0.5 rounded-md text-lg self-center">
                    <a href="#" class="py-1.5 px-2.5 rounded-md bg-white shadow" data-tippy-placement="top"
                        title="List view">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="courses.html" class="py-1.5 px-2.5 rounded-md" data-tippy-placement="top" title="Grid view">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                    </a>
                </div>
                <a href="#" class="bg-gray-100 border ml-2 px-3 py-2 rounded-md" data-tippy-placement="top"
                    title="Filter" uk-toggle="target: #course-filter;flip: true">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>

            </div>
        </div>

        <!--   Courselist  -->
        <div class="tube-card mt-3 lg:mx-0 -mx-5">

            <h4 class="py-3 px-5 border-b font-semibold text-grey-700">
                <ion-icon name="star"></ion-icon> Khóa học
            </h4>

            <div class="divide-y">
                <div class="flex md:space-x-6 space-x-3 md:p-5 p-2 relative">
                    <a href="course-intro-2.html"
                        class="md:w-60 md:h-36 w-28 h-20 overflow-hidden rounded-lg relative shadow-sm">
                        <img src="/frontend/assets/images/courses/img-5.jpg" alt=""
                            class="w-full h-full absolute inset-0 object-cover">
                        <img src="/frontend/assets/images/icon-play.svg" class="w-12 h-12 uk-position-center"
                            alt="">
                    </a>
                    <div class="flex-1 md:space-y-2 space-y-1">
                        <a href="course-intro-2.html" class="md:text-xl font-semibold line-clamp-2"> Learn C sharp for
                            Beginners Crash Course </a>
                        <p class="leading-6 pr-4 line-clamp-2 md:block hidden"> Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                            magna . </p>
                        <a href="#" class="md:font-semibold block text-sm"> John Michael</a>
                        <div class="flex items-center justify-between">
                            <div class="flex space-x-2 items-center text-sm">
                                <div> Giá khóa học </div>
                                <div class="md:block hidden">·</div>
                                <div class="flex items-center"> 18 Hourse </div>
                            </div>
                            <a href="#"
                                class="md:flex items-center justify-center h-9 px-8 rounded-md border -mt-3.5 hidden">
                                Mua ngay </a>
                        </div>

                        <div class="absolute top-1 right-3 md:flex hidden">
                            <a href="#" class="hover:bg-gray-200 p-1.5 inline-block rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                uk-drop="mode: hover;pos: top-right">

                                <ul class="space-y-1">
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <ion-icon name="share-outline" class="mr-1 text-lg"></ion-icon> Share
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <ion-icon name="star-outline" class="mr-1 text-lg"></ion-icon> Add favorites
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <ion-icon name="bookmark-outline" class="mr-1 text-lg"></ion-icon> Add
                                            Bookmark
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="-mx-2 my-2 dark:border-gray-800">
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                            <ion-icon name="heart-outline" class="mr-1 text-lg"></ion-icon> Wishlist
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex md:space-x-6 space-x-3 md:p-5 p-2 relative">
                    <a href="course-intro-2.html"
                        class="md:w-60 md:h-36 w-28 h-20 overflow-hidden rounded-lg relative shadow-sm">
                        <img src="/frontend/assets/images/courses/img-1.jpg" alt=""
                            class="w-full h-full absolute inset-0 object-cover">
                        <img src="/frontend/assets/images/icon-play.svg" class="w-12 h-12 uk-position-center"
                            alt="">
                    </a>
                    <div class="flex-1 md:space-y-2 space-y-1">
                        <a href="course-intro-2.html" class="md:text-xl font-semibold line-clamp-2"> Ultimate Web
                            Developer Course </a>
                        <p class="leading-6 pr-4 line-clamp-2 md:block hidden"> Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                            magna . </p>
                        <a href="#" class="md:font-semibold block text-sm"> Stella Johnson</a>
                        <div class="flex items-center justify-between">
                            <div class="flex space-x-2 items-center text-sm">
                                <div> Giá khóa học </div>
                                <div class="md:block hidden">·</div>
                                <div class="flex items-center"> 13 Hourse </div>
                            </div>
                            <a href="#"
                                class="md:flex items-center justify-center h-9 px-8 rounded-md border -mt-3.5 hidden">
                                Mua ngay </a>
                        </div>

                        <div class="absolute top-1 right-3 md:flex hidden">
                            <a href="#" class="hover:bg-gray-200 p-1.5 inline-block rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                uk-drop="mode: hover;pos: top-right">

                                <ul class="space-y-1">
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <ion-icon name="share-outline" class="mr-1 text-lg"></ion-icon> Share
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <ion-icon name="star-outline" class="mr-1 text-lg"></ion-icon> Add
                                            favorites
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <ion-icon name="bookmark-outline" class="mr-1 text-lg"></ion-icon> Add
                                            Bookmark
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="-mx-2 my-2 dark:border-gray-800">
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                            <ion-icon name="heart-outline" class="mr-1 text-lg"></ion-icon> Wishlist
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex md:space-x-6 space-x-3 md:p-5 p-2 relative">
                    <a href="course-intro-2.html"
                        class="md:w-60 md:h-36 w-28 h-20 overflow-hidden rounded-lg relative shadow-sm">
                        <img src="/frontend/assets/images/courses/img-3.jpg" alt=""
                            class="w-full h-full absolute inset-0 object-cover">
                        <img src="/frontend/assets/images/icon-play.svg" class="w-12 h-12 uk-position-center"
                            alt="">
                    </a>
                    <div class="flex-1 md:space-y-2 space-y-1">
                        <a href="course-intro-2.html" class="md:text-xl font-semibold line-clamp-2"> Build Responsive
                            Real World Websites </a>
                        <p class="leading-6 pr-4 line-clamp-2 md:block hidden"> Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                            magna . </p>
                        <a href="#" class="md:font-semibold block text-sm"> Monroe Parker</a>
                        <div class="flex items-center justify-between">
                            <div class="flex space-x-2 items-center text-sm">
                                <div> Giá khóa học </div>
                                <div class="md:block hidden">·</div>
                                <div class="flex items-center"> 23 Hourse </div>
                            </div>
                            <a href="#"
                                class="md:flex items-center justify-center h-9 px-8 rounded-md border -mt-3.5 hidden">
                                Mua ngay </a>
                        </div>

                        <div class="absolute top-1 right-3 md:flex hidden">
                            <a href="#" class="hover:bg-gray-200 p-1.5 inline-block rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                uk-drop="mode: hover;pos: top-right">

                                <ul class="space-y-1">
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <ion-icon name="share-outline" class="mr-1 text-lg"></ion-icon> Share
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <ion-icon name="star-outline" class="mr-1 text-lg"></ion-icon> Add
                                            favorites
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <ion-icon name="bookmark-outline" class="mr-1 text-lg"></ion-icon> Add
                                            Bookmark
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="-mx-2 my-2 dark:border-gray-800">
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-sm text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                            <ion-icon name="heart-outline" class="mr-1 text-lg"></ion-icon> Wishlist
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex md:space-x-6 space-x-3 md:p-5 p-2 relative">
                    <a href="course-intro-2.html"
                        class="md:w-60 md:h-36 w-28 h-20 overflow-hidden rounded-lg relative shadow-sm">
                        <img src="/frontend/assets/images/courses/img-4.jpg" alt=""
                            class="w-full h-full absolute inset-0 object-cover">
                        <img src="/frontend/assets/images/icon-play.svg" class="w-12 h-12 uk-position-center"
                            alt="">
                    </a>
                    <div class="flex-1 md:space-y-2 space-y-1">
                        <a href="course-intro-2.html" class="md:text-xl font-semibold line-clamp-2">
                            Learn Angular Fundamentals to Expert </a>
                        <p class="leading-6 pr-4 line-clamp-2 md:block hidden"> Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                            magna . </p>
                        <a href="single-channel.html" class="md:font-semibold block text-sm"> Jesse Stevens </a>
                        <div class="flex items-center justify-between">
                            <div class="flex space-x-2 items-center text-sm">
                                <div> Giá khóa học </div>
                                <div class="md:block hidden">·</div>
                                <div class="flex items-center"> 18 Hourse </div>
                            </div>
                            <a href="#"
                                class="md:flex items-center justify-center h-9 px-8 rounded-md border -mt-3.5 hidden">
                                Mua ngay </a>
                        </div>

                        <div class="absolute top-1 right-3 md:flex hidden">
                            <a href="#" class="hover:bg-gray-200 p-1.5 inline-block rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

      <!-- Pagination -->
      @include('components.client.pagination')


    </div>



    <!-- sidebar -->
    <div class="sidebar">
        <div class="sidebar_inner" data-simplebar>

            <ul class="side-colored">
                <li><a href="explore.html">
                        <ion-icon name="compass" class="side-icon"> </ion-icon>
                        <span> Explore</span>
                    </a>
                </li>
                <li class="active"><a href="courses.html">
                        <ion-icon name="play-circle" class="side-icon"> </ion-icon>
                        <span> Courses</span>
                    </a>
                </li>
                <li><a href="categories.html">
                        <ion-icon name="albums" class="side-icon"> </ion-icon>
                        <span> Categories </span>
                    </a>
                </li>
                <li><a href="episodes.html">
                        <ion-icon name="film" class="side-icon"> </ion-icon>
                        <span> Episodes </span>
                    </a>
                </li>
                <li><a href="books.html">
                        <ion-icon name="book" class="side-icon"> </ion-icon>
                        <span> Books </span>
                    </a>
                </li>
                <li><a href="blogs.html">
                        <ion-icon name="newspaper" class="side-icon"> </ion-icon>
                        <span> Articles</span>
                    </a>
                </li>
            </ul>

            <ul class="side_links" data-sub-title="Pages">
                <li><a href="page-pricing.html">
                        <ion-icon name="card-outline" class="side-icon"></ion-icon> Pricing
                    </a></li>
                <li><a href="page-help.html">
                        <ion-icon name="information-circle-outline" class="side-icon"></ion-icon> Help
                    </a></li>
                <li><a href="page-faq.html">
                        <ion-icon name="albums-outline" class="side-icon"></ion-icon> Faq
                    </a></li>
                <li><a href="page-forum.html">
                        <ion-icon name="chatbubble-ellipses-outline" class="side-icon"></ion-icon> Forum <span
                            class="soon">new</span>
                    </a></li>
                <li><a href="pages-cart.html">
                        <ion-icon name="receipt-outline" class="side-icon"></ion-icon> Cart list
                    </a></li>
                <li><a href="pages-account-info.html">
                        <ion-icon name="reader-outline" class="side-icon"></ion-icon> Billing
                    </a></li>
                <li><a href="pages-payment-info.html">
                        <ion-icon name="wallet-outline" class="side-icon"></ion-icon> Payments
                    </a></li>
                <li><a href="page-term.html">
                        <ion-icon name="document-outline" class="side-icon"></ion-icon> Term
                    </a></li>
                <li><a href="page-privacy.html">
                        <ion-icon name="document-text-outline" class="side-icon"></ion-icon> Privacy
                    </a></li>
                <li><a href="page-setting.html">
                        <ion-icon name="settings-outline" class="side-icon"></ion-icon> Setting
                    </a></li>
                <li><a href="#"> Development </a>
                    <ul>
                        <li><a href="development-elements.html"> Elements </a></li>
                        <li><a href="development-components.html"> Compounents </a></li>
                        <li><a href="development-plugins.html"> Plugins </a></li>
                        <li><a href="development-icons.html"> Icons </a></li>
                    </ul>
                </li>
                <li><a href="#"> Authentication </a>
                    <ul>
                        <li><a href="form-login.html">form login </a></li>
                        <li><a href="form-register.html">form register</a></li>
                    </ul>
                </li>
            </ul>

            <div class="side_foot_links">
                <a href="#">About</a>
                <a href="#">Blog </a>
                <a href="#">Careers</a>
                <a href="#">Support</a>
                <a href="#">Contact Us </a>
                <a href="#">Developer</a>
                <a href="#">Terms of service</a>
            </div>

        </div>

        <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>
    </div>
@endsection

@section('component_bot')
    @include('components.client.course.filter')
@endsection

@section('js-links')

@endsection
@push('js-handles')
    <script type="module"></script>
@endpush
