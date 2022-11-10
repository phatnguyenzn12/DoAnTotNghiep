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
                        <a href="index.html">Trang chủ</a>
                    </li>
                    <li class="active">
                        <a href="#"> Giỏ hàng </a>
                    </li>
                </ul>
            </div>
            <div class="md:text-2xl text-base font-semibold mt-6 md:mb-24"> Giỏ hàng </div>
        </div>
    </div>

    <div class="container">

        <div class="max-w-3xl mx-auto lg:-mt-20 relative">

            <div class="bg-white rounded-md shadow-md">

                <h3 class="border-b font-semibold px-5 py-4 text-base text-gray-500">
                    Giỏ hàng của bạn ({{ $carts ? $carts->count() : 0 }} Khóa học)
                </h3>

                <div class="divide-y">
                    <form action="{{ route('client.order.pay') }}" method="get" id="pay">
                        @csrf
                        @method('GET')
                        @forelse ($carts as $cart)
                            <div class="flex items-start space-x-6 relative py-7 px-6">
                                <div class="cols-span-2 checkbox my-2">
                                    <input type="checkbox" id="use_points{{ $cart->id }}" name="products[]"
                                        price="{{ $cart->current_price }}" value="{{ $cart->id }}"
                                        onclick="checkCart(this)">
                                    <label for="use_points{{ $cart->id }}" class="text-sm"><span
                                            class="checkbox-icon"></span> </label>
                                </div>

                                <div class="h-28 overflow-hidden relative rounded-md w-44">
                                    <img src="/frontend/assets/images/courses/img-5.jpg" alt=""
                                        class="absolute w-full h-full inset-0 object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <a href="course-intro-2.html"
                                        class="md:text-lg font-semibold line-clamp-2 mb-2">{{ $cart->title }}</a>
                                    <div class="flex items-center mt-7 space-x-2 text-sm font-medium">
                                        <div> Advance levels </div>
                                    </div>
                                </div>
                                <h5 class="font-semibold text-black text-xl"> {{ $cart->current_price }} đ</h5>
                                <h5 class="absolute bottom-9 right-4 text-red-500 text-xl"
                                    onclick="remove(this,'{{ route('client.order.cartRemove', $cart->id) }}')">
                                    <ion-icon name="trash"></ion-icon>
                                </h5>
                            </div>
                        @empty
                            <div class="space-x-6 relative py-7 px-6 flex items-center justify-center">
                                <h1 class="text-lg font-medium">
                                    <ion-icon name="bag-outline"></ion-icon> GIỎ HÀNG TRỐNG
                                </h1>
                            </div>
                        @endforelse
                    </form>
                </div>

                @if ($carts)
                    <div class="border-t pt-6 space-y-6">
                        <div class="flex justify-between px-6">
                            @if (auth()->user())
                                <div class="px-6 pb-5">
                                    <button form="pay" class="button">
                                        Đi tới thanh toán </button>
                                    <div class="flex items-center justify-center mt-4 space-x-1.5">
                                        <p class="font-medium"> hoặc </p> <a hf="#"
                                            class="text-blue-600 font-semibold text-center"> Tiếp tục mua hàng </a>
                                    </div>
                                </div>
                            @else
                                <button form="pay" class="button">
                                    Tiếp tục mua hàng </button>
                            @endif
                            <h5 class="font-semibold text-black text-xl" total> 0 đ </h5>
                        </div>
                    </div>
                @endif

            </div>

        </div>
    @endsection

    @section('js-links')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"
            integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endsection
    @push('js-handles')
        <script>
            function checkCart(a) {
                $i = 0
                js_$$('.divide-y [type="checkbox"]').forEach(element => {
                    if (element.checked == true) {
                        $i = $i + Number(element.attributes.price.value)
                        js_$('[total]').innerHTML = $i
                    } else {
                        js_$('[total]').innerHTML = $i
                    }
                });
            }

            function remove(a, url) {
                axios.delete(url)
                    .then(
                        res => {
                            a.parentElement.remove()
                        }
                    )
                    .catch(
                        res => {
                            console.log(res);
                        }
                    )
            }
        </script>
    @endpush
