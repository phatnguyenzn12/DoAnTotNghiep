@extends('layouts.admin.master')

@section('title', 'Trang danh sách Khóa học')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
            @endif
            <!--begin::table-->
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <h4>Danh sách khóa học</h4>
                </div>
                <div class="card-body">
                    <form action="">
                        <!--begin::Search Form-->
                        <div class="mb-7">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" oninput="search(this)" class="form-control"
                                                    placeholder="Search..." id="kt_datatable_search_query"
                                                    filter-search-title />
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-2 my-md-0">
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
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                                <select class="form-control" id="kt_datatable_search_status"
                                                    onchange="fiterActive(this)">
                                                    <option value="0">All</option>
                                                    <option value="active">Đã được duyệt</option>
                                                    <option value="in_active">Chờ xử lý</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="range-slider">
                                    <label class="mr-3 mb-0 d-none d-md-block">Lọc theo giá:</label>
                                    <input class="input-range" orient="vertical" type="range" step="10000"
                                        onchange="fiterPrice(this)" value="{{ $min_price }}" min="{{ $min_price }}"
                                        max="{{ $max_price }}">
                                    <span class="range-value"></span>
                                </div> --}}
                            </div>
                        </div>
                        <!--end::Search Form-->
                    </form>
                </div>
            </div>
            <div class="" id="table-innerHtml">
                <!--begin::Col-->
                <!--end::Col-->
            </div>
            <!--end::table-->
        </div>
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
                price: 0,
                mentor_id: {{ $id }},
            }

            function showAjax(obj) {
                $.ajax({
                    url: '{{ route('mentor.listDataCourse') }}',
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

            function pagination(page) {
                objFiter.page = page
                showAjax(objFiter);
            }
        </script>
    @endpush
