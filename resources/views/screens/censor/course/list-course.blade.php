@extends('layouts.censor.master')

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
                        <h3 class="card-label">Danh sách Mentor
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
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    <div id="datatable">
                        <table class="table table-separate table-head-custom table-checkable">
                            <thead>
                                <tr>
                                    <th>Tên khóa học</th>
                                    <th>Tên chủ sỡ hữu</th>
                                    <th>Nội dung</th>
                                    <th>Giá</th>
                                    <th>Video</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->title }}</td>
                                        @foreach (DB::table('mentors')->select('*')->where('id', $course->mentor_id)->get() as $mentor)
                                            <td>{{ $mentor->name }}</td>
                                        @endforeach
                                        <td>{{ $course->content }}</td>
                                        <td>{{ $course->price }}</td>
                                        <td>
                                            {{$course->video}}
                                            {{-- <iframe width="420" height="315" src="https://www.youtube.com/embed/A6XUVjK9W4o" frameborder="0" allowfullscreen></iframe> --}}
                                        </td>
                                        <td><img src="{{ $course->image }}" width="150" height="100" alt=""></td>
                                        <td>
                                            @if ($course->status == 1)
                                                {{ 'Hiện' }} @else{{ 'Ẩn' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($course->status == 1)
                                                <a href="{{ route('censor.course.actived', $course->id) }}"
                                                    onclick="return confirm('Bạn có chắc muốn ngừng hoạt động')"
                                                    class="btn btn-danger">Ẩn</a>
                                            @else
                                                <a href="{{ route('censor.course.actived', $course->id) }}"
                                                    onclick="return confirm('Bạn có chắc muốn hoạt động')"
                                                    class="btn btn-success">Hiện</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
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
@endpush
