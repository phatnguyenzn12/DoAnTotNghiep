@extends('layouts.mentor.master')

@section('title', 'Trang Quản Trị')

@section('content')

    <div class="row my-5">
        <div class="col-lg-4">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-primary svg-icon-4x">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Mirror.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                        <path
                                            d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Tổng
                                doanh số</a>
                            <div class="text-dark-75">123123123</div>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        <div class="col-lg-4">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-danger svg-icon-4x">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z"
                                            fill="#000000" />
                                        <path
                                            d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Thu
                                nhập tháng này</a>
                            <div class="text-dark-75">155</div>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        <div class="col-lg-4">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-success svg-icon-4x">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Sketch.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <polygon fill="#000000" opacity="0.3" points="5 3 19 3 23 8 1 8" />
                                        <polygon fill="#000000" points="23 8 12 20 1 8" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Thu
                                nhập tháng trước</a>
                            <div class="text-dark-75">150.000</div>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
    </div>
    <!--end::Section-->

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header h-auto">
            <!--begin::Title-->
            <div class="card-title py-5">
                <h3 class="card-label" total_price>Thu nhập: 12000</h3>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Khoá học </label>
                        <select class="form-control" id="kt_datatable_search_status" onchange="check_product(this)">
                            <option value="0">Tất cả</option>
                            @forelse ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="m-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Năm:</label>
                        <select class="form-control" id="kt_datatable_search_type" onchange="check_year(this)">
                            <option value="0">Tất cả</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary m-2 my-md-0">Lọc</button>
            </div>
            <!--end::Title-->
        </div>
        <!--end::Header-->
        <div class="card-body">
            <!--begin::Chart-->
            <div id="chart_1"></div>
            <!--end::Chart-->
        </div>
    </div>
    <!--end::Card-->

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">3 nguồn thu nhập hàng đầu</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin::Chart-->
            <div id="chart_12" class="d-flex justify-content-center"></div>
            <!--end::Chart-->
        </div>
    </div>
    <!--end::Card-->



@endsection

@section('js-links')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@push('js-handles')
    <script>
        // Shared Colors Definition
        const primary = '#6993FF';
        const success = '#1BC5BD';
        const info = '#8950FC';
        const warning = '#FFA800';
        const danger = '#F64E60';


        // Class definition
        function generateBubbleData(baseval, count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

                series.push([x, y, z]);
                baseval += 86400000;
                i++;
            }
            return series;
        }

        function generateData(count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = 'w' + (i + 1).toString();
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

                series.push({
                    x: x,
                    y: y
                });
                i++;
            }
            return series;
        }

        var filter = {
            'year': 0,
            'course_id': 0
        }

        var KTApexChartsDemo = function(data) {
            const apexChart = "#chart_1";
            var options = {
                series: [{
                    name: "Desktops",
                    data: data
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3',
                            'transparent'
                        ], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: ['tháng 1', 'tháng 2', 'tháng 3', 'tháng 4', 'tháng 5', 'tháng 6',
                        'tháng 7', 'tháng 8', 'tháng 9', 'tháng 10', 'tháng 11', 'tháng 12'
                    ],
                },
                colors: [primary]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        };

        jQuery(document).ready(function() {
            axiosApi()
        });


        function total(data) {
            console.log(data);
            $('[total_price]').html(
                'Thu nhập: ' + data.reduce((
                    partialSum, a) => partialSum + Number(a), 0)
            )
        }

        function check_product(elm) {
            filter.course_id = elm.value
            axiosApi()
        }

        function check_year(elm) {
            filter.year = elm.value
            axiosApi()
        }

        function axiosApi() {

            axios.get('{{ route('api.teacher.statistical.turnover') }}', {
                    params: filter
                })
                .then(
                    res => {
                        total(res.data);
                        KTApexChartsDemo(res.data);
                    }
                )
        }


        var KTApexChartsDemo1 = function(data) {
            const apexChart = "#chart_12";

            const arrOfNum = data.total.map(str => {
                return Number(str);
            });

            var options = {
                series: arrOfNum,
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: data.title,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: [primary, success, warning]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();

        };

        jQuery(document).ready(function() {
            axios.get('{{ route('api.mentor.statistical.apiCourseSellingTop') }}')
                .then(
                    res => {
                        KTApexChartsDemo1(res.data);
                    }
                )
        });
    </script>

    <script></script>
@endpush
