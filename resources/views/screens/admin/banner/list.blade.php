@extends('layouts.admin.master')

@section('title', 'Trang danh sách người dùng')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Danh sách banners
                            <span class="d-block text-muted pt-2 font-size-sm">Sorting &amp; pagination remote
                                datasource</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path
                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>Thêm mới</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..."
                                                id="kt_datatable_search_query" filter-search-title/>
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
                    <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    <div id="datatable">
                        <table class="table table-separate table-head-custom table-checkable" data-loading>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>nội dung</th>
                                    <th>hình ảnh</th>
                                    <th>kiểu banner</th>
                                    <th>trạng thái</th>
                                    <th>xử lý</th>

                                </tr>
                            </thead>
                            <tbody show-list>
                                {{-- @include('components.admin.banner.body-table') --}}
                            </tbody>
                        </table>
                        @include('components.admin.pagination')
                    </div>
                    <!--end: Datatable-->
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
    <script type="module">

    import { filter } from '/js/data-table.js'
    const filter1 = new filter(
        {
            title: 0,
            record: 10,
            id: 0,
        },'{{ route('admin.banner.listData') }}',
        (data) => {
            return data.data.map(val => {
                return `<tr>
                    <td>${val.id}</td>
                    <td><a class="text-dark" >${val.title}</a></td>
                    <td><a class="text-dark" >${val.content}</a></td>
                    <td><img src="{{asset('app')}}/${val.image}" alt="" width="150px" height="80px"></td>
                    <td><a class="text-dark" >${val.type}</a></td>
                    <td><button></button></td>
                    <td><a class="btn btn-light btn-sm" href="edit-banner/${val.id}">
                        <i class="flaticon2-pen text-warning"></i></a>
                    <a class="btn btn-light btn-sm" href="delete/${val.id}">
                        <i class="flaticon2-trash text-danger"></i></a></td>
                    </tr>               
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
