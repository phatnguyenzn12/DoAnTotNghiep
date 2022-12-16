@extends('layouts.mentor.master')

@section('title', 'Trang tạo mới khóa học')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="card-title">
                                <h3 class="card-label">Tạo khóa học</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="contact-form" method="POST" enctype="multipart/form-data"
                            action="{{ route('mentor.course.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Tiêu đề
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control"
                                    placeholder="Nhập tiêu đề">
                            </div>
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label>Đường dẫn
                                    <span class="text-danger">*</span></label>
                                <input value="{{ old('slug') }}" type="text" name="slug" class="form-control"
                                    placeholder="Đường dẫn">
                            </div>
                            @error('slug')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label>Video demo</label>
                                <input type="url" name="video" value="{{ old('video') }}" rows="5" class="form-control"
                                    placeholder="nhập đường dẫn video youtube" />
                            </div>
                            @error('video')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label>Kỹ năng</label>
                                <select id="select2" class="form-control" name="skill_id" id="">
                                    <option value="">Chọn kỹ năng</option>
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('skill_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label>Ngôn ngữ</label>
                                <select id="select2" class="form-control" name="language" id="">
                                    <option value="">Chọn ngôn ngữ</option>
                                    <option value="0">Tiếng việt</option>
                                    <option value="1">Tiếng anh</option>
                                </select>
                            </div>
                            @error('language')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label>Giới thiệu</label>
                                <textarea rows="5" class="form-control" name="content"></textarea>
                            </div>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor"  rows="5" class="form-control" name="description" id="">{{ old('description') }} </textarea>
                            </div>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group" hidden>
                                <label>Mô tả chi tiết</label>
                                <input id="kt_tagify_2" class="form-control" name='description_details'
                                    placeholder='Write some tags' />
                            </div>

                            <div class="form-group">
                                <label>Ảnh slide</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input file-image" name="image"
                                        accept="doc,pdf,rtf,docx"
                                         {{-- accept=".png, .jpg, .jpeg, .jfif, .webp" --}} id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="preview-image new"></div>
                            </div>
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="text" name="cate_course_id" id=""
                                value="{{ auth()->guard('mentor')->user()->cate_course_id }}" hidden>


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
    <script>
        // ClassicEditor
        //     .create(document.querySelector('#editor'))
        //     .catch(error => {
        //         console.error(error);
        //     });

        $(document).ready(function() {
            $('[name="title"]').blur(function() {
                let title = $(this).val()
                $('[name="slug"]').val(ChangeToSlug(title))
            })
        })

        // validate image

    </script>
@endpush
