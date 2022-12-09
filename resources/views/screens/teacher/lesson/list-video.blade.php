@extends('layouts.mentor.master')

@section('title', 'Trang danh sách khóa học')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Danh Sách Video Bài Học | Chương học {{ $chapter->title }}
                            <span class="d-block text-muted pt-2 font-size-sm">Sorting &amp; pagination remote
                                datasource</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" oninput="search(this)" class="form-control"
                                                placeholder="Search..." id="kt_datatable_search_query"
                                                filter-search-title />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Sort:</label>
                                            <select class="form-control" id="kt_datatable_search_status"
                                                onchange="fiterSort(this)">
                                                <option value="0">All</option>
                                                <option value="id_desc">Mới đến cũ</option>
                                                <option value="id_asc">Cũ đến mới</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                                <a href="#"
                                                    class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    <div id="table-innerHtml">
                       
                        {{-- @include('components.admin.pagination') --}}
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

    <!-- modal add section -->

    <!-- Modal-->
    <div class="modal fade" id="modal-example" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xem video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body" style="height: 500px;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js-links')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
@push('js-handles')
    <script>
        function showModal(id_video) {
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
        }
        objFiter = {
            page: 1,
            title: 0,
            record: 10,
            id: 0,
            chapter_id: {{ $id }},
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('teacher.lesson.listDataLesson') }}',
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

        function pagination(page){
            objFiter.page = page
            showAjax(objFiter);
        }
    </script>
@endpush
