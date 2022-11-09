@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')

    <div class="container">

        <!-- Spacer -->
        <div class="page-spacer"></div>

        <div class="lg:flex lg:space-x-10">
            <!-- fillter -->
            @include('components.client.course.filter')

            <div class="w-full">

                <div class="md:flex justify-between items-center mb-8">

                    <div>
                        <div class="text-xl font-semibold"> Tất cả khóa học </div>
                        <div class="text-sm mt-2 font-medium text-gray-500 leading-6"> Tổng số khóa học +10.000 </div>
                    </div>

                    <div class="flex items-center justify-end">

                        <div class="bg-gray-100 border inline-flex p-0.5 rounded-md text-lg self-center">
                            <a href="#" class="py-1.5 px-2.5 rounded-md bg-white shadow" data-tippy-placement="top"
                                title="List view">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="courses.html" class="py-1.5 px-2.5 rounded-md" data-tippy-placement="top"
                                title="Grid view">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <div class="w-40 lg:block hidden ml-3">
                            <select class="selectpicker is-small rounded-md shadow-sm" data-size="7">
                                <option value="">Newest</option>
                                <option value="1">Popular</option>
                                <option value="2">Free</option>
                                <option value="3">Paid</option>
                            </select>
                        </div>

                    </div>
                </div>


                <div class="tube-card mt-3 lg:mx-0 -mx-5">

                    <h4 class="py-3 px-5 border-b font-semibold text-grey-700">
                        <ion-icon name="star"></ion-icon> Featured today
                    </h4>

                    <div class="divide-y">

                        @include('components.client.course.course-list')

                    </div>

                </div>

                <!-- pagination -->
                <div class="flex justify-center mt-9 space-x-2 text-base font-semibold text-gray-400 items-center">
                    <a href="#" class="py-1 px-3 bg-gray-200 rounded text-gray-600"> 1</a>
                    <a href="#" class="py-1 px-2 bg-gray-200 rounded"> 2</a>
                    <a href="#" class="py-1 px-2 bg-gray-200 rounded"> 3</a>
                    <ion-icon name="ellipsis-horizontal" class="text-lg -mb-4"></ion-icon>
                    <a href="#" class="py-1 px-2 bg-gray-200 rounded"> 12</a>
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
