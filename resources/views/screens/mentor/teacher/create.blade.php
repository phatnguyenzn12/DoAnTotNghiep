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
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                    placeholder="Nhập tên">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ Email
                                    <span class="text-danger">*</span></label>
                                <input value="{{ old('email') }}" type="email" name="email" class="form-control"
                                    placeholder="Info@example.com">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại
                                    <span class="text-danger">*</span></label>
                                <input value="{{ old('number_phone') }}" type="number" name="number_phone" class="form-control"
                                    placeholder="+543 5445 0543">
                                @error('number_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Giáo dục
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('educations') }}" name="educations" class="form-control"
                                    placeholder="Giáo dục">
                                @error('educations')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Năm kinh nghiệm
                                    <span class="text-danger">*</span></label>
                                <input type="number" value="{{ old('years_in_experience') }}" name="years_in_experience" class="form-control"
                                    placeholder="Năm kinh nghiệm">
                                @error('years_in_experience')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Chuyên môn</label>
                                <input id="kt_tagify_1" class="form-control" name='specializations' placeholder='Thẻ'
                                 />
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
    <script src="/js/tags.js"></script>
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
