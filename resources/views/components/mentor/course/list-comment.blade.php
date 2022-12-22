<div class="row">
    @foreach ($comments as $k => $comment)
        <tr>
            <td>{{ $k + 1 }}</td>
            <td class="">
                {{ $comment->user->name }}
            </td>
            <td class="col-2">
                {{ $comment->comment }}
            </td>
            <td>{{ $comment->course->title }}</td>

            <td>
                {{ $comment->vote }}/5
            </td>
            <td class="col-2">
                @if ($comment->status == 1)
                    <span class="label label-lg label-light-success label-inline">Hiển thị</span>
                @else
                    <span class="label label-lg label-light-danger label-inline">Ẩn</span>
                @endif
            </td>
            <td class="col-2">
                @if ($comment->status == 1)
                    <form action="{{ route('mentor.course.deactivecomment', ['comment' => $comment->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="text" name="status" hidden value="0">
                        <button
                            onclick="return confirm('Bạn có chắc muốn ẩn')" class="btn btn-danger">
                            Ẩn
                        </button>
                    </form>
                @else
                    <form action="{{ route('mentor.course.activecomment', ['comment' => $comment->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="text" name="status" hidden value="1">
                        <button
                            onclick="return confirm('Bạn có chắc muốn hiển thị')" class="btn btn-success">
                            Hiển thị
                        </button>
                    </form>
                @endif
            </td>
            <td class="col-xs-1">
                <a class="btn btn-light btn-sm" onclick="return confirm('Bạn có chắc muốn xóa')"
                    href="{{ route('mentor.course.deleteComment', ['id' => $comment->id]) }}">
                    <i class="flaticon2-trash text-danger"></i></a>
            </td>
        </tr>
    @endforeach
    @php
        $pagination = $comments;
    @endphp
</div>
<div class="p-3 mb-5 card">
    @include('components.admin.pagination-basic')
</div>
