{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Thêm bài viết</h1>
@stop

@section('content')

<!-- <form method="POST" id="formAddNews"> -->
@csrf
<div class="form-group">
    <label for="title">Tiêu đề</label>
    <input type="text" class="form-control" id="title" name="title">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <p class="text-danger title"></p>
</div>

<div class="form-group">
    <label for="description">Đoạn trích</label>
    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    <p class="text-danger description"></p>
</div>

<div class="form-group">
    <label for="thumbnail">Ảnh đại diện</label>
    <input class="form-group" type="file" name="thumbnail" id="thumbnail">
    <img src="" id="thumbnailUrl"  style="display:none; width:100px ; height : 100px"/>
</div>

<div class="form-group">
    <label for="content">Nội dung</label>
    <textarea name="content" id="content" value=""></textarea>
    <p class="text-danger content_error"></p>
</div>
<button class="btn btn-primary" id="btnAddNews">Lưu</button>
<!-- </form> -->

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