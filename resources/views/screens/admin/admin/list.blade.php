@extends('layouts.admin.master')

@section('title', 'Trang danh sách người dùng')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Thông tinc cá nhân
                            <span class="d-block text-muted pt-2 font-size-sm">Sorting &amp; pagination remote
                                datasource</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    <div id="datatable">
                        <table class="table table-separate table-head-custom table-checkable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Avatar</th>
                                    <th>Phone</th>
                                    <th>xử lý</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td col="name"><a class="text-dark" href="#">{{ $admin->name }}</a></td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->avatar }}</td>
                                        <td>{{ $admin->number_phone }}</td>
                                        <td><a class="btn btn-light btn-sm" href="{{ route('admins.update', $admin->id) }}">
                                                <i class="flaticon2-pen text-warning"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
@endpush
