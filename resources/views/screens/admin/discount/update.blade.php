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
                                <h3 class="card-label">Chỉnh sửa giảm giá</h3>
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
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.discount.update', $discount->id) }}">
                            @csrf
                            <div class="form-group">
                                <label>Tiêu đề
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $discount->title }}" name="title" class="form-control"
                                    placeholder="Nhập tiêu đề">
                            </div>
                            {{-- @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror --}}
                            <div class="form-group">
                                <label>Đường dẫn
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $discount->slug }}" name="slug" class="form-control"
                                    placeholder="Nhập đường dẫn">
                            </div>

                            <div class="form-group">
                                <label>Mã giảm giá
                                    <span class="text-danger">*</span></label>
                                <input value="{{ $discount->code }}" type="text" name="code" class="form-control"
                                    placeholder="Mã giảm giá ">
                            </div>
                            <div class="form-group">
                                <label>Giảm phần trăm
                                    <span class="text-danger">*</span></label>
                                <input value="{{ $discount->discount }}" type="text" name="discount" class="form-control"
                                    placeholder="Giảm phần trăm">
                            </div>
                            <div class="form-group">
                                <label>Ngày bắt đầu
                                    <span class="text-danger">*</span></label>
                                <input value="" type="datetime-local" name="start_time" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ngày kết thúc
                                    <span class="text-danger">*</span></label>
                                <input value="" type="datetime-local" name="end_time" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor" name="content" rows="5" class="form-control">{{ $discount->content }}</textarea>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Trạng thái</label>
                                <div class="col-9 col-form-label">
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" value="1" name="status"
                                                @checked(true)>
                                            <span></span>Công khai</label>
                                        <label class="radio">
                                            <input type="radio" value="0" name="status">
                                            <span></span>Riêng tư</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Tạo mới</button>
                                <a href="{{ route('admin.discount.index') }}" class="btn btn-success mr-2">Danh sách mã
                                    giảm</a>
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
