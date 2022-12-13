<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        @if (isset($teacher))
            <h1>Xin chào {{ $teacher->name }}</h1> <p>có tài khoản email là:  {{ $teacher->email }}</p>
            <p>Một số thông tin của bạn đã được thay đổi</p>
            <p>Chuyên môn: {{ $teacher->number_phone }}</p>
            <p>Chuyên môn: {{ $teacher->specializations }}</p>
            <p>Kỹ năng: {{ $teacher->skills}}</p>
            <p>Trình độ học vấn: {{ $teacher->educations}}</p>
            <p>Kinh nghiệm: {{ $teacher->years_in_experience}}</p>
            <p>
                <a href="{{ route('mentor.login') }}"
                    style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Đăng
                    nhập ngay</a>
            </p>
        @else
            <h1>Xin chào {{ $teacher->name }}</h1>
            @if ($teacher->is_active == 0)
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
