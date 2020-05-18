{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>{{$adminUser->name}}</h1>
@stop

@section('content')

<form action="{{url('admin/admin-room/edit')}}" method="POST">
    @method("PUT")
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$adminUser->name}}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="email" value="{{$adminUser->email}}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Ảnh đại diện</label>
        <input class="form-group" type="file" name="avatar">
        @if( $adminUser->avatar != '')
        <img src="uploads/images/{{$adminUser->avatar}}" />
        @endif
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Điện thoại</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="phone" value="{{$adminUser->phone}}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Địa chỉ</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="address" value="{{$adminUser->address}}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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