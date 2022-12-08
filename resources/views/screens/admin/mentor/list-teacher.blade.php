@extends('layouts.admin.master')

@section('title', 'Trang danh sách mentor')
@section('content')
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Danh sách Giảng viên</span>
                <!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> -->
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-0 pb-3">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                    <thead>
                        <tr class="text-uppercase">
                            <th style="min-width: 250px" class="pl-7">
                                <span class="text-dark-75">Tên</span>
                            </th>
                            <th style="min-width: 100px">Chuyên ngành</th>
                            <th style="min-width: 100px">Giáo dục</th>
                            <th style="min-width: 150px">Giới thiệu</th>
                            <th style="min-width: 120px">Trạng thái</th>
                            <td style="min-width: 120px">Kích hoạt</td>
                            <th style="min-width: 120px">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($db as $db)
                            @if ($db->hasRole('teacher'))
                                <tr>
                                    <td class="pl-0 py-8">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                <div class="symbol-label">
                                                    <img src="{{ asset('app/' . $db->avatar) }}" alt=""
                                                        width="50" height="50">
                                                </div>
                                            </div>
                                            <div>
                                                <a href="#"
                                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $db->name }}</a>
                                                <span class="text-muted font-weight-bold d-block">{{ $db->email }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- bỏ specializations --}}
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                            {{ $db->specializations }}
                                        </span>
                                        {{-- <span class="text-muted font-weight-bold">{{ $db->skills }}</span> --}}
                                    </td>
                                    {{-- end --}}
                                    
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $db->educations }}</span>
                                    </td>
                                    <td>
                                        <span class="text-muted font-weight-bold">{{ $db->years_in_experience }} năm</span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $db->number_phone }}</span>
                                        <span class="text-muted font-weight-bold">{{ $db->address }}</span>
                                    </td>
                                    <td>
                                        @if ($db->is_active == 1)
                                            <span class="label label-lg label-light-success label-inline">Hoạt động</span>
                                        @else
                                            <span class="label label-lg label-light-danger label-inline">Ngừng hoạt
                                                động</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($db->is_active == 1)
                                            <a href="{{ route('mentor.teacher.actived', $db->id) }}"
                                                onclick="return confirm('Bạn có chắc muốn ngừng hoạt động')"
                                                class="btn btn-danger">
                                                Ngừng hoạt động
                                            </a>
                                        @else
                                            <a href="{{ route('mentor.teacher.actived', $db->id) }}"
                                                onclick="return confirm('Bạn có chắc muốn hoạt động')"
                                                class="btn btn-success">
                                                Hoạt động
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-light btn-sm" onclick="return confirm('Bạn có chắc muốn xóa')"
                                            href="{{ route('mentor.teacher.delete', ['id' => $db->id]) }}">
                                            <i class="flaticon2-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Body-->
    </div>
@endsection
@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
@endpush
