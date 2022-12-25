@extends('layouts.mentor.master')

@section('title', 'Trang thu nhập của tôi')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Lịch sử rút tiền</span>
                    </h3>
                </div>
                <div class="card-body pt-0 pb-3">
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="row align-items-center">
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
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
                                                min="{{ $min }}"
                                                value="{{ $min }}"
                                                max="{{ $max }}" onchange="fiterStartTime(this)">
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Kết thúc:</label>
                                            <input type="datetime-local" name="" id="" class="form-control"
                                                value="{{ $max }}"
                                                max="{{ $max }}"
                                                min="{{ $min }}" onchange="fiterEndTime(this)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="table-innerHtml"></div>
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
        objFiter = {
            page: 1,
            record: 10,
            id: 'id_desc',
            start_time: 0,
            end_time: 0,
            mentor_id: {{ $mentor_id }}
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('teacher.account.filterWithdraw') }}',
                timeout: 1000,
                data: obj,

                success: function(res) {
                    $('#table-innerHtml').html(res)
                }
            })
        }
        showAjax(objFiter);

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
