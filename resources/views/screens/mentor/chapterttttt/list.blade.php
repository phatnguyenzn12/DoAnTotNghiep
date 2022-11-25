@extends('layouts.mentor.master')

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
            <a href="{{ route('mentor.course.create') }}" class="btn btn-primary mr-2 mb-3">Thêm khóa học</a>
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <form action="">
                        <!--begin::Search Form-->
                        <div class="mb-7">
                            <div class="row align-items-center">
                                <div class="col-lg-10 col-xl-10">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" name="q" class="form-control"
                                                    value="{{ request()->query('q') ?: '' }}" placeholder="Nhập tên..." />
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block">Danh mục:</label>
                                                <select name="category" class="form-control">
                                                    <option value="">Tất cả</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block">Trạng thái:</label>
                                                <select name="status" class="form-control">
                                                    <option value="" selected>Tất cả</option>
                                                    <option value="1"
                                                        {{ request()->query('status') == '1' ? 'selected' : '' }}>Công khai
                                                    </option>
                                                    <option value="0"
                                                        {{ request()->query('status') == '0' ? 'selected' : '' }}>Riêng tư
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 mt-5 mt-lg-0">
                                    <button class="btn btn-light-primary px-6 font-weight-bold">Lọc</button>
                                </div>
                            </div>
                        </div>
                        <!--end::Search Form-->
                    </form>
                </div>
            </div>

            <div class="row">
                <!--begin::Col-->
                @include('components.mentor.course.list-course')
                <!--end::Col-->
            </div>
            <!--end::table-->
        </div>
    @endsection
    @section('js-links')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    @endsection
    @push('js-handles')
        <script type="module">
    </script>
    @endpush
