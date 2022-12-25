@extends('layouts.admin.master')

@section('title', 'Trang danh sách người dùng')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header card-header-tabs-line justify-content-center">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('admin.course.program', $id) }}">
                                    <span class="nav-icon"><i class="fas fa-align-left"></i></span>
                                    <span class="nav-text">Chương Trình Học</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.course.edit', $course->id) }}">
                                    <span class="nav-icon"><i class="far fa-bookmark"></i></span>
                                    <span class="nav-text">Thông Tin Khóa Học</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.course.update', $id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Giá khoá học
                                <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="price"  value="{{ $course->price }}" placeholder="Giá khóa học">
                        </div>
                        <p class="text-danger">{{ $errors->first('price') }}</p>
                        <div class="form-group">
                            <label>Giảm giá
                                <span class="text-danger">*</span></label>
                            <input value="{{ $course->discount }}" type="number" name="discount" class="form-control"
                                placeholder="Video demo">
                        </div>
                        <p class="text-danger">{{ $errors->first('discount') }}</p>
                        <div class="form-group">
                            <label>Phần trăm tiền mà giáo viên nhận được
                                <span class="text-danger">*</span></label>
                            <input value="{{ $course->percentage_pay }}" type="number" name="percentage_pay" class="form-control"
                                placeholder="Video demo">
                        </div>
                        <p class="text-danger">{{ $errors->first('percentage_pay') }}</p>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
                        </div>
                    </form>
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
    <script>
        $(document).ready(function() {
            $('[name="title"]').blur(function() {
                let title = $(this).val()
                $('[name="slug"]').val(ChangeToSlug(title))
            })
        })
    </script>
@endpush
