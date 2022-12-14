<tbody>
    @foreach ($percentages as $percentage)
        <tr>
            <td>
                <img src="{{ asset('app/' . $percentage->order_detail->course->image) }}" alt="">
            </td>
            <td>
                {{ $percentage->order_detail->course->title }}
            </td>
            <td>
                {{ number_format($percentage->order_detail->price) }}
            </td>
            <td>
                {{ $percentage->order_detail->course->percentage_pay }} %
            </td>
            <td>
                {{ number_format($percentage->amount_paid_teacher) }}
            </td>
            <td>
                {{ $percentage->created_at }}
            </td>
        </tr>
    @endforeach
    @php
        $pagination = $percentages;
    @endphp
    <div class="p-3 mb-5 card">
        @include('components.admin.pagination-basic')
    </div>
</tbody>
