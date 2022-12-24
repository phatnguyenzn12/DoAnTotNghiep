<div class="table-responsive">
    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
        <thead>
            <tr class="text-uppercase">
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Chuyên môn</th>
                <th>Giáo dục</th>
                <th>Số năm kinh nghiệm</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
                <td>Kích hoạt</td>
                <th>Hiệu lực</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mentors as $mentor)
                <tr>
                    <td class="pl-0 py-8">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                <div class="symbol-label">
                                    <img src="{{ asset('app/' . $mentor->avatar) }}" alt="" width="50"
                                        height="50">
                                </div>
                            </div>
                            <div>
                                <a href="#"
                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $mentor->name }}</a>
                                <span class="text-muted font-weight-bold d-block">{{ $mentor->email }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="col-2">{{ $mentor->address }}</td>

                    <td>
                        {{ $mentor->specializations }}
                    </td>

                    <td>
                        {{ $mentor->educations }}
                    </td>

                    <td>
                        {{ $mentor->years_in_experience }}
                    </td>

                    <td>
                        {{ $mentor->number_phone }}
                    </td>


                    <td class="col-2">
                        @if ($mentor->is_active == 1)
                            <span class="label label-lg label-light-success label-inline">Hoạt động</span>
                        @else
                            <span class="label label-lg label-light-danger label-inline">Ngừng hoạt
                                động</span>
                        @endif
                    </td>
                    <td class="col-2">
                        @if ($mentor->is_active == 1)
                            <a href="{{ route('mentor.teacher.actived', $mentor->id) }}"
                                onclick="return confirm('Bạn có chắc muốn ngừng hoạt động')" class="btn btn-danger">
                                Ngừng hoạt động
                            </a>
                        @else
                            <a href="{{ route('mentor.teacher.actived', $mentor->id) }}"
                                onclick="return confirm('Bạn có chắc muốn hoạt động')" class="btn btn-success">
                                Hoạt động
                            </a>
                        @endif
                    </td>
                    <td class="col-xl-2">
                        <a class="btn btn-light btn-sm" href="{{ route('mentor.teacher.detail', $mentor->id) }}">
                            <i class="flaticon2-pen text-warning"></i> </a>
                        <a class="btn btn-light btn-sm" onclick="return confirm('Bạn có chắc muốn xóa')"
                            href="{{ route('mentor.teacher.delete', ['id' => $mentor->id]) }}">
                            <i class="flaticon2-trash text-danger"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@php
    $pagination = $mentors;
@endphp
<div class="p-3 mb-5 card">
    @include('components.admin.pagination-basic')
</div>
