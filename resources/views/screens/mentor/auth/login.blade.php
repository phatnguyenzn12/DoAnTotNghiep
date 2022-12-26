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
                        <h2 class="fw-bold">Chào mừng bạn đến với cộng đồng lớn nhất của chúng tôi</h2>
                        <p class="mb-0 h6 fw-light">Hãy cùng tìm hiểu điều gì đó mới mẻ ngay hôm nay!</p>
                    </div>
                    <!-- SVG Image -->
                    <img src="/svg/teacher.svg" class="mt-5" alt="">
                    <!-- Info -->
                    <div class="d-sm-flex mt-5 align-items-center justify-content-center">
                        <!-- Avatar group -->
                        <ul class="avatar-group mb-2 mb-sm-0">
                            <li class="avatar avatar-sm">
                                <img class="avatar-img rounded-circle" src="/frontend/images/avatar/01.jpg"
                                    alt="avatar">
                            </li>
                            <li class="avatar avatar-sm">
                                <img class="avatar-img rounded-circle" src="/frontend/images/avatar/02.jpg"
                                    alt="avatar">
                            </li>
                            <li class="avatar avatar-sm">
                                <img class="avatar-img rounded-circle" src="/frontend/images/avatar/03.jpg"
                                    alt="avatar">
                            </li>
                            <li class="avatar avatar-sm">
                                <img class="avatar-img rounded-circle" src="/frontend/images/avatar/04.jpg"
                                    alt="avatar">
                            </li>
                        </ul>
                        <!-- Content -->
                        <p class="mb-0 h6 fw-light ms-0 ms-sm-3">+ Sinh viên tham gia với chúng tôi, bây giờ đến lượt bạn.</p>
                    </div>
                </div>
            </div>

            <!-- Right -->
            <div class="col-12 col-lg-6 m-auto">
                <div class="row my-5">
                    <div class="col-sm-10 col-xl-8 m-auto">
                        <!-- Title -->
                        <span class="mb-0 fs-1">👋</span>
                        <h1 class="fs-2">Đặng nhập tài khoản giảng viên</h1>
                        <p class="lead mb-4">Rất vui được gặp bạn! Vui lòng đăng nhập bằng tài khoản của bạn.</p>

                        <!-- Form START -->
                        <form method="POST" action="{{ route('mentor.handleLogin') }}">

                            @csrf
                            <!-- Email -->
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Địa chỉ email *</label>
                                <div class="input-group input-group-lg">
                                    <span
                                        class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                            class="bi bi-envelope-fill"></i></span>
                                    <input type="email" class="form-control border-0 bg-light rounded-end ps-1"
                                        name="email" placeholder="Info@example.com" id="exampleInputEmail1">
                                </div>
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <!-- Password -->
                            <div class="mb-4">
                                <label for="inputPassword5" class="form-label">Mật khẩu *</label>
                                <div class="input-group input-group-lg">
                                    <span
                                        class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                            class="fas fa-lock"></i></span>
                                    <input type="password"
                                        class="form-control border-0 bg-light rounded-end ps-1"name="password"
                                        placeholder="******" id="inputPassword5">
                                </div>
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            </div>
                            <!-- Button -->
                            <div class="align-items-center mt-0">
                                <div class="d-grid">
                                    <button class="btn btn-primary mb-0" type="submit">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- Row END -->
            </div>
        </div> <!-- Row END -->
    </div>
</section>

@endsection
@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-headles')
    <script type="module">
    (
        () => {
            const classname = ['bg-purple-500','purple-500','px-6','py-3','rounded-md','shadow','text-white']
            js_$('#pages').children[0].classList.add(...classname)
        }
    )()
    </script>
@endpush
