<div class="row">
    @foreach ($mentors as $mentor)
        @if ($mentor->hasRole('teacher'))
            <tr>
                <td class="pl-0 py-8">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-50 flex-shrink-0 mr-4">
                            <div class="symbol-label">
                                <img src="{{ asset('app/' . $mentor->avatar) }}" alt="" width="50"
                                    height="50">
                            </div>
                        </div>
                        <div>
                            <a href=""
                                class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $mentor->name }}</a>
                            <span class="text-muted font-weight-bold d-block">{{ $mentor->email }}</span>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                        @foreach (DB::table('specializations')->where('id', $mentor->specialize_id)->get() as $specialize)
                            {{ $specialize->title }}
                        @endforeach
                    </span>
                    <span class="text-muted font-weight-bold">{{ $mentor->skills }}</span>
                </td>
                <td>
                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $mentor->educations }}</span>
                    <span class="text-muted font-weight-bold">{{ $mentor->years_in_experience }} năm</span>
                </td>
                <td>
                    <span
                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $mentor->number_phone }}</span>
                    <span class="text-muted font-weight-bold">{{ $mentor->address }}</span>
                </td>
                <td>
                    @if ($mentor->is_active == 1)
                        <span class="label label-lg label-light-success label-inline">Hoạt động</span>
                    @else
                        <span class="label label-lg label-light-danger label-inline">Ngừng hoạt
                            động</span>
                    @endif

                </td>
                <td>
                    @if ($mentor->is_active == 1)
                        <a href="{{ route('teacher.actived', $mentor->id) }}"
                            onclick="return confirm('Bạn có chắc muốn ngừng hoạt động')" class="btn btn-danger">
                            Ngừng hoạt động
                        </a>
                    @else
                        <a href="{{ route('teacher.actived', $mentor->id) }}"
                            onclick="return confirm('Bạn có chắc muốn hoạt động')" class="btn btn-success">
                            Hoạt động
                        </a>
                    @endif
                </td>
                <td class="col-xl-2">
                    {{-- <a class="btn btn-light btn-sm" href="{{ route('mentor.listCourse', ['id' => $mentor->id]) }}">
                        <i class="fas fa-info text-primary"></i></a> --}}
                    <a class="btn btn-light btn-sm" href="{{ route('teacher.detail', ['id' => $mentor->id]) }}">
                        <i class="flaticon2-pen text-warning"></i></a>
                    <a class="btn btn-light btn-sm" onclick="return confirm('Bạn có chắc muốn xóa')"
                        href="{{ route('teacher.delete', ['id' => $mentor->id]) }}">
                        <i class="flaticon2-trash text-danger"></i></a>
                </td>
            </tr>
        @endif
    @endforeach
    @php
        $pagination = $mentors
    @endphp
</div>
<div class="row p-5 mb-5">
    @include('components.admin.pagination-basic')
</div>
