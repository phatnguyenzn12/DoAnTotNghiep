@extends('layouts.admin.master')

@section('title', 'Trang danh Thêm mới Lead')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="card-title">
                                <h3 class="card-label">Tạo mới Lead</h3>
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
                            </div>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            <div class="form-group">
                                <label>Địa chỉ Email
                                    <span class="text-danger">*</span></label>
                                <input value="{{ old('email') }}" type="email" name="email" class="form-control"
                                    placeholder="Info@example.com">
                            </div>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                            <div class="form-group">
                                <label>Số điện thoại
                                    <span class="text-danger">*</span></label>
                                <input value="{{ old('number_phone') }}" type="text" name="number_phone"
                                    class="form-control" placeholder="+543 5445 0543">
                            </div>
                            <p class="text-danger">{{ $errors->first('number_phone') }}</p>
                            <div class="form-group">
                                <label>Địa chỉ
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('address') }}" name="address" class="form-control"
                                    placeholder="Địa chỉ">
                            </div>
                            <p class="text-danger">{{ $errors->first('address') }}</p>
                            <div class="form-group">
                                <label>Giáo dục
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('educations') }}" name="educations" class="form-control"
                                    placeholder="Giáo dục">
                            </div>
                            <p class="text-danger">{{ $errors->first('educations') }}</p>
                            <div class="form-group">
                                <label>Năm kinh nghiệm
                                    <span class="text-danger">*</span></label>
                                <input type="number" value="{{ old('years_in_experience') }}" name="years_in_experience"
                                    class="form-control" placeholder="Năm kinh nghiệm">
                            </div>
                            <p class="text-danger">{{ $errors->first('years_in_experience') }}</p>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select id="select2" class="form-control" name="cate_course_id" id="">
                                    <option value="{{ old('cate_course_id') }}">Chọn danh mục</option>
                                    @foreach ($cate_courses as $cate_course)
                                        <option value="{{ $cate_course->id }}">{{ $cate_course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="text-danger">{{ $errors->first('cate_course_id') }}</p>
                            <div class="form-group">
                                <label>Chuyên môn</label>
                                <input id="kt_tagify_1" class="form-control" value="{{ old('specializations') }}"
                                    name='specializations' placeholder='Thẻ' />
                            </div>
                            <p class="text-danger">{{ $errors->first('specializations') }}</p>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Tạo mới</button>
                                <a href="{{ route('mentor.index') }}" class="btn btn-success mr-2">Back</a>
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
