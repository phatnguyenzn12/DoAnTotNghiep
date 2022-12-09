@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
    <!-- =======================
                            Page Banner START -->
    <section class="bg-dark align-items-center d-flex"
        style="background:url(/frontend/images/pattern/04.png) no-repeat center center; background-size:cover;">
        <!-- Main banner background image -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="text-white">Tất cả khóa học</h1>
                    <!-- Breadcrumb -->
                    <div class="d-flex">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Khóa học</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
                            Page Banner END -->

    <!-- =======================
                            Page content START -->
    <section class="pt-5">
        <div class="container">
            <!-- Search option START -->
            <div class="row mb-4 align-items-center">
                <!-- Search bar -->
                <div class="col-sm-6 col-xl-3">
                    <form class="border rounded p-2">
                        <div class="input-group input-borderless">
                            <input class="form-control me-1" oninput="search(this)" type="search"
                                placeholder="Search course">
                            <button type="button" class="btn btn-primary mb-0 rounded"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>

                <!-- Select option -->
                <div class="col-sm-6 col-xl-2 mt-3 mt-lg-0">
                    <form class="border rounded p-2 input-borderless">
                        <select class="form-select form-select-sm js-choice" onchange="fiterCategory(this)"
                            aria-label=".form-select-sm">
                            <option value="0">Category</option>
                            @foreach ($cate_courses as $cate_course)
                                <option value="{{ $cate_course->id }}">{{ $cate_course->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <!-- Select option -->
                <div class="col-sm-6 col-xl-2 mt-3 mt-xl-0">
                    <form class="border rounded p-2 input-borderless">
                        <select class="form-select form-select-sm js-choice" onchange="fiterSort(this)"
                            aria-label=".form-select-sm">
                            <option value="0">Sort by</option>
                            <option value="id_desc">Mới đến cũ</option>
                            <option value="id_asc">Cũ đến mới</option>
                        </select>
                    </form>
                </div>

                <div class="col-sm-6 col-xl-2 mt-3 mt-xl-0">
                    <form class="border rounded p-2 input-borderless">
                        <select class="form-select form-select-sm js-choice" onchange="fiterSale(this)"
                            aria-label=".form-select-sm">
                            <option value="0">Sale</option>
                            <option value="sale">Giảm giá</option>
                        </select>
                    </form>
                </div>

                <!-- Button -->
                {{-- <div class="col-sm-6 col-xl-2 mt-3 mt-xl-0 d-grid">
                    <a href="#" class="btn btn-lg btn-primary mb-0">Filter Results</a>
                </div> --}}
                <div class="col-sm-6 col-xl-3 mt-3 mt-xl-0 d-grid text-center">
                    <form class="border rounded p-2 input-borderless">
                        <label for="">Price</label>
                        <input class="input-range" orient="vertical" type="range" step="10000"
                            onchange="fiterPrice(this)" value="{{ $min_price }}" min="{{ $min_price }}"
                            max="{{ $max_price }}">
                        <span class="range-value"></span>
                    </form>
                </div>
            </div>
            <div id="table-innerHtml">

            </div>
            <!-- Search option END -->

            <!-- Course list START -->

        </div>
    </section>
    <!-- =======================
                            Page content END -->

    <!-- =======================
                            Action box START -->
    <section class="pt-0">
        <div class="container position-relative">
            <!-- SVG -->
            <figure class="position-absolute top-50 start-50 translate-middle ms-3">
                <svg>
                    <path
                        d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z"
                        fill="#fff" fill-rule="evenodd" opacity=".502" />
                    <path
                        d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z"
                        fill="#fff" fill-rule="evenodd" opacity=".102" />
                    <path
                        d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z"
                        fill="#fff" fill-rule="evenodd" opacity=".2" />
                    <path
                        d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z"
                        fill="#fff" fill-rule="evenodd" opacity=".2" />
                </svg>
            </figure>

            <div class="bg-success p-4 p-sm-5 rounded-3">
                <div class="row justify-content-center position-relative">
                    <!-- Svg -->
                    <figure class="fill-white opacity-1 position-absolute top-50 start-0 translate-middle-y">
                        <svg width="141px" height="141px">
                            <path
                                d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z" />
                        </svg>
                    </figure>
                    <!-- Action box -->
                    <div class="col-11 position-relative">
                        <div class="row align-items-center">
                            <!-- Title -->
                            <div class="col-lg-7">
                                <h3 class="text-white">Trở thành 1 người hướng dẫn !</h3>
                                <p class="text-white mb-3 mb-lg-0">Nhanh chóng nói có thích hợp xử lý thêm cậu bé. Trên dặm
                                    nghi ngờ của con. Niềm vui tập thể con người hân hoan. Tuy nhiên, bất thường mười người
                                    giảm đáng kinh ngạc của mình..</p>
                            </div>
                            <!-- Button -->
                            <div class="col-lg-5 text-lg-end">
                                <a href="#" class="btn btn-dark mb-0">Bắt đầu giảng dạy ngay hôm nay</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row END -->
            </div>
        </div>
    </section>
    <!-- =======================
                            Action box END -->

@endsection

@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
    <script>
        objFiter = {
            page: 1,
            title: 0,
            record: 10,
            id: 'id_desc',
            price: 0,
            discount: 0,
            cate_course: 0,
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('client.course.listData') }}',
                timeout: 1000,
                data: obj,

                success: function(res) {
                    $('#table-innerHtml').html(res)
                }
            })
        }
        showAjax(objFiter);

        function search(elemment) {
            objFiter.title = elemment.value
            showAjax(objFiter);
        }

        function fiterSort(elemment) {
            objFiter.id = elemment.value
            showAjax(objFiter);
        }

        function fiterCategory(elemment) {
            objFiter.cate_course = elemment.value
            showAjax(objFiter);
        }

        function fiterPrice(elemment) {
            objFiter.price = elemment.value
            showAjax(objFiter);
        }

        function fiterSale(elemment) {
            objFiter.discount = elemment.value
            showAjax(objFiter);
        }

        function pagination(page){
            objFiter.page = page
            showAjax(objFiter);
        }

        var range = $('.input-range'),
            value = $('.range-value');

        value.html(range.attr('value'));

        range.on('input', function() {
            value.html(this.value);
        });
    </script>
@endpush
