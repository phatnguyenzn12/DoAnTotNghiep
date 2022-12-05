<!DOCTYPE html>
<html lang="vn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="shortcut icon" href="/frontend/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js" data-stencil-namespace="ionicons"></script>
    
	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="/frontend/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="/frontend/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="/frontend/vendor/tiny-slider/tiny-slider.css">
	<link rel="stylesheet" type="text/css" href="/frontend/vendor/glightbox/css/glightbox.css">

	<!-- Theme CSS -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-7N7LGGGWT1"></script>

    <!-- Theme CSS -->
    <style>
        body {
    font-family: Arial, Helvetica, sans-serif;
}

.certificate-container {
    width: 993px;
    height: 747px;
}
.certificate {
    border: 20px solid #0C5280;
    padding: 25px;
    height: 600px;
    position: relative;
}

.certificate:after {
    content: '';
    top: 0px;
    left: 0px;
    bottom: 0px;
    right: 0px;
    position: absolute;
    background-size: 100%;
    z-index: -1;
}

.certificate-header > .logo {
    width: 80px;
    height: 80px;
}

.certificate-title {
    text-align: center;    
}

.certificate-body {
    text-align: center;
}

h1 {

    font-weight: 400;
    font-size: 48px;
    color: #0C5280;
}

.student-name {
    font-size: 24px;
}

.certificate-content {
    margin: 0 auto;
    width: 750px;
}

.about-certificate {
    width: 380px;
    margin: 0 auto;
}

.topic-description {

    text-align: center;
}

    </style>
</head>
<body>
        <div class="certificate-container">
        <div class="certificate">
            <div class="water-mark-overlay"></div>
            <div class="certificate-header">
                <img src="../../app/images/unnamed.png" class="logo" alt="">
            </div>
            <div class="certificate-body">
                <h1><b style="color: red">GIẤY CHỨNG NHẬN</b></h1>
                <p class="certificate-title"><strong>CERTIFICATE OF COMPLETION</strong></p>
    
                <p class="student-name"><I>{{$user}}</I></p>
    
                <div class="certificate-content">
                    <div class="about-certificate">
                        <p>
                    Đã hoàn thành khoá học {{$course->title}} trực tuyến của website eduport 
                    </p>
                    </div>
                </div>
    
                <div class="certificate-footer text-muted">
                    <div class="row" style="color: black">
                        <div class="col-md-5 certificate-date">
                            <p>Hà Nội, ngày tháng năm</p>
                        </div>
                        <div class="col-md-4">
                            <div class=" row">
                                <div class="certificate-logo2 col-md-6">
                                    <img src="../../app/images/images.png" class="logo" alt="">
                                </div>
                                
                                <div class="col-md-6" style="" >
                                    <span>
                                        GIÁM ĐỐC SẢN XUẤT
                                    <img src="../../app/images/Phung_Quang_Thanh_signature.jpg" class="logo" alt="">
                                        <p>Phùng Thanh</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</body>
</html>