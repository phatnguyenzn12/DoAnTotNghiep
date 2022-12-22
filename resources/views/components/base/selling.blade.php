<!--end: Search Form-->
<!--begin: Datatable-->
<table class="table table-separate table-head-custom table-checkable">
    <thead>
        <tr class="text-uppercase">
            <th style="min-width: 250px">Khóa học</th>
            <th>Số lượng bán được</th>
            <th>Tổng lợi nhuận thu được</th>
            <th>Phần trăm triết khấu cho giảng viên</th>
            <th>Giá triết khấu cho giảng viên</th>
            <th>Giá tôi thu được</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($selling as $item)
            <tr>
                <td><img src="{{ asset('app/' . $item->image) }}" width="100px" alt="">
                    {{ $item->title }}
                </td>
                <td>{{ $item->number }}</td>
                <td>{{ number_format($item->total) }}</td>
                <td>{{ $item->percentage_pay }} %</td>
                <td>{{ number_format($item->amount_price_teacher) }}</td>
                <td>{{ number_format($item->amount_price_admin) }}</td>
            </tr>
        @empty
        @endforelse

    </tbody>
</table>
@php
    $pagination = $selling;
@endphp
<div class="p-3 mb-5">
    @include('components.admin.pagination-basic')
</div>
