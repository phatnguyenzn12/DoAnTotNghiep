@php
    $mentor = \Illuminate\Support\Facades\Auth::guard('mentor')->user();
@endphp
@endphp
@extends('layouts.mentor.master')
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
        <form action="{{ route('teacher.account.forgotPassword', $mentor->id) }}" method="post" enctype="multipart/form-data"
            class="form">
            @csrf
            <div class="card-body">
                <!--begin::Alert-->
                <div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
                    <div class="alert-icon">
                        <span class="svg-icon svg-icon-3x svg-icon-danger">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Info-circle.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                    <rect fill="#000000" x="11" y="10" width="2" height="7"
                                        rx="1" />
                                    <rect fill="#000000" x="11" y="7" width="2" height="2"
                                        rx="1" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <div class="alert-text font-weight-bold">Định cấu hình mật khẩu người dùng hết hạn định kỳ. Người dùng
                        sẽ
                        cần cảnh báo rằng mật khẩu của họ sắp hết hạn,
                        <br />hoặc họ có thể vô tình bị khóa khỏi hệ thống!
                    </div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="ki ki-close"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <!--end::Alert-->
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Mật khẩu cũ</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" name="password"
                                class="form-control form-control-lg form-control-solid mb-2" />
                                <strong style="color: red">{{ Session::get('error') }}</strong>
                            <a href="#" class="text-sm font-weight-bold">Nhập cho đúng ?</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Mật khẩu mới</label>
                        <div class="col-lg-9 col-xl-6">
                            <input required type="password" name="password_1"
                                class="form-control form-control-lg form-control-solid" />
                                <strong  style="color: red">{{ Session::get('error1') }}</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Nhập lại mật khẩu</label>
                        <div class="col-lg-9 col-xl-6">
                            <input required type="password" name="password_2"
                                class="form-control form-control-lg form-control-solid" />
                                <strong  style="color: red">{{ Session::get('error1') }}</strong>
                        </div>
                    </div>    
                <div class="card-toolbar">
                    <button type="submit" class="btn btn-success mr-2">Lưu thay đổi</button>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>



@endsection

@section('js-links')
@endsection

@push('js-handles')
    <script></script>

    <script></script>
@endpush
