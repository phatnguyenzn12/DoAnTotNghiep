<div class="row">
    @foreach ($courses as $course)
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch">
                <!--begin::Body-->
                <div class="card-body">
                    <a class="pt-4 ribbon ribbon-right" href="{{ route('mentor.course.program', $course->id) }}">
                        @if ($course->status == 1)
                            <div class="ribbon-target bg-primary" style="top: 10px; right: -2px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{ $course->active }}</font>
                                </font>
                            </div>
                        @elseif($course->status == 2)
                            <div class="ribbon-target bg-success" style="top: 10px; right: -2px;">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{ $course->active }}</font>
                                </font>
                            </div>
                        @else
                            <div class="ribbon-target bg-danger" style="top: 10px; right: -2px;">
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
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-dark-75 mr-2">Gi???ng vi??n s??? h???u</span>
                                <span
                                    class="text-dark font-weight-bolder text-hover-primary">{{ $course->mentor ? $course->mentor->name : 'Ch??a c?? gi???ng vi??n' }}</span>
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

                            <div class="d-flex justify-content-between align-items-center">
                                <form action="{{ route('mentor.course.actived', ['course' => $course->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <input type="text" name="status" hidden value="1">
                                    <button onclick="return confirm('B???n c?? ch???c mu???n ho???t ?????ng')"
                                        class="btn btn-success">Duy???t kh??a h???c</button>
                                </form>

                                <a type="button" class="btn btn-danger btn-lg" data-toggle="modal"
                                    data-target="#modalId"
                                    onclick="showAjaxModal('{{ route('mentor.course.formDeactiveCourse', $course->id) }}','L?? do b??? duy???t kh??a h???c')"
                                    class="btn btn-danger">B??? duy???t kh??a h???c</a>
                            </div>

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
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">T???i sao b??? duy???t</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">????ng</button>
            </div>
        </div>
    </div>
</div>
<script>

    function showAjaxModal(url, title) {
        $('#modalId').find('.modal-title').text(title)
        $('#modalId').find('.modal-body').html(
            '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
        $.ajax({
            url: url,
            timeout: 1000,
            success: function(res) {
                $('#modalId').find('.modal-body').html(res)
            }
        })
    }
    $(document).on('submit', 'form.has-validation-ajax', function(e) {
        e.preventDefault()
        $('#modalId').find('.modal-body').html(
            '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
        $(this).find('.errors').text('')
        let _form = $(this)
        let data = new FormData(this)
        let _url = $(this).attr('action')
        let _method = $(this).attr('method')
        let _redirect = $(this).data('redirect') ?? ""
        $.ajax({
            url: _url,
            type: _method,
            data: data,
            contentType: false,
            processData: false,
            success: function(res) {
                window.location.href = _redirect
            },
            error: function(err) {
                Swal.fire(
                    'C?? l???i x???y ra, vui l??ng th??? l???i',
                    err,
                    'error'
                )
                let errors = err.responseJSON.errors
                Object.keys(errors).forEach(key => {
                    $(_form).find('.errors.' + key.replace('\.', '')).text(errors[key][0])
                })
            }
        })
    })
</script>
<div class="p-3 mb-5 card">
    @include('components.admin.pagination-basic')
</div>
