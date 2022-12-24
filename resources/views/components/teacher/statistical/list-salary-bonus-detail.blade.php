<div class="table-responsive">
    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
        <thead>
            <tr class="text-uppercase">
                <th style="min-width: 300px">Tên học sinh</th>
                <th style="min-width: 100px">email học sinh</th>
                <th style="min-width: 100px">nhận được từ học sinh</th>
                <th style="min-width: 120px">Thời gian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>
                        <img src="{{ asset('app/' . $student->avatar) }}" width="100px" alt="">
                        {{ $student->name }}
                    </td>
                    <td>
                        {{ $student->email }}
                    </td>

                    <td>
                        {{ number_format($student->price_teacher) }}đ
                    </td>
                    <td>
                        {{ $student->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@php
    $pagination = $students;
@endphp
<div class="p-3 mb-5 card">
    @include('components.admin.pagination-basic')
</div>