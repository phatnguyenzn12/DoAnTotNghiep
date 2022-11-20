@extends('layouts.mentor.master')

@section('title', 'Mentor')

@section('content')

    <!--begin::Content-->
    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Thông tin cá nhân</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Cập nhật thông tin cá nhân</span>
                </div>
                <div class="card-toolbar">
                    {{-- <button type="reset" class="btn btn-success mr-2">Lưu thay đổi</button> --}}
                    {{-- <button type="" class="btn btn-secondary"><a href="{{ route('mentor.home') }}">Quay lại</a></button> --}}
                    <a href=""></a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form class="form" action="{{ route('mentor.account.update', $mentor->id) }}" method="post"
                enctype="multipart/form-data">
                <!--begin::Body-->
                @csrf
                <div class="card-body">
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mb-6">Thông tin</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Ảnh đại diện</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="image-input image-input-outline" id="kt_profile_avatar"
                                style="background-image: url(assets/media/users/blank.png)">
                                <div class="image-input-wrapper"
                                    style="background-image: url(assets/media/users/300_21.jpg)">
                                    <img id="mat_truoc_preview" src="{{ asset('') }}" alt="your image"
                                        style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid" />
                                </div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title=""
                                    data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    {{-- <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="profile_avatar_remove" />
                                     --}}
                                    <input class="form-control-file @error('cmt_mat_truoc') is-invalid @enderror"
                                        id="cmt_truoc" type="file" name="avatar" class="form-group">
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <span id="cmt_truoc" class="form-text text-muted">mặt trước</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Họ và tên</label>
                        <div class="col-lg-9 col-xl-6">
                            <input name="name" class="form-control form-control-lg form-control-solid" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Địa chỉ</label>
                        <div class="col-lg-9 col-xl-6">
                            <input required name="address" class="form-control form-control-lg form-control-solid"
                                type="text" />
                            <span class="form-text text-muted">Ghi rõ địa chỉ hiện đang sinh sống.</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Trình độ học vấn</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <input required name="educations" type="text"
                                    class="form-control form-control-lg form-control-solid" />
                                <div class="input-group-append">
                                    <span class="input-group-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Kinh nghiệm</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <input required name="years_in_experience" type="text"
                                    class="form-control form-control-lg form-control-solid" />
                                <div class="input-group-append">
                                    <span class="input-group-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Bản thân</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <input required name="about_me" type="text"
                                    class="form-control form-control-lg form-control-solid" />
                                <div class="input-group-append">
                                    <span class="input-group-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Ngôn ngữ lập trình</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <input required name="skills" type="text"
                                    class="form-control form-control-lg form-control-solid" />
                                <div class="input-group-append">
                                    <span class="input-group-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mt-10 mb-6">Thông tin liên lạc</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Số điện thoại</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-phone"></i>
                                    </span>
                                </div>
                                <input required name="number_phone" type="number"
                                    class="form-control form-control-lg form-control-solid" placeholder="Phone" />
                            </div>
                            <span class="form-text text-muted">Chúng tôi sẽ đảm bảo thông tin của bạn được bảo mật an toàn
                                !</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Facebook</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-at"></i>
                                    </span>
                                </div>
                                <input required name="social_networks" type="text"
                                    class="form-control form-control-lg form-control-solid" placeholder="facebook" />
                            </div>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <button type="" class="btn btn-secondary"><a href="{{ route('mentor.home') }}">Quay
                                lại</a></button>
                        <button type="submit" class="btn btn-success mr-2">Lưu thay đổi</button>
                    </div>
                </div>
                <!--end::Body-->
            </form>
            <!--end::Form-->
        </div>
    </div>
    <!--end::Content-->


@endsection

@section('js-links')
@endsection

@push('js-handles')
    <script></script>
    <script>
        $(function() {
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#cmt_truoc").change(function() {
                readURL(this, '#mat_truoc_preview');
            });

        });
    </script>
    <script></script>
@endpush
