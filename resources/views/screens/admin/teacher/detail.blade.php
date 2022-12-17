@php
    use Illuminate\Support\Facades\DB;
@endphp
@extends('layouts.admin.master')

@section('title', 'Sửa thông tin giảng viên')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="card-title">
                                <h3 class="card-label">Sửa thông tin</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @endif
                        <form method="post" enctype="multipart/form-data" action="{{route('teacher.update',$id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Tên
                                    <span class="text-danger">*</span></label>
                                <input type="text" disabled value="{{$mentor->name}}" name="name"  class="form-control"
                                    placeholder="Nhập tên">
                            </div>
                            <div class="form-group">
                                <label>Email
                                    <span class="text-danger">*</span></label>
                                <input type="email" disabled value="{{$mentor->email}}" name="email"  class="form-control"
                                    placeholder="Nhập tên">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại
                                    <span class="text-danger">*</span></label>
                                <input value="{{$mentor->number_phone}}" type="text" name="number_phone" class="form-control"
                                    placeholder="+543 5445 0543">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mentor->address}}"  name="address" class="form-control"
                                    placeholder="Địa chỉ">
                            </div>
                            <div class="form-group">
                                <label>Giáo dục
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mentor->educations}}" name="educations" class="form-control"
                                    placeholder="Giáo dục">
                            </div>
                            <div class="form-group">
                                <label>Năm kinh nghiệm
                                    <span class="text-danger">*</span></label>
                                <input type="number" value="{{$mentor->years_in_experience}}" name="years_in_experience" class="form-control"
                                    placeholder="Năm kinh nghiệm">
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select id="select2" class="form-control" name="cate_course_id" id="">
                                    <option value=""></option>
                                    @foreach ($cate_courses as $cate_course)
                                        <option {{ $cate_course->id == $mentor->cate_course_id ? 'selected':'' }} value="{{$cate_course->id}}">{{ $cate_course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chuyên môn</label>
                                <input id="kt_tagify_1" class="form-control" value="{{ $mentor->specializations }}" name='specializations' placeholder='Thẻ'
                                value='css, html, javascript, angular, vue, react' />
                            </div>
                            {{-- <div class="form-group">
                                <label>Kỹ năng</label>
                                <input id="kt_tagify_2" class="form-control" name='skills'
                                    placeholder='Write some tags'value="{{ $mentor->skills }}" value='css, html, javascript, angular, vue, react' />
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Avatar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input file-image" name="avatar"
                                        accept=".png, .jpg, .jpeg, .jfif, .webp" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Lưu thay đổi</button>
                                <a href="{{ route('teacher.index') }}" class="btn btn-success mr-2">Thoát</a>
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
