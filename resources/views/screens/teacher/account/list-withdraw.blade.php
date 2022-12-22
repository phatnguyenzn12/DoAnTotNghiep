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
