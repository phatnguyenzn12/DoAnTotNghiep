@extends('layouts.auth.master')

@section('title', 'Trang Đăng nhập')

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
                            <p class="mb-0 h6 fw-light">Hãy học một cái gì đó mới ngày hôm nay!</p>
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
                            <p class="mb-0 h6 fw-light ms-0 ms-sm-3">
                                 + Sinh viên tham gia với chúng tôi, bây giờ đến lượt bạn.</p>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div class="col-12 col-lg-6 m-auto">
                    <div class="row my-5">
                        <div class="col-sm-10 col-xl-8 m-auto">
                            <!-- Title -->
                            <img src="frontend/images/element/03.svg" class="h-40px mb-2" alt="">
                            <h2>Đăng ký tài khoản của bạn!</h2>
                            <p class="lead mb-4">Rất vui được gặp bạn! Vui lòng Đăng ký bằng tài khoản của bạn.</p>

                            <!-- Form START -->
                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Họ và tên *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="fa fa-user-secret"></i></span>
                                        <input type="text" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="Name" value="{{ old('name') }}" id="" name="name">
                                    </div>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ email *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="bi bi-envelope-fill"></i></span>
                                        <input type="email" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="E-mail" id="exampleInputEmail1" value="{{ old('email') }}" name="email">
                                    </div>
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Số điện thoại *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="fa fa-phone"></i></span>
                                        <input type="text" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="Phone" id="" value="{{ old('number_phone') }}" name="number_phone">
                                    </div>
                                    <p class="text-danger">{{ $errors->first('number_phone') }}</p>
                                </div>
                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="inputPassword5" class="form-label">Mật khẩu *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="*********" id="inputPassword5" value="{{ old('password') }}" name="password">
                                    </div>
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                </div>
                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <label for="inputPassword6" class="form-label">Xác nhận mật khẩu *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="*********" id="inputPassword6" value="{{ old('re_password') }}" name="re_password">
                                    </div>
                                    <p class="text-danger">{{ $errors->first('re_password') }}</p>
                                </div>
                                <!-- Button -->
                                <div class="align-items-center mt-0">
                                    <div class="d-grid">
                                        <button class="btn btn-primary mb-0" type="submit">Đăng ký</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->

                            <!-- Social buttons -->
                            <div class="row">
                                <!-- Divider with text -->
                                <div class="position-relative my-4">
                                    <hr>
                                    <p class="small position-absolute top-50 start-50 translate-middle bg-body px-5">Hoặc
                                    </p>
                                </div>
                                <!-- Social btn -->
                                <div class="col-xxl-6 d-grid">
                                    <a href="{{ route('auth.google') }}" class="btn bg-google mb-2 mb-xxl-0"><i
                                            class="fab fa-fw fa-google text-white me-2"></i>Đăng nhập bằng Google</a>
                                </div>
                            </div>

                            <!-- Sign up link -->
                            <div class="mt-4 text-center">
                                <span>Bạn đã có tài khoản?<a href="{{ route('auth.login') }}">Đăng nhập</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js-links')
@endsection
@push('js-headles')
    <script type="module">
    (
        () => {
            const classname = ['bg-purple-500','purple-500','px-6','py-3','rounded-md','shadow','text-white']
            js_$('#pages').children[1].classList.add(...classname)
        }
    )()
    </script>
@endpush
