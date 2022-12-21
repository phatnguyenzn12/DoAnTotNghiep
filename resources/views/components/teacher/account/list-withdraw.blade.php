{{-- @dd($withdraws->max('time')) --}}
<div class="mb-7">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <div class="row align-items-center">
                <div class="col-md-3 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Start</label>
                        <input type="datetime-local" name="" id="" class="form-control"
                            min="{{ $withdraws->min('time') }}" value="{{ $withdraws->min('time') }}"
                            max="{{ $withdraws->max('time') }}" onchange="fiterStartTime(this)">
                    </div>
                </div>
                <div class="col-md-3 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">End</label>
                        <input type="datetime-local" name="" id="" class="form-control"
                            value="{{ $withdraws->max('time') }}" max="{{ $withdraws->max('time') }}"
                            min="{{ $withdraws->min('time') }}" onchange="fiterEndTime(this)">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
        <thead>
            <tr class="text-uppercase">
                <th style="width: 20px" class="col-2">STT</th>
                <th style="width: 100px">Số tiền rút</th>
                <th style="width: 100px">Thời gian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($withdraws as $item => $withdraw)
                <tr>
                    <td>{{ $item + 1 }}</td>
                    <td>{{ number_format($withdraw->money) }}đ</td>
                    <td>
                        {{ $withdraw->time }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@php
    $pagination = $withdraws;
@endphp
<div class="p-3 mb-5">
    @include('components.admin.pagination-basic')
</div>
