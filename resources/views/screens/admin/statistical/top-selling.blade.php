@extends('layouts.admin.master')

@section('title', 'Trang danh sách Khóa học')
@section('content')

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
                <h4>Danh sách khóa học thu được</h4>
            </div>
            <div class="card-body">
                <form action="">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-12">
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
                                            <label class="mr-3 mb-0 d-none d-md-block">Sắp xếp:</label>
                                            <select class="form-control" id="kt_datatable_search_status"
                                                onchange="fiterSort(this)">
                                                <option value="id_desc">All</option>
                                                <option value="id_desc">Mới đến cũ</option>
                                                <option value="id_asc">Cũ đến mới</option>
                                                <option value="price_desc">Gía từ cao đến thấp</option>
                                                <option value="price_asc">Gía từ thấp đến cao</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Bắt đầu:</label>
                                            <input type="datetime-local" name="" id="" class="form-control"
                                                value="{{ $courses->min('created_at') }}"
                                                max="{{ $courses->max('created_at') }}"
                                                min="{{ $courses->min('created_at') }}" onchange="fiterStartTime(this)">
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Kết thúc:</label>
                                            <input type="datetime-local" name="" id="" class="form-control"
                                                value="{{ $courses->max('created_at') }}"
                                                max="{{ $courses->max('created_at') }}"
                                                min="{{ $courses->min('created_at') }}" onchange="fiterEndTime(this)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="" id="table-innerHtml">
                        <!--begin::Col-->
                        <!--end::Col-->
                    </div>
                    <!--end::Search Form-->
                </form>
            </div>

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
            record: 8,
            id: 0,
            price: 0,
            start_time: 0,
            end_time: 0,
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('api.admin.statistical.apiCourseSelling') }}',
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

        function fiterStartTime(elemment) {
            objFiter.start_time = elemment.value
            showAjax(objFiter);
        }
        function fiterEndTime(elemment) {
            objFiter.end_time = elemment.value
            showAjax(objFiter);
        }

        function pagination(page) {
            objFiter.page = page
            showAjax(objFiter);
        }
    </script>
@endpush
