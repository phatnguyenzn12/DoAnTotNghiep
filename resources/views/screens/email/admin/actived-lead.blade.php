<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        @if (isset($db))
            <h1>Xin chào {{ $db->name }}</h1>
            <p>Bạn đã đăng ký giảng viên tại hệ thống</p>
            <p>Yêu cầu đã được phê duyệt bạn</p>
            <p>Tên tài khoản: {{ $db->email }}</p>
            <p>Chuyên môn: {{ $db->specializations }}</p>
            <p>Kỹ năng: {{ $db->skills}}</p>
            <p>Mật khẩu: {{ $password }}</p>
            <p>
                <a href="{{ route('mentor.login') }}"
                    style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Đăng
                    nhập ngay</a>
            </p>
        @else
            <h1>Xin chào {{ $mentor->name }}</h1>
            @if ($mentor->is_active == 0)
                <p>Hệ thống đã cập nhật trạng thái dừng tài khoản của bạn</p>
                <p>
                    <a href="#"
                        style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Vui
                        lòng liên hệ admin</a>
                </p>
            @else
                <p>Hệ thống đã cập nhật trạng thái hoạt động tài khoản của bạn</p>
                <p>
                    <a href="{{ route('mentor.login') }}"
                        style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Đăng
                        nhập ngay</a>
                </p>
            @endif
        @endif
    </div>
</div>
