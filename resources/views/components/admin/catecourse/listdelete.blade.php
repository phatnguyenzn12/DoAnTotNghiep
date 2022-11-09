@extends('layouts.admin.master')
@section('title', 'Danh mục rác')
@section('content')
    <!--begin: Datatable-->
    <table class="table table-separate table-head-custom table-checkable" data-loading>
        <a href="{{ route('admin.cate-course.index') }}" class="btn btn-success mr-2">Danh mục</a>
        {{-- <a href="" class="btn btn-primary mr-2 mb-3">Danh mục rác</a> --}}
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên khóa học</th>
                <th>Xử lý</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($course as $a)
                <tr>
                    <th>{{ $a->id }}</th>
                    <th>{{ $a->title }}</th>

                    <th style="display: flex"> {{-- <a href="{{ route('admin.cate-course.edit', $a->id) }}"
                        class="btn btn-light btn-sm">
                        <i class="flaticon2-pen text-warning"></i></a> --}}
                        <form action="{{ route('admin.cate-course.restore', ['id' => $a->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-light btn-sm  " type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{$a->id}}">
                                <i class="flaticon2-trash text-danger"></i></button>
                            <div class="modal fade" id="exampleModal{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel{{$a->id}}">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          
                                            <label for="cate_course_id">Danh mục</label>
                                            <select class="form-control" name="cate_course_id" id="">
                                                @foreach($cate as $a1)
                                                <option value="{{$a1->id}}">{{$a1->name}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Khôi phục</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </th>
                <tr>
            @endforeach
        </tbody>
    </table>

    @include('components.admin.pagination')
    <!--end: Datatable-->
@endsection
@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>F
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
