{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Danh sách Liên hệ</h1>
    <!-- Button trigger modal add news -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddContact">
        <i class="fas fa-plus"></i>
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="modalAddContact" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="formResult" class="pl-3 pr-3">
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Tên</label>
                        <input type="text" class="form-control" id="username" name="username">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input class="form-control" id="address" name="address">
                    </div>

                    <div class="form-group">
                        <label for="phone">Điện thoại</label>
                        <input class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input name="title" id="title" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <input class="form-control" id="content" name="content">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnAddContact">Add</button>
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
                            <th>Tên</th>
                            <th>Email</th>
                            <th>địa chỉ</th>
                            <th>phone</th>
                            <th>tiêu đề</th>
                            <th>nội dung</th>
                            <th>trạng thái</th>
                            <th>hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        ?>

                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$contact->username}}</a></td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->address}}</td>
                            <td>{{$contact->phone}}</td>
                            <td>{{$contact->title}}</td>
                            <td>{{$contact->content}}</td>
                            <td>
                                @if($contact->status ==1)
                                <span class="badge badge-info">chưa xử lý</span>
                                @elseif($contact->status == 2)
                                <span class="badge badge-warning">đang xử lý</span>
                                @else
                                <span class="badge  badge-success">đã xử lý</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-warning form-group editContact" data-id="{{$contact->id}}" data-toggle="modal" data-target="#modalEditContact"><i class="far fa-edit"></i></button>
                                <button class="btn btn-danger form-group deleteContact" data-id="{{$contact->id}}"><i class="far fa-trash-alt"></i></button>
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
<div class="modal fade" id="modalEditContact" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    <label for="username">Tên</label>
                    <input type="text" class="form-control" id="usernameEdit" name="username" readonly>
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" id="emailEdit" name="email" readonly>
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input class="form-control" id="addressEdit" name="address" readonly>
                </div>

                <div class="form-group">
                    <label for="phone">Điện thoại</label>
                    <input class="form-control" id="phoneEdit" name="phone" readonly>
                </div>
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input name="title" id="titleEdit" value="" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung</label>
                    <input class="form-control" id="contentEdit" name="content" readonly>
                </div>
                <div class="form-group">
                    <label for="content">Trạng thái</label>
                    <select class="form-control" name="" id="statusEdit">
                        <option value="1">Chưa xủ lý</option>
                        <option value="2">đang xử lý</option>
                        <option value="3">đã xử lý</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnEditContact" data-id="" data-row="">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
<script src={{ url('ckeditor/ckeditor.js') }}></script>
<script type="text/javascript">
    // add contact
    var btn = document.querySelector('#btnAddContact');
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        const username = document.getElementById("username").value;
        const email = document.getElementById('email').value;
        const address = document.getElementById("address").value;
        const phone = document.getElementById('phone').value;
        const title = document.getElementById("title").value;
        const content = document.getElementById('content').value;
        var tableBody = document.querySelector('#myTable tbody');
        const data = {
            username: username,
            email: email,
            address: address,
            phone: phone,
            title: title,
            content: content
        };
        fetch('http://localhost:8000/admin/contact', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: data ? JSON.stringify(data) : null,
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);

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
                    alert('thêm liên hệ thành công');
                    $('#modalAddContact').modal('hide');
                    var row = tableBody.insertRow(tableBody.rows.length);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                    var cell7 = row.insertCell(6);
                    var cell8 = row.insertCell(7);
                    var cell9 = row.insertCell(8);
                    cell1.innerHTML = `${tableBody.rows.length}`;
                    cell2.innerHTML = `${data.success.username}`;
                    cell3.innerHTML = `${data.success.email}`;
                    cell4.innerHTML = `${data.success.address}`;
                    cell5.innerHTML = `${data.success.phone}`;
                    cell6.innerHTML = `${data.success.title}`;
                    cell7.innerHTML = `${data.success.content}`;
                    console.log(data.success.status);
                    if (data.success.status == 1) {
                        cell8.innerHTML = "<span class='badge badge-info'>chưa xủ lý</span>";
                    } else if (data.success.status == 2) {
                        cell8.innerHTML = "<span class='badge badge-warning'>đang xủ lý</span>";
                    } else {
                        cell8.innerHTML = "<span class='badge badge-success'>đã xủ lý</span>";
                    }
                    cell9.innerHTML = `<button class="btn btn-warning form-group editNews" data-id="${data.success.id}"><i class="far fa-edit"></i></button>
                                <button class="btn btn-danger form-group deleteNews" data-id="${data.success.id}"><i class="far fa-trash-alt"></i></button>`;
                }
                document.getElementById("username").value = "";
                document.getElementById('email').value = "";
                document.getElementById("address").value = "";
                document.getElementById('phone').value = "";
                document.getElementById("title").value = "";
                document.getElementById('content').value = "";
                document.querySelector("#formResult").innerHTML = html;
            })
            .catch((error) => {
                alert('thêm liên hệ không thành công');
            });
    });


    // delete contatc

    var deleteContact = document.getElementsByClassName("deleteContact");
    var table = document.getElementById("myTable");
    var index;
    for (var i = 0; i < deleteContact.length; i++) {
        deleteContact[i].addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            index = this.parentElement.parentElement.rowIndex;
            if (confirm("bạn có muốn xóa")) {
                fetch(`http://localhost:8000/admin/contact/${id}`, {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'DELETE',
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.success);
                            table.deleteRow(index);
                        }
                        if (data.error) {
                            alert("xóa liên hệ không thành công");
                        }
                    })
                    .catch(error => {
                        alert("xóa liên hệ không thành công");
                    });
            }
        })
    }

    // get data edit contact

    var btnEdit = document.querySelectorAll(".editContact");
    for (var i = 0; i < btnEdit.length; i++) {
        btnEdit[i].addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var index = this.parentElement.parentElement.rowIndex;
            document.querySelector("#btnEditContact").setAttribute("data-row", index);
            fetch(`http://localhost:8000/admin/contact/${id}/edit`, {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector("#btnEditContact").setAttribute("data-id", data.success.id);
                        document.getElementById("usernameEdit").value = data.success.username;
                        document.getElementById('emailEdit').value = data.success.email;
                        document.getElementById("addressEdit").value = data.success.address;
                        document.getElementById('phoneEdit').value = data.success.phone;
                        document.getElementById("titleEdit").value = data.success.title;
                        document.getElementById('contentEdit').value = data.success.content;
                        document.getElementById('statusEdit').value = data.success.status;
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


    // edit contact
    var btnEditContact = document.querySelector("#btnEditContact");
    btnEditContact.addEventListener('click', () => {
        const username = document.getElementById("usernameEdit").value;
        const email = document.getElementById('emailEdit').value;
        const address = document.getElementById("addressEdit").value;
        const phone = document.getElementById('phoneEdit').value;
        const title = document.getElementById("titleEdit").value;
        const content = document.getElementById('contentEdit').value;
        const statusEdit = document.getElementById('statusEdit').value;
        const id = btnEditContact.getAttribute("data-id");
        var rowEdit = btnEditContact.getAttribute('data-row');
        const data = {
            username: username,
            email: email,
            address: address,
            phone: phone,
            title: title,
            content: content,
            status: statusEdit
        };
        fetch(`http://localhost:8000/admin/contact/${id}`, {
                method: 'PUT',
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
                    alert('sửa liên hệ thành công');
                    $('#modalEditContact').modal('hide');
                    var tableBody = document.querySelector('#myTable tbody');
                    tableBody.deleteRow(rowEdit - 1);
                    var row = tableBody.insertRow(rowEdit - 1);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                    var cell7 = row.insertCell(6);
                    var cell8 = row.insertCell(7);
                    var cell9 = row.insertCell(8);
                    cell1.innerHTML = rowEdit;
                    cell2.innerHTML = data.success.username;
                    cell3.innerHTML = data.success.email;
                    cell4.innerHTML = data.success.address;
                    cell5.innerHTML = data.success.phone;
                    cell6.innerHTML = data.success.title;
                    cell7.innerHTML = data.success.content;
                    if (data.success.status == '1') {
                        cell8.innerHTML = "<span class='badge badge-info'>chưa xử lý</span>";
                    } else if (data.success.status == '2') {
                        cell8.innerHTML = "<span class='badge badge-warning'>đang xử lý</span>";
                    } else {
                        cell8.innerHTML = "<span class='badge badge-success'>đã xử lý</span>";
                    }
                    cell9.innerHTML = `<button class="btn btn-warning form-group editNews" data-id="${data.success.id}"><i class="far fa-edit"></i></button>
                                <button class="btn btn-danger form-group deleteNews" data-id="${data.success.id}"><i class="far fa-trash-alt"></i></button>`;
                }
                document.querySelector("#formResult1").innerHTML = html;
                // document.getElementById("usernameEdit").value = "";
                // document.getElementById('emailEdit').value = "";
                // document.getElementById("addressEdit").value = "";
                // document.getElementById('phoneEdit').value = "";
                // document.getElementById("titleEdit").value = "";
                // document.getElementById('contentEdit').value = "";
                // document.getElementById('status').value = "";
            })
            .catch((error) => {
                console.log('eo dc', error);
            });
    })
</script>
@stop