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
                            <form action="{{ route('admin.banner.update', $edit->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Tiêu đề</label>
                                            <input type="text" name="title" value="{{ $edit->title }}"
                                                class="form-control" placeholder="">
                                        </div>
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                        <div class="form-group">
                                            <label for="">Nội dung</label>
                                            <input type="text" name="content" value="{{ $edit->content }}"
                                                class="form-control" placeholder="">
                                        </div>
                                        <p class="text-danger">{{ $errors->first('content') }}</p>
                                        <div class="form-group">
                                            <label for="">Hình Ảnh</label>
                                            <div class="row">
                                                <div class="col-6 offset-3">
                                                    <img src="{{ asset($edit->image) }}" alt=""
                                                        class="img-thumbnail">
                                                </div>
                                                <br>
                                            </div>
                                            <input type="file" name="image" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">kiểu banner</label>
                                            <input type="text" name="type" value="{{ $edit->type }}"
                                                class="form-control" placeholder="" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mã giảm giá</label>

                                            <select name="discount_id" id="select2" class="form-control">
                                                {{-- <option value="">Chọn mã giảm giá</option> --}}
                                                @foreach ($discountCodes as $discountCode)
                                                    <option @selected($discountCode->discount_id == $edit->discount_code_id ?? true) value="{{ $discountCode->id }}">
                                                        {{ $discountCode->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <p class="text-danger">{{ $errors->first('discount_id') }}</p>
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
