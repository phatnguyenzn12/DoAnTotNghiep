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
                        <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <a href="#">Payment method </a>
                    </li>
                </ul>
            </div>
            <div class="md:text-2xl text-base font-semibold mt-6 md:mb-6"> Payment method </div>
        </div>
    </div>

    <div class="lg:py-10 py-5">
        <div class="container">

            <div class="lg:flex">

                <div class="w-full lg:pr-24">

                    <h2 class="text-xl font-semibold md:mb-6 mb-3"> Thanh toán online </h2>

                    <div class="bg-white rounded-md shadow-md">

                        <ul class=" space-y-0 rounded-md" uk-accordion>
                            <li class="uk-open">
                                <a class="uk-accordion-title border-b py-4 px-6" href="#">
                                    <div class="flex items-center text-base font-semibold">
                                        <ion-icon name="card-outline" class="mr-2"></ion-icon> Pay with Credit Card
                                    </div>
                                </a>
                                <div class="uk-accordion-content py-6 px-8 mt-0 border-b">

                                    <p class="">We accept following credit cards:&nbsp;&nbsp;<img class="inline-block"
                                            src="../assets/images/cards.png" style="width: 187px;" alt="Cerdit Cards"></p>

                                    <form class="grid sm:grid-cols-4 gap-4 mt-3">
                                        <div class="col-span-2">
                                            <input type="text" name="number" placeholder="Card Number"
                                                class="with-border">
                                        </div>
                                        <div class="col-span-2">
                                            <input type="text" name="name" placeholder="Full Name"
                                                class="with-border">
                                        </div>
                                        <div>
                                            <input type="text" name="expiry" placeholder="MM/YY" class="with-border">
                                        </div>
                                        <div>
                                            <input type="text" name="cvc" placeholder="CVC" class="with-border">
                                        </div>
                                        <div class="col-span-2 border rounded-md border-blue-500">
                                            <button class="w-full py-3 font-semibold rounded text-blue-600 text-base block"
                                                type="submit">Submit</button>
                                        </div>
                                    </form>

                                </div>
                            </li>
                            <li>
                                <a class="uk-accordion-title border-b py-4 px-6" href="#">
                                    <div class="flex items-center text-base font-semibold">
                                        <ion-icon name="logo-paypal" class="mr-2"></ion-icon> Pay with PayPal
                                    </div>
                                </a>
                                <div class="uk-accordion-content py-6 px-8 mt-0 border-b">

                                    <p><span class="font-semibold">PayPal</span> - the safer, easier way to pay</p>
                                    <form class="grid sm:grid-cols-2 gap-4 mt-3">
                                        <div>
                                            <input type="text" name="email" placeholder="E-mail" class="with-border">
                                        </div>
                                        <div>
                                            <input type="Password" name="Password" placeholder="Password"
                                                class="with-border">
                                        </div>
                                    </form>

                                    <div class="flex flex-wrap items-center justify-between py-2 mt-3">
                                        <a class="font-medium text-sm text-blue-600 hover:underline" href="#">Forgot
                                            password?</a>
                                        <button class="button" type="submit">Log In</button>
                                    </div>

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
                        <button form="payment" class="bg-blue-600 text-white flex font-medium items-center justify-center py-3 rounded-md hover:text-white">
                            <span class="md:block hidden"> Thanh toán </span><span class="md:hidden block">Review</span>
                            <i class="icon-feather-chevron-right ml-1"></i>
                        </button>
                    </div>


                </div>

                <!-- Sidebar -->
                <div class="lg:w-5/12 lg:-ml-12 lg:mt-0 mt-8">
                    <div class="bg-white rounded-md shadow-lg lg:p-6 p-3"
                        uk-sticky="offset:; offset:90 ; media: 1024 ; bottom: true">

                        <div class="font-semibold px-5 pb-3 text-lg text-center"> Tóm tắt đơn hàng </div>

                        <form action="{{route('client.order.handlePay')}}" method="post" id="payment">
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
                                                    class="font-bold mt-0.5" products>{{ $course->current_Price }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </form>

                        <ul class="border-b border-t my-3 py-3 text-sm">
                            <li class="flex justify-between align-center"><span class="mr-2" total> Tổng giá tiền: </li>
                            <li class="flex justify-between align-center"><span class="mr-2">giảm giá:
                                    50%</span><span><span class="text-right">—</span></span></li>
                        </ul>

                        <h3 class="font-semibold text-center my-6 text-2xl" total_discount></h3>
                        <form method="post" class="space-y-3">
                            <input class="form-control with-border" type="text" placeholder="Nhập code"
                                required="">
                            <div class="col-span-2 border rounded-md border-blue-500">
                                <button class="w-full py-2.5 font-semibold rounded text-blue-600 text-base block"
                                    type="submit">Nhập mã giảm giá</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('js-links')
@endsection
@push('js-handles')
    <script>
        price = 0
        js_$$('[products]').forEach(element => {
            price = price + Number(element.innerHTML)
        });
        js_$('[total]').innerHTML = 'Tổng giá tiền: ' + price + ' đ'

        js_$('[total_discount]').innerHTML = price + ' đ'
    </script>
@endpush
