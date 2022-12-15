<div class="row">
    @foreach ($comments as $comment)
        <tr>
            <td class="pl-0 py-8">
                {{ $comment->user->name }}
            </td>
            <td>{{ $comment->user->email }}</td>

            <td class="col-2">
                {{ $comment->comment }}
            </td>
            <td>{{ $comment->course->title }}</td>

            <td>
                {{ $comment->vote }}/5
            </td>
            <td class="col-2">
                @if ($comment->status == 1)
                    <span class="label label-lg label-light-success label-inline">Hoạt động</span>
                @else
                    <span class="label label-lg label-light-danger label-inline">Ngừng hoạt
                        động</span>
                @endif
            </td>
            {{-- <td class="col-2">
                @if ($comment->status == 1)
                    <a href="{{ route('mentor.teacher.actived', $comment->id) }}"
                        onclick="return confirm('Bạn có chắc muốn ngừng hoạt động')" class="btn btn-danger">
                        Ngừng hoạt động
                    </a>
                @else
                    <a href="{{ route('mentor.teacher.actived', $comment->id) }}"
                        onclick="return confirm('Bạn có chắc muốn hoạt động')" class="btn btn-success">
                        Hoạt động
                    </a>
                @endif
            </td> --}}
            <td class="col-xl-2">
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
