@extends('layouts.admin.master')

@section('title', 'Trang danh sách người dùng')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="card-title">
                                <h3 class="card-label">Tạo mới Mentor</h3>
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
                                <label>Mật khẩu
                                    <span class="text-danger">*</span></label>
                                <input value="" type="password" name="password" class="form-control"
                                    placeholder="******">
                            </div>
                            <div class="form-group">
                                <label>Nhậplại mật khẩu
                                    <span class="text-danger">*</span></label>
                                <input value="" type="password" name="re_password" class="form-control"
                                    placeholder="******">
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input file-image" name="avatar"
                                        accept=".png, .jpg, .jpeg, .jfif, .webp" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="preview-image new"></div>
                                <div class="preview-image old">
                                    <img src="/"
                                        style="display:block;margin:10px auto 0;width: auto;height: 150px;object-fit:cover;border:1px solid #3699ff;border-radius:5px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="cate_course_id" id="" class="form-control">
                                    @foreach ($cate as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Tạo mới</button>
                                <a href="" class="btn btn-success mr-2">Danh sách slider</a>
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
