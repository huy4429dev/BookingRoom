{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Profile</h1>
    <!-- Button trigger modal add news -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddContact">
        <i class="fas fa-plus"></i>
    </button> -->

    <!-- Modal -->
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
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card position-relative">
                            <img class="card-img-top" id="avatar" src="" alt="Card image" data-img="" data-id="{{Auth::user()->id}}">
                            <div class="card-body text-center">
                                <h4 class="card-title" id="modalName">John Doe</h4>
                            </div>
                            <label for="inputAvatar" class="position-absolute" style="bottom:12%;right:0"> <i class="far fa-edit"></i></label>
                            <input type="file" id="inputAvatar" style="visibility: hidden">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div id="showError"></div>
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" id="nameInput" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="emailInput" />
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="text" class="form-control" id="phoneInput" />
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" id="adressInput" checked="false" />
                        </div>
                        <div class="form-group">
                            <label> thay mật khẩu</label>
                            <input type="checkbox" id="changePassword" />
                            <input type="password" class="form-control" id="passwordInput" disabled="" />
                        </div>
                        <div class="form-group">
                            <label>nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="passwordSameInput" disabled="" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="editUserProfile">edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->
<!-- Modal -->
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
<script src={{ url('ckeditor/ckeditor.js') }}></script>
<script type="text/javascript">
    $(document).ready(function() {
        const id = $("#avatar").attr("data-id");
        fetch(`http://localhost:8000/admin/profile/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    $("#nameInput").val(data.success.name);
                    $("#emailInput").val(data.success.email);
                    $("#phoneInput").val(data.success.phone);
                    $("#adressInput").val(data.success.address);
                    $("#passwordInput").val(data.success.password);
                    $("#modalName").text(data.success.name);
                    if (data.success.avatar != null) {
                        $("#avatar").attr("src", `http://localhost:8000/uploads/images/${data.success.avatar}`);
                    } else {
                        $("#avatar").attr("src", "https://www.bootdey.com/img/Content/avatar/avatar7.png");
                    }
                }
                if (data.error) {
                    alert("error");
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        $("#changePassword").change(function() {
            if ($(this).is(":checked")) {
                $("#passwordInput").removeAttr('disabled');
                $("#passwordSameInput").removeAttr('disabled');
            } else {
                $("#passwordInput").attr('disabled', '');
                $("#passwordSameInput").attr('disabled', '');
            }
        });

        $("#inputAvatar").change(function() {
            const formData = new FormData();
            const fileField = document.querySelector('input[type="file"]');
            formData.append('avatar', fileField.files[0]);
            fetch('http://localhost:8000/admin/profile/upload', {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    $("#avatar").attr("data-img", data.url);
                    $("#avatar").attr("src", `http://localhost:8000/uploads/images/${data.url}`);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        // sua profile
        $("#editUserProfile").click(function() {
            $("#showError").html("");
            const name = $("#nameInput").val();
            const email = $("#emailInput").val();
            const phone = $("#phoneInput").val();
            const address = $("#adressInput").val();
            const id = $("#avatar").attr("data-id");
            const img = $("#avatar").attr("data-img");
            var image = '';
            if (img != '') {
                image = img
            }
            if ($("#changePassword").is(":checked")) {
                var password = $("#passwordInput").val();
                var passwordSame = $("#passwordSameInput").val();
            } else {
                var password = null;
                var passwordSame = null;
            }
            const data = {
                name: name,
                email: email,
                phone: phone,
                address: address,
                password: password,
                passwordSame: passwordSame,
                img: image
            }
            fetch(`http://localhost:8000/admin/profile/${id}/edit`, {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    body: data ? JSON.stringify(data) : null,
                })
                .then(response => response.json())
                .then(data => {
                    var html = '';
                    if (data.success) {
                        alert("sửa thông tin thành công")

                    }
                    if (data.error) {
                        html = '<div class="alert alert-danger">'
                        data.error.forEach(err => {
                            html += `<p>${err}</p>`
                        })
                        html += '</div>';
                    }
                    $("#showError").html(html);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    })
</script>
@stop