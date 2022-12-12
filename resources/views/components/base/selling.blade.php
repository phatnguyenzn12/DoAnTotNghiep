<!--end: Search Form-->
<!--begin: Datatable-->
<div id="datatable">
    <table class="table table-separate table-head-custom table-checkable">
        <thead>
            <tr>
                <th>ảnh</th>
                <th>Tên khóa học</th>
                <th>Thu nhập</th>
                <th>Số lượng bán được</th>
                <th>Chi tiết doanh thu</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($selling as $item)
                <tr>
                    <td><img src="{{ asset('app/' . $item->image) }}" width="100px" alt="">
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->total }}</td>
                    <td>{{ $item->number }}</td>
                    <td><button class="btn btn-bg-info text-white">Chi tiết</button></td>
                </tr>
            @empty
            @endforelse

        </tbody>
    </table>
    @include('components.admin.pagination')
</div>
