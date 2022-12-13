<div class="" style="width: 500px; margin: auto">
    <div class="" style="text-align: center">
        <h2>Khóa học của giảng viên duyệt đã được duyệt</h2>
        <h3>Giảng viên có tên: {{$mentor->name}}</h3>
        <p>Email: {{$mentor->email}}</p>
        <p>Số điện thoại: {{$mentor->number_phone}}</p>
        <p>Tóm tắt bản thân: {{$mentor->about_me}}</p>

        <p>
            <a href="{{route('teacher.course.index')}}"
                style="display: inline-block; background: rgb(80, 95, 234); color: #fff; padding: 10px 15px; font-weight: bold">Xác nhận giảng viên</a>
        </p>

    </div>
</div>
