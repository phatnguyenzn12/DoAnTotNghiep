<div class="row">
    @foreach ($courses as $course)
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch">
                <!--begin::Body-->
                <div class="card-body">
                    <a class="pt-4 ribbon ribbon-right" href="{{ route('teacher.chapter.program', $course->id) }}">
                        @if ($course->status == 1)
                            <div class="ribbon-target bg-primary" style="top: 10px; right: -2px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{ $course->active }}</font>
                                </font>
                            </div>
                        @elseif($course->status == 0)
                            <div class="ribbon-target bg-danger" style="top: 10px; right: -2px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{ $course->active }}</font>
                                </font>
                            </div>
                        @else
                            <div class="ribbon-target bg-success" style="top: 10px; right: -2px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{ $course->active }}</font>
                                </font>
                            </div>
                        @endif
                        <!--begin::User-->
                        <div class="d-flex align-items-center mb-7" style="aspect-ratio:1/1;overflow:hidden">
                            <img src="{{ asset('app/' . $course->image) }}"
                                style="width: 100%;height:100%;object-fit:cover" alt="image">
                        </div>
                        <!--end::User-->

                        <!--begin::Desc-->
                        <h4 class="font-weight-bold"><a class="text-dark text-hover-primary"
                                href="">{{ $course->title }}</a> </h4>
                        <!--end::Desc-->
                        <!--begin::Info-->
                        <div class="">

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-dark-75 mr-2">Danh m???c</span>
                                <span
                                    class="text-dark font-weight-bolder text-hover-primary">{{ $course->cateCourse->name }}</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-cente my-1">
                                <span class="text-dark-75 mr-2">Ch????ng h???c</span>
                                <span
                                    class="text-dark font-weight-bolder text-hover-primary">{{ $course->chapters->count() }}</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-dark-75 mr-2">B??i h???c</span>
                                <span
                                    class="text-dark font-weight-bolder font-weight-bold">{{ $course->lessons->count() }}</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-dark-75 mr-2">Ng??n ng???</span>
                                <span class="text-success font-weight-bolder">{{ $course->language_rule }}</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-dark-75 mr-2">Gi???y ch???ng nh???n</span>
                                <span
                                    class="text-success font-weight-bolder">{{ $course->certificate != null ? 'c?? gi???y ch???ng nh???n' : ' kh??ng C?? gi???y ch???ng nh???n' }}</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-dark-75 mr-2">K??? n??ng</span>
                                <span class="text-success font-weight-bolder">{{ $course->skill->title }}</span>
                            </div>
                            @if ($course->price != null)
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 mr-2">Gi?? kh??a h???c</span>
                                    <span
                                        class="text-dark font-weight-bolder font-weight-bold">{{ $course->price }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 mr-2">Gi???m gi??</span>
                                    <span
                                        class="text-dark font-weight-bolder font-weight-bold">{{ $course->discount }}%
                                        -
                                        {{ $course->current_price }}</span>
                                </div>
                            @else
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 mr-2">Gi?? kh??a h???c</span>
                                    <span class="text-dark font-weight-bolder font-weight-bold">Ch??a ???????c k??ch
                                        ho???t</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 mr-2">Gi???m gi??</span>
                                    <span class="text-dark font-weight-bolder font-weight-bold">Ch??a ???????c k??ch
                                        ho???t</span>
                                </div>
                            @endif

                            <a href="{{ route('client.course.show',['slug' => $course->slug,'course' => $course->id]) }}" class="btn btn-bg-primary text-white mt-3">Chi ti???t kh??a h???c trang ch???</a>

                        </div>
                        <!--end::Info-->
                    </a>
                </div>

                <!--end::Body-->
            </div>
            <!--end:: Card-->
        </div>
    @endforeach
    @php
        $pagination = $courses;
    @endphp
</div>
<div class="p-3 mb-5 card">
    @include('components.admin.pagination-basic')
</div>
