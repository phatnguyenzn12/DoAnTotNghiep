@extends('layouts.admin.master')

@section('title', 'Trang danh sách đơn hàng')
@section('content')

    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Chi tiết đơn hàng</span>
                <!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> -->
            </h3>

        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-0 pb-3">
            <!--begin::Table-->
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
                                    <label class="mr-3 mb-0 d-none d-md-block">Sort:</label>
                                    <select class="form-control" id="kt_datatable_search_status" onchange="fiterSort(this)">
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
                <table class="table table-head-custom table-head-bg table-borderless table-vertical-center ">

                    <thead>
                        <th scope="col">Tên khóa học</th>
                        <th scope="col" style="margin: auto">Ảnh</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Phần trăm thanh toán</th>

                    </thead>
                    <tbody>
                        <td>{{ $orderDetail->course->title }}</td>
                        <td style="width:250px"><img style="width:70%" src="{{ asset('app/' . $orderDetail->course->image) }}" alt="">
                        </td>
                        <td>{{ number_format($orderDetail->price) }}đ</td>
                        <td>{{ $orderDetail->percentage_pay }}%</td>
                    </tbody>
                </table>
                </table>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Body-->
    </div>


@endsection
