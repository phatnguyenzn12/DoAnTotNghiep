@extends('layouts.mentor.master')

@section('title', 'Trang thu nhập của tôi')
@section('content')

    <div class="card">
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Lịch sử nhận tiền của khóa học:
                        {{ $course->title }}</span>
                    <!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> -->
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-0 pb-3">
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-12">
                            <div class="row align-items-center">
                                <div class="col-md-3 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" oninput="search(this)" class="form-control"
                                            placeholder="Tìm kiếm..." id="kt_datatable_search_query" filter-search-title />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Sắp xếp:</label>
                                        <select class="form-control" id="kt_datatable_search_status"
                                            onchange="fiterSort(this)">
                                            <option value="id_desc">Mặc định</option>
                                            <option value="id_desc">Mới đến cũ</option>
                                            <option value="id_asc">Cũ đến mới</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Bắt đầu:</label>
                                        <input type="datetime-local" name="" id="" class="form-control"
                                            value="{{ $min }}" max="{{ $max }}" min="{{ $min }}"
                                            onchange="fiterStartTime(this)">
                                    </div>
                                </div>
                                <div class="col-md-3 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Kết thúc:</label>
                                        <input type="datetime-local" name="" id="" class="form-control"
                                            value="{{ $max }}" max="{{ $max }}" min="{{ $min }}"
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
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Đóng</button>
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
            name: 0,
            id: 'id_desc',
            start_time: 0,
            end_time: 0,
            course: '{{ $course->id }}'
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('api.teacher.statistical.apiSalaryBonusDetail') }}',
                timeout: 1000,
                data: obj,

                success: function(res) {
                    $('#table-innerHtml').html(res)
                }
            })
        }
        showAjax(objFiter);

        function search(elemment) {
            objFiter.name = elemment.value
            showAjax(objFiter);
        }

        function fiterSort(elemment) {
            objFiter.id = elemment.value
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

        function pagination(page) {
            objFiter.page = page
            showAjax(objFiter);
        }
    </script>
@endpush
