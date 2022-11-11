<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào {{ $db->name }}</h1>
        <p>Bạn đã đăng ký tài khoản tại hệ thống</p>
        <p>Để sử dụng vui lòng nhấn vào nút kích hoạt bên dưới để kích hoạt tài khoản</p>
        <p>
            <a href="{{route('admin.actived',['id' => $db->id, 'token' => $db->remember_token])}}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xác
                minh tài khoản</a>
        </p>

    </div>
</div>
