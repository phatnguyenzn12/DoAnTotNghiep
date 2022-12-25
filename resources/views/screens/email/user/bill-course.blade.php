<body
    style="font-size: 16px; background-color: #fdfdfd; margin: 0; padding: 0; font-family: 'Open Sans', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; -webkit-text-size-adjust: 100%; line-height: 1.5; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased; height: 100% !important; width: 100% !important;">
    <div bgcolor="#fdfdfd" class="body"
        style="box-sizing: border-box; border-spacing: 0; mso-table-rspace: 0pt; mso-table-lspace: 0pt; width: 100%; background-color: #fdfdfd; border-collapse: separate !important;"
        width="100%">
        <div style="display: block; width: 600px; max-width: 600px; margin: 0 auto !important;">
            <div
                style="box-sizing: border-box; width: 100%; margin-bottom: 30px; background: #ffffff; border: 1px solid #f0f0f0;">
                <div class="wrapper" style="box-sizing: border-box; font-size: 16px; vertical-align: top; padding: 30px;"
                    valign="top">
                    <div>
                        <img src="https://uphinh.vn/images/2022/12/12/d318e0b5ffac44949b85de3b1a907f14.png"
                            alt="d318e0b5ffac44949b85de3b1a907f14.png" border="0"
                            style="max-width: 100%; border-style: none; width: 100px; height: 40px;" />
                    </div>
                    <div>
                        <h5 style="color: red; font: bold; text-align: center;">
                            EDUPORT HỆ THỐNG BÁN KHÓA HỌC TRỰC TUYẾN</h5>
                        <hr>
                        @if (isset($admin))
                            <p style="margin: 20 0 0 0; margin-bottom: 15px; ">
                                Xin chào {{ $admin->name }},<br>
                                Hóa đơn thanh toán khóa học.
                            </p>
                            <p>Người dùng: {{$order->user->name}} đã mua khóa học tại hệ thống.</p>
                            <div class="">
                                <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th
                                                style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 5px;">
                                                Khóa học</th>
                                            <th
                                                style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 5px;">
                                                Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_details as $order_detail)
                                            <tr>
                                                <td
                                                    style="border: 1px solid black; border-collapse: collapse;padding: 5px;">
                                                    {{ $order_detail->course->title }}</td>
                                                <td
                                                    style="border: 1px solid black; border-collapse: collapse;padding: 5px;">
                                                    {{ number_format($order_detail->price) }}đ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p>Tổng tiền: {{ number_format($order->total_price) }}đ</p>
                            </div>
                            <p align="center"
                                style="box-sizing: border-box; padding: 0; font-size: 16px; vertical-align: top; padding-bottom: 15px;"
                                valign="top">
                                <a href="#"
                                    style="box-sizing: border-box; width: 100%; border-color: #348eda; font-weight: 400; text-decoration: none; display: inline-block; margin: 0; color: #ffffff; background-color: #348eda; border: solid 1px #348eda; border-radius: 2px; cursor: pointer; font-size: 14px; padding: 12px 45px;"
                                    target="_blank">Xem chi tiết</a>
                            </p>
                        @elseif(isset($user))
                            <p style="margin: 20 0 0 0; margin-bottom: 15px; ">
                                Xin chào {{ $user->name }},<br>
                                Hóa đơn thanh toán khóa học bạn đã mua.
                            </p>
                            <div class="">
                                <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th
                                                style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 5px;">
                                                Khóa học</th>
                                            <th
                                                style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 5px;">
                                                Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_details as $order_detail)
                                            <tr>
                                                <td
                                                    style="border: 1px solid black; border-collapse: collapse;padding: 5px;">
                                                    {{ $order_detail->course->title }}</td>
                                                <td
                                                    style="border: 1px solid black; border-collapse: collapse;padding: 5px;">
                                                    {{ number_format($order_detail->price) }}đ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p>Tổng tiền: {{ number_format($order->total_price) }}đ</p>
                            </div>
                            <p align="center"
                                style="box-sizing: border-box; padding: 0; font-size: 16px; vertical-align: top; padding-bottom: 15px;"
                                valign="top">
                                <a href="#"
                                    style="box-sizing: border-box; width: 100%; border-color: #348eda; font-weight: 400; text-decoration: none; display: inline-block; margin: 0; color: #ffffff; background-color: #348eda; border: solid 1px #348eda; border-radius: 2px; cursor: pointer; font-size: 14px; padding: 12px 45px;"
                                    target="_blank">Xem chi tiết</a>
                            </p>
                        @endif
                        <p>Cảm ơn bạn!</p>
                        <p>Đã sử dụng hệ thống của chúng tôi!</p>
                    </div>
                    <hr>
                    <div align="center">
                        <h3>Cảm ơn bạn đã sử dụng hệ thống của chúng tôi!</h3>
                        <p>www.eduport.com</p>
                    </div>
                    <div align="center"
                        style="box-sizing: border-box; width: 100%; border-spacing: 0; mso-table-rspace: 0pt; mso-table-lspace: 0pt; font-size: 12px; border-collapse: separate !important;"
                        width="100%">
                        <div class="meta__help">
                            <p class="leading-loose">
                                Những câu hỏi liên quan liên hệ tới?
                                <a href="#" class="text-grey-darkest">contact@eduport.com</a>
                            </p>
                            <p>
                                © P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội
                            </p>
                            <p>
                                <a href="#"
                                    style="box-sizing: border-box; color: #348eda; font-weight: 400; text-decoration: none; font-size: 12px; padding: 0 5px;"
                                    target="_blank">Blog</a> <a href="#"
                                    style="box-sizing: border-box; color: #348eda; font-weight: 400; text-decoration: none; font-size: 12px; padding: 0 5px;"
                                    target="_blank">GitHub</a> <a href="#"
                                    style="box-sizing: border-box; color: #348eda; font-weight: 400; text-decoration: none; font-size: 12px; padding: 0 5px;"
                                    target="_blank">Twitter</a> <a href="#"
                                    style="box-sizing: border-box; color: #348eda; font-weight: 400; text-decoration: none; font-size: 12px; padding: 0 5px;"
                                    target="_blank">Facebook</a> <a href="#"
                                    style="box-sizing: border-box; color: #348eda; font-weight: 400; text-decoration: none; font-size: 12px; padding: 0 5px;"
                                    target="_blank">LinkedIn</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
