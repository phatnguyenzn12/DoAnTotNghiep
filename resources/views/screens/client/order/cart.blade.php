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
                        <h1 class="m-0">Giỏ hàng của tôi</h1>
                        <!-- Breadcrumb -->
                        <div class="d-flex justify-content-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dots mb-0">
                                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">giỏ hàng</li>
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
                <div class="col-lg-8 mb-4 mb-sm-0">
                    <div class="card card-body p-4 shadow">
                        <!-- Alert -->
                        <div class="alert alert-danger alert-dismissible d-flex justify-content-between align-items-center fade show py-3 pe-2"
                            role="alert">
                            <div>
                                <span class="fs-5 me-1">🔥</span>
                                Đang có sự kiện giảm giá khóa học<strong class="text-danger ms-1">Mời bạn tìm mã</strong>
                            </div>
                            <button type="button" class="btn btn-link mb-0 text-end" data-bs-dismiss="alert"
                                aria-label="Close"><i class="bi bi-x-lg text-dark"></i></button>
                        </div>



                        <div class="table-responsive border-0 rounded-3">
                            <!-- Table START -->
                            <table class="table align-middle p-4 mb-0">
                                <!-- Table head -->

                                <thead>
                                    <th>Tên</th>
                                    <th>Giá được giảm</th>
                                    <th>Giá sản phẩm</th>
                                </thead>

                                <!-- Table body START -->
                                <tbody class="border-top-0">
                                    @forelse ($carts as $cart)
                                        <tr>
                                            <!-- Course item -->
                                            <td>
                                                <div class="d-lg-flex align-items-center">
                                                    <!-- Image -->
                                                    <div class="w-100px w-md-80px mb-2 mb-md-0">
                                                        <img src="{{ asset('app/' . $cart->course->image) }}" class="rounded"
                                                            alt="">
                                                    </div>
                                                    <!-- Title -->
                                                    <h6 class="mb-0 ms-lg-3 mt-2 mt-lg-0">
                                                        <a href="#">{{ $cart->course->title }}</a>
                                                    </h6>
                                                </div>
                                            </td>

                                            <!-- Amount item -->
                                            <td class="text-center">
                                                <h5 class="text-success mb-0">
                                                    {{ number_format($cart->course->current_price) }} đ</h5>
                                            </td>

                                            <td class="text-center">
                                                <h5 class="text-success mb-0">
                                                    {{ number_format($cart->course->price) }} đ</h5>
                                            </td>


                                            <!-- Action item -->
                                            <td>
                                                <a href="{{ route('client.order.cartRemove', $cart->id) }}"
                                                    class="btn btn-sm btn-danger-soft px-2 mb-0 button-delete"><i
                                                        class="fas fa-fw fa-times"></i></a>
                                            </td>

                                        </tr>
                                    @empty
                                        <div class="space-x-6 relative py-7 px-6 flex items-center justify-center">
                                            <h5>
                                                <ion-icon name="bag-outline"></ion-icon> GIỎ HÀNG TRỐNG
                                            </h5>
                                        </div>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-4">
                    <!-- Card total START -->
                    <div class="card card-body p-4 shadow">
                        <!-- Title -->
                        <h4 class="mb-3">Tổng giỏ hàng</h4>

                        <!-- Price and detail -->
                        <ul class="list-group list-group-borderless mb-2">
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="h6 fw-light mb-0">Tổng giá</span>
                                <span class="h6 fw-light mb-0 fw-bold">{{ number_format($carts_total->sum('price')) }}đ</span>
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="h6 fw-light mb-0">Giảm được</span>
                                <span
                                    class="text-danger">{{ number_format($carts_total->sum('price') - $carts_total->sum('current_price')) }}đ</span>
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="h5 mb-0">Kết quả</span>
                                <span class="h5 mb-0">{{ number_format($carts_total->sum('current_price')) }}đ</span>
                            </li>
                        </ul>

                        <!-- Button -->
                        <div class="d-grid">
                            <a href="{{ route('client.order.pay') }}" class="btn btn-lg btn-success">Chuyển qua thanh
                                toán</a>
                        </div>


                    </div>
                    <!-- Card total END -->
                </div>
                <!-- Right sidebar END -->

            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
                                                                    Page content END -->
@endsection

@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"
        integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@push('js-handles')
    <script>
        $(document).on('click', '.button-delete', function(e) {
            e.preventDefault();
            console.log(e)
            let _action = $(this).attr('href');
            let _method = 'GET'
            Swal.fire({
                title: 'Bạn muốn xóa?',
                text: "Nếu bạn xóa sẽ mất dữ liệu này!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'không xóa',
                confirmButtonText: 'Đúng, tôi muốn xóa nó!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: _action,
                        method: _method,
                        success: function(res) {
                            console.log(res);
                            Swal.fire(
                                'xóa thành công!',
                                'Bạn đã xóa thành công .',
                                'success'
                            ).then(function() {
                                window.location.href = ''
                            });
                        },
                        error: function(error) {
                            console.log(error);
                            Swal.fire(
                                'Không xóa được',
                                'xóa đã bị lỗi',
                                'error'
                            )
                        }
                    })
                }

            })
        })
    </script>
@endpush
