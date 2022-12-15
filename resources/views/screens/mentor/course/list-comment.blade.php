@extends('layouts.mentor.master')

@section('title', 'Trang danh sách Khóa học')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
            @endif
            <!--begin::table-->
            <a href="" class="btn btn-primary mr-2 mb-3">Danh sách bình luận khóa học</a>
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <form action="" method="GET">
                        <!--begin::Search Form-->
                        <div class="mb-7">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="row align-items-center">
                                        <div class="col-md-3 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" oninput="search(this)" class="form-control"
                                                    placeholder="Search..." id="kt_datatable_search_query"
                                                    filter-search-title />
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
                                                <label class="mr-3 mb-0 d-none d-md-block">Trạng thái:</label>
                                                <select class="form-control" id="kt_datatable_search_status"
                                                    onchange="fiterActive(this)">
                                                    <option value="0">Mặc định</option>
                                                    <option value="in_active">Chờ xử lý</option>
                                                    <option value="fix">Đã kích hoạt</option>
                                                    <option value="active">Đã được duyệt</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Search Form-->
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                    <thead>
                        <tr class="text-uppercase">
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Nội dung bình luận</th>
                            <th>Khóa học</th>
                            <th>Lượt đánh giá</th>
                            <th>Kích hoạt</th>
                            <th>Hiệu lực</th>
                        </tr>
                    </thead>
                    <tbody id="table-innerHtml">

                    </tbody>
                </table>
            </div>

            {{-- @include('components.admin.pagination') --}}
            <!--end::table-->
        </div>
    @endsection
    @section('js-links')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    @endsection
    @push('js-handles')
        <script>
            objFiter = {
                page: 1,
                title: 0,
                record: 6,
                id: 'id_desc',
                status: 0,
                price: 0,
            }

            function showAjax(obj) {
                $.ajax({
                    url: '{{ route('mentor.course.listComment') }}',
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

            function fiterSort(elemment) {
                objFiter.id = elemment.value
                showAjax(objFiter);
            }

            function fiterActive(elemment) {
                objFiter.status = elemment.value
                showAjax(objFiter);
            }

            function fiterPrice(elemment) {
                objFiter.price = elemment.value
                showAjax(objFiter);
            }

            function pagination(page) {
                objFiter.page = page
                showAjax(objFiter);
            }

            var range = $('.input-range'),
                value = $('.range-value');

            value.html(range.attr('value'));

            range.on('input', function() {
                value.html(this.value);
            });
        </script>
    @endpush
