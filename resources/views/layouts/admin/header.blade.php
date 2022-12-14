<!--begin::Header-->
<div id="kt_header" class="header header-fixed">

    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Topbar-->
        <div class="topbar">
            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                    id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Xin chào, {{ auth()->guard('admin')->user()->name }} <span class="text-danger">(admin)</span> </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
