
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
                {{ number_format($student->price_teacher) }}
            </td>
            <td>
                {{ $student->created_at }}
            </td>
        </tr>
    @endforeach
    @php
        $pagination = $students;
    @endphp
    <div class="p-3 mb-5 card">
        @include('components.admin.pagination-basic')
    </div>

