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
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..."
                                                id="kt_datatable_search_query" filter-search />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            <select class="form-control" id="kt_datatable_search_status">
                                                <option value="">All</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Delivered</option>
                                                <option value="3">Canceled</option>
                                                <option value="4">Success</option>
                                                <option value="5">Info</option>
                                                <option value="6">Danger</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                            <select class="form-control" id="kt_datatable_search_type">
                                                <option value="">All</option>
                                                <option value="1">Online</option>
                                                <option value="2">Retail</option>
                                                <option value="3">Direct</option>
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
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    <div class="row">
                        <!--begin::Col-->
                        @foreach ($courses as $course)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                <!--begin::Card-->
                                <div class="card card-custom gutter-b card-stretch">
                                    <!--begin::Body-->
                                    <a class="card-body pt-4 ribbon ribbon-right"
                                        href="{{ route('admin.course.program', $course->id) }}">
                                        <div class="ribbon-target bg-primary" style="top: 10px; right: -2px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $course->active }}</font>
                                            </font>
                                        </div>

                                        <!--begin::User-->
                                        <div class="d-flex align-items-center mb-7"
                                            style="aspect-ratio:1/1;overflow:hidden">
                                            <img src="{{ asset('app/' . $course->image) }}"
                                                style="width: 100%;height:100%;object-fit:cover" alt="image">
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Desc-->
                                        <h4 class=" mb-7 font-weight-bold"><a class="text-dark text-hover-primary"
                                                href="{{ route('admin.course.program', $course->id) }}">{{ $course->title }}</a>
                                        </h4>
                                        <!--end::Desc-->
                                        <!--begin::Info-->
                                        <div class="mb-7 p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 mr-2">Danh mục</span>
                                                <span
                                                    class="text-dark font-weight-bolder text-hover-primary">{{ $course->cateCourse->name }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-cente my-1">
                                                <span class="text-dark-75 mr-2">Chương học</span>
                                                <span
                                                    class="text-dark font-weight-bolder text-hover-primary">{{ $course->chapters->count() }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 mr-2">Bài học</span>
                                                <span
                                                    class="text-dark font-weight-bolder font-weight-bold">{{ $course->lessons->count() }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 mr-2">Giá khóa học</span>
                                                <span
                                                    class="text-dark font-weight-bolder font-weight-bold">{{ $course->price }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 mr-2">Giảm giá</span>
                                                <span
                                                    class="text-dark font-weight-bolder font-weight-bold">{{ $course->discount }}%
                                                    -
                                                    {{ $course->current_price }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 mr-2">Ngôn ngữ</span>
                                                <span
                                                    class="text-success font-weight-bolder">{{ $course->language }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 mr-2" href="">giấy chứng nhận</span>
                                                <a class="text-success font-weight-bolder" href="{{route('admin.course.create', ['id' => $course->id ])}}">thêm chứng chỉ</a>
                                            </div>    
                                            

                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 mr-2">tags</span>
                                                <span class="text-success font-weight-bolder">{{ $course->tags }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 mr-2">Kỹ năng</span>
                                                <span
                                                    class="text-success font-weight-bolder">{{ $course->skill->title }}</span>
                                            </div>
                                            @if ($course->price != null)
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <a href="{{ route('admin.course.actived', ['course' => $course->id, 'status' => 1]) }}"
                                                        onclick="return confirm('Bạn có chắc muốn hoạt động')"
                                                        class="btn btn-success">hoạt động</a>

                                                    <a href="{{ route('admin.course.actived', ['course' => $course->id, 'status' => 0]) }}"
                                                        onclick="return confirm('Bạn có chắc muốn ngừng hoạt động')"
                                                        class="btn btn-danger">Ngừng hoạt động</a>
                                                </div>
                                            @endif

                                        </div>
                                        <!--end::Info-->
                                    </a>
                                    <!--end::Body-->
                                </div>
                                <!--end:: Card-->
                            </div>
                        @endforeach
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
@endpush
