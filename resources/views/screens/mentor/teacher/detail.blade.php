@extends('layouts.mentor.master')

@section('title', 'Sửa thông tin giáo viên')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="card-title">
                                <h3 class="card-label">sửa thông tin giáo viên</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{route('mentor.teacher.update',$id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Tên
                                    <span class="text-danger">*</span></label>
                                    <p class="form-control">{{$teacher->name}}</p>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ Email
                                    <span class="text-danger">*</span></label>
                                    <p class="form-control">{{$teacher->email}}</p>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại
                                    <span class="text-danger">*</span></label>
                                <input value="{{$teacher->number_phone}}" type="text" name="number_phone" class="form-control"
                                    placeholder="+543 5445 0543">
                            </div>
                            <div class="form-group">
                                <label>Giáo dục
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="{{$teacher->educations}}" name="educations" class="form-control"
                                    placeholder="Giáo dục">
                            </div>
                            <div class="form-group">
                                <label>Năm kinh nghiệm
                                    <span class="text-danger">*</span></label>
                                <input type="number" value="{{$teacher->years_in_experience}}" name="years_in_experience" class="form-control"
                                    placeholder="Năm kinh nghiệm">
                            </div>
                            <div class="form-group">
                                <label>Chuyên môn</label>
                                <input id="kt_tagify_1" class="form-control" name='specializations' placeholder='Thẻ' value="{{$teacher->specializations}}"
                                value='css, html, javascript, angular, vue, react' />
                            </div>
                            <input type="text" name="cate_course_id" id=""
                                value="{{ auth()->guard('mentor')->user()->cate_course_id }}" hidden>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Lưu thay đổi</button>
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
