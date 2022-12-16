
<div class="row">
    @foreach ($orders as $k=> $order)
    {{-- @dd($orders) --}}
            <tr>
                <td>
                    {{$k+1}}
                </td>
                <td>
                    <span class="text-muted font-weight-bold">{{ $order->code }}</span>
                </td>
                <td>
                    <span class="text-muted font-weight-bold">{{number_format($order->total_price) }} đ</span>
                </td>
                <td>
                    <span class="text-muted font-weight-bold">{{ $order->user->name }}</span>
                </td>
                <td>
                    <span class="text-muted font-weight-bold">{{date('d/m/Y', strtotime( $order->created_at) )}}</span>
                </td>
                <td class="col-xl-2">
                    <a
                    href="{{ route('admin.order.show', ['id' => $order->id]) }}"
                     class="btn btn-light btn-sm" >
                        <i class="fas fa-info text-primary"></i></a>
                </a>
                    <a class="btn btn-light btn-sm" onclick="return confirm('Bạn có chắc muốn xóa')"
                        href="{{ route('admin.order.delete', ['id' => $order->id]) }}">
                        <i class="flaticon2-trash text-danger"></i></a>
                </td>
            </tr>
    @endforeach
    @php
        $pagination = $orders
    @endphp
</div>
<div class="row p-5 mb-5">
    @include('components.admin.pagination-basic')
</div>


