@extends('layouts.admin.master')

@section('title', 'Trang Quản Trị')

@section('content')
    <div class="row">
        <div class="col-xl-3">
            <!--begin::Stats Widget 29-->
            <div class="card card-custom bgi-no-repeat card-stretch gutter-b"
                style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-3x svg-icon-info">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z"
                                    fill="#000000" />
                                <path
                                    d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>

                    <div class="text-inverse-success font-weight-bolder text-dark font-size-h5 mb-2 mt-5">Khóa học</div>
                    <div class="font-weight-bold text-inverse-success text-dark  font-size-sm">{{ $courses->count() }}</div>


                    <a href="{{ route('admin.course.index') }}" class="btn btn-bg-warning mt-3">Chi tiết</a>

                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 29-->
        </div>
        <div class="col-xl-3">
            <!--begin::Stats Widget 30-->
            <div class="card card-custom bg-info card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-3x svg-icon-white">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
                                    fill="#000000" opacity="0.3" />
                                <path
                                    d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
                                    fill="#000000" />
                                <path
                                    d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
                                    fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>

                    <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">Các khóa học bán
                        được</div>
                    <div class="font-weight-bold text-inverse-success font-size-sm">{{ $selling }}</div>
                    <a href="{{ route('admin.statistical.courseList') }}" class="btn btn-bg-white mt-3">Chi tiết</a>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 30-->
        </div>
        <div class="col-xl-3">
            <!--begin::Stats Widget 31-->
            <div class="card card-custom bg-danger card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-3x svg-icon-white">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                    height="16" rx="1.5"></rect>
                                <rect fill="#000000" x="8" y="9" width="3" height="11"
                                    rx="1.5"></rect>
                                <rect fill="#000000" x="18" y="11" width="3" height="9"
                                    rx="1.5"></rect>
                                <rect fill="#000000" x="3" y="13" width="3" height="7"
                                    rx="1.5"></rect>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>

                    <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">Số lượng khóa học
                        bán được</div>
                    <div class="font-weight-bold text-inverse-success font-size-sm">{{ $number_course_sold }}</div>
                    <button class="btn btn-bg-white mt-3">Chi tiết</button>

                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 31-->
        </div>
        <div class="col-xl-3">
            <!--begin::Stats Widget 32-->
            <div class="card card-custom bg-dark card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-3x svg-icon-white">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <path
                                    d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                <path
                                    d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>

                    <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">Học sinh theo học</div>
                    <div class="font-weight-bold text-inverse-success font-size-sm">{{ $student_number }}</div>

                    <button class="btn btn-bg-white mt-3">Chi tiết</button>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 32-->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3">
            <!--begin::Stats Widget 13-->
            <a href="#" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z"
                                    fill="#000000" opacity="0.3" />
                                <path
                                    d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z"
                                    fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>


                    <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">Đơn hàng</div>
                    <div class="font-weight-bold text-inverse-success font-size-sm">{{ $orders }}</div>

                    <button class="btn btn-bg-white mt-3">Chi tiết</button>

                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 13-->
        </div>
        <div class="col-xl-3">
            <!--begin::Stats Widget 14-->
            <a href="#" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <rect fill="#000000" x="4" y="4" width="7" height="7"
                                    rx="1.5"></rect>
                                <path
                                    d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                    fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>

                    <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">Đội nhóm giảng viên</div>
                    <div class="font-weight-bold text-inverse-success font-size-sm">{{ $cate_courses }}</div>

                    <button class="btn btn-bg-white mt-3">Chi tiết</button>

                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 14-->
        </div>
        <div class="col-xl-3">
            <!--begin::Stats Widget 15-->
            <a href="#" class="card card-custom bg-dark bg-hover-state-success card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M4.5,6 L19.5,6 C20.8807119,6 22,6.97004971 22,8.16666667 L22,16.8333333 C22,18.0299503 20.8807119,19 19.5,19 L4.5,19 C3.11928813,19 2,18.0299503 2,16.8333333 L2,8.16666667 C2,6.97004971 3.11928813,6 4.5,6 Z M4,8 L4,17 L20,17 L20,8 L4,8 Z"
                                    fill="#000000" fill-rule="nonzero" />
                                <polygon fill="#000000" opacity="0.3" points="4 8 4 17 20 17 20 8" />
                                <rect fill="#000000" opacity="0.3" x="7" y="20" width="10"
                                    height="1" rx="0.5" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>

                    <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">Banner quảng cáo</div>
                    <div class="font-weight-bold text-inverse-success font-size-sm"> {{ $banners }}</div>

                    <button class="btn btn-bg-white mt-3">Chi tiết</button>

                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 15-->
        </div>
        <div class="col-xl-3">
            <!--begin::Stats Widget 15-->
            <a href="#" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <path
                                    d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                <path
                                    d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">Số lượng giảng viên</div>
                    <div class="font-weight-bold text-inverse-success font-size-sm">{{ $teachers }}</div>

                    <button class="btn btn-bg-white mt-3">Chi tiết</button>

                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 15-->
        </div>


    </div>

    <!--begin::Card-->
    <div class="card card-custom gutter-b">

        <div class="card-header h-auto d-flex justify-content-between align-items-between">
            <!--begin::Title-->
            <div class="card-title py-5">
                <h3 class="card-label">Tổng thu nhập </h3>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Bắt đầu:</label>
                        <input type="datetime-local" name="" id="" class="form-control"
                            onchange="fiterEndTime(this)">
                    </div>
                </div>
                <div class="col-md-6 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Kết thúc:</label>
                        <input type="datetime-local" name="" id="max_created_at" class="form-control"
                            value="" onchange="fiterEndTime(this)">
                    </div>
                </div>

            </div>

            <!--end::Title-->
        </div>

        <div class="card-body">

            @include('components.base.statistical')
        </div>

    </div>

@endsection

@section('js-links')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@push('js-handles')
    <script>
        // var getDaysInMonth = function(month, year) {
        //     return new Date(year, month, 0).getDate();
        // }
        var date = new Date();
        // date = date.toLocaleString().replace(',', '').replaceAll('/', '-').slice(0, -2);

        function formatDate(date) {
            return (
                [
                    date.getFullYear(),
                    padTo2Digits(date.getMonth() + 1),
                    padTo2Digits(date.getDate()),
                ].join('-') +
                ' ' + [
                    padTo2Digits(date.getHours()),
                    padTo2Digits(date.getMinutes()),
                ].join(':')
            );
        }

        function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
        }

        // console.log(formatDate(date));
        // formatDate(date)
        js_$('#max_created_at').value = formatDate(date)

        objFiter = {
            // year: 0,
            // month: 0,
            // day: 0,
            start_time: 0,
            end_time: 0,
        }

        // function show_year() {
        //     let html = null
        //     let years = new Date().getFullYear();
        //     for (let index = 2010; index <= years; index++) {
        //         html += `<option value="${index}">năm ${index}</option>`;
        //     }
        //     $('#year').html(html);
        // }
        // show_year()

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('api.admin.statistical.apiAmount') }}',
                timeout: 1000,
                data: obj,

                success: function(res) {
                    $('#total_price').html(res.total_course)
                    $('#admin').html(res.amount_price_admin)
                    $('#teacher').html(res.amount_price_teacher)
                }
            })
        }
        showAjax(objFiter);

        function fiterStartTime(elemment) {
            objFiter.start_time = elemment.value
            showAjax(objFiter);
        }

        function fiterEndTime(elemment) {
            objFiter.end_time = elemment.value
            showAjax(objFiter);
        }
        // function year_fill(elm) {
        //     objFiter.year = elm.value
        //     showAjax(objFiter)
        // }

        // function month_fill(elm) {
        //     objFiter.month = elm.value
        //     let days = getDaysInMonth(3, 2022)
        //     let html = null
        //     for (let index = 1; index <= days; index++) {
        //         html += `<option value="${index}">ngày ${index}</option>`;
        //     }
        //     $('#days').html(html);

        //     showAjax(objFiter)
        // }

        // function day_fill(elm) {
        //     objFiter.day = elm.value
        //     showAjax(objFiter)
        // }
    </script>
@endpush
