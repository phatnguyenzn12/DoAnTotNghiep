<div class="table-responsive">
    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
        <thead>
            <tr class="text-uppercase">
                <th style="width: 20px" class="col-2">STT</th>
                <th style="width: 100px">Số tiền rút</th>
                <th style="width: 100px">Mã code</th>
                <th style="width: 100px">Thời gian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($withdraws as $item => $withdraw)
                <tr>
                    <td>{{ $item + 1 }}</td>
                    <td>{{ number_format($withdraw->money) }}đ</td>
                    <td>{{ $withdraw->code }}</td>
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
