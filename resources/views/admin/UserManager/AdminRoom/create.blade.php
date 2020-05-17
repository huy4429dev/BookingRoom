{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Thêm bài viết</h1>
@stop

@section('content')

<form action="{{url('admin/admin-room')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="">
        @if ($errors->has('name'))
        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('name') }}</small>
        @endif
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="email" value="">
        @if ($errors->has('email'))
        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('email') }}</small>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Ảnh đại diện</label>
        <input class="form-group" type="file" name="avatar">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Điện thoại</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="phone" value="">
        @if ($errors->has('phone'))
        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('phone') }}</small>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Địa chỉ</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="address" value="">
        @if ($errors->has('address'))
        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('address') }}</small>
        @endif
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src={{ url('ckeditor/ckeditor.js') }}></script>
<script type="text/javascript">
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@stop