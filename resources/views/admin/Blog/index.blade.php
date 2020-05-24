{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Danh sách bài viết</h1>
    <!-- Button trigger modal add news -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddNews">
        <i class="fas fa-plus"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalAddNews" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add news</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="formResult" class="pl-3 pr-3">
                </div>
                <div class="modal-body">
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
                        <img src="" id="thumbnailUrl" data-img="" style="display:none; width:100px ; height : 100px" />
                    </div>

                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <textarea name="content" id="content" value=""></textarea>
                        <p class="text-danger content_error"></p>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="1" name="statusCheck" checked>không hiện trang chủ
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="2" name="statusCheck">hiện trang chủ
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnAddNews">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="myTable">
                    <thead>
                        <tr>
                            <th>stt</th>
                            <th>Tiêu đề</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Đoạn trích</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        ?>

                        @foreach($posts as $post)
                        <tr>
                            <td>{{$i++}}</td>
                            <td> {{$post->title}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                @if($post->status == 1)
                                <span class="badge badge-info">không hiển thị trang chủ</span>
                                @else
                                <span class="badge badge-success">hiển thị trang chủ</span>
                                @endif
                            </td>
                            <td>desc ...</td>
                            <td>
                                <button class="btn btn-warning form-group editNews" data-id="{{$post->id}}" data-toggle="modal" data-target="#modalEditNews"><i class="far fa-edit"></i></button>
                                <button class="btn btn-danger form-group deleteNews" data-id="{{$post->id}}"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->
<!-- Modal -->
<div class="modal fade" id="modalEditNews" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add news</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="formResult1" class="pl-3 pr-3">
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" class="form-control" id="titleEdit" name="titleEdit">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    <p class="text-danger title"></p>
                </div>

                <div class="form-group">
                    <label for="description">Đoạn trích</label>
                    <textarea class="form-control" id="descriptionEdit" rows="3" name="descriptionEdit"></textarea>
                    <p class="text-danger description"></p>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Ảnh đại diện</label>
                    <input class="form-group" type="file" name="thumbnailEdit" id="thumbnailEdit" data-id="">
                    <img src="" id="thumbnailUrl1" data-img="" style=" width:100px ; height : 100px" />
                </div>

                <div class="form-group">
                    <label for="content">Nội dung</label>
                    <textarea name="content1" id="content1" value=""></textarea>
                    <p class="text-danger content_error"></p>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="1" name="statusCheckEdit">không hiện trang chủ
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="2" name="statusCheckEdit">hiện trang chủ
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnEditNews" data-id="" data-row="">Edit</button>
            </div>
        </div>
    </div>
</div>
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
    CKEDITOR.replace('content1', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    // add news
    var btn = document.querySelector('#btnAddNews');
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        const title = document.getElementById("title").value;
        const description = document.getElementById('description').value;
        const thumbnailUrl = document.getElementById('thumbnailUrl').getAttribute("data-img");
        const status = document.querySelector('input[name="statusCheck"]:checked').value;
        const content = CKEDITOR.instances.content.getData();
        var tableBody = document.querySelector('#myTable tbody');
        const data = {
            title: title,
            description: description,
            content: content,
            status: status,
            thumbnail: thumbnailUrl
        };
        fetch('http://localhost:8000/admin/blogs/create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: data ? JSON.stringify(data) : null,
            })
            .then(response => response.json())
            .then(data => {
                var html = '';
                if (data.error) {
                    html = '<div class="alert alert-danger">'
                    data.error.forEach(err => {
                        html += `<p>${err}</p>`
                    })
                    html += '</div>';
                }
                if (data.success) {
                    $('#modalAddNews').modal('hide');
                    alert('thêm tin thành công');
                    var row = tableBody.insertRow(tableBody.rows.length);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                    var cell7 = row.insertCell(6);
                    cell1.innerHTML = tableBody.rows.length;
                    cell2.innerHTML = data.success.title;
                    cell3.innerHTML = data.success.created_at;
                    if (data.success.status == 1) {
                        cell4.innerHTML = "<span class ='badge badge-info'> không hiện trang chủ </span>";
                    } else {
                        cell4.innerHTML = "<span class = 'badge badge-success'> hiện trang chủ </span>";
                    }
                    cell5.innerHTML = data.success.description;
                    cell6.innerHTML = `<button class="btn btn-warning form-group editNews" data-id="${data.success.id}"><i class="far fa-edit"></i></button>
                                <button class="btn btn-danger form-group deleteNews" data-id="${data.success.id}"><i class="far fa-trash-alt"></i></button>`;
                    resertInput();
                }
                document.querySelector("#formResult").innerHTML = html;
            })
            .catch((error) => {
                resertInput();
                console.log('loi', error);
            });
    });

    function resertInput() {
        document.querySelector("#formResult").innerHTML = "";
        document.getElementById("title").value = "";
        document.getElementById('description').value = "";
        document.getElementById('thumbnailUrl').setAttribute(data - img, "");
        CKEDITOR.instances.content1.setData("");
        document.querySelector("#formResult").innerHTML = "";
    }
    // uploads imges
    var thumbnail = document.getElementById("thumbnail");
    thumbnail.addEventListener("change", () => {
        var formData = new FormData();
        var fileField = document.getElementById('thumbnail');
        formData.append('thumbnail', fileField.files[0]);
        fetch('http://localhost:8000/admin/blogs/upload', {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.url) {
                    document.querySelector('#thumbnailUrl').style.display = 'block';
                    document.querySelector('#thumbnailUrl').src = `http://localhost:8000/uploads/images/${data.url}`;
                    document.querySelector("#thumbnailUrl").setAttribute("data-img", `${data.url}`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });


    //delete tin 
    var deleteNews = document.getElementsByClassName("deleteNews");
    var table = document.getElementById("myTable");
    var index;
    for (var i = 0; i < deleteNews.length; i++) {
        deleteNews[i].addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            index = this.parentElement.parentElement.rowIndex;
            if (confirm("bạn có muốn xóa")) {
                fetch(`http://localhost:8000/admin/blogs/delete/${id}`, {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'POST',
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("xóa tin tức thành công");
                            table.deleteRow(index);
                        }
                        if (data.error) {
                            alert("xóa tin tức không thành công");
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        })
    }

    // get data edit news

    var btnEdit = document.querySelectorAll(".editNews");
    for (var i = 0; i < btnEdit.length; i++) {
        btnEdit[i].addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var index = this.parentElement.parentElement.rowIndex;
            document.querySelector("#btnEditNews").setAttribute("data-row", index);
            fetch(`http://localhost:8000/admin/blogs/show/${id}`, {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector("#btnEditNews").setAttribute("data-id", data.success.id);
                        document.querySelector("#thumbnailUrl1").setAttribute("data-img", `${data.success.thumbnail}`);
                        document.querySelector("#titleEdit").value = data.success.title;
                        document.querySelector("#descriptionEdit").value = data.success.description;
                        CKEDITOR.instances.content1.setData(data.success.content);
                        document.querySelector("#thumbnailEdit").setAttribute("data-id", `${data.success.id}`);
                        document.querySelector('#thumbnailUrl1').src = `http://localhost:8000/uploads/images/${data.success.thumbnail}`;
                    }
                    if (data.error) {
                        alert("error");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        })
    }


    // edit image
    var thumbnailEdit = document.querySelector("#thumbnailEdit");
    thumbnailEdit.addEventListener('change', () => {
        var thumbnailId = document.querySelector("#thumbnailEdit").getAttribute("data-id");
        var formData = new FormData();
        formData.append('thumbnail', thumbnailEdit.files[0]);
        fetch(`http://localhost:8000/admin/blogs/upload-edit/${thumbnailId}`, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.url) {
                    document.querySelector('#thumbnailUrl1').style.display = 'block';
                    document.querySelector('#thumbnailUrl1').src = `http://localhost:8000/uploads/images/${data.url}`;
                    document.querySelector("#thumbnailUrl1").setAttribute("data-img", `${data.url}`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    })


    // edit news
    var actEditNews = document.querySelector("#btnEditNews");
    actEditNews.addEventListener('click', () => {
        const titleEdit = document.querySelector("#titleEdit").value;
        const descriptionEdit = document.querySelector("#descriptionEdit").value;
        const thumbnailUrl1 = document.querySelector("#thumbnailUrl1").getAttribute("data-img");
        const content1 = CKEDITOR.instances.content1.getData();
        const id = actEditNews.getAttribute("data-id");
        var rowEdit = actEditNews.getAttribute('data-row');
        const status = document.querySelector('input[name="statusCheckEdit"]:checked').value;
        const data = {
            title: titleEdit,
            thumbnail: thumbnailUrl1,
            content: content1,
            description: descriptionEdit,
            status: status
        };
        
        fetch(`http://localhost:8000/admin/blogs/update/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: data ? JSON.stringify(data) : null,
            })
            .then(response => response.json())
            .then(data => {
                var html = '';
                if (data.error) {
                    html = '<div class="alert alert-danger">'
                    data.error.forEach(err => {
                        html += `<p>${err}</p>`
                    })
                    html += '</div>';
                    console.log(html);
                }
                if (data.success) {
                    $('#modalEditNews').modal('hide');
                    alert('sửa tin tức thành công');
                    var rowTable = document.createElement('tr');
                    var tableBody = document.querySelector('#myTable tbody');
                    tableBody.deleteRow(row);
                    var row = tableBody.insertRow(row);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                    cell1.innerHTML = rowEdit;
                    cell2.innerHTML = data.success.title;
                    cell3.innerHTML = data.success.created_at;
                    if (data.success.status == 1) {
                        cell4.innerHTML = "<span class ='badge badge-info'> không hiện trang chủ </span>";
                    } else {
                        cell4.innerHTML = "<span class = 'badge badge-success'>hiện trang chủ </span>";
                    }
                    cell5.innerHTML = data.success.description;
                    cell6.innerHTML = `<button class="btn btn-warning form-group editNews" data-id="${data.success.id}"><i class="far fa-edit"></i></button>
                                <button class="btn btn-danger form-group deleteNews" data-id="${data.success.id}"><i class="far fa-trash-alt"></i></button>`;
                }
                document.querySelector("#formResult1").innerHTML = html;
            })
            .catch((error) => {
                console.log('eo dc', error);
            });
    })
</script>
@stop