@extends('layouts.mentor.master')

@section('title', 'Trang Quản Trị')

@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..."
                                        id="kt_datatable_search_query" filter-search-title />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="kt_datatable_search_status" filter-sort>
                                        <option value="0">All</option>
                                        <option value="id_desc">Mới đến cũ</option>
                                        <option value="id_asc">Cũ đến mới</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="{{ route('mentor.certificate.create') }}">Tạo mới</a>
            <!--begin::Row-->
            <div class="" data-loading>
                <div class="row" show-list>
                    {{-- @forelse ($certificates as $certificate)
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
                    @endforelse --}}
                </div>
                @include('components.admin.pagination')
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection

@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
    <script type="module">

import { filter } from '/js/data-table.js'
const filter1 = new filter(
{
    title: 0,
    record: 10,
    id: 0,
},'{{ route('mentor.certificate.listData') }}',
(data) => {
    return data.data.map(val => {
        return `
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
                                            <a href="edit/${val.id}" class="navi-link">
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
                                <img src="{{asset('app')}}/${val.image}" alt="image" width="100%" height="100%" />
                                <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                    <span class="font-size-h3 font-weight-boldest">JM</span>
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Title-->
                            <div class="d-flex flex-column mt-5">
                                <a href="#"
                                    class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">${val.title}</a>
                                <span class="text-muted font-weight-bold">Head of Development</span>
                            </div>
                            <!--end::Title-->

                            <!--end::Title-->
                        </div>
                        <!--end::User-->
                        <!--begin::Desc-->
                        <p class="mb-7">
                            <a href="#" class="text-primary pr-1">${val.content}
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
            `
                }).join(',');
},
(data) => {
    return data.links.map(
        (val) => {
            return `<a filter-page="${val.url}" class="btn btn-icon btn-sm border-0 btn-hover-success mr-2 my-1 ${val.active == true ? 'active' : ''}">
        ${val.label.includes('e') == true ? `<i class="ki ki-bold-arrow-${val.label.includes('l') == true ? 'back' : 'next'} icon-xs text-success"></i>` : val.label}
        </a>`
        }
    ).join('')
},
)
filter1.get()
filter1.filterSearchTitle()
filter1.filterRecord() 
filter1.filterSort({title:'id'})
</script>
@endpush
