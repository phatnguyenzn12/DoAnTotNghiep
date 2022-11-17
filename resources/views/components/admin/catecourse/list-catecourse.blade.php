<!--begin: Datatable-->
<table class="table table-separate table-head-custom table-checkable" data-loading>
    <a href="{{route('admin.cate-course.create')}}" class="btn btn-primary mr-2 mb-3">Thêm danh mục</a>
    <a href="{{route('admin.cate-course.listdelete')}}" class="btn btn-primary mr-2 mb-3">Danh mục rác</a>
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên danh mục</th>
            <th>Xử lý</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $cate as $a)
        <tr>
            <th>{{$a->id}}</th>
            <th>{{$a->name}}</th>
            <th style="display: flex" ><a href="{{route('admin.cate-course.edit',$a->id)}}" class="btn btn-light btn-sm">
                    <i class="flaticon2-pen text-warning"></i></a>
                    <form action="{{ route('admin.cate-course.delete', ['id' => $a->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-light btn-sm"><i class="flaticon2-trash text-danger"></i></button>
                            
                      </form>
            </th>
        <tr>
            @endforeach
    </tbody>
</table>
@include('components.admin.pagination')
<!--end: Datatable-->
