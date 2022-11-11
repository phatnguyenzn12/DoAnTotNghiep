@extends('layouts.admin.master')

@section('title', 'Trang Quản Trị')

@section('content')
    @if (session('successful'))
        <span class="text-danger">bạn đăng nhập thành công</span>
    @endif
    @if(Auth::guard('admin')->check())
    {{ Auth::guard('admin')->user()->email }}
    <h1>Admin</h1>
    @else
    {{ Auth::guard('mentor')->user()->email }}
    <h1>Mentor</h1>
    @endif
@endsection
