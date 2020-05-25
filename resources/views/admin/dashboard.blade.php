{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Trang quản trị nhà trọ số 1 hiện nay</h1>
@stop

@section('content')
    <p>Xin chào bạn đến với trang quản trị Booking room</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop