@extends('layouts.auth.master')

@section('title', 'Trang Đăng nhập')

@section('content')

    <div class="lg:p-12 max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
        <form class="lg:p-10 p-6 space-y-3 relative bg-white shadow-xl rounded-md" action="" method="post"
            enctype="multipart/form-data">
            @csrf
            <h1 class="lg:text-2xl text-xl font-semibold mb-6"> Đăng ký </h1>
            <div>
                <label class="mb-0" for="username"> Tên người dùng </label>
                <input type="text" placeholder="Username" id="username" name="name"
                    class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
            </div>
            <div>
                <label class="mb-0" for="email"> Địa chỉ Email </label>
                <input type="email" placeholder="Info@example.com" id="email" name="email"
                    class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
            </div>
            <div class="grid lg:grid-cols-2 gap-3">
                <div>
                    <label class="mb-0" for="password"> Mật khẩu </label>
                    <input type="password" placeholder="******" id="password" name="password"
                        class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                </div>
                <div>
                    <label class="mb-0" for="password"> Nhập lại mật khẩu </label>
                    <input type="password" placeholder="******" id="password" name="re_password"
                        class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                </div>
            </div>
            <div class="grid lg:grid-cols-2 gap-3">
                <div>
                    <label class="mb-0">Avatar</label>
                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg, .jfif, .webp"
                        class="bg-gray-100 h-12 mt-2 px-3 py-1.5 rounded-md w-full" id="avatar">
                </div>
                <div>
                    <label class="mb-0"> Số điện thoại </label>
                    <input type="text" placeholder="+543 5445 0543" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full"
                        name="number_phone">
                </div>
            </div>
            {{-- <div class="g-recaptcha" data-sitekey="6LeXMAYiAAAAAH-6JZwbx2GSa8vrgZsUCq7xrUK4"></div> --}}
            <div>
                <button type="submit" class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full">
                    Đăng ký</button>
            </div>
        </form>
    </div>
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
