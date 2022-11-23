@extends('layouts.mentor.master')

@section('title', 'Trang Quản Trị')

@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <a class="btn btn-primary" href="{{ route('mentor.certificate.create') }}">Tạo mới</a>
            <!--begin::Row-->
            <div class="row">
                @forelse ($certificates as $certificate)
                    <!--begin::Col-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b card-stretch">
                            <!--begin::Body-->
                            <div class="card-body pt-4">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end">
                                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions"
                                        data-placement="left">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                <li class="navi-item">
                                                    <a href="{{ route('mentor.certificate.edit',$certificate->id) }}" class="navi-link">
                                                        <span class="navi-text">
                                                            <span
                                                                class="label label-xl label-inline label-light-success">Sửa
                                                                chứng chỉ</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::User-->
                                <div class="mb-7">
                                    <!--begin::Pic-->

                                    <!--begin::Pic-->
                                    <div class=" mr-4 mt-lg-0 mt-3">
                                        <img src="{{ $certificate->image }}" alt="image" width="100%" height="100%" />
                                        <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                            <span class="font-size-h3 font-weight-boldest">JM</span>
                                        </div>
                                    </div>
                                    <!--end::Pic-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column mt-5">
                                        <a href="#"
                                            class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $certificate->title }}</a>
                                        <span class="text-muted font-weight-bold">Head of Development</span>
                                    </div>
                                    <!--end::Title-->

                                    <!--end::Title-->
                                </div>
                                <!--end::User-->
                                <!--begin::Desc-->
                                <p class="mb-7">
                                    <a href="#" class="text-primary pr-1">{{ $certificate->content }}
                                </p>
                                <!--end::Desc-->

                                <a href="#"
                                    class="btn btn-block btn-sm btn-light-warning font-weight-bolder text-uppercase py-4">Xóa
                                    chứng chỉ</a>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->
                @empty
                @endforelse

            </div>
            <!--end::Row-->
            <!--begin::Pagination-->
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap mr-3">
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-arrow-back icon-xs"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">23</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">24</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">25</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">26</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">27</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">28</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-arrow-next icon-xs"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <select
                        class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary"
                        style="width: 75px;">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="text-muted">Displaying 10 of 230 records</span>
                </div>
            </div>
            <!--end::Pagination-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection

@section('js-links')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@push('js-handles')
    <script>
        // axios.get('{{ route('api.mentor.statistical.listStudent') }}')
        // .then(
        //     res => {
        //         js_$('[show-list-student]').innerHTML = res.data
        //     }
        // )
    </script>
@endpush
