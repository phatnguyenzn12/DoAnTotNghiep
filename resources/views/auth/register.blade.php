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
                            <h2 class="fw-bold">Welcome to our largest community</h2>
                            <p class="mb-0 h6 fw-light">Let's learn something new today!</p>
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
                            <p class="mb-0 h6 fw-light ms-0 ms-sm-3">4k+ Students joined us, now it's your turn.</p>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div class="col-12 col-lg-6 m-auto">
                    <div class="row my-5">
                        <div class="col-sm-10 col-xl-8 m-auto">
                            <!-- Title -->
                            <img src="frontend/images/element/03.svg" class="h-40px mb-2" alt="">
                            <h2>Sign up for your account!</h2>
                            <p class="lead mb-4">Nice to see you! Please Sign up with your account.</p>

                            <!-- Form START -->
                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Name *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="fa fa-user-secret"></i></span>
                                        <input type="text" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="Name" id="" name="name">
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Email address *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="bi bi-envelope-fill"></i></span>
                                        <input type="email" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="E-mail" id="exampleInputEmail1" name="email">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Number *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="fa fa-phone"></i></span>
                                        <input type="text" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="Phone" id="" name="number_phone">
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="inputPassword5" class="form-label">Password *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="*********" id="inputPassword5" name="password">
                                    </div>
                                </div>
                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <label for="inputPassword6" class="form-label">Confirm Password *</label>
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="*********" id="inputPassword6" name="re_password">
                                    </div>
                                </div>
                                <!-- Check box -->
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-1">
                                        <label class="form-check-label" for="checkbox-1">By signing up, you agree to
                                            the<a href="#"> terms of service</a></label>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="align-items-center mt-0">
                                    <div class="d-grid">
                                        <button class="btn btn-primary mb-0" type="submit">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->

                            <!-- Social buttons -->
                            <div class="row">
                                <!-- Divider with text -->
                                <div class="position-relative my-4">
                                    <hr>
                                    <p class="small position-absolute top-50 start-50 translate-middle bg-body px-5">Or
                                    </p>
                                </div>
                                <!-- Social btn -->
                                <div class="col-xxl-6 d-grid">
                                    <a href="{{route('auth.login')}}" class="btn bg-google mb-2 mb-xxl-0"><i
                                            class="fab fa-fw fa-google text-white me-2"></i>Signup with Google</a>
                                </div>
                                <!-- Social btn -->
                                <div class="col-xxl-6 d-grid">
                                    <a href="#" class="btn bg-facebook mb-0"><i
                                            class="fab fa-fw fa-facebook-f me-2"></i>Signup with Facebook</a>
                                </div>
                            </div>

                            <!-- Sign up link -->
                            <div class="mt-4 text-center">
                                <span>Already have an account?<a href="{{route('auth.login')}}"> Sign in here</a></span>
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
