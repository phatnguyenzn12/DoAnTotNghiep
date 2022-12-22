
@foreach ($myCourseSale as $item)
<tr>
    <td>
        <img src="{{ asset('app/' . $item->image) }}" width="100px" alt="">
        {{ $item->title }}
    </td>
    <td>
        <a class="btn btn-success" target="_blank" href="{{ route('teacher.statistical.salaryBonusDetail',$item->id) }}">Chi tiết</a>
    </td>
    <td>
        {{ $item->number }}
    </td>
    <td>
        {{ $item->percentage_pay }} %
    </td>
    <td>
        {{ number_format($item->price_teacher) }}
    </td>
</tr>
@endforeach
@php
$pagination = $myCourseSale;
@endphp
<div class="p-3 mb-5 card">
@include('components.admin.pagination-basic')
</div>
