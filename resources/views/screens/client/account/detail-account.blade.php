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
                                    Bẩn Thân
                                </a></li>
                            <li><a href="#">
                                    <ion-icon name="help-circle-outline" class="pr-2 text-2xl lg:block hidden"></ion-icon>
                                    Đổi mật khẩu
                                </a></li>
                            <li><a href="#">
                                    <ion-icon name="card-outline" class="pr-2 text-2xl lg:block hidden"></ion-icon>Pricing
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
                                    <input type="text" id="course_basic" name="name" value="{{ $user->name }}"
                                           class="shadow-none with-border" placeholder="Enter course title" required="">
                                </div>
                                <label for="course_basic" class="font-medium"> Số điện thoại <span
                                        class="text-red-600">*</span></label>
                                <div class="col-span-2">
                                    <input type="text" id="course_basic" value="{{ $user->number_phone }}"
                                           name="number_phone" class="shadow-none with-border" placeholder="Enter course title"
                                           required="">
                                </div>
                                <label for="course_basic" class="font-medium"> Ảnh <span
                                        class="text-red-600">*</span></label>
                                <div class="col-span-2">
                                    <img id="mat_truoc_preview"
                                         src="{{ $user->avatar ? '' . Storage::url($user->avatar) : 'http://placehold.it/100x100' }}"
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

                        <div class="flex items-center justify-between space-x-2 mb-7">
                            <div>
                                {{-- <h4 class="font-semibold mb-1 text-lg">Đổi mật khẩu</h4> --}}
                                <div class="text-sm"> List of requirements that can be set for this course </div>
                            </div>
                            <button type="button" class="bg-gray-100 border p-2 px-4 rounded-md"> Create </button>

                        </div>
                        <form  action="{{ route('client.account.updatepass', $user->id) }}" method="post"
                               enctype="multipart/form-data">
                            @csrf
                            <div class="grid sm:grid-cols-4 align-items-center sm:gap-6 gap-2 md:mt-4">

                                <div class="col-span-3 space-y-4">
                                    <label for="">Mật khẩu cũ</label>
                                    <input type="text" id="requirements" name="password" class="shadow-none with-border"
                                           value="">
                                </div>
                                <!-- buttons -->
                                {{-- <div class="flex space-x-2">
                                <ion-icon name="create-outline" class="text-xl rounded-md p-2.5 bg-gray-100"></ion-icon>
                                <ion-icon name="trash-outline" class="text-xl rounded-md p-2.5 bg-red-100 text-red-500">
                                </ion-icon>
                            </div> --}}
                            </div>
                            <div class="grid sm:grid-cols-4 align-items-center sm:gap-6 gap-2 md:mt-4">

                                <div class="col-span-3 space-y-4">
                                    <label for="">Mật khẩu mới</label>
                                    <input type="text" id="requirements" name="password_2" class="shadow-none with-border"
                                           value="" >
                                </div>
                                <!-- buttons -->
                                <div class="flex space-x-2">
                                    {{-- <ion-icon name="create-outline" class="text-xl rounded-md p-2.5 bg-gray-100"></ion-icon>
                                <ion-icon name="trash-outline" class="text-xl rounded-md p-2.5 bg-red-100 text-red-500">
                                </ion-icon> --}}
                                </div>

                            </div>
                            <button type="submit" class="bg-gray-100 border p-2 px-4 rounded-md"> Create </button>
                        </form>

                    </div>

                    <!-- Pricing  -->
                    <div class="p-8 w-4/5 mx-auto py-12 md:space-y-10 space-y-4">

                        <div>
                            <div class="flex items-center justify-between space-x-2 mb-5">
                                <div>
                                    <h4 class="font-semibold mb-2 text-base">Check if this is a free course</h4>
                                    <div class="text-sm"> Set the price for this course or let the student register for
                                        free. </div>
                                </div>
                                <div class="switches-list -mt-8 is-large">
                                    <div class="switch-container">
                                        <label class="switch"><input type="checkbox"><span class="switch-button"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="grid sm:grid-cols-3 align-items-baseline sm:gap-6 gap-2">

                                <!-- Website title -->
                                <label for="course_basic" class="font-medium"> Course price ($) </label>
                                <div class="col-span-2">
                                    <input type="number" id="course_basic" name="course_basic"
                                           class="shadow-none with-border" value="Title" required="">
                                </div>

                            </div>
                        </div>
                        <div>

                            <div class="flex items-center justify-between space-x-2 mb-5">
                                <div>
                                    <h4 class="font-semibold mb-2 text-base"> Check if this course has discount</h4>
                                    <div class="text-sm"> This course has 0% Discount </div>
                                </div>
                                <div class="switches-list -mt-8 is-large">
                                    <div class="switch-container">
                                        <label class="switch"><input type="checkbox"><span class="switch-button"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="grid sm:grid-cols-3 align-items-baseline sm:gap-6 gap-2">

                                <!-- Website title -->
                                <label for="course_basic" class="font-medium">Discounted price ($) </label>
                                <div class="col-span-2">
                                    <input type="number" id="course_basic" name="course_basic"
                                           class="shadow-none with-border" value="Title" required="">
                                </div>

                            </div>

                        </div>


                        <div>

                            <div class="flex items-center justify-between space-x-2 mb-5">
                                <div>
                                    <h4 class="font-semibold mb-2 text-base">Sale type</h4>
                                    <div class="text-sm"> How do you want students to be registered </div>
                                </div>
                                <div class="switches-list -mt-8 is-large">
                                    <div class="switch-container">
                                        <label class="switch"><input type="checkbox"><span class="switch-button"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Website title -->
                            <div class="border divide-y rounded-md">
                                <div class="radio p-5 w-full">
                                    <input id="price-discount-1" name="radio" type="radio" checked>
                                    <label for="price-discount-1" class="font-semibold"><span class="radio-label"></span>
                                        Subscriptions</label>
                                    <p class="text-gray-500 text-sm mt-1.5 ml-7"> Lorem ipsum dolor sit amet nibh
                                        consectetuer adipiscing elit</p>
                                </div>
                                <br>
                                <div class="radio p-5 w-full">
                                    <input id="price-discount-2" name="radio" type="radio">
                                    <label for="price-discount-2" class="font-semibold"><span class="radio-label"></span>
                                        Selling </label>
                                    <p class="text-gray-500 text-sm mt-1.5 ml-7"> Lorem ipsum dolor sit amet nibh
                                        consectetuer adipiscing elit</p>
                                </div>
                                <br>
                                <div class="radio p-5 w-full">
                                    <input id="price-discount-3" name="radio" type="radio">
                                    <label for="price-discount-3" class="font-semibold"><span class="radio-label"></span>
                                        Bundle </label>
                                    <p class="text-gray-500 text-sm mt-1.5 ml-7"> Lorem ipsum dolor sit amet nibh
                                        consectetuer adipiscing elit</p>
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
