<!--begin: Datatable-->
<table class="table table-separate table-head-custom table-checkable">
    <a href="{{ route('admin.cate-course.create') }}" class="btn btn-primary mr-2 mb-3">Thêm danh mục</a>
    <thead>
        <tr>
            <th>Tên nhóm</th>
            <th>Xử lý</th>
        </tr>
    </thead>
<tbody>
    @foreach ($cate_courses as $cate_course)
        <td><a class="text-dark">{{ $cate_course->name }}</a></td>
        <td><a class="btn btn-light btn-sm" href="{{ route('admin.cate-course.edit', $cate_course->id) }}">
                <i class="flaticon2-pen text-warning"></i></a>
            <a class="btn btn-light btn-sm" href="{{ route('admin.cate-course.delete', $cate_course->id) }}">
                <i class="flaticon2-trash text-danger"></i></a>
        </td>
        </tr>
    @endforeach
    @php
        $pagination = $cate_courses
    @endphp
</tbody>
</table>
<div class="row p-5 mb-5">
    @include('components.admin.pagination-basic')
</div>
<!--end: Datatable-->
