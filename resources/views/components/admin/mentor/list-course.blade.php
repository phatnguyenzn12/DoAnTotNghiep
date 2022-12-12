<div class="row">
    @foreach ($courses as $course)
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch">
                <!--begin::Body-->
                <a class="card-body pt-4 ribbon ribbon-right" href="#">
                    <div class="ribbon-target bg-primary" style="top: 10px; right: -2px;">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">{{ $course->active }}</font>
                        </font>
                    </div>

                    <!--begin::User-->
                    <div class="d-flex align-items-center mb-7" style="aspect-ratio:1/1;overflow:hidden">
                        <img src="{{ asset('app/' . $course->image) }}" style="width: 100%;height:100%;object-fit:cover"
                            alt="image">
                    </div>
                    <!--end::User-->

                    <!--begin::Desc-->
                    <h4 class=" mb-7 font-weight-bold"><a class="text-dark text-hover-primary"
                            href="">{{ $course->title }}</a> </h4>
                    <!--end::Desc-->
                    <!--begin::Info-->
                    <div class="mb-7 p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 mr-2">Danh mục</span>
                            <span
                                class="text-dark font-weight-bolder text-hover-primary">{{ $course->cateCourse->name }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-cente my-1">
                            <span class="text-dark-75 mr-2">Chương học</span>
                            <span
                                class="text-dark font-weight-bolder text-hover-primary">{{ $course->chapters->count() }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 mr-2">Bài học</span>
                            <span
                                class="text-dark font-weight-bolder font-weight-bold">{{ $course->lessons->count() }}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 mr-2">Ngôn ngữ</span>
                            <span class="text-success font-weight-bolder">{{ $course->language_rule }}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 mr-2">Giấy chứng nhận</span>
                            <span
                                class="text-success font-weight-bolder">{{ $course->certificate != null ? 'có giấy chứng nhận' : ' không Có giấy chứng nhận' }}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 mr-2">tags</span>
                            <span class="text-success font-weight-bolder">{{ $course->tags }}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 mr-2">Kỹ năng</span>
                            <span class="text-success font-weight-bolder">{{ $course->skill->title }}</span>
                        </div>
                        @if (isset($course->price))
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-dark-75 mr-2">Giá khóa học</span>
                                <span class="text-dark font-weight-bolder font-weight-bold">{{ $course->price }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-dark-75 mr-2">Giảm giá</span>
                                <span class="text-dark font-weight-bolder font-weight-bold">{{ $course->discount }}%
                                    -
                                    {{ $course->current_price }}</span>
                            </div>
                        @endif
                    </div>
                    <!--end::Info-->
                </a>
                <!--end::Body-->
            </div>
            <!--end:: Card-->
        </div>
    @endforeach
    @php
        $pagination = $courses
    @endphp
</div>
<div class="row p-5 mb-5 card">
    @include('components.admin.pagination-basic')
</div>
