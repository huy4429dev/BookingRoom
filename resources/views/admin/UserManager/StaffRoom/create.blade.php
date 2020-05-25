{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Thêm nhân viên</h1>
@stop

@section('content')

<div>
@if ($errors->any())
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
     @endforeach
 @endif
<form method="Post" action="{{ route('staff.store')}}">
@csrf
<div class="form-group">
    <label for="name">tên</label>
    <input type="text" class="form-control"  name="name" />
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" type="text" name="email" />
</div>

<div class="form-group">
    <label for="address">địa chỉ</label>
    <input class="form-control" type="text" name="address" />
    <p class="text-danger content_error"></p>
</div>
<div class="form-group">
    <label for="phone">điện thoại</label>
    <input class="form-control" type="text" name="phone"/>
</div>
<div class="form-group">
    <label for="phone">mật khẩu</label>
    <input class="form-control" type="password" name="password"/>
</div>
<button class="btn btn-primary" type="submit">add</button>
</form>
</div>


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
<script type="text/javascript">
    const formAddNews = document.getElementById('btnAddNews');
    btnAddNews.addEventListener('click', (e) => {
        e.preventDefault()
        const title = document.getElementById("title").value;
        const description = document.getElementById('description').value;
        const content = CKEDITOR.instances.content.getData();
        const data = {
            title: title,
            description: description,
            content: content,
        };
        fetch('http://127.0.0.1:8000/admin/blogs/create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: data ? JSON.stringify(data) : null,
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    data.error.title ? document.querySelector(".title").innerText = data.error.title : document.querySelector(".title").innerText = '';
                    data.error.content ? document.querySelector(".content_error").innerText = data.error.content : document.querySelector(".content_error").innerText = '';
                    data.error.description ? document.querySelector(".description").innerText = data.error.description : document.querySelector(".description").innerText = '';
                }
                if (data.data) {
                    document.querySelector(".title").innerText = '';
                    document.querySelector(".content_error").innerText = '';
                    document.querySelector(".description").innerText = '';
                    alert('thêm thành công');
                }
            })
            .catch((error) => {
                console.log('eo dc', error);
            });
    })


    var thumbnail = document.getElementById("thumbnail");
    thumbnail.addEventListener("change", () => {
        var formData = new FormData();
        var fileField = document.getElementById('thumbnail');
        formData.append('thumbnail', fileField.files[0]);
        fetch('http://127.0.0.1:8000/admin/blogs/upload', {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if(data.url ){
                    document.querySelector('#thumbnailUrl').style.display = 'block'; 
                    document.querySelector('#thumbnailUrl').src = `http://127.0.0.1:8000/uploads/images/${data.url}`
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
@stop