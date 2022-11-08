@foreach ($courses as $course)
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <div class="dropdown dropdown-inline">
                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ki ki-bold-more-hor"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">
                                <a class="dropdown-item" href="{{route('admin.course.program',$course->id)}}">Chỉnh sửa</a>
                                <form action="" method="POST" class="dropdown-item">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-link-dark">Thay đổi trạng thái</button>
                                </form>
                                <div class="dropdown-divider"></div>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>
                </div>
                <!--end::Toolbar-->
                <!--begin::User-->
                <div class="d-flex align-items-center mb-7" style="aspect-ratio:1/1;overflow:hidden">
                    <img src="{{$course->image}}" style="width: 100%;height:100%;object-fit:cover" alt="image">
                </div>
                <!--end::User-->
                <!--begin::Desc-->
                <h4 class=" mb-7 font-weight-bold"><a class="text-dark text-hover-primary" href="">{{$course->title}}</a> </h4>
                <!--end::Desc-->
                <!--begin::Info-->
                <div class="mb-7">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 mr-2">Danh mục</span>
                        <span class="text-dark font-weight-bolder text-hover-primary">{{$course->cateCourse->name}}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-cente my-1">
                        <span class="text-dark-75 mr-2">Chương học</span>
                        <span class="text-dark font-weight-bolder text-hover-primary">10</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 mr-2">Bài học</span>
                        <span class="text-dark font-weight-bolder font-weight-bold">50</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 mr-2">Giá khóa học</span>
                        <span class="text-dark font-weight-bolder font-weight-bold">50.000</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 mr-2">Giảm giá</span>
                        <span class="text-dark font-weight-bolder font-weight-bold">50% - 25.000</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 mr-2">Trạng thái</span>
                        <span class="text-success font-weight-bolder">Ẩn</span>
                    </div>
                </div>
                <!--end::Info-->
            </div>
            <!--end::Body-->
        </div>
        <!--end:: Card-->
    </div>
@endforeach
