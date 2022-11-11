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

            {{-- <div class="g-recaptcha" data-sitekey="6LeXMAYiAAAAAH-6JZwbx2GSa8vrgZsUCq7xrUK4"></div> --}}

            <div>
                <button type="submit"
                    class="bg-blue-600 font-semibold p-2.5 mt-5 rounded-md text-center text-white w-full">
                    Gửi thông tin qua mail
                </button>
            </div>
        </form>
    </div>
@endsection