
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
                                <h3 class="card-label">Sửa chứng chỉ</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('mentor.certificate.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Tiêu đề chứng nhận
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="" name="title" class="form-control"
                                    placeholder="Nhập tiêu đề">
                            </div>
                            <div class="form-group">
                                <label>Mô tả chứng nhận</label>
                                <textarea id="editor" rows="5" class="form-control" value="" name="description"
                                    id=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Giấy chứng nhận</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input file-image" name="image"
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
    <script src="/js/tags.js"></script>
@endsection
@push('js-handles')
@endpush
