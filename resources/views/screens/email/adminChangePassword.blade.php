<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h1>Xin chào {{ $db->name }}</h1>
        <p>Quên mật khẩu tại hệ thống</p>
        <p>Để đổi mật khẩu vui lòng nhấn vào nút xác minh bên dưới</p>
        <p>
            <a href="{{route('admin.handleChangePassword',['id' => $db->id, 'token' => $db->remember_token])}}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xác
                minh tài khoản</a>
        </p>
    </div>
</div>
