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
                                <h3 class="card-label">Tạo mới Giáo viên</h3>
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
                                <label>Giáo dục
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="" name="educations" class="form-control"
                                    placeholder="Giáo dục">
                            </div>
                            <div class="form-group">
                                <label>Năm kinh nghiệm
                                    <span class="text-danger">*</span></label>
                                <input type="number" value="" name="years_in_experience" class="form-control"
                                    placeholder="Năm kinh nghiệm">
                            </div>
                            <div class="form-group">
                                <label>Chuyên môn</label>
                                <input type="text" value="" name="specializations" class="form-control"
                                    placeholder="Chuyên môn">
                            </div>
                            <div class="form-group">
                                <label>Kỹ năng</label>
                                <input type="text" value="" name="skills" class="form-control"
                                    placeholder="Kỹ năng">
                            </div>
                            <input type="text" name="cate_course_id" id=""
                                value="{{ auth()->guard('mentor')->user()->cate_course_id }}" hidden>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Tạo mới</button>
                                <a href="{{ route('mentor.teacher.index') }}" class="btn btn-success mr-2">Back</a>
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
