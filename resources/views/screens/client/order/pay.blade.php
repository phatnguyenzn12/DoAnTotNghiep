@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
    <!--  breadcrumb -->
    <div class="from-blue-500 via-blue-400 to-blue-500 bg-gradient-to-l breadcrumb-area py-6 text-white">
        <div class="container mx-auto lg:pt-5">
            <div class="breadcrumb text-white">
                <ul class="m-0">
                    <li>
                        <a href="index.html"> <i class="icon-feather-home"></i> </a>
                    </li>
                    <li>
                        <a href="index.html">Gio hàng </a>
                    </li>
                    <li class="active">
                        <a href="#"> Thanh toán online </a>
                    </li>
                </ul>
            </div>
            <div class="md:text-2xl text-base font-semibold mt-6 md:mb-6"> Thanh toán online </div>
        </div>
    </div>

    <div class="lg:py-10 py-5">
        <div class="container">

            <div class="lg:flex">

                <div class="w-full lg:pr-24">

                    <h2 class="text-xl font-semibold md:mb-6 mb-3"> Thanh toán online </h2>

                    <div class="bg-white rounded-md shadow-md">

                        <ul class=" space-y-0 rounded-md" uk-accordion>
                            <li class="">
                                <a class="uk-accordion-title border-b py-4 px-6" href="#">
                                    <div class="flex items-center text-base font-semibold">
                                        <ion-icon name="card-outline" class="mr-2"></ion-icon> Chọn phương thức thanh toán
                                    </div>
                                </a>
                                <div class="uk-accordion-content py-6 px-8 mt-0 border-b">

                                    <p class="">We accept following credit cards:&nbsp;&nbsp;</p>

                                    <form class="grid sm:grid-cols-4 gap-4 mt-3">

                                    </form>

                                </div>
                            </li>
                            <li>
                                <a class="uk-accordion-title border-b py-4 px-6" href="#">
                                    <div class="flex items-center text-base font-semibold">
                                        <ion-icon name="gift-outline" class="mr-2"></ion-icon> Redeem Reward Points
                                    </div>
                                </a>
                                <div class="uk-accordion-content py-6 px-8 mt-0 border-b">

                                    <p>You currently have<span class="font-semibold">&nbsp;562</span>&nbsp;Reward Points to
                                        spend.</p>

                                    <div class="checkbox mt-3">
                                        <input type="checkbox" id="use_points_check" checked>
                                        <label for="use_points_check"><span class="checkbox-icon"></span> Use my Reward
                                            Points to pay for this order</label>
                                    </div>

                                </div>
                            </li>
                        </ul>

                    </div>

                    <div class="grid grid-cols-2 md:gap-6 gap-3 md:mt-10 mt-5">
                        <a class="bg-gray-200 flex font-medium items-center justify-center py-3 rounded-md"
                            href="pages-cart.html">
                            <i class="icon-feather-chevron-left mr-1"></i>
                            <span class="md:block hidden">Trở về giỏ hàng</span><span class="md:hidden block">Back</span>
                        </a>

                        <button form="payment" name="redirect_vnpay" value="1"
                            class="bg-blue-600 text-white flex font-medium items-center justify-center py-3 rounded-md hover:text-white">
                            <span class="md:block hidden"> Thanh toán vnpay </span>
                            <i class="icon-feather-chevron-right ml-1"></i>
                        </button>

                    </div>


                </div>

                <!-- Sidebar -->
                <div class="lg:w-5/12 lg:-ml-12 lg:mt-0 mt-8">
                    <div class="bg-white rounded-md shadow-lg lg:p-6 p-3"
                        uk-sticky="offset:; offset:90 ; media: 1024 ; bottom: true">

                        <div class="font-semibold px-5 pb-3 text-lg text-center"> Tóm tắt đơn hàng </div>

                        <form action="{{ route('client.order.vnpay') }}" method="post" id="payment">

                            @csrf
                            @foreach ($courses as $course)
                                <div>
                                    <div class="flex py-3 space-x-2.5 delimiter-top">
                                        <a class="block md:mr-2" href="#"><img
                                                class="w-16 h-11 object-cover rounded"
                                                src="/frontend/assets/images/courses/img-5.jpg" alt="Product"></a>
                                        <input type="hidden" name="course_id[]" value="{{ $course->id }}">
                                        <div class="flex-1">
                                            <h6 class="font-medium"><a href="#"
                                                    class="line-clamp-2">{{ $course->title }}</a></h6>
                                            <div class="flex justify-between mt-1"><span
                                                    class="font-medium text-sm text-blue-500">{{ $course->cateCourse->name }}</span><span
                                                    class="font-bold mt-0.5" products>{{ $course->current_Price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <input class="form-control with-border" type="text" name="code"
                                placeholder="Nhập code" input-code hidden>

                        </form>

                        <ul class="border-b border-t my-3 py-3 text-sm">
                            <li class="flex justify-between align-center"><span class="mr-2" total> Tổng giá tiền:
                                    <span></li>
                            <li class="flex justify-between align-center"><span class="text-red-500 mr-2" show_disount>chưa giảm giá
                                </span>
                        </ul>

                        <h3 class="font-semibold text-center my-6 text-2xl" total_discount></h3>
                        <div class="space-y-3">
                            <input class="form-control with-border" type="text" placeholder="Nhập code" discountcode>
                            <div class="col-span-2 border rounded-md border-blue-500">
                                <button type="button" onclick="checkcode('{{ route('client.order.checkCode') }}')"
                                    class="w-full py-2.5 font-semibold rounded text-blue-600 text-base block">Kiểm tra mã
                                    giảm giá
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
@endsection
@push('js-handles')
    <script>
        price = 0
        js_$$('[products]').forEach(element => {
            price = price + Number(element.innerHTML)
        });
        js_$('[total]').innerHTML = 'Tổng giá tiền: ' + price + ' đ'

        js_$('[total_discount]').innerHTML = price + ' đ'

        function checkcode(url) {
            axios.post(url, {
                    code: js_$("[discountcode]").value
                })
                .then(
                    res => {
                        js_$('[input-code]').value = js_$("[discountcode]").value
                        js_$('[show_disount]').innerHTML = `Giảm giá: ${res.data.discount} %`
                        js_$('[total_discount]').innerHTML = price - (price * (res.data.discount / 100)) + ' đ'
                    }
                )
        }

        function vnpay(a, url) {
            // a.preventDefault()
        }
    </script>
@endpush
