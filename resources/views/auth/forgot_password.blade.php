@extends('layouts.auth.master')

@section('title', 'Trang Lấy lại mật khẩu')

@section('content')

    <div class="lg:p-12 max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-3" show-success>
        <form class="lg:p-10 p-6 space-y-3 relative bg-white shadow-xl rounded-md" method="post">
            @csrf
            <h1 class="lg:text-2xl text-xl font-semibold mb-6"> Lấy lại mật khẩu </h1>

            <div>
                <label class="mb-0" for="email"> Địa chỉ Email </label>
                <input type="email" id="email" name="email" placeholder="Info@example.com"
                    uk-tooltip="title: Nhập Email; pos: right" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
            </div>

            <div class="g-recaptcha" data-sitekey="6LeXMAYiAAAAAH-6JZwbx2GSa8vrgZsUCq7xrUK4"></div>

            <div>
                <button type="submit"
                    class="bg-blue-600 font-semibold p-2.5 mt-5 rounded-md text-center text-white w-full">
                    Gửi thông tin qua mail
                </button>
            </div>
        </form>
    </div>
@endsection

@section('js-links')
@endsection
@push('js-headles')
    <script type="module">
        setTimeout(() => {
            const elm = document.createElement('div')
       elm.classList.add('lg:p-10','p-6','space-y-3','relative','bg-white','shadow-xl','rounded-md')
       elm.innerHTML = `
       <h1 class="lg:text-2xl text-xl font-semibold mb-6"> Lấy lại mật khẩu </h1>

            <div class="mt-5">
                <div class="flex content-center justify-center">
                    <div class="border-4 border-indigo-500 p-5" style="border-radius: 50%;width: 100px;">
                        <ion-icon name="checkmark-done-outline" class="text-5xl "></ion-icon>
                    </div>
                </div>
    
                <center class="mt-5">
                    <span class="mb-0">
                        Email thay đổi mật khẩu đã được gửi tới gmail, vui lòng kiểm tra hộp thư
                    </span>
                </center>

                <center class="mt-5">
                    <ion-icon name="arrow-undo-outline"></ion-icon>
                    <a href="{{ route('auth.login') }}" class="mb-0 text-blue-500">
                        Trở về
                    </a>
                </center>
            </div>
            
       `
       js_$('[show-success]').innerHTML = elm.outerHTML
        }, 3000);


    </script>
@endpush
