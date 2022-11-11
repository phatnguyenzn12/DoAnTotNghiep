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
                        <div class="text-sm mt-2 font-medium text-gray-500 leading-6"> Tổng số khóa học <span
                                show-number></span> </div>
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

                    <div class="divide-y" data-loading>
                        <!-- course -->
                        @include('components.client.course.course-list')

                    </div>

                </div>

                <!-- pagination -->
                @include('components.client.pagination')

            </div>
        </div>


    </div>

@endsection

@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
    <script type="module">

import { filter } from '/js/data-table.js'
const filter1 = new filter(
    {
                    price: 0,
                    title: 0,
                    cate: 0,
                    id: 0,
                },
                '{{ route('client.course.filterCourse') }}',
    (data) => {
        return data.data.map(val => {
            console.log(val);
            return `<div class="flex md:space-x-6 space-x-3 md:p-5 p-2 relative">
        <a href="course-intro-2.html" class="md:w-60 md:h-36 w-28 h-20 overflow-hidden rounded-lg relative shadow-sm">
            <img src="/frontend/assets/images/courses/img-4.jpg" alt=""
                class="w-full h-full absolute inset-0 object-cover">
            <img src="/frontend/assets/images/icon-play.svg" class="w-12 h-12 uk-position-center" alt="">
        </a>
        <div class="flex-1 md:space-y-2 space-y-1">
            <a href="course-intro-2.html" class="md:text-xl font-semibold line-clamp-2"> ${ val.title }  </a>
            <p class="leading-6 pr-4 line-clamp-2 md:block hidden"> ${ val.content } </p>
            <a href="single-channel.html" class="md:font-semibold block text-sm"> Jesse Stevens </a>
            <div class="flex items-center justify-between">
                <div class="flex space-x-2 items-center text-sm">
                    <div> Advance levels </div>
                    <div class="md:block hidden">·</div>
                    <div class="flex items-center"> 18 Hourse </div>
                </div>
                <a href="#" class="md:flex items-center justify-center h-9 px-8 rounded-md border -mt-3.5 hidden">
                    Thêm vào giỏ hàng </a>
            </div>

            <div class="absolute top-1 right-3 md:flex hidden">
                <a href="#" class="hover:bg-gray-200 p-1.5 inline-block rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>`
        }).join(',');
    },
    (data) => {
        return data.links.map(
            (val,index) => {
                return `<a filter-page="${val.url}" href="#" class="py-1 px-2 bg-gray-200 rounded">
                    ${val.label.includes('e') == true ? `${val.label.includes('l') == true ?
                    '<ion-icon name="chevron-back-outline"></ion-icon>' :
                    '<ion-icon name="chevron-forward"></ion-icon>'}`
                    : val.label}
                    </a>`
            }
        ).join('')
    },
)

filter1.get()
filter1.filerSearchTitle()
filter1.filterPrice()
filter1.filterSort('id')
filter1.filterCate()

    </script>
@endpush
