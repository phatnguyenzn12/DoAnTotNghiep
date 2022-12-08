@extends('layouts.client.master')
@section('title', 'Trang cá nhân')

@section('content')

    <!-- =======================
                            Page Banner START -->
    <section class="pt-0">
        <!-- Main banner background image -->
        <div class="container-fluid px-0">
            <div class="bg-blue h-100px h-md-200px rounded-0"
                style="background:url(/frontend/images/pattern/04.png) no-repeat center center; background-size:cover;">
            </div>
        </div>
        <div class="container mt-n4">
            <div class="row">
                <!-- Profile banner START -->
                <div class="col-12">
                    <div class="card bg-transparent card-body p-0">
                        <div class="row d-flex justify-content-between">
                            <!-- Avatar -->
                            <div class="col-auto mt-4 mt-md-0">
                                <div class="avatar avatar-xxl mt-n3">
                                    <img class="avatar-img rounded-circle border border-white border-3 shadow"
                                        src="/frontend/images/avatar/01.jpg">
                                </div>
                            </div>
                            <!-- Profile info -->
                            <div class="col d-md-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <h1 class="my-1 fs-4">{{ $user->name }} <i
                                            class="bi bi-patch-check-fill text-info small"></i></h1>
                                </div>
                                <!-- Button -->
                                {{-- <div class="d-flex align-items-center mt-2 mt-md-0">
								<a href="instructor-create-course.html" class="btn btn-success mb-0">Create a course</a>
							</div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Profile banner END -->

                    <!-- Advanced filter responsive toggler START -->
                    <!-- Divider -->
                    <hr class="d-xl-none">
                    <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                        <a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
                        <button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                            <i class="fas fa-sliders-h"></i>
                        </button>
                    </div>
                    <!-- Advanced filter responsive toggler END -->
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
                            Page Banner END -->

    <!-- =======================
                            Page content START -->
    <section class="pt-0">
        <div class="container">
            <div class="row">

                <!-- Left sidebar START -->
                <div class="col-xl-3">
                    <!-- Responsive offcanvas body START -->
                    <div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar"
                        aria-labelledby="offcanvasSidebarLabel">
                        <!-- Offcanvas header -->
                        <div class="offcanvas-header bg-light">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
                        </div>
                        <!-- Offcanvas body -->
                        <div class="offcanvas-body p-3 p-xl-0">
                            <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
                                <!-- Dashboard menu -->
                                <div class="list-group list-group-dark list-group-borderless">
                                    <a class="list-group-item" href={{ route('client.account.myCourse') }}><i
                                            class="bi bi-ui-checks-grid fa-fw me-2"></i>Khóa học của tôi</a>
                                    <a class="list-group-item active" href="{{ route('client.account.detail') }}"><i
                                            class="bi bi-pencil-square fa-fw me-2"></i>Thông tin cá nhân</a>
                                    <a class="list-group-item text-danger bg-danger-soft-hover" href="#"><i
                                            class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Responsive offcanvas body END -->
                </div>
                <!-- Left sidebar END -->

                <!-- Main content START -->
                <div class="col-xl-9">
                    <!-- Edit profile START -->
                    <div class="card bg-transparent border rounded-3">
                        <!-- Card header -->
                        <div class="card-header bg-transparent border-bottom">
                            <h3 class="card-header-title mb-0">Thông tin cá nhân</h3>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Form -->
                            <form action="{{ route('client.account.update', $user->id) }}" method="post"
                                enctype="multipart/form-data"class="row g-4">
                                @csrf
                                <!-- Profile picture -->
                                <div class="col-12 justify-content-center align-items-center">
                                    <label class="form-label">Ảnh đại diện</label>
                                    <div class="d-flex align-items-center">
                                        {{-- <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                                            <!-- Avatar place holder -->
                                            <span class="avatar avatar-xl">
                                                <img id="mat_truoc_preview" name="avatar"
                                                    class="avatar-img rounded-circle border border-white border-3 shadow"
                                                    src="/frontend/images/avatar/07.jpg" alt="">
                                            </span>
                                            <!-- Remove btn -->
                                            {{-- <button type="button" class="uploadremove"><i class="bi bi-x text-white"></i></button>
                                        </label>
                                        <!-- Upload button -->
                                        <label class="btn btn-primary-soft mb-0" for="uploadfile-1">Change</label>
                                        <input id="uploadfile-1" class="form-control d-none" type="file"> --}}
                                        {{-- // --}}
                                        <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                                            <span class="avatar avatar-xl">
                                                <img name="avatar" id="mat_truoc_preview"
                                                    src="/frontend/images/avatar/01.jpg" alt="your image"
                                                    class="avatar-img rounded-circle border border-white border-3 shadow"
                                                    class="img-fluid" />
                                                <label for="cmt_truoc">Mặt trước</label>
                                            </span><br />
                                            <input
                                                class=" w-[125px] btn btn-primary-soft mb-0 form-control-file @error('cmt_mat_truoc') is-invalid @enderror"
                                                id="cmt_truoc" required type="file" name="avatar" class="form-group">
                                            {{-- <span class="avatar avatar-xl">
                                                <img name="avatar" id="mat_truoc_preview"
                                                    src="{{ asset('app/' . $user->avatar) }}" alt="your image"
                                                    class="avatar-img rounded-circle border border-white border-3 shadow"
                                                    class="img-fluid" />
                                                    <label for="cmt_truoc">Mặt trước</label>
                                            </span><br />

                                            <input type="file" name="avatar" class="form-control" placeholder=""> --}}
                                        </label>
                                    </div>

                                </div>

                                <!-- Full name -->
                                <div class="col-12">
                                    {{-- <label class="form-label">Họ và tên </label>
								<div class="input-group">
									<input type="text" name="name" class="form-control" value="" placeholder="Tên">
									{{-- <input type="text" class="form-control" value="" placeholder="Tên">
								</div> --}}
                                </div>

                                <!-- Username -->
                                <div class="col-md-6">
                                    <label class="form-label">Họ và tên</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Xin chào !</span>
                                        <input type="text" value="{{ $user->name }}" name="name"
                                            class="form-control">
                                    </div>
                                </div>

                                <!-- Email id -->
                                <div class="col-md-6">
                                    <label class="form-label">Số điện thoại</label>
                                    <input name="number_phone" value="{{ $user->number_phone }}" class="form-control"
                                        type="number" placeholder="số điện thoại" required>
                                </div>

                                <!-- Phone number -->
                                <div class="col-md-6">
                                    <label class="form-label">Trình độ văn hóa</label>
                                    <input name="education" value="{{ $user->education }}" class="form-control mb-2"
                                        type="text" required>
                                </div>

                                <!-- Location -->
                                <div class="col-md-6">
                                    <label class="form-label">Địa chỉ</label>
                                    <input name="location" value="{{ $user->location }}" class="form-control"
                                        type="text"required>
                                </div>

                                <!-- About me -->
                                <div class="col-12">
                                    <label class="form-label">Sở thích</label>
                                    <textarea required name="about_me" value="{{ $user->about_me }}" class="form-control" rows="3"></textarea>
                                    <div class="form-text">Mô tả ngắn về con người bạn.</div>
                                </div>

                                <!-- Education -->
                                {{-- <div class="col-12">
								<label class="form-label">Education</label>
								<input class="form-control mb-2" type="text" value="Bachelor in Computer Graphics">
								<input class="form-control mb-2" type="text" value="Masters in Computer Graphics">
								<button class="btn btn-sm btn-light mb-0"><i class="bi bi-plus me-1"></i>Add more</button>
							</div> --}}

                                <!-- Save button -->
                                <div class="d-sm-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mb-0">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Edit profile END -->

                    <div class="row g-4 mt-3">

                        <!-- Password change START -->
                        <div class="col-lg-6">
                            <div class="card border bg-transparent rounded-3">
                                <!-- Card header -->
                                <div class="card-header bg-transparent border-bottom">
                                    <h5 class="card-header-title mb-0">Đổi mật khẩu</h5>
                                </div>
                                <!-- Card body START -->
                                <form action="{{ route('client.account.updatepass', $user->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <!-- Current password -->
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu cũ</label>
                                            <input name="password" class="form-control" type="password"
                                                placeholder="Mời nhập !">
                                            <strong style="color: rgb(242, 58, 58)">{{ Session::get('error') }}</strong>
                                        </div>
                                        <!-- New password -->
                                        <div class="mb-3">
                                            <label class="form-label"> Mật khẩu mới</label>
                                            <div class="input-group">
                                                <input class="form-control" name="password_1" type="password"
                                                    placeholder="">
                                                <span class="input-group-text p-0 bg-transparent">
                                                    <i class="far fa-eye cursor-pointer p-2 w-40px"></i>
                                                </span><br>
                                            </div>
                                            <div class="rounded mt-1" id="psw-strength"></div>
                                            <strong style="color: rgb(242, 58, 58)">{{ Session::get('error1') }}</strong>
                                        </div>
                                        <!-- Confirm password -->
                                        <div>
                                            <label class="form-label">Nhập lại mật khẩu</label>
                                            <input name="password_2" class="form-control" type="password"
                                                placeholder="">
                                            <strong style="color: rgb(242, 58, 58)">{{ Session::get('error1') }}</strong>
                                        </div>
                                        <!-- Button -->
                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-primary mb-0">Lưu thay đổi</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Card body END -->
                            </div>
                        </div>
                        <!-- Password change end -->
                    </div>
                </div>
                <!-- Main content END -->
            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
                            Page content END -->

@endsection
@section('js-links')

@endsection
@push('js-handles')
    <script type="module"></script>
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
@endpush
