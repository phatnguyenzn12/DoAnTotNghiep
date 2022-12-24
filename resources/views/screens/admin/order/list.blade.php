@extends('layouts.admin.master')

@section('title', 'Trang danh sách đơn hàng')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Danh sách đơn hàng</span>
                    </h3>
                </div>
                <div class="card-body pt-0 pb-3">
                    <!--begin::Table-->
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
                                                <option value="0">All</option>
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
                                                <option value="active">Hoạt động</option>
                                                <option value="in_active">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-uppercase">
                                    <th style="width: 100px">STT</th>
                                    <th style="width: 350px" class="pl-7">
                                        <span>Mã đơn hàng</span>
                                    </th>
                                    <th style="width: 220px">Tổng tiền</th>
                                    <th style="width: 350px">Người mua</th>
                                    <th style="width: 220px">Ngày mua</th>
                                    <th style="width: 420px">Active</th>
                                </tr>
                            </thead>
                            <tbody id="table-innerHtml">
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
    <script>
        objFiter = {
            page: 1,
            name: 0,
            record: 10,
            id: 0,
            is_active: 0,
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('admin.order.listData') }}',
                timeout: 1000,
                data: obj,

                success: function(res) {
                    $('#table-innerHtml').html(res)
                }
            })
        }
        showAjax(objFiter);

        function search(elemment) {
            objFiter.name = elemment.value
            showAjax(objFiter);
        }

        function fiterSort(elemment) {
            objFiter.id = elemment.value
            showAjax(objFiter);
        }

        function fiterActive(elemment) {
            objFiter.is_active = elemment.value
            showAjax(objFiter);
        }

        function pagination(page) {
            objFiter.page = page
            showAjax(objFiter);
        }
    </script>
@endpush
