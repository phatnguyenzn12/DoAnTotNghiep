@extends('layouts.mentor.master')

@section('title', 'Trang danh sách người dùng')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="card-title">
                                <h3 class="card-label">Tạo mới Giảng viên</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="">
                            @csrf
                            <div class="form-group">
                                <label>Tên
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="" name="name" class="form-control"
                                    placeholder="Nhập tên">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ Email
                                    <span class="text-danger">*</span></label>
                                <input value="" type="email" name="email" class="form-control"
                                    placeholder="Info@example.com">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại
                                    <span class="text-danger">*</span></label>
                                <input value="" type="text" name="number_phone" class="form-control"
                                    placeholder="+543 5445 0543">
                            </div>
                            <div class="form-group">
                                <label>Chuyên môn</label>
                                <select id="select2" class="form-control" name="specialize_id" id="">
                                    <option value="">Chọn chuyên môn</option>
                                    @foreach ($specializes as $specialize)
                                        <option value="{{ $specialize->id }}">{{ $specialize->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kỹ năng</label>
                                <select id="select2" class="form-control" name="skills" id="">
                                    <option value="">Chọn kỹ năng</option>
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Tạo mới</button>
                                <a href="{{route('mentor.teacher.index')}}" class="btn btn-success mr-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

@endsection
@push('js-handles')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
