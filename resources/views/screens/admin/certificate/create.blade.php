@extends('layouts.admin.master')

@section('title', 'Trang thêm mới người chứng chỉ')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="card-title">
                                <h3 class="card-label">Tạo mới Chứng chỉ</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.course.store', ['id' => $id]) }}">
                            
                            @csrf
                            <div class="form-group">
                              <label>Tiêu đề
                                  <span class="text-danger">*</span></label>
                              <input type="text" value="" name="title" class="form-control"
                                  placeholder="Nhập tiêu đề">
                          </div>
                            <div class="form-group">
                                <label>Nội dung
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="" name="description" class="form-control"
                                    placeholder="Nhập nội dung">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Tạo mới</button>
                                <a href="" class="btn btn-success mr-2">Back</a>
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
