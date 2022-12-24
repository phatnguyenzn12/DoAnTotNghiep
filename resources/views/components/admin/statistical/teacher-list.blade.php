<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
    <thead>
        <tr class="text-left text-uppercase">
            <th style="min-width: 250px" class="pl-7">
                <span class="text-dark-75">Gỉang viên</span>
            </th>
            <th style="min-width: 100px">Email</th>
            <th style="min-width: 100px">Tổng tiền</th>
            <th style="min-width: 100px">Số tiền triết khấu cho giảng viên</th>
            <th style="min-width: 130px">Số tiền của tôi</th>
            <th style="min-width: 130px">Thông tin</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($teachers as $teacher)
            <tr>
                <td class="pl-0 py-0">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-50 symbol-light mr-4">
                            <span class="symbol-label">
                                <img src="{{ asset('app/' . $teacher->avatar) }}" class="h-75 align-self-end"
                                    alt="">
                            </span>
                        </div>
                        <div>
                            <a href="#"
                                class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $teacher->name }}</a>
                            <span class="text-muted font-weight-bold d-block">{{ $teacher->educations }}</span>
                        </div>
                    </div>
                </td>
                <td class="text-left pr-0">
                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $teacher->email }}</span>

                </td>
                <td>
                    <span
                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ number_format($teacher->total_price) }}</span>
                </td>
                <td>
                    <span
                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ number_format($teacher->amount_paid_teacher) }}</span>

                </td>
                <td>
                    <span
                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ number_format($teacher->amount_paid_admin) }}</span>
                </td>
                <td class="pr-0 text-right">
                    <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm"
                        style="width: 7rem">Chi tiết</a>
                </td>
            </tr>
        @empty
        @endforelse

    </tbody>
</table>
@php
    $pagination = $teachers;
@endphp
<div class="p-3 mb-5">
    @include('components.admin.pagination-basic')
</div>