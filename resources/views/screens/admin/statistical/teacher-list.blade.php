@extends('layouts.admin.master')

@section('title', 'Trang Quản Trị')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <h4>Danh sách thu nhập của giảng viên</h4>
            <div class="row mt-3">
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Ngày:</label>
                        <select class="form-control" id="kt_datatable_search_status" filter-sort>
                            <option value="0">Mặc định</option>
                            <option value="id_desc">Mới đến cũ</option>
                            <option value="id_asc">Cũ đến mới</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Tháng:</label>
                        <select class="form-control" id="kt_datatable_search_status" filter-sort>
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
                        <select class="form-control" id="kt_datatable_search_status" filter-sort>
                            <option value="0">Tất cả</option>
                            <optgroup label="Danh sách năm">
                                <option value="2022">Năm 2022</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            @include('components.admin.statistical.teacher-list')
        </div>
    </div>

@endsection

@section('js-links')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@push('js-handles')
    <script></script>
@endpush
