@extends('layouts.mentor.master')

@section('title', 'Trang danh sách mentor')
@section('content')
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Danh sách Giảng viên</span>
                <!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> -->
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('mentor.teacher.create') }}" class="btn btn-success font-weight-bolder font-size-sm">
                    <span class="svg-icon svg-icon-md svg-icon-white">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path
                                    d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Tạo mới giảng viên</a>
            </div>
        </div>

        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-0 pb-3">
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" oninput="search(this)" class="form-control"
                                        placeholder="Search..." id="kt_datatable_search_query" filter-search-title />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Sắp xếp:</label>
                                    <select class="form-control" id="kt_datatable_search_status" onchange="fiterSort(this)">
                                        <option value="0">Mặc định</option>
                                        <option value="id_desc">Mới đến cũ</option>
                                        <option value="id_asc">Cũ đến mới</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Trạng thái:</label>
                                    <select class="form-control" id="kt_datatable_search_status"
                                        onchange="fiterActive(this)">
                                        <option value="0">Mặc định</option>
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
            <!--begin::Table-->
            <div id="table-innerHtml">

            </div>
            <!--end::Table-->
            <!--end::Body-->
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
                    url: '{{ route('mentor.teacher.listData') }}',
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
