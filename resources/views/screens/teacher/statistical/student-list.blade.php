@extends('layouts.mentor.master')

@section('title', 'Trang Quản Trị')

@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="mb-7 p-3 card">
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
                                    <select class="form-control" id="kt_datatable_search_status" onchange="fiterSort(this)">
                                        <option value="id_desc">Mặc định</option>
                                        <option value="id_desc">Mới đến cũ</option>
                                        <option value="id_asc">Cũ đến mới</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Row-->
            <div id="table-innerHtml">

            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection

@section('js-links')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@push('js-handles')
    <script>
        objFiter = {
            page: 1,
            name: 0,
            id: 'id_desc',
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('api.teacher.statistical.listStudent') }}',
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
    </script>
@endpush
