@extends('layouts.admin.master')
@section('title', 'Sửa danh mục')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="card-title">
                                <h3 class="card-label">sửa danh mục</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{route('admin.cate-course.update',$cate->id)}}">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-group">
                                <label>Tên danh mục
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $cate->name }}" name="name" class="form-control"
                                       placeholder="Tên danh mục">
                            </div>
                            {{-- @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Sửa</button>
                                <a href="{{route('admin.cate-course.index')}}" class="btn btn-success mr-2">Quay Lại</a>
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
