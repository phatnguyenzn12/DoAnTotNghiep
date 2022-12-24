<div class="table-responsive">
    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
        <thead>
            <tr class="text-uppercase">
                <th style="min-width: 300px" class="pl-7">
                    <span class="text-dark-75">Tên khóa học</span>
                </th>
                <th style="min-width: 100px">Chi tiết</th>
                <th style="min-width: 100px">Bán được</th>
                <th style="min-width: 150px">Phần trăm nhận</th>
                <th style="min-width: 150px">Tiền nhận được </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myCourseSale as $item)
                <tr>
                    <td>
                        <img src="{{ asset('app/' . $item->image) }}" width="100px" alt="">
                        {{ $item->title }}
                    </td>
                    <td>
                        <a class="btn btn-success" target="_blank"
                            href="{{ route('teacher.statistical.salaryBonusDetail', $item->id) }}">Chi tiết</a>
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
        </tbody>
    </table>
</div>
@php
    $pagination = $myCourseSale;
@endphp
<div class="p-3 mb-5 card">
    @include('components.admin.pagination-basic')
</div>
