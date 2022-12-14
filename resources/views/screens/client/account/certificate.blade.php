@extends('layouts.client.master')
@section('title', 'Trang chủ')
@section('content')

    @include('screens.client.certificate.certificate');
    <a style="margin-left: 100px" class="btn btn-primary mt-3" href="{{ route('client.certificate.exportpdf') }}">Xuất file
        PDF</a>

@endsection
@push('js-handles')
    <script type="module"></script>
@endpush
