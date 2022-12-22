<div class="row">
    @foreach ($orders as $k => $order)
        <tr>
            <td>
                {{ $k + 1 }}
            </td>
            <td>
                <span class="text-muted font-weight-bold">{{ $order->code }}</span>
            </td>
            <td>
                <span class="text-muted font-weight-bold">{{ number_format($order->total_price) }} đ</span>
            </td>
            <td>
                <span class="text-muted font-weight-bold">{{ $order->user->name }}</span>
            </td>
            <td>
                <span class="text-muted font-weight-bold">{{ date('d/m/Y', strtotime($order->created_at)) }}</span>
            </td>
            <td class="col-xl-2">
                <a href="{{ route('admin.order.show', ['id' => $order->id]) }}" class="btn btn-light btn-sm">
                    <i class="fas fa-info text-primary"></i></a>
                </a>
            </td>
        </tr>
    @endforeach
</div>
@php
    $pagination = $orders;
@endphp
<div class="p-3 mb-5">
    @include('components.admin.pagination-basic')
</div>
