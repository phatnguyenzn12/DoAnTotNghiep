@extends('layouts.censor.master')
@section('title', 'Đổi mật khẩu')
@section('content')

    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Đổi mật khẩu</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Thay đổi mật khẩu của bạn</span>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form action="" method="post"
            enctype="multipart/form-data" class="form">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Mật khẩu cũ</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" name="password" class="form-control form-control-lg form-control-solid mb-2"
                            />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Mật khẩu mới</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" name="password_1" class="form-control form-control-lg form-control-solid" 
                           />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Nhập lại mật khẩu</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" name="password_2" class="form-control form-control-lg form-control-solid" 
                            />
                    </div>
                </div>
                <div class="card-toolbar">
                    <button type="submit" class="btn btn-success mr-2">Lưu thay đổi</button>
                    <button type="" class="btn btn-secondary"><a href="{{ route('censor.index') }}">Quay
                        lại</a></button>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>



@endsection

@section('js-links')
@endsection

@push('js-handles')
@endpush
