<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        @foreach($admins as $admin)
        <h1>Xin chào {{ $admin->name }}</h1>
        @endforeach
        <h2>Yêu cầu đăng ký giảng viên</h2>
        <h3>Giảng viên có tên: {{$db->name}}</h3>
        <p>Email: {{$db->email}}</p>
        <p>Số điện thoại: {{$db->number_phone}}</p>
        <p>Tóm tắt bản thân: {{$db->Summary}}</p>

        <p>
            <a href="{{route('mentor.apply')}}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xác nhận giảng viên</a>
        </p>

    </div>
</div>