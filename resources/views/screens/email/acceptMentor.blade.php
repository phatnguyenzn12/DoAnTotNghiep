<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào {{ $db->name }}</h1>
        <p>Bạn đã đăng ký giảng viên tại hệ thống</p>
        <p>Yêu cầu đã được phê duyệt bạn</p>
        <p>Tên tài khoản: {{ $db->email }}</p>
        <p>Mật khẩu: {{ $password }}</p>
        <p>
            <a href="{{route('mentor.login')}}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Đăng nhập ngay</a>
        </p>

    </div>
</div>
