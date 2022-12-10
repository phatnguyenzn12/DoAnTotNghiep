@extends('layouts.admin.master')

@section('title', 'Sửa Skill')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Sửa Skill
                            <span class="d-block text-muted pt-2 font-size-sm">update skill</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">

                    <!--begin: Datatable-->
                    <div id="datatable">
                        <table class="table table-separate table-head-custom table-checkable">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="">Tiêu đề</label>
                                            <input type="text" name="title"
                                                value="@isset($edit->title){{ $edit->title }}@endisset"
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <br>
                                        <a href="{{ route('admin.skill.index') }}" class="btn btn-danger">Hủy</a>
                                        &nbsp;
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>
                                </div>
                            </form>
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
