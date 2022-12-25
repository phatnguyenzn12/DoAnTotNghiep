@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')

    <!-- =======================
                                                                                        Page Banner START -->
    <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-light p-4 text-center rounded-3">
                        <h1 class="m-0">Thanh Toán</h1>
                        <!-- Breadcrumb -->
                        <div class="d-flex justify-content-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dots mb-0">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
                                                                                        Page Banner END -->

    <!-- =======================
                                                                                        Page content START -->
    <section class="pt-5">
        <div class="container">

            <div class="row g-4 g-sm-5">
                <!-- Main content START -->
                <div class="col-xl-8 mb-4 mb-sm-0">
                    <!-- Alert -->
                    <div class="alert alert-danger alert-dismissible d-flex justify-content-between align-items-center fade show py-2 pe-2"
                        role="alert">
                        <div>
                            <i class="bi bi-exclamation-octagon-fill me-2"></i>
                            Nhập mã để được <a href="#" class="text-reset btn-link mb-0 fw-bold">Giảm giá</a>
                        </div>
                        <button type="button" class="btn btn-link mb-0 text-end" data-bs-dismiss="alert"
                            aria-label="Close"><i class="bi bi-x-lg text-dark"></i></button>
                    </div>

                    <!-- Personal info START -->
                    <div class="card card-body shadow p-4">
                        <!-- Title -->
                        <h5 class="mb-0">Chọn phương thức thanh toán</h5>

                        <!-- Form START -->
                        <div class="row g-3 mt-0">

                            <!-- Cards -->
                            <div class="col-12">
                                <label class="form-label">Chọn phương thức thanh toán</label>
                                <div class="row g-2 ">

                                </div>
                            </div>
                        </div>
                        <!-- Form END -->
                    </div>
                    <!-- Personal info END -->
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-xl-4">
                    <div class="row mb-0">
                        <div class="col-md-6 col-xl-12">
                            <!-- Order summary START -->
                            <div class="card card-body shadow p-4 mb-4">
                                <!-- Title -->
                                <h4 class="mb-4">Giảm giá đơn hàng </h4>

                                <!-- Coupon START -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Ví dụ mã giảm giá</span>
                                        <p class="mb-0 h6 fw-light">AB12365E</p>
                                    </div>
                                    <div class="input-group mt-2">
                                        <input class="form-control form-control" placeholder="Nhập mã code" discountcode>
                                        <button onclick="checkcode('{{ route('client.order.checkCode') }}')" type="button"
                                            class="btn btn-primary">Kiểm tra mã</button>
                                    </div>

                                </div>
                                <hr>
                                <!-- Coupon END -->

                                <form action="{{ route('client.order.vnpay') }}" method="post" id="payment">

                                    @csrf
                                    @foreach ($courses as $course)
                                        <div id="remove">
                                            <!-- Course item START -->
                                            <div class="row g-3">
                                                <!-- Image -->
                                                <div class="col-sm-4">
                                                    <img class="rounded" src="{{ asset('app/' . $course->image) }}"
                                                        alt="">
                                                </div>
                                                <!-- Info -->
                                                <div class="col-sm-8">
                                                    <input type="hidden" name="course_id[]" value="{{ $course->id }}">

                                                    <h6 class="mb-0"><a href="#">{{ $course->title }}</a></h6>
                                                    <!-- Info -->
                                                    <div class="d-flex align-items-center mt-3">
                                                        <!-- Price -->
                                                        <span class="text-success">{{ number_format($course->current_Price) }}đ </span> <span class="mx-1">/</span> <del>{{ number_format($course->price) }}đ</del>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Course item END -->
                                        <hr> <!-- Divider -->

                                        @endforeach
                            </div>

                            <input class="form-control with-border" type="text" name="code" placeholder="Nhập code"
                                input-code hidden>


                            <input class="form-control with-border" type="text" name="bank" placeholder="Nhập code"
                                input-pay hidden>

                            </form>

                            <!-- Price and detail -->
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="h6 fw-light mb-0">Tổng giá</span>
                                <span
                                    class="h6 fw-light mb-0 fw-bold">{{ number_format($courses->sum('current_price')) }}đ
                                <input type="text" hidden value="{{ $courses->sum('current_price') }}" total_price>
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="h6 fw-light mb-0">Giảm được</span>
                                <span class="text-danger" show_disount>0% - 0đ</span>
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="h5 mb-0">Kết quả</span>
                                <span class="h5 mb-0"
                                    total_discount>{{ number_format($courses->sum('current_price')) }}đ</span>
                            </li>

                            <!-- Button -->
                            <div class="d-grid">
                                <button form="payment" name="redirect_vnpay" value="1"
                                    class="btn btn-lg btn-success">Thanh toán</button>
                            </div>

                            <!-- Content -->
                            <p class="small mb-0 mt-2 text-center">Bằng cách hoàn tất giao dịch mua của mình,
                                <a href="#"><strong> bạn đồng ý với các Điều khoản dịch vụ này</strong></a>
                            </p>

                        </div>
                        <!-- Order summary END -->
                    </div>

                    <div class="col-md-6 col-xl-12">
                        <div class="card bg-blue p-3 position-relative overflow-hidden"
                            style="background:url(/frontend/images/pattern/05.png) no-repeat center center; background-size:cover;">
                            <!-- SVG decoration -->
                            <figure class="position-absolute bottom-0 end-0 mb-n4 d-none d-md-block">
                                <svg width="92.6px" height="135.2px">
                                    <path class="fill-white"
                                        d="M71.5,131.4c0.2,0.1,0.4,0.1,0.6-0.1c0,0,0.6-0.7,1.6-1.9c0.2-0.2,0.1-0.5-0.1-0.7c-0.2-0.2-0.5-0.1-0.7,0.1 c-1,1.2-1.6,1.8-1.6,1.8c-0.2,0.2-0.2,0.5,0,0.7C71.4,131.3,71.4,131.4,71.5,131.4z">
                                    </path>
                                    <path class="fill-white"
                                        d="M76,125.5c-0.2-0.2-0.3-0.5-0.1-0.7c1-1.4,1.9-2.8,2.8-4.2c0.1-0.2,0.4-0.3,0.7-0.2c0.2,0.1,0.3,0.4,0.2,0.7 c-0.9,1.4-1.8,2.9-2.8,4.2C76.6,125.6,76.3,125.6,76,125.5C76.1,125.5,76.1,125.5,76,125.5z M81.4,116.9 c-0.2-0.1-0.3-0.4-0.2-0.7c0.2-0.5,0.5-0.9,0.7-1.4c0.5-1.1,1-2.1,1.5-3.2c0.1-0.3,0.4-0.4,0.6-0.3c0.3,0.1,0.4,0.4,0.3,0.6 c-0.5,1.1-1,2.1-1.5,3.2c-0.2,0.5-0.5,0.9-0.7,1.4C81.9,117,81.6,117,81.4,116.9C81.4,116.9,81.4,116.9,81.4,116.9z M85.1,107.1 c0.5-1.6,1-3.2,1.3-4.8c0.1-0.3,0.3-0.4,0.6-0.4c0.3,0.1,0.4,0.3,0.4,0.6c-0.4,1.6-0.8,3.3-1.3,4.9c-0.1,0.3-0.4,0.4-0.6,0.3 c0,0,0,0-0.1,0C85.1,107.6,85,107.3,85.1,107.1z M47.3,83c-1.5-1.1-2.5-2.5-3.1-4.2c-0.1-0.3,0-0.5,0.3-0.6 c0.3-0.1,0.5,0,0.6,0.3c0.5,1.5,1.5,2.7,2.8,3.7c0.2,0.2,0.3,0.5,0.1,0.7C47.9,83.1,47.6,83.1,47.3,83C47.4,83,47.4,83,47.3,83z  M51.7,84.6c0-0.3,0.3-0.5,0.5-0.4c1.4,0.2,2.9-0.3,4.3-1.4c0.2-0.2,0.5-0.1,0.7,0.1c0.2,0.2,0.1,0.5-0.1,0.7 c-1.6,1.2-3.4,1.8-5,1.6c-0.1,0-0.1,0-0.2,0C51.8,85,51.7,84.8,51.7,84.6z M87.2,97.4c0.2-1.7,0.2-3.3,0.2-5 c0-0.3,0.2-0.5,0.5-0.5c0.3,0,0.5,0.2,0.5,0.5c0.1,1.7,0,3.4-0.2,5.1c0,0.3-0.3,0.5-0.5,0.4c-0.1,0-0.1,0-0.2,0 C87.3,97.8,87.1,97.6,87.2,97.4z M43.7,73.6c0.2-1.6,0.7-3.2,1.5-4.8l0.1-0.1c0.1-0.2,0.4-0.3,0.7-0.2c0,0,0,0,0,0 c0.2,0.1,0.3,0.4,0.2,0.7l-0.1,0.1c-0.7,1.5-1.2,3-1.4,4.5c0,0.3-0.3,0.5-0.6,0.4c-0.1,0-0.1,0-0.2,0 C43.8,74,43.7,73.8,43.7,73.6z M60,79.8c-0.2-0.1-0.3-0.5-0.1-0.7c0.4-0.6,0.8-1.3,1.1-2c0.4-0.8,0.7-1.6,1-2.4 c0.1-0.3,0.4-0.4,0.6-0.3c0.3,0.1,0.4,0.4,0.3,0.6c-0.3,0.9-0.7,1.7-1.1,2.5c-0.4,0.7-0.8,1.4-1.2,2.1C60.5,79.9,60.2,80,60,79.8 C60,79.9,60,79.8,60,79.8z M86.8,87.5c-0.3-1.6-0.7-3.2-1.2-4.8c-0.1-0.3,0.1-0.5,0.3-0.6c0.3-0.1,0.5,0.1,0.6,0.3 c0.5,1.6,1,3.3,1.2,4.9c0,0.3-0.1,0.5-0.4,0.6c-0.1,0-0.2,0-0.3,0C87,87.7,86.9,87.6,86.8,87.5z M48.2,65.1 c-0.2-0.2-0.2-0.5,0-0.7c1.2-1.3,2.5-2.4,3.9-3.4c0.2-0.1,0.5-0.1,0.7,0.1c0.1,0.2,0.1,0.5-0.1,0.7c-1.4,0.9-2.6,2-3.7,3.2 c-0.2,0.2-0.4,0.2-0.6,0.1C48.3,65.2,48.3,65.1,48.2,65.1z M63.3,70c0.3-1.6,0.5-3.3,0.5-4.9c0-0.3,0.2-0.5,0.5-0.5 c0.3,0,0.5,0.2,0.5,0.5c-0.1,1.7-0.2,3.4-0.5,5.1c0,0.3-0.3,0.4-0.6,0.4c0,0-0.1,0-0.1,0C63.3,70.4,63.2,70.2,63.3,70z M83.8,78 c-0.7-1.5-1.5-3-2.4-4.3c-0.1-0.2-0.1-0.5,0.1-0.7c0.2-0.1,0.5-0.1,0.7,0.2c0.9,1.4,1.7,2.9,2.5,4.4c0.1,0.2,0,0.5-0.2,0.7 c-0.1,0.1-0.3,0.1-0.4,0C83.9,78.2,83.8,78.1,83.8,78z M56.5,59.6c-0.1-0.3,0.1-0.5,0.4-0.6c1.7-0.4,3.4-0.5,5.2-0.3 c0.3,0,0.5,0.3,0.4,0.5c0,0.3-0.3,0.5-0.5,0.4c-1.7-0.2-3.3-0.1-4.8,0.3c-0.1,0-0.2,0-0.3,0C56.6,59.8,56.5,59.7,56.5,59.6z  M78.4,69.7c-1.1-1.3-2.2-2.5-3.4-3.6c-0.2-0.2-0.2-0.5,0-0.7c0.2-0.2,0.5-0.2,0.7,0c1.2,1.1,2.4,2.4,3.5,3.7 c0.2,0.2,0.1,0.5-0.1,0.7c-0.2,0.1-0.4,0.1-0.5,0.1C78.5,69.8,78.4,69.7,78.4,69.7z M63.6,60.1c-0.2-1.6-0.4-3.3-0.8-4.9 c-0.1-0.3,0.1-0.5,0.4-0.6c0.3-0.1,0.5,0.1,0.6,0.4c0.4,1.7,0.7,3.4,0.8,5c0,0.3-0.2,0.5-0.4,0.5c-0.1,0-0.2,0-0.3,0 C63.7,60.4,63.6,60.2,63.6,60.1z M71,63.1c-1.4-0.9-2.9-1.7-4.4-2.3c-0.3-0.1-0.4-0.4-0.3-0.6c0.1-0.3,0.4-0.4,0.6-0.3 c1.5,0.6,3.1,1.4,4.6,2.3c0.2,0.1,0.3,0.5,0.1,0.7C71.6,63.1,71.3,63.2,71,63.1C71.1,63.1,71.1,63.1,71,63.1z M61.3,50.4 c-0.6-1.5-1.3-3-2.1-4.5c-0.1-0.2-0.1-0.5,0.2-0.7c0.2-0.1,0.5-0.1,0.7,0.2c0.9,1.5,1.6,3.1,2.2,4.6c0.1,0.3,0,0.5-0.3,0.6 c-0.1,0.1-0.3,0-0.4,0C61.5,50.6,61.4,50.5,61.3,50.4z M56.5,41.8c-1-1.3-2.1-2.6-3.2-3.8c-0.2-0.2-0.2-0.5,0-0.7 c0.2-0.2,0.5-0.2,0.7,0c1.2,1.3,2.3,2.6,3.3,3.9c0.2,0.2,0.1,0.5-0.1,0.7c-0.2,0.1-0.4,0.1-0.5,0C56.6,41.9,56.5,41.8,56.5,41.8z  M49.7,34.5c-1.2-1.1-2.5-2.1-3.9-3.2c-0.2-0.2-0.3-0.5-0.1-0.7c0.2-0.2,0.5-0.3,0.7-0.1c1.4,1,2.7,2.1,3.9,3.2 c0.2,0.2,0.2,0.5,0,0.7c-0.2,0.2-0.4,0.2-0.6,0.1C49.7,34.6,49.7,34.5,49.7,34.5z M41.7,28.5c-1.4-0.9-2.8-1.8-4.3-2.6 c-0.2-0.1-0.3-0.4-0.2-0.7c0.1-0.2,0.4-0.3,0.7-0.2c1.5,0.8,2.9,1.7,4.3,2.6c0.2,0.1,0.3,0.5,0.1,0.7 C42.2,28.6,42,28.6,41.7,28.5C41.7,28.5,41.7,28.5,41.7,28.5z">
                                    </path>
                                    <path class="fill-white"
                                        d="M30.7,22.6C30.7,22.6,30.7,22.6,30.7,22.6c0,0,0.9,0.4,2.3,1c0.2,0.1,0.5,0,0.7-0.2c0.1-0.2,0-0.5-0.2-0.7 c0,0,0,0,0,0c-1.4-0.7-2.2-1-2.3-1c-0.3-0.1-0.5,0-0.6,0.3C30.3,22.2,30.4,22.5,30.7,22.6z">
                                    </path>
                                    <path class="fill-warning"
                                        d="M22.6,23.6l-1.1-4.1c0,0-11.7-7.5-11.9-7.6c-0.1-0.2-4.9-6.5-4.9-6.5l8.2,3.5l12.2,8.4L22.6,23.6z">
                                    </path>
                                    <polygon class="fill-warning opacity-6" points="31.2,12.3 4.7,5.4 25.1,17.2">
                                    </polygon>
                                    <polygon class="fill-warning opacity-6" points="21.5,19.5 15,24.8 4.7,5.4 ">
                                    </polygon>
                                </svg>
                            </figure>
                            <!-- Body -->
                            <div class="card-body">
                                <!-- Title -->
                                <h5 class="card-title text-white mb-2">Đang có sự kiện giảm giá lên tới 25% cho các đơn
                                    hàng !</h5>
                                <p class="text-white text-opacity-75">Chọn vào để nhận được mã giảm giá</p>
                                <!-- Button -->
                                <a href="#" class="btn btn-sm btn-warning mb-0">Chuyển hướng</a>
                            </div>
                        </div>
                    </div>
                </div><!-- Row End -->
            </div>
            <!-- Right sidebar END -->

        </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
                                                                                        Page content END -->

@endsection

@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
@endsection
@push('js-handles')
    <script>
        price = 0

        function checkcode(url) {
            axios.post(url, {
                    code: js_$("[discountcode]").value
                })
                .then(
                    res => {
                        js_$('[input-code]').value = js_$("[discountcode]").value
                        js_$('[show_disount]').innerHTML =
                            `Giảm giá: ${res.data.discount == undefined ? '0' : res.data.discount} %`
                        js_$('[total_discount]').innerHTML = res.data.discount != undefined ? new Intl.NumberFormat('en-US').format(js_$('[total_price]').value -
                            (js_$('[total_price]').value * (res.data.discount / 100))) + ' đ' :
                            new Intl.NumberFormat('en-US').format(js_$('[total_price]').value) +
                            ' đ'

                        Swal.fire({
                            icon: 'success',
                            title: 'Kiểm tra thành công',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                ).catch(
                    res => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Mã không tồn tại hoặc hết hạn',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                )
        }
    </script>
@endpush
