@extends('layouts.mentor.master')

@section('title', 'Trang danh sách người dùng')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header card-header-tabs-line justify-content-center">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('mentor.course.program', $id) }}">
                                    <span class="nav-icon"><i class="fas fa-align-left"></i></span>
                                    <span class="nav-text">Chương Trình Học</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('mentor.course.edit', $course->id) }}">
                                    <span class="nav-icon"><i class="far fa-bookmark"></i></span>
                                    <span class="nav-text">Thông Tin Khóa Học</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('mentor.course.update', $id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Tiêu đề
                                <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('title') ?? $course->title }}" name="title"
                                class="form-control" placeholder="Nhập tiêu đề">
                        </div>
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label>Đường dẫn
                                <span class="text-danger">*</span></label>
                            <input value="{{ old('slug') ?? $course->slug }}" type="text" name="slug"
                                class="form-control" placeholder="Đường dẫn">
                        </div>
                        @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label>Video demo</label>
                            <input type="url" value="{{ old('video') ?? $course->video }}" name="video" rows="5"
                                class="form-control" placeholder="nhập đường dẫn video youtube" />
                        </div>
                        @error('video')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label>Kỹ năng</label>
                            <select id="select2" class="form-control" name="skill_id" id="">
                                <option value="">Chọn kỹ năng</option>
                                @foreach ($skills as $skill)
                                    <option @selected($skill->id == $course->skill_id ?? true) value="{{ $skill->id }}">{{ $skill->title }}
                                    </option>
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
                                <option @selected($course->language == 0 ?? true) value="0">Tiếng việt</option>
                                <option @selected($course->language == 1 ?? true) value="1">Tiếng anh</option>
                            </select>
                        </div>
                        @error('language')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label>Giới thiệu</label>
                            <textarea rows="5" class="form-control" value="{{ old('content') ?? $course->content }}" name="content">{{ $course->content }}</textarea>
                        </div>
                        @error('content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea id="editor" rows="5" class="form-control" value="{{ old('description') ?? $course->description }}"
                                name="description" id="">{{ $course->description }}</textarea>
                        </div>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group" hidden>
                            <label>Mô tả chi tiết</label>
                            <input id="kt_tagify_2" name="description_details" type="text"
                                value="{{ str_replace(',', ', ', $course->description_details) }}" class="form-control">
                        </div>

                        <div class="form-group" hidden>
                            <label>Danh mục</label>
                            <select name="cate_course_id" id="select2" class="form-control">
                                <option value="">Chọn danh mục</option>
                                @foreach ($cateCourses as $cateCourse)
                                    <option @selected($course->cateCourse->id == $cateCourse->id ? true : false) value="{{ $cateCourse->id }}">
                                        {{ $cateCourse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror --}}
                        <div class="form-group">
                            <label>Ảnh slide</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input file-image" name="image"
                                    accept=".png, .jpg, .jpeg, .jfif, .webp" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div class="preview-image new"></div>
                            <div class="preview-image old">
                                <img src="{{ asset('app/' . $course->image) }}"
                                    style="display:block;margin:10px auto 0;width: auto;height: 150px;object-fit:cover;border:1px solid #3699ff;border-radius:5px;">
                            </div>
                        </div>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
                            <a href="" class="btn btn-success mr-2">Danh sách slider</a>
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
