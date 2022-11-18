@extends('layouts.censor.master')

@section('title', 'Trang Quản Trị Censor')

@section('content')
    @if (session('successful'))
        <span class="text-danger">bạn đăng nhập thành công</span>
    @endif
    @if(Auth::guard('censor')->check())
    {{ Auth::guard('censor')->user()->email }}
    <h1>Censor</h1>
    @endif
@endsection
