@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')

     <!-- This is the modal -->
     <div id="modal-example" uk-modal>
        <div class="uk-modal-body uk-modal-dialog rounded-md shadow-2xl">
            <h2 class="mb-2 uk-modal-title">Headline</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="uk-modal-footer text-right mt-6 px-0 space-x-1">
                <button class="button gray uk-modal-close" type="button">Cancel</button>
                <button class="button" type="button">Save</button>
            </div>
        </div>
    </div>



    <div class="absolute bg-gradient-to-l from-blue-400 h-52 left-0 to-blue-500 top-0 via-blue-400 w-full"> </div>

    <div class="py-6 z-10 relative">

        <div class="container mx-auto mt-10">

            <div class="xl:flex xl:space-x-10">

                <div class="xl:w-1/3">

                    <div class="bg-white shadow-md rounded-xl p-4">
                        <div class="h-28 w-28 mt-3 mx-auto relative rounded-full overflow-hidden">
                            <img src="/frontend/assets/images/avatars/avatar-3.jpg" alt=""
                                class="h-full w-full inset-0 object-cover rounded-full">
                        </div>
                        <div class="text-center p-4">
                            <h2 class="text-xl font-semibold"> Jesse Steven</h2>
                            <h6 class="text-sm font-medium text-gray-600"> info@mydomain.com</h6>
                        </div>

                        <div class="font-medium mt-2">
                            <div class="flex items-center py-2 space-x-3">
                                <div class="flex flex-1">
                                    <ion-icon name="play-circle-outline" class="text-xl mr-3 md hydrated" role="img"
                                        aria-label="play circle outline"></ion-icon>
                                    Các khóa học
                                </div>
                                <div class="text-black"> 24 </div>
                            </div>
                            <div class="flex items-center py-2 space-x-3">
                                <div class="flex flex-1">
                                    <ion-icon name="people-outline" class="text-xl mr-3 md hydrated" role="img"
                                        aria-label="people outline"></ion-icon>
                                    Thời gian tham gia
                                </div>
                                <div class="text-black"> 01/03/2021 </div>
                            </div>
                            <div class="flex items-center py-2 space-x-3">
                                <div class="flex flex-1">
                                    <ion-icon name="medal-outline" class="text-xl mr-3 md hydrated" role="img"
                                        aria-label="medal outline"></ion-icon>
                                    Khoá học hoàn thành
                                </div>
                                <div class="text-black"> 12 </div>
                            </div>

                        </div>

                        <div class="mt-3 text-sm">
                            <a href="#" class="bg-gray-100 block py-1.5 rounded text-center"
                                uk-toggle="target: #modal-example" aria-expanded="false">Chỉnh sửa</a>
                        </div>

                    </div>


                    <div class="bg-white shadow-md rounded-xl py-2 divide-y divide-gray-100 mt-6">
                        <a href="setting.html" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-50 ">
                            <ion-icon name="caret-forward-circle-outline" class="is-icon"></ion-icon>
                            <div class="text-black">Khóa học của tôi</div>
                        </a>
                        <a href="#" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-50">
                            <ion-icon name="book-outline" class="is-icon"></ion-icon>
                            <div class="text-black">Bài viết của tôi</div>
                        </a>
                        <a href="setting.html" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-50 ">
                            <ion-icon name="bookmarks-outline" class="is-icon"></ion-icon>
                            <div class="text-black">Bài viết đã lưu</div>
                        </a>
                    </div>

                </div>

                <div class="flex-1 bg-white shadow-md rounded-xl xl:mt-0 mt-10">

                    <div class="border-b items-end justify-between mb-6 sm:flex">
                        <div class="flex-1 mb-3 md:mb-0 p-5 pb-0">
                            <div class="font-semibold text-lg"> Các khóa học của tôi </div>
                            <nav class="cd-secondary-nav md:m-0 nav-small">
                                <ul>
                                    <li class="active"><a href="#" class="lg:px-2"> Chưa hoàn thành </a></li>
                                    <li><a href="#" class="lg:px-2"> Đã hoàn thành </a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="flex items-center p-5 space-x-3">
                            <div class="bg-gray-100 border inline-flex p-0.5 rounded-md text-lg fliter-tab"
                                uk-switcher="connect: #course-tabs; animation: uk-animation-fade">
                                <a href="#" class="py-1.5 px-2.5 rounded-md uk-active" data-tippy-placement="top"
                                    title="Grid view">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-expanded="true">
                                        <path fill-rule="evenodd"
                                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="#" class="py-1.5 px-2.5 rounded-md" data-tippy-placement="top"
                                    title="List view">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-expanded="false">
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                        </path>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>

                    <!-- my course list -->
                    <div class="p-6 pt-0">

                        <div class="uk-switcher" id="course-tabs" style="touch-action: pan-y pinch-zoom;">

                            <!-- layout 1 -->
                            <ul class="divide-y -mt-5 uk-active" style="">

                                <li class="flex items-start md:space-x-6 space-x-3 md:py-4 py-3">

                                    <a href="#">
                                        <div class="h-12 md:h-16 md:w-24 overflow-hidden relative rounded -md w-12">
                                            <img src="/frontend/assets/images/courses/img-3.jpg" alt=""
                                                class="w-full h-full absolute inset-0 object-cover">
                                        </div>
                                    </a>
                                    <div class="flex flex-1 items-end justify-between space-x-5">
                                        <div class="flex-1">
                                            <a href="#" class="md:text-base font-semibold line-clamp-1"> Build
                                                Responsive Real World Websites </a>
                                            <div class="mt-1.5">
                                                <div class="mb-1.5 text-gray-400 text-sm"> 8/16 <span class="ml-1">
                                                        Complete </span> </div>
                                                <div class="relative bg-gray-200 rounded-md overflow-hidden w-full h-1">
                                                    <div class="h-full w-1/2 bg-blue-600"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#"
                                            class="sm:flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold hidden">
                                            Resume
                                        </a>
                                    </div>

                                </li>
                                <li class="flex items-start md:space-x-6 space-x-3 md:py-4 py-3">

                                    <a href="#">
                                        <div class="h-12 md:h-16 md:w-24 overflow-hidden relative rounded -md w-12">
                                            <img src="/frontend/assets/images/courses/img-5.jpg" alt=""
                                                class="w-full h-full absolute inset-0 object-cover">
                                        </div>
                                    </a>
                                    <div class="flex flex-1 items-end justify-between space-x-5">
                                        <div class="flex-1">
                                            <a href="#" class="md:text-base font-semibold line-clamp-1"> Learn C
                                                sharp for Beginners Crash Course </a>
                                            <div class="mt-1.5">
                                                <div class="mb-1.5 text-gray-400 text-sm"> 7/12 <span class="ml-1">
                                                        Complete </span> </div>
                                                <div class="relative bg-gray-200 rounded-md overflow-hidden w-full h-1">
                                                    <div class="h-full w-3/4 bg-blue-600"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#"
                                            class="sm:flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold hidden">
                                            Resume
                                        </a>
                                    </div>

                                </li>
                                <li class="flex items-start md:space-x-6 space-x-3 md:py-4 py-3">

                                    <a href="#">
                                        <div class="h-12 md:h-16 md:w-24 overflow-hidden relative rounded -md w-12">
                                            <img src="/frontend/assets/images/courses/img-1.jpg" alt=""
                                                class="w-full h-full absolute inset-0 object-cover">
                                        </div>
                                    </a>
                                    <div class="flex flex-1 items-end justify-between space-x-5">
                                        <div class="flex-1">
                                            <a href="#" class="md:text-base font-semibold line-clamp-1"> The
                                                Complete JavaScript For Beginners </a>
                                            <div class="mt-1.5">
                                                <div class="mb-1.5 text-gray-400 text-sm"> 1/14 <span class="ml-1">
                                                        Complete </span> </div>
                                                <div class="relative bg-gray-200 rounded-md overflow-hidden w-full h-1">
                                                    <div class="h-full w-1/2 bg-blue-600"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#"
                                            class="sm:flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold hidden">
                                            Resume
                                        </a>
                                    </div>

                                </li>
                                <li class="flex items-start md:space-x-6 space-x-3 md:py-4 py-3">

                                    <a href="#">
                                        <div class="h-12 md:h-16 md:w-24 overflow-hidden relative rounded -md w-12">
                                            <img src="/frontend/assets/images/courses/img-6.jpg" alt=""
                                                class="w-full h-full absolute inset-0 object-cover">
                                        </div>
                                    </a>
                                    <div class="flex flex-1 items-end justify-between space-x-5">
                                        <div class="flex-1">
                                            <a href="#" class="md:text-base font-semibold line-clamp-1"> Responsive
                                                Web Design Essentials HTML5 CSS3 and Bootstrap </a>
                                            <div class="mt-1.5">
                                                <div class="mb-1.5 text-gray-400 text-sm"> 1/14 <span class="ml-1">
                                                        Complete </span> </div>
                                                <div class="relative bg-gray-200 rounded-md overflow-hidden w-full h-1">
                                                    <div class="h-full w-1/2 bg-blue-600"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#"
                                            class="sm:flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold hidden">
                                            Resume
                                        </a>
                                    </div>

                                </li>
                                <li class="flex items-start md:space-x-6 space-x-3 md:py-4 py-3">

                                    <a href="#">
                                        <div class="h-12 md:h-16 md:w-24 overflow-hidden relative rounded -md w-12">
                                            <img src="/frontend/assets/images/courses/img-3.jpg" alt=""
                                                class="w-full h-full absolute inset-0 object-cover">
                                        </div>
                                    </a>
                                    <div class="flex flex-1 items-end justify-between space-x-5">
                                        <div class="flex-1">
                                            <a href="#" class="md:text-base font-semibold line-clamp-1"> Build
                                                Responsive Real World Websites </a>
                                            <div class="mt-1.5">
                                                <div class="mb-1.5 text-gray-400 text-sm"> 8/16 <span class="ml-1">
                                                        Complete </span> </div>
                                                <div class="relative bg-gray-200 rounded-md overflow-hidden w-full h-1">
                                                    <div class="h-full w-1/2 bg-blue-600"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#"
                                            class="sm:flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold hidden">
                                            Resume
                                        </a>
                                    </div>

                                </li>

                                <!-- Pagination -->
                                @include('components.client.pagination')

                            </ul>

                            <!-- layout 2-->
                            <div class="grid md:grid-cols-2 gap-6" style="">



                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
@section('js-links')

@endsection
@push('js-handles')
    <script type="module"></script>
@endpush
