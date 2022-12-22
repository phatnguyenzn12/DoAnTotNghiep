@extends('layouts.client.master')

@section('title', 'Danh sách giáo viên')

@section('content')

    <!-- =======================
                                                Page Banner START -->
    <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-dark p-4 text-center rounded-3">
                        <h1 class="text-white m-0">Chính sách học tập</h1>
                        <!-- Breadcrumb -->
                        <div class="d-flex justify-content-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('client') }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chính sách</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-4">
        <div class="container">
            <!-- Search option START -->
            <div class="elementor-column-wrap elementor-element-populated">
                <div class="elementor-widget-wrap">
                    <div class="elementor-element elementor-element-dc956c1 elementor-widget elementor-widget-heading"
                        data-id="dc956c1" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default">I. Quy định về sử dụng khóa học</h2>
                        </div>
                    </div>
                    <ul style="margin-top: 0; margin-bottom: 0; padding-inline-start: 48px;">

                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="menu-text" style="color: rgb(255, 174, 0); font-size:24px; font-weight:bold">Hình thức
                                    đào
                                    tạo</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu" id="a">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">
                                    <li style="font-weight: 400;" aria-level="1"><span
                                            style="font-weight: 400; font-size: 14pt;">Các khóa học được đào tạo
                                            trên nền tảng Eduport là các bài giảng online dưới dạng video
                                            được thu sẵn.</span>
                                    </li>
                                    <li style="font-weight: 400;" aria-level="1"><span
                                            style="font-weight: 400; font-size: 14pt;">Tài khoản học được tạo từ
                                            gmail cá nhân của học viên.</span></li>
                                </ul>
                                <i class="menu-arrow"></i>

                            </div>
                        </li>
                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="menu-text" style="color: rgb(255, 174, 0); font-size:24px; font-weight:bold">Quy định bảo
                                    mật</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul>
                                    <li style="font-weight: 400;" aria-level="1"><span
                                            style="font-weight: 400; font-size: 14pt;">Mỗi tài khoản học chỉ được
                                            cung cấp và hỗ trợ cho 1 học viên đăng ký tham gia và được cấp quyền bảo
                                            mật trực tiếp thông qua địa chỉ gmail cá nhân của học viên;</span></li>
                                    <li style="font-weight: 400;" aria-level="1"><span
                                            style="font-weight: 400; font-size: 14pt;">Việc sử dụng chung tài khoản
                                            tức là từ 2 người trở lên cùng sử dụng chung một tài khoản, khi gặp sự
                                            cố sẽ không được hỗ trợ hoặc bị phát hiện sẽ bị xóa tài khoản ngay lập
                                            tức;</span></li>
                                    <li style="font-weight: 400;" aria-level="1"><span
                                            style="font-weight: 400; font-size: 14pt;">Học viên tuyệt đối không sử
                                            dụng bất kỳ chương trình, công cụ hay hình thức nào khác để can thiệp
                                            vào các khóa học của Eduport. Học viên khi bị phát hiện sẽ bị xóa tài khoản
                                            và có thể xử lý theo quy định của pháp luật;</span></li>
                                    <li style="font-weight: 400;" aria-level="1"><span
                                            style="font-weight: 400; font-size: 14pt;">Nghiêm cấm việc phát tán nội
                                            dung các bài học trên hệ thống của Eduport (gồm có: video, tài
                                            liệu, hình ảnh) ra bên ngoài. Mọi vi phạm khi bị phát hiện sẽ bị xử lý
                                            theo quy định của pháp luật về việc vi phạm bản quyền.</span></li>
                                </ul>
                                <i class="menu-arrow"></i>

                            </div>
                        </li>
                    </ul>
                    <div class="elementor-element elementor-element-dc956c1 elementor-widget elementor-widget-heading"
                        data-id="dc956c1" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default">II. Quy định về thanh toán</h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-a666d51 elementor-widget elementor-widget-text-editor"
                        data-id="a666d51" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-text-editor elementor-clearfix">
                                <ul style="margin-top: 0; margin-bottom: 0; padding-inline-start: 48px;">
                                    <li style="font-weight: 400;" aria-level="1"><span
                                            style="font-weight: 400; font-size: 14pt;">Học
                                            viên sẽ cần hoàn thành toàn bộ học phí trong 1 lần.</span></li>
                                    <li>
                                        <div class="elementor-accordion-item">
                                            <div id="elementor-tab-title-2122" class="elementor-tab-title" data-tab="2"
                                                role="tab" aria-controls="elementor-tab-content-2122">

                                                <a class="elementor-accordion-title" style="color: rgb(255, 174, 0); font-size:24px; font-weight:bold"
                                                    href="">Thanh toán trực tuyến</a>
                                            </div>
                                            <div id="elementor-tab-content-2122"
                                                class="elementor-tab-content elementor-clearfix" data-tab="2"
                                                role="tabpanel" aria-labelledby="elementor-tab-title-2122">
                                                <ul>
                                                    <li style="font-weight: 400;" aria-level="1"><span
                                                            style="font-weight: 400; font-size: 14pt;">Học viên lựa chọn
                                                            hình thức
                                                            thanh toán này tại phần thông tin thanh toán khi đặt mua khóa
                                                            học trên
                                                            website, tiến hành thanh toán theo hướng dẫn của Ban quản trị để
                                                            thanh
                                                            toán khóa học đặt mua.</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-dc956c1 elementor-widget elementor-widget-heading"
                        data-id="dc956c1" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default"> III. Quy định về các chính sách
                            </h2>
                        </div>
                    </div>
                    <ul style="margin-top: 0; margin-bottom: 0; padding-inline-start: 48px;">

                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span onclick="ShowAndHide()" class="menu-text" style="color: rgb(255, 174, 0); font-size:24px; font-weight:bold">Quy định
                                    về
                                    cam kết chất lượng đầu ra</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu" id="a">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">
                                    <li style="font-weight: 400;" aria-level="1"><span
                                            style="font-weight: 400; font-size: 14pt;">Học viên được cấp chứng chỉ do
                                            Eduport
                                            cung cấp sau khi
                                            hoàn thành khóa học</span>
                                    </li>

                                </ul>
                                <i class="menu-arrow"></i>

                            </div>
                        </li>
                    </ul>
                    <div class="elementor-element elementor-element-501963e elementor-widget elementor-widget-text-editor"
                        data-id="501963e" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-text-editor elementor-clearfix">
                                <p style="color: #273044; font-family: 'Open Sans'; text-align: justify;"><span
                                        style="font-size: 14pt; font-family: arial, helvetica, sans-serif; color: #737373;">Eduport
                                        rất cám ơn bạn đã quan tâm đến chương trình đào tạo của chúng tôi. Chúng tôi luôn
                                        sẵn sàng đồng hành cùng bạn trong chặng đường học tập và chinh phục chứng chỉ quốc
                                        tế. </span></p>
                                <p style="color: #273044; font-family: 'Open Sans'; text-align: justify;"><span
                                        style="font-size: 14pt; font-family: arial, helvetica, sans-serif; color: #737373;">Mong
                                        muốn mang những trải nghiệm tốt nhất, những giá trị cốt lõi nhất đến với từng học
                                        viên với triết lý Sharing &amp; Caring – Chia sẻ &amp; Quan tâm, ở trên là toàn bộ
                                        các chính sách học tập dành cho học viên khi tham gia học mà chúng tôi muốn gửi đến
                                        bạn trước khi quyết định lựa chọn Eduport.&nbsp;</span></p>
                                <p style="color: #273044; font-family: 'Open Sans'; text-align: justify;"><span
                                        style="font-size: 14pt; font-family: arial, helvetica, sans-serif; color: #737373;">Mọi
                                        nhu cầu hoặc phàn nàn của học viên về bất cứ điều gì sẽ được gửi trực tiếp đến cá
                                        nhân chịu trách nhiệm để giải quyết. Hãy liên hệ với chúng tôi qua
                                        <strong>edu@port.edu.vn</strong> hoặc hotline: <strong>034 3290 746</strong>
                                    </span></p>
                                <p><span
                                        style="font-size: 14pt; font-family: arial, helvetica, sans-serif; color: #737373;">Mối
                                        quan hệ với học viên là tài sản giá trị nhất của Eduport. Mỗi một nhân viên tại
                                        Eduport đều được đào tạo là người đại diện của Eduport trước học viên và cách mỗi
                                        nhân
                                        viên làm việc chính là đại diện hình ảnh cho toàn bộ tập thể của Eduport trước học
                                        viên.</span></p>
                                <p style="color: #273044; font-family: 'Open Sans'; text-align: justify;"><span
                                        style="font-size: 14pt; font-family: arial, helvetica, sans-serif; color: #737373;">Cảm
                                        ơn các bạn đã tin tưởng và chia sẻ những khó khăn của bạn với chúng tôi!</span></p>
                                <p style="color: #273044; font-family: 'Open Sans'; text-align: justify;">&nbsp;</p>
                            </div>
                            <strong>Thân ái!</strong>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



@endsection
