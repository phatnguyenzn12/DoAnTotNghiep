@extends('layouts.admin.master')

@section('title', 'Trang Quản Trị')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <h4>Danh sách thu nhập của giảng viên</h4>
            <div class="row mt-3">
                <div class="col-md-3 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <button class="form-control">Mặc định</button>
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Bắt đầu:</label>
                        <input type="datetime-local" name="" id="" class="form-control"
                            min="{{ $min }}" value="{{ $min }}" max="{{ $max }}"
                            onchange="fiterStartTime(this)">
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Kết thúc:</label>
                        <input type="datetime-local" name="" id="" class="form-control"
                            value="{{ $max }}" max="{{ $max }}" min="{{ $min }}"
                            onchange="fiterEndTime(this)">
                    </div>
                </div>
                {{-- <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Từ ngày 1 đến:</label>
                        <select class="form-control" id="kt_datatable_search_status" onchange="day_fill(this)">
                            <option value="0">Tất cả</option>
                            <optgroup label="Danh sách ngày" id="days">
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Tháng:</label>
                        <select class="form-control" id="kt_datatable_search_status" onchange="month_fill(this)">
                            <option value="0">Tất cả</option>
                            <optgroup label="Danh sách tháng">
                                <option value="1">Tháng 1</option>
                                <option value="2">Tháng 2</option>
                                <option value="3">Tháng 3</option>
                                <option value="4">Tháng 4</option>
                                <option value="5">Tháng 5</option>
                                <option value="6">Tháng 6</option>
                                <option value="7">Tháng 7</option>
                                <option value="8">Tháng 8</option>
                                <option value="9">Tháng 9</option>
                                <option value="10">Tháng 10</option>
                                <option value="11">Tháng 11</option>
                                <option value="12">Tháng 12</option>
                            </optgroup>

                        </select>
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Năm:</label>
                        <select class="form-control" id="kt_datatable_search_status" onchange="year_fill(this)">
                            <option value="0">Tất cả</option>
                            <optgroup label="Danh sách năm" id="year">
                            </optgroup>
                        </select>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="card-body" id="inner-html">
            {{-- @include('components.admin.statistical.teacher-list') --}}
        </div>
    </div>

@endsection

@section('js-links')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@push('js-handles')
    <script>
        var getDaysInMonth = function(month, year) {
            return new Date(year, month, 0).getDate();
        }

        function show_year() {
            let html = null
            let years = new Date().getFullYear();
            for (let index = 2010; index <= years; index++) {
                html += `<option value="${index}">năm ${index}</option>`;
            }
            $('#year').html(html);
        }
        show_year()


        objFiter = {
            page: 1,
            year: 0,
            month: 0,
            day: 0,
            start_time: 0,
            end_time: 0,
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('api.admin.statistical.apiTeacherList') }}',
                timeout: 1000,
                data: obj,

                success: function(res) {
                    $('#inner-html').html(res)
                }
            })
        }
        showAjax(objFiter);

        function year_fill(elm) {
            objFiter.year = elm.value
            showAjax(objFiter)
        }

        function month_fill(elm) {
            objFiter.month = elm.value
            let days = getDaysInMonth(3, 2022)
            let html = null
            for (let index = 1; index <= days; index++) {
                html += `<option value="${index}">ngày ${index}</option>`;
            }
            $('#days').html(html);

            showAjax(objFiter)
        }

        function day_fill(elm) {
            objFiter.day = elm.value
            showAjax(objFiter)
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
