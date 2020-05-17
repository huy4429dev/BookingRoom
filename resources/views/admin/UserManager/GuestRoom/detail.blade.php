{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Danh sách khách</h1>
@stop

@section('content')

<form action="{{url('admin/blogs/create')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Tiêu đề</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{$post->title}}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Đoạn trích</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$post->description}}</textarea>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Ảnh đại diện</label>
        <input class="form-group" type="file" name="thumbnail">
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Nội dung</label>
        <textarea name="content">{{$post->content}}</textarea>
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