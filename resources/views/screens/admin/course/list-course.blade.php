@extends('layouts.admin.master')

@section('title', 'Trang danh sách khóa học')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Danh Sách Khóa Học
                            <span class="d-block text-muted pt-2 font-size-sm">Sorting &amp; pagination remote
                                datasource</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" oninput="search(this)" class="form-control"
                                                placeholder="Search..." id="kt_datatable_search_query"
                                                filter-search-title />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Sort:</label>
                                            <select class="form-control" id="kt_datatable_search_status"
                                                onchange="fiterSort(this)">
                                                <option value="id_desc">All</option>
                                                <option value="id_desc">Mới đến cũ</option>
                                                <option value="id_asc">Cũ đến mới</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            <select class="form-control" id="kt_datatable_search_status"
                                                onchange="fiterActive(this)">
                                                <option value="0">All</option>
                                                <option value="active">Được sử dụng</option>
                                                <option value="in_active">Chờ xử lý</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Category:</label>
                                            <select class="form-control" id="kt_datatable_search_status"
                                                onchange="fiterCategory(this)">
                                                <option value="0">All</option>
                                                @foreach ($cate_courses as $cate_course)
                                                    <option value="{{ $cate_course->id }}">{{ $cate_course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="range-slider">
                                <label class="mr-3 mb-0 d-none d-md-block">Lọc theo giá:</label>
                                <input class="input-range" orient="vertical" type="range" step="10000" onchange="fiterPrice(this)"
                                    value="{{$min_price}}" min="{{$min_price}}" max="{{$max_price}}">
                                <span class="range-value"></span>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    <div id="table-innerHtml">
                        <!--begin::Col-->

                        <!--end: Datatable-->
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
    <script>
        objFiter = {
            page: 1,
            title: 0,
            record: 6,
            id: 'id_desc',
            type: 0,
            cate_course: 0,
            price:0,
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('admin.course.listData') }}',
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

        function fiterActive(elemment) {
            objFiter.type = elemment.value
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
