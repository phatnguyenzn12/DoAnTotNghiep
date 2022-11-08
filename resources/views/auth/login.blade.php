@extends('layouts.auth.master')

@section('title', 'Trang Đăng nhập')

@section('content')

    <div class="lg:p-12 max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
        <form class="lg:p-10 p-6 space-y-3 relative bg-white shadow-xl rounded-md" method="POST" action="{{ route('auth.handleLogin') }}">
            @csrf
            <h1 class="lg:text-2xl text-xl font-semibold mb-6"> Đăng nhập </h1>
            <div>
                <label class="mb-0" for="email"> Địa chỉ Email </label>
                <input type="email" id="email" name="email" placeholder="Info@example.com"
                    class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
            </div>
            <div>
                <label class="mb-0" for="password"> Mật khẩu </label>
                <input type="password" id="password" name="password" placeholder="******"
                    class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
            </div>

            <div class="g-recaptcha" data-sitekey="6LeXMAYiAAAAAH-6JZwbx2GSa8vrgZsUCq7xrUK4"></div>

            <div>
                <button type="submit" id="sign-in"
                    class="bg-blue-600 font-semibold p-2.5 mt-5 rounded-md text-center text-white w-full">
                    Đăng nhập</button>
            </div>

            <div class="">
                <a href="{{ route('auth.forgotPassword') }}" class="text-blue-500 text-center font-light">Lấy lại mật
                    khẩu ?</a>
            </div>

            <div class="uk-heading-line uk-text-center py-5"><span> Hoặc, kết nối với </span></div>

            <a href="{{route('auth.google')}}"
                class="hidden relative lg:flex items-center justify-start w-full py-3 mt-2 overflow-hidden text-lg font-medium text-white border border-blue-300 shadow rounded-md rounded-lg cursor-pointer">
                <span class="absolute left-0 flex items-center justify-center w-16 h-full mr-3 fill-current">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path
                            d="M19.9895 10.1871C19.9895 9.36767 19.9214 8.76973 19.7742 8.14966H10.1992V11.848H15.8195C15.7062 12.7671 15.0943 14.1512 13.7346 15.0813L13.7155 15.2051L16.7429 17.4969L16.9527 17.5174C18.879 15.7789 19.9895 13.221 19.9895 10.1871Z"
                            fill="#4285F4"></path>
                        <path
                            d="M10.1993 19.9313C12.9527 19.9313 15.2643 19.0454 16.9527 17.5174L13.7346 15.0813C12.8734 15.6682 11.7176 16.0779 10.1993 16.0779C7.50243 16.0779 5.21352 14.3395 4.39759 11.9366L4.27799 11.9466L1.13003 14.3273L1.08887 14.4391C2.76588 17.6945 6.21061 19.9313 10.1993 19.9313Z"
                            fill="#34A853"></path>
                        <path
                            d="M4.39748 11.9366C4.18219 11.3166 4.05759 10.6521 4.05759 9.96565C4.05759 9.27909 4.18219 8.61473 4.38615 7.99466L4.38045 7.8626L1.19304 5.44366L1.08875 5.49214C0.397576 6.84305 0.000976562 8.36008 0.000976562 9.96565C0.000976562 11.5712 0.397576 13.0882 1.08875 14.4391L4.39748 11.9366Z"
                            fill="#FBBC05"></path>
                        <path
                            d="M10.1993 3.85336C12.1142 3.85336 13.406 4.66168 14.1425 5.33717L17.0207 2.59107C15.253 0.985496 12.9527 0 10.1993 0C6.2106 0 2.76588 2.23672 1.08887 5.49214L4.38626 7.99466C5.21352 5.59183 7.50242 3.85336 10.1993 3.85336Z"
                            fill="#EB4335"></path>
                    </svg>
                </span>
                <span class="inline-block pl-5 text-base text-center w-full text-blue-500">Đăng nhập với Google</span>
            </a>

            <div class="flex items-center space-x-2 justify-center">
                <a href="#">
                    <ion-icon name="logo-facebook" class="p-2 rounded-full text-2xl bg-gray-100 text-blue-600"></ion-icon>
                </a>
                <a href="#">
                    <ion-icon name="logo-twitter" class="p-2 rounded-full text-2xl bg-gray-100 text-indigo-500"></ion-icon>
                </a>
                <a href="#">
                    <ion-icon name="logo-github" class="p-2 rounded-full text-2xl bg-gray-100"></ion-icon>
                </a>
            </div>

        </form>

    </div>
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
    // import { store } from "/js/crud.js";
    // js_$('#sign-in').onclick = (a) => {
    //     a.preventDefault()
    //     let obj = {
    //         url:'{{ route('auth.handleLogin') }}',
    //         form:js_$('form'),
    //         redirect:'{{ route('client') }}'
    //     }
    //     store(obj)
    // }
    </script>
@endpush
