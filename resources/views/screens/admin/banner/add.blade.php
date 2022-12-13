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
                        <h3 class="card-label">thêm mới banner
                            <span class="d-block text-muted pt-2 font-size-sm">add banner</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">

                    <!--begin: Datatable-->
                    <div id="datatable">
                        <table class="table table-separate table-head-custom table-checkable">
                            <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="">Tiêu đề</label>
                                            <input type="text" name="title" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nội dung</label>
                                            <input type="text" name="content" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hình Ảnh</label>
                                            <input type="file" name="image" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group" data-select2-id="2">
                                            <label>Chọn kiểu banner</label>
                                            <select class="form-control" name="type" id="exampleSelect1"
                                                onchange="selectBanner(this)">
                                                <option value="course">bài học mới</option>
                                                <option value="discount">mã giảm giá</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mã giảm giá</label>
                                            <select name="discount_id" id="select2" class="form-control">
                                                <option value="">Chọn mã giảm giá</option>
                                                <optgroup label="">
                                                    @foreach ($coupons as $coupon)
                                                        <option value="{{ $coupon->id }}">{{ $coupon->title }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Trạng thái</label>
                                            <div class="col-9 col-form-label">
                                                <div class="radio-inline">
                                                    <label class="radio">
                                                        <input type="radio" value="1" name="status"
                                                            @checked(true)>
                                                        <span></span>Công khai</label>
                                                    <label class="radio">
                                                        <input type="radio" value="0" name="status">
                                                        <span></span>Riêng tư</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <br>
                                        <a href="{{ route('admin.banner.index') }}" class="btn btn-danger">Hủy</a>
                                        &nbsp;
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </table>
                    </div>
                    <!--end: Datatable-->
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
    @endpush
