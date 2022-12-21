<div id="show-statiscal">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">

        <div class="card-body">
            <!--begin::Chart-->
            <div class="row">
                <div class="col-xl-4">
                    <!--begin::Stats Widget 22-->
                    <div class="card card-custom bgi-no-repeat bg-warning card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-3.svg)">
                        <!--begin::Body-->
                        <div class="card-body my-4">
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Tổng thu nhập các khóa học</a>
                            <div class="font-weight-bold   text-white font-size-sm">
                                <span class="font-size-h2 mr-2 text-white" id="total_price">87.000</span>TỔNG {{  number_format($total_course) }}</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 22-->
                </div>
                <div class="col-xl-4">
                    <!--begin::Stats Widget 23-->
                    <div class="card card-custom bg-info card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body my-4">
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Thu nhập của tôi</a>
                            <div class="font-weight-bold text-white font-size-sm">
                            <span class="font-size-h2 mr-2" id="admin">87.000</span>TỔNG {{  number_format($amount_price_admin) }}</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 23-->
                </div>
                <div class="col-xl-4">
                    <!--begin::Stats Widget 24-->
                    <div class="card card-custom bg-dark card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body my-4">
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Số tiền chia giảng viên</a>
                            <div class="font-weight-bold text-white font-size-sm">
                                <span class="font-size-h2 mr-2"  id="teacher">87.000</span>TỔNG  {{  number_format($amount_price_teacher) }}</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats: Widget 24-->
                </div>
            </div>
            <!--end::Chart-->
        </div>
    </div>
    <!--end::Card-->
</div>
