

 @extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
    <div class="container">
        <div class="certificate-container" style="background-image: url(); background-size: 100%">
            <div class="certificate">
                <div class="water-mark-overlay"></div>
                <div class="certificate-header">
                    <img src="../../app/images/unnamed.png" class="logo" alt="">
                </div>
                <div class="certificate-body">
                    <h1><b style="color: red">GIẤY CHỨNG NHẬN</b></h1>
                    <p class="certificate-title"><strong>CERTIFICATE OF COMPLETION</strong></p>

                    <p class="student-name"><I>{{ $user }}</I></p>

                    <div class="certificate-content">
                        <div class="about-certificate">
                            <p>
                                Đã hoàn thành khoá học {{ $course->title }} trực tuyến của website eduport
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

                                    <div class="col-md-6" style="">
                                        <span>
                                            GIÁM ĐỐC SẢN XUẤT
                                            <img src="../../app/images/Phung_Quang_Thanh_signature.jpg" class="logo"
                                                alt="">
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
        <a href="{{ route('client.course.generatePDF') }}" class="btn btn-primary">Xuất file PDF</a>

    </div>


@endsection
@section('js-links')

@endsection
@push('js-handles')
    <script type="module"></script>
@endpush
