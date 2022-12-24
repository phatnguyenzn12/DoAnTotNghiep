@extends('layouts.auth.master')

@section('title', 'Trang Lấy lại mật khẩu')

@section('content')

    <section class="p-0 d-flex align-items-center position-relative overflow-hidden">

        <div class="container-fluid">
            <div class="row">
                <!-- left -->
                <div
                    class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10 vh-lg-100">
                    <div class="p-3 p-lg-5">
                        <!-- Title -->
                        <div class="text-center">
                            <h2 class="fw-bold">Chào mừng bạn đến khóa học online</h2>
                            <p class="mb-0 h6 fw-light">Hãy cùng tìm hiểu điều gì đó mới mẻ ngay hôm nay!</p>
                        </div>
                        <!-- SVG Image -->
                        <img src="frontend/images/element/02.svg" class="mt-5" alt="">
                        <!-- Info -->
                        <div class="d-sm-flex mt-5 align-items-center justify-content-center">
                            <ul class="avatar-group mb-2 mb-sm-0">
                                <li class="avatar avatar-sm"><img class="avatar-img rounded-circle"
                                        src="frontend/images/avatar/01.jpg" alt="avatar"></li>
                                <li class="avatar avatar-sm"><img class="avatar-img rounded-circle"
                                        src="frontend/images/avatar/02.jpg" alt="avatar"></li>
                                <li class="avatar avatar-sm"><img class="avatar-img rounded-circle"
                                        src="frontend/images/avatar/03.jpg" alt="avatar"></li>
                                <li class="avatar avatar-sm"><img class="avatar-img rounded-circle"
                                        src="frontend/images/avatar/04.jpg" alt="avatar"></li>
                            </ul>
                            <!-- Content -->
                            <p class="mb-0 h6 fw-light ms-0 ms-sm-3">+ Sinh viên tham gia với chúng tôi, bây giờ đến lượt bạn.</p>
                        </div>
                    </div>
                </div>
                <!-- Right -->
                <div class="col-12 col-lg-6 d-flex justify-content-center">
                    <div class="row my-5">
                        <div class="col-sm-10 col-xl-12 m-auto">

                            <!-- Title -->
                            <span class="mb-0 fs-1">🤔</span>
                            <h1 class="fs-2">Đổi mật khẩu mới?</h1>
                            <h5 class="fw-light mb-4">Nhập mật khẩu mới và xác nhận để tiếp tục sử dụng</h5>

                            <!-- Form START -->
                            <form method="POST">
                                @csrf
                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Nhập mật khẩu mới *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="bi bi-envelope-fill"></i></span>
                                        <input type="password" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="********" id="exampleInputEmail1" name="password">
                                    </div>
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Nhập lại mật khẩu mới *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="bi bi-envelope-fill"></i></span>
                                        <input type="password" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="********" id="exampleInputEmail1" name="re_password">
                                    </div>
                                    <p class="text-danger">{{ $errors->first('re_password') }}</p>
                                </div>
                                <!-- Button -->
                                <div class="align-items-center">
                                    <div class="d-grid">
                                        <button class="btn btn-primary mb-0" type="submit">Đổi mật khẩu</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->
                        </div>
                    </div> <!-- Row END -->
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
@endsection
