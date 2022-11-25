@extends('layouts.teacher.master')

@section('title', 'Trang Giảng viên')

@section('content')
    @if (session('successful'))
        <span class="text-danger">bạn đăng nhập thành công</span>
    @endif
    @if(Auth::guard('mentor')->check())
    {{ Auth::guard('mentor')->user()->email }}
    <h1>Giảng viên</h1>
    @endif
@endsection