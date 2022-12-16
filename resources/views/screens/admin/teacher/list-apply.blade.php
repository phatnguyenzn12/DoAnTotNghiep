@extends('layouts.admin.master')

@section('title', 'Trang danh sách mentor')
@section('content')
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Danh sách Mentor</span>
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
                            <th style="min-width: 100px">Email</th>
                            <th style="min-width: 100px">Phone</th>
                            <th style="min-width: 150px">Tóm tắt</th>
                            <th style="min-width: 120px">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($db as $db)
                            <tr>
                                <td class="pl-0 py-8">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <a href="#"
                                                class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $db->name }}</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span
                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $db->email }}</span>
                                </td>
                                <td>
                                    <span
                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $db->number_phone }}</span>
                                </td>
                                <td>
                                    <span
                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $db->Summary }}</span>
                                </td>
                                <td>
                                    <a class="btn btn-light btn-sm" onclick="return confirm('Bạn có chắc muốn duyệt')" href="{{route('mentor.accept',['id'=>$db->id])}}">
                                        <i class="text-success">Duyệt</i></a>
                                    <a class="btn btn-light btn-sm"  onclick="return confirm('Bạn có chắc muốn xóa')" href="{{route('mentor.deleteApply',['id' => $db->id])}}">
                                        <i class="flaticon2-trash text-danger"></i></a>
                                </td>
                            </tr>
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
