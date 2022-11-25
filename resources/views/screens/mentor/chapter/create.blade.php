@extends('layouts.mentor.master')

@section('title', 'Trang tạo mới chương học')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="card-title">
                                <h3 class="card-label">Tạo chương học</h3>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('mentor.chapter.add') }}" class="has-validation-ajax" method="POST">
                        @csrf
                        <p class="text-danger errors system"></p>
                        <div class="form-group">
                            <label>Tên chương học</label>
                            <input type="text" name="title" placeholder="Nhập tên chương học..." class="form-control">
                            <label>Số lượng bài học </label>
                            <input type="number" name="number_chapter" placeholder="Nhập số bài học của chương ..." class="form-control">
                            <label for="">Khóa học</label>
                            <select name="course_id" id="">
                                <optgroup label="">
                                    @foreach ($course as $a)
                                        <option value="{{ $a->id }}">{{ $a->title }}</option>
                                    @endforeach
                                </optgroup>
                            </select>

                            <label for="">Giao cho GV</label>
                            <select name="mentor_id" id="">
                                <optgroup label="">
                                    @foreach ($mentor as $cateCourse)
                                    @if ($cateCourse->hasRole('teacher'))
                                    <option value="{{ $cateCourse->id }}">{{ $cateCourse->name }}</option>
                                    @endif

                                    @endforeach
                                </optgroup>
                            </select>
                            {{-- <input type="hidden" name="mentor_id" value="{{$mentor_id}}"> --}}
                            {{-- @dd($mentor_id) --}}
                            {{-- @dd($course->id) --}}
                            {{-- <input type="hidden" name="course_id" value="{{$course_id}}"> --}}
                            <p class="text-danger errors title"></p>
                        </div>
                        <button type="submit" class="btn btn-primary font-weight-bold">Thêm</button>
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
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {
            $('[name="title"]').blur(function() {
                let title = $(this).val()
                $('[name="slug"]').val(ChangeToSlug(title))
            })
        })
    </script>
@endpush
