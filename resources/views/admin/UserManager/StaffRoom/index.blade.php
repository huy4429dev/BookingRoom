{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Danh sách nhân viên</h1>
    <!-- Button trigger modal add news -->
    <a href="staff/create"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddNews">
            <i class="fas fa-plus"></i>
        </button>
    </a>
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
                                <th>Tên</th>
                                <th>email</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($adminUser as $user)
                            <tr>
                                <td><a style="cursor: pointer" id="btnProfileAdmin" data-id="{{$user->id}}">{{$user->name}}</a> </td>
                                <!-- <td>
                                    @if($user->avatar == '')
                                    <img style="width:40px;height:40px" src="https://scontent.fhan5-5.fna.fbcdn.net/v/t1.30497-1/c47.0.160.160a/p160x160/84241059_189132118950875_4138507100605120512_n.jpg?_nc_cat=1&_nc_sid=dbb9e7&_nc_ohc=ol4I6_1VMN0AX_o_EkI&_nc_ht=scontent.fhan5-5.fna&oh=becf4349f28d7193697158f9c7649f1d&oe=5EE84D24" />
                                    @else
                                    <img src="uploads/images/{{$user->avatar}}" />
                                    @endif
                                </td> -->
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td>
                                    <button class="btn btn-warning form-group btnEditStaff" data-id="{{$user->id}}"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-danger form-group btnDeleteStaff" data-id="{{$user->id}}"><i class="far fa-trash-alt"></i></button>
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
    <!-- The Modal -->
    <div class="modal" id="modalProfileAdmin">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" id="avatar" src="" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title" id="modalName">John Doe</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" id="modalNameInput" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="modalNameEmail" />
                            </div>
                            <div class="form-group">
                                <label>Điện thoại</label>
                                <input type="text" class="form-control" id="modalNamephone" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" id="modalNameAddress" />
                            </div>
                            <div class="form-group">
                                <label>Ngày tạo</label>
                                <input type="text" class="form-control" id="modalNameDate" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 

    -->
    <!-- The Modal -->
    <div class="modal" id="modalEditUser">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <class="row">
                        <h3>Sửa user</h3>
                        <div id="listError"></div>
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" id="modalNameUserEdit" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="modalEmailUserEdit" readonly />
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="text" class="form-control" id="modalPhoneUserEdit" />
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" id="modalAddressUserEdit" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btnSubmitEditUser">sửa</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
    // delete user
    $(document).ready(() => {
        $(".deleteStaffUser").click(function(e) {
            if (confirm("Bạn có chắc chắn xóa")) {
                var id = $(this).attr("data-id");
                e.preventDefault();
                $.ajax({
                    type: 'DELETE',
                    url: `staff/${id}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        alert("Xóa thành công");
                    }
                });
            }
        });

        // show profile
        $("#btnProfileAdmin").click(function() {
            $('#modalProfileAdmin').modal('show');
            var id = $(this).attr("data-id");
            $.ajax({
                type: 'GET',
                url: `staff/${id}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#modalName").text(data.success.name);
                    $("#modalNameInput").val(data.success.name);
                    $("#modalNameEmail").val(data.success.email);
                    $("#modalNamephone").val(data.success.phone);
                    $("#modalNameAddress").val(data.success.address);
                    $("#modalNameDate").val(data.success.created_at);
                    if (data.success.avatar != null) {
                        $("#avatar").attr("src", data.success.avatar);
                    } else {
                        $("#avatar").attr("src", "https://www.bootdey.com/img/Content/avatar/avatar7.png");
                    }
                }
            });
        })

        // get data edit
        $(".btnEditStaff").click(function() {
            $('#modalEditUser').modal('show');
            var id = $(this).attr("data-id");
            var index = this.parentElement.parentElement.rowIndex;
            document.querySelector(".btnSubmitEditUser").setAttribute("data-row", index);
            $.ajax({
                type: 'GET',
                url: `staff/${id}/edit`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#modalNameUserEdit").val(data.success.name);
                    $("#modalAddressUserEdit").val(data.success.address);
                    $("#modalPhoneUserEdit").val(data.success.phone);
                    $("#modalEmailUserEdit").val(data.success.email);
                    $(".btnSubmitEditUser").attr("data-id", id);
                }
            });
        });

        // edit user
        var btnEditUser = $(".btnSubmitEditUser");
        btnEditUser.click(function() {
            const name = $("#modalNameUserEdit").val();
            const email = $("#modalEmailUserEdit").val();
            const address = $("#modalPhoneUserEdit").val();
            const phone = $("#modalAddressUserEdit").val();
            const id = $(this).attr("data-id");
            var rowEdit = $(this).attr('data-row');
            const data = {
                name: name,
                email: email,
                address: address,
                phone: phone,
            };
            fetch(`staff/${id}`, {
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
                        $('#modalEditUser').modal('hide');
                        alert('sửa user thành công');
                        var rowTable = document.createElement('tr');
                        var tableBody = document.querySelector('#myTable tbody');
                        tableBody.deleteRow(rowEdit - 1);
                        var row = tableBody.insertRow(rowEdit - 1);
                        var row = tableBody.insertRow(row);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        var cell5 = row.insertCell(4);
                        cell1.innerHTML = data.success.name;
                        cell2.innerHTML = data.success.email;
                        cell3.innerHTML = data.success.address;
                        cell4.innerHTML = data.success.phone;
                        cell5.innerHTML = `<button class="btn btn-warning form-group" id="btnEditStaff" data-id="${data.success.id}"><i class="far fa-edit"></i></button>
                                <button class="btn btn-danger form-group deleteNews" data-id="${data.success.id}"><i class="far fa-trash-alt"></i></button>`;
                    }
                })
                .catch((error) => {
                    console.log('eo dc', error);
                });
        })

        // delete user
        $(".btnDeleteStaff").click(function() {
            if (confirm("bạn có muốn xóa")) {
                var table = $("#myTable");
                var id = $(this).attr('data-id');
                var index = this.parentElement.parentElement.rowIndex;
                fetch(`staff/${id}`, {
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
                    })
                    .catch(error => {
                        alert("xóa user không thành công");
                    });
            }
        });
    })
</script>
@stop