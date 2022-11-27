@extends('layouts.mentor.master')

@section('title', 'Trang danh sách mentor')
@section('content')
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Danh sách Giảng viên</span>
                <!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> -->
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('mentor.teacher.create') }}" class="btn btn-success font-weight-bolder font-size-sm">
                    <span class="svg-icon svg-icon-md svg-icon-white">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path
                                    d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Add New Teacher</a>
            </div>
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
                            @if($db->hasRole('teacher'))
                            <tr>
                                <td class="pl-0 py-8">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                            <div class="symbol-label">
                                                <img src="{{ asset('app/' . $db->avatar) }}" alt="" width="50" height="50">
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#"
                                                class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $db->name }}</a>
                                            <span class="text-muted font-weight-bold d-block">{{ $db->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                        @foreach (DB::table('specializations')->where('id', $db->specialize_id)->get() as $specialize)
                                            {{ $specialize->title }}
                                        @endforeach
                                    </span>
                                    <span class="text-muted font-weight-bold">{{ $db->skills }}</span>
                                </td>
                                <td>
                                    <span
                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $db->educations }}</span>
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
                                        <span class="label label-lg label-light-danger label-inline">Ngừng hoạt động</span>
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
                                            onclick="return confirm('Bạn có chắc muốn hoạt động')" class="btn btn-success">
                                            Hoạt động
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-light btn-sm"  onclick="return confirm('Bạn có chắc muốn xóa')" href="{{route('mentor.teacher.delete',['id' => $db->id])}}">
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
