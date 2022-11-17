@extends('layouts.admin.master')

@section('title', 'Trang danh sách người dùng')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Chỉnh sửa Admin</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin::Form-->
                        
                        <form class="form" id="kt_form" method="POST" enctype="multipart/form-data" action="">
                            @csrf
                            <div class="card-toolbar">
                                <a href="{{route('admins.index')}}" class="btn btn-light-primary font-weight-bolder mr-2">
                                    <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary font-weight-bolder">
                                        <i class="ki ki-check icon-sm"></i>Cập nhật</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-8">
                                    <div class="my-5">
                                        <h3 class="text-dark font-weight-bold mb-10">Thông tin Admin:</h3>
                                        <div class="form-group row">
                                            <label class="col-3">Name</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-solid" type="text" name="name"
                                                    value="@isset($admin->name){{ $admin->name }}@endisset" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3">Email</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-solid" type="email" name="email"
                                                    value="@isset($admin->email){{ $admin->email }}@endisset" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3">Avatar</label>
                                            <div class="custom-file col-9">
                                                <input type="file" class="custom-file-input file-image" name="avatar"
                                                    accept=".png, .jpg, .jpeg, .jfif, .webp" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <div class="preview-image new col-12"></div>
                                            {{-- <div class="preview-image old col-12">
                                                <img src="/"
                                                    style="display:block;margin:10px auto 0;width: 100px;height: 150px;object-fit:cover;border:1px solid #3699ff;border-radius:5px; text-align: center">
                                            </div> --}}
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3">Phone</label>
                                            <div class="col-9">
                                                <div class="input-group input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="la la-phone"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="@isset($admin->number_phone){{ $admin->number_phone }}@endisset" placeholder="Phone" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!--end: Code-->
    </div>
    <!--end::Container-->
    </div>
    <!--end::Entry-->
    </div>
@endsection
