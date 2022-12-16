@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp
@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')

    <!-- This is the modal -->
    <div class="container">

        <div class="lg:w-11/12 mx-auto">

            <div class="flex items-center mb-10">
                <a href="#" class="-ml-2 inline-flex p-1.5 text-xl">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
                <h3 class="font-semibold md:text-xl text-lg"> Thông tin cá nhân </h3>
            </div>

            <div class="bg-white rounded-md shadow">

                <h3 class="px-8 pt-5 mb-2 text-lg font-semibold"> Xin chào: {{ $user->name }}</h3>

                <div class="z-20 bg-white overflow-hidden border-b"
                    uk-sticky="cls-active:shadow rounded-none ;media 992; offset:67;bottom:true">
                    <nav class="cd-secondary-nav extanded px-6">
                        <ul class="space-x-3" uk-switcher="connect: #form_tabs; animation: uk-animation-fade">
                            <li><a href="#">
                                    <ion-icon name="document-text-outline" class="pr-2 text-2xl lg:block hidden"></ion-icon>
                                    Bản Thân
                                </a></li>
                            <li><a href="#">
                                    <ion-icon name="help-circle-outline" class="pr-2 text-2xl lg:block hidden"></ion-icon>
                                    Đổi mật khẩu
                                </a></li>
                            <li><a href="#">
                                    <ion-icon name="card-outline" class="pr-2 text-2xl lg:block hidden"></ion-icon>Khóa học
                                </a></li>
                            <li><a href="#">
                                    <ion-icon name="film-outline" class="pr-2 text-2xl lg:block hidden"></ion-icon>Media
                                </a></li>
                            <li><a href="#">
                                    <ion-icon name="globe-outline" class="pr-2 text-2xl lg:block hidden"></ion-icon>SEO
                                </a></li>
                            <li><a href="#">
                                    <ion-icon name="checkmark-circle-outline" class="pr-2 text-2xl lg:block hidden">
                                    </ion-icon>Finish
                                </a></li>
                        </ul>
                    </nav>
                </div>

                <div class="uk-switcher" id="form_tabs">
                    <!-- Basic  -->
                    <div class="p-8">

                        <div class="">
                            <!-- Course title -->
                            <form class="grid sm:grid-cols-3 align-items-baseline sm:gap-6 gap-2 md:mt-4"
                                action="{{ route('client.account.update', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="course_basic" class="font-medium"> Họ và tên <span
                                        class="text-red-600">*</span></label>
                                <div class="col-span-2">
                                    <input type="text" id="course_basic" name="name"
                                        class="shadow-none with-border" placeholder="Enter course title" required="">
                                </div>
                                <label for="course_basic" class="font-medium"> Số điện thoại <span
                                        class="text-red-600">*</span></label>
                                <div class="col-span-2">
                                    <input type="text" id="course_basic"
                                        name="number_phone" class="shadow-none with-border" placeholder="Enter course title"
                                        required="">
                                </div>
                                <label for="course_basic" class="font-medium"> Ảnh <span
                                        class="text-red-600">*</span></label>
                                <div class="col-span-2">
                                    <img id="mat_truoc_preview" src="{{ asset('') ?? 'http://placehold.it/100x100' }}"
                                        alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;"
                                        class="img-fluid" />
                                    <label for="cmt_truoc">Mặt trước</label><br />
                                    <input class="form-control-file @error('cmt_mat_truoc') is-invalid @enderror"
                                        id="cmt_truoc" type="file" name="avatar" class="form-group">
                                </div>
                                <div style="margin-left:500px ">
                                    <button type="submit"
                                        class="py-4 px-6 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Lưu</button>
                                </div>
                            </form>
                            <!-- Course short description  -->



                        </div>

                    </div>

                    <!-- Requirements  -->
                    <div class="p-8 md:w-3/4 mx-auto">
                        <form action="{{ route('client.account.updatepass', $user->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class=" blobk  grid sm:grid-cols-4 align-items-center sm:gap-6 gap-2 md:mt-4">
                                <div class="col-span-3 space-y-4">
                                    <label class="mb-4px" for="">Mật khẩu cũ</label>
                                    <input style="    margin-top: -8px;  }" type="text" id="requirements" name="password"
                                        class="shadow-none with-border" value="">
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <strong style="color: red">{{ Session::get('error') }}</strong>
                                        </div>
                                    @endif
                                </div>

                                {{-- @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif --}}
                            </div>
                            <div class="grid sm:grid-cols-4 align-items-center sm:gap-6 gap-2 md:mt-4">

                                <div class="col-span-3 space-y-4">
                                    <label for="">Mật khẩu mới</label>
                                    <input style="    margin-top: -8px;  }" type="text" id="requirements"
                                        name="password_2" class="shadow-none with-border" value="">
                                </div>
                                <!-- buttons -->
                                <div class="flex space-x-2">
                                    {{-- <ion-icon name="create-outline" class="text-xl rounded-md p-2.5 bg-gray-100"></ion-icon>
                                <ion-icon name="trash-outline" class="text-xl rounded-md p-2.5 bg-red-100 text-red-500">
                                </ion-icon> --}}
                                </div>

                            </div>
                            <div>
                                <button type="submit" style="width: 120px;magrin-top:5px;"
                                    class="bg-blue-600 px-4 py-2.5 rounded-md self-center text-center text-white w-full">
                                    Lưu thay đổi </button>
                            </div>
                        </form>

                    </div>
                    {{-- END INFO  --}}



                    {{-- END CART --}}

                    <!-- Pricing  -->
                    <div class="p-8 w-4/5 mx-auto py-12 md:space-y-10 space-y-4">

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
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                aria-expanded="true">
                                                <path fill-rule="evenodd"
                                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                        <a href="#" class="py-1.5 px-2.5 rounded-md" data-tippy-placement="top" title="List view">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                aria-expanded="false">
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
                                            @foreach ($courses as $course)
                                        <li class="flex items-start md:space-x-6 space-x-3 md:py-4 py-3">
                                            <a href="{{ route('client.course.show', ['slug' => $course->slug, 'course' => $course->id]) }}"
                                                class="uk-link-reset ">
                                                {{-- <div class="card uk-transition-toggle"> --}}
                                                    <a href="#">
                                                        <div class="h-12 md:h-16 md:w-24 overflow-hidden relative rounded -md w-12">
                                                            <img src="/frontend/assets/images/courses/img-3.jpg" alt=""
                                                                class="w-full h-full absolute inset-0 object-cover">
                                                        </div>
                                                    </a>
                                                    <div class=" flex flex-1 items-end justify-between space-x-5">
                                                        <div class=" flex-1 font-semibold line-clamp-2"> {{ $course->title }}.
                                                            <div class="mt-1.5">
                                                                <div class="mb-1.5 text-gray-400 text-sm"> 8/16 <span class="ml-1">
                                                                        Complete </span> </div>
                                                                <div class="relative bg-gray-200 rounded-md overflow-hidden w-full h-1">
                                                                    <div class="h-full w-1/2 bg-blue-600"></div>
                                                                </div>
                                                            </div>
                                                         </div>
                                                        <div class="flex space-x-2 items-center text-sm pt-3">
                                                            <div> 13 hours </div>
                                                            <div> · </div>
                                                            <div> {{ $course->lesson }} Bài học </div>
                                                            <div>·</div>
                                                            <div> {{ $course->chapter }} chương học </div>
                                                        </div>
                                                    </div>
                                                    <div class="relative overflow-hidden rounded-md bg-gray-200 h-1 mt-4">
                                                        <div class="w-2/4 h-full bg-green-500"></div>
                                                    </div>
                                                {{-- </div> --}}
                                            </a>
                                        </li>
                                        @endforeach

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

                    <!-- Media  -->
                    <div class="p-8 w-4/5 mx-auto py-12 space-y-5">

                        <div class="grid sm:grid-cols-3 align-items-baseline sm:gap-6 gap-2 md:mt-4">

                            <!-- Course provider -->
                            <label for="course_media" class="font-medium self-center">Course overview provider </label>
                            <select class="selectpicker border rounded-md col-span-2" name="course_media"
                                id="course_basic">
                                <option value="youtube">Youtube</option>
                                <option value="vimeo">Vimeo</option>
                                <option value="html5">Html5</option>
                            </select>

                            <!-- Course url -->
                            <label for="course_media" class="font-medium">Course overview url </label>
                            <div class="col-span-2">
                                <input type="text" id="course_media" name="course_media"
                                    class="shadow-none with-border"
                                    placeholder="E.g: https://www.youtube.com/watch?v=abcd1234" required="">
                            </div>

                            <!-- Course thumbnail -->
                            <label for="course_media" class="font-medium self-start">Course thumbnail </label>
                            <div class="col-span-2">
                                <aks-file-upload></aks-file-upload>
                            </div>

                        </div>


                    </div>

                    <!-- SEO  -->
                    <div class="p-8 w-4/5 mx-auto py-12 space-y-5">

                        <div class="grid sm:grid-cols-3 align-items-baseline sm:gap-6 gap-2 md:mt-4">

                            <!-- Meta keywords -->
                            <label for="course_meta" class="font-medium self-start"> Meta keywords </label>
                            <textarea class="with-border col-span-2 p-4 min-h-full resize-none" id="course_meta" name="course_meta"
                                type="text" rows="2" value=""></textarea>

                            <!-- Meta description  -->
                            <label for="course_description" class="font-medium self-start"> Meta description </label>
                            <div class="col-span-2 ">
                                <textarea class="with-border col-span-2 p-4" id="course_description" name="course_description" type="text"
                                    value=""></textarea>
                                <p class="mt-2 text-sm text-gray-500"> Your website's description, used mostly for SEO and
                                    search engines, Max of 100 characters is recommended</p>
                            </div>

                        </div>

                    </div>

                    <!-- Finish  -->
                    <div class="max-w-sm mx-auto px-20 py-20 uk-active">

                        <div class="flex flex-col items-center justify-center">
                            <ion-icon name="checkmark-circle" class="hydrated mb-2 md text-5xl text-green-500"
                                role="img" aria-label="checkmark circle"></ion-icon>
                            <h6 class="font-semibold text-2xl"> Thank You</h6>
                            <h1 class="font-medium mb-5 text-gray-500"> Just One click away</h1>
                            <button type="button"
                                class="bg-blue-600 px-4 py-2.5 rounded-md self-center text-center text-white w-full">Submit</button>
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
    <script>
        $(function() {
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#cmt_truoc").change(function() {
                readURL(this, '#mat_truoc_preview');
            });

        });
    </script>
@endpush
