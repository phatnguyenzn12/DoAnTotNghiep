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
                @foreach ($chapters as $chapter)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b card-stretch">
                            <!--begin::Body-->
                            <a class="card-body pt-4 ribbon ribbon-right"
                                href="{{ route('teacher.chapter.program',$chapter->course_id) }}">

                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-7" style="aspect-ratio:1/1;overflow:hidden">
                                    <img src="{{ asset('app/' . $chapter->course->image) }}"
                                        style="width: 100%;height:100%;object-fit:cover" alt="image">
                                </div>
                                <!--end::User-->

                                <!--begin::Desc-->
                                <h4 class=" mb-7 font-weight-bold"><a class="text-dark text-hover-primary"
                                        href="">{{ $chapter->course->title }}</a> </h4>
                                <!--end::Desc-->
                                <!--begin::Info-->
                                <div class="mb-7 p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark-75 mr-2">Danh mục</span>
                                        <span
                                            class="text-dark font-weight-bolder text-hover-primary">{{ $chapter->course->cateCourse->name }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-cente my-1">
                                        <span class="text-dark-75 mr-2">Chương học</span>
                                        <span
                                            class="text-dark font-weight-bolder text-hover-primary">{{ $chapter->course->chapters->count() }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark-75 mr-2">Bài học</span>
                                        <span
                                            class="text-dark font-weight-bolder font-weight-bold">{{ $chapter->course->lessons->count() }}</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark-75 mr-2">Ngôn ngữ</span>
                                        <span
                                            class="text-success font-weight-bolder">{{ $chapter->course->language }}</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark-75 mr-2">Giấy chứng nhận</span>
                                        <span
                                            class="text-success font-weight-bolder">{{ $chapter->course->certificate != null ? 'có giấy chứng nhận' : ' không Có giấy chứng nhận' }}</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark-75 mr-2">tags</span>
                                        <span class="text-success font-weight-bolder">{{ $chapter->course->tags }}</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark-75 mr-2">Kỹ năng</span>
                                        <span
                                            class="text-success font-weight-bolder">{{ $chapter->course->skill->title }}</span>
                                    </div>
                                </div>
                                <!--end::Info-->
                            </a>
                            <!--end::Body-->
                        </div>
                        <!--end:: Card-->
                    </div>
                @endforeach

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
