@extends('layouts.mentor.master')

@section('title', 'Trang thu nhập của tôi')
@section('content')

    <div class="row">
        <div class="col-xl-4">
            <!--begin::Nav Panel Widget 2-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Wrapper-->
                    <div class="d-flex justify-content-between flex-column pt-4 h-100">
                        <!--begin::Container-->
                        <div class="pb-5">
                            <!--begin::Header-->
                            <div class="d-flex flex-column flex-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                                    <span class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                                        <img src="{{ asset('app/' . $mentor->avatar) }}" class="h-75 align-self-end"
                                            alt="">
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Username-->
                                <a href="#"
                                    class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">{{ $mentor->name }}</a>
                                <!--end::Username-->
                                <!--begin::Info-->
                                <div class="font-weight-bold text-dark-50 font-size-sm pb-6">Giảng viên</div>
                                <!--end::Info-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="pt-1">
                                <!--begin::Text-->
                                <!--end::Text-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center pb-9">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light mr-4">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-2x svg-icon-dark-50">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24">
                                                        </rect>
                                                        <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                            width="3" height="16" rx="1.5"></rect>
                                                        <rect fill="#000000" x="8" y="9" width="3"
                                                            height="11" rx="1.5"></rect>
                                                        <rect fill="#000000" x="18" y="11" width="3"
                                                            height="9" rx="1.5"></rect>
                                                        <rect fill="#000000" x="3" y="13" width="3"
                                                            height="7" rx="1.5"></rect>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="#"
                                            class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Số
                                            tiền đang có</a>
                                        <span
                                            class="text-muted font-weight-bold">{{ number_format($mentor->salary_bonus) }}đ</span>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center pb-9">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light mr-4">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-2x svg-icon-dark-50">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24">
                                                        </rect>
                                                        <rect fill="#000000" x="4" y="4" width="7"
                                                            height="7" rx="1.5"></rect>
                                                        <path
                                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="#"
                                            class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Số
                                            khóa học sở hữu</a>
                                        <span class="text-muted font-weight-bold">{{ $course_count }}</span>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <div class="d-flex align-items-center pb-9">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light mr-4">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-2x svg-icon-dark-50">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <path
                                                            d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                            fill="#000000" opacity="0.3" />
                                                        <path
                                                            d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                            fill="#000000" />
                                                        <rect fill="#000000" opacity="0.3" x="10"
                                                            y="9" width="7" height="2"
                                                            rx="1" />
                                                        <rect fill="#000000" opacity="0.3" x="7"
                                                            y="9" width="2" height="2"
                                                            rx="1" />
                                                        <rect fill="#000000" opacity="0.3" x="7"
                                                            y="13" width="2" height="2"
                                                            rx="1" />
                                                        <rect fill="#000000" opacity="0.3" x="10"
                                                            y="13" width="7" height="2"
                                                            rx="1" />
                                                        <rect fill="#000000" opacity="0.3" x="7"
                                                            y="17" width="2" height="2"
                                                            rx="1" />
                                                        <rect fill="#000000" opacity="0.3" x="10"
                                                            y="17" width="7" height="2"
                                                            rx="1" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="{{ route('teacher.account.listWithdraw', $mentor->id) }}"
                                            class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Lịch
                                            sử rút tiền</a>
                                        <span
                                            class="text-muted font-weight-bold">{{ $mentor->history_withdrawal->count() }}</span>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Item-->

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--eng::Container-->
                        <!--begin::Footer-->
                        <div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip"
                            title="" data-placement="right" data-original-title="Chat Example">
                            <button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal"
                                data-target="#modal-example"
                                onclick="showAjaxModal('{{ route('teacher.account.formWithdraw', $mentor->id) }}' ,'Rút tiền')">Rút
                                tiền</button>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Nav Panel Widget 2-->
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">Danh sách Khóa học</span>
                            <!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> -->
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-0 pb-3">
                        <div class="mb-7">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-11">
                                    <div class="row align-items-center">
                                        <div class="col-md-3 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" oninput="search(this)" class="form-control"
                                                    placeholder="Tìm kiếm..." id="kt_datatable_search_query"
                                                    filter-search-title />
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block">Bắt đầu:</label>
                                                <input type="datetime-local" name="" id=""
                                                    class="form-control" value="{{ $min }}"
                                                    max="{{ $max }}" min="{{ $min }}"
                                                    onchange="fiterStartTime(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block">Kết thúc:</label>
                                                <input type="datetime-local" name="" id=""
                                                    class="form-control" value="{{ $max }}"
                                                    max="{{ $max }}" min="{{ $min }}"
                                                    onchange="fiterEndTime(this)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--begin::Table-->
                        <div id="table-innerHtml">

                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </div>

    </div>


    <!-- modal add section -->
    <!-- Modal-->
    <div class="modal fade" id="modal-example" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Loading...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
    <script>
        function showAjaxModal(url, title) {
            $('#modal-example').find('.modal-title').text(title)
            $('#modal-example').find('.modal-body').html(
                '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
            $.ajax({
                url: url,
                timeout: 1000,
                success: function(res) {
                    $('#modal-example').find('.modal-body').html(res)
                }
            })
        }
        $(document).on('submit', 'form.has-validation-ajax', function(e) {
            e.preventDefault()
            // $('#modal-example').find('.modal-body').html(
            //     '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
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
                        'Có lỗi xảy ra, vui lòng thử lại',
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

        function showModal(id_video, title) {
            $('#modal-example').find('.modal-title').text(title)
            $('#modal-example').find('.modal-body').html(
                '<div class="spinner spinner-primary spinner-lg p-15 spinner-center"></div>')
            axios.get('https://vimeo.com/api/oembed.json?url=https%3A//vimeo.com/' + id_video)
                .then(
                    res => {
                        console.log(res)
                        $('#modal-example').find('.modal-body').html(res.data.html)
                        $('iframe').css({
                            'width': '100%',
                            'height': '100%',
                        });
                    }
                )
                .catch(
                    res => {
                        console.log(res);
                        Swal.fire(
                            'chưa tải xong video, vui lòng đợi',
                            res.message,
                            'error'
                        )
                    }
                )
        }

        objFiter = {
            page: 1,
            title: 0,
            id: 0,
            start_time: 0,
            end_time: 0,
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('api.teacher.statistical.apiCourseSellingTop') }}',
                timeout: 1000,
                data: obj,
                success: function(res) {
                    $('#table-innerHtml').html(res)
                }
            })
        }
        showAjax(objFiter);

        function search(elemment) {
            objFiter.title = elemment.value
            showAjax(objFiter);
        }

        function fiterStartTime(elemment) {
            objFiter.start_time = elemment.value
            showAjax(objFiter);
        }

        function fiterEndTime(elemment) {
            objFiter.end_time = elemment.value
            showAjax(objFiter);
        }

        function fiterSort(elemment) {
            objFiter.id = elemment.value
            showAjax(objFiter);
        }

        function pagination(page) {
            objFiter.page = page
            showAjax(objFiter);
        }
    </script>
@endpush
