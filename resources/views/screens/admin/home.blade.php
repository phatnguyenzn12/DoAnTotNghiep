@extends('layouts.admin.master')

@section('title', 'Trang Quản Trị')

@section('content')
    @if (session('successful'))
        <span class="text-danger">bạn đăng nhập thành công</span>
    @endif
    {{ Auth::user()->email }}
    <h1>Admin</h1>
@endsection
