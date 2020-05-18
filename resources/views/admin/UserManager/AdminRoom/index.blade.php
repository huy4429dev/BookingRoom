{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Danh sách admin</h1>
    <!-- Button trigger modal add news -->
    <a href="admin-room/create"> <button type="button" class="btn btn-primary">
            <i class="fas fa-plus"></i>
        </button>
    </a>
    @stop

    @section('content')
    <!-- The Modal -->
    <div class="modal" id="modalProfileAdmin">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="" id="avatar" alt="Card image">
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
                                <th>email</th>
                                <th>ảnh</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($adminUser as $user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><a style="cursor: pointer" class="btnProfileAdmin" data-id="{{$user->id}}">{{$user->name}}</a> </td>
                                <td>
                                    @if($user->avatar == '')
                                    <img style="width:40px;height:40px" src="https://scontent.fhan5-5.fna.fbcdn.net/v/t1.30497-1/c47.0.160.160a/p160x160/84241059_189132118950875_4138507100605120512_n.jpg?_nc_cat=1&_nc_sid=dbb9e7&_nc_ohc=ol4I6_1VMN0AX_o_EkI&_nc_ht=scontent.fhan5-5.fna&oh=becf4349f28d7193697158f9c7649f1d&oe=5EE84D24" />
                                    @else
                                    <img src="uploads/images/{{$user->avatar}}" />
                                    @endif
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td>
                                    <a href="admin-room/{{$user->id}}/edit"><button class="btn btn-warning form-group "><i class="far fa-edit"></i></button></a>
                                    <button class="btn btn-danger form-group" data-id="{{$user->id}}"> <i class="far fa-trash-alt"></i></button>
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
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $(".btnProfileAdmin").click(function() {
            $('#modalProfileAdmin').modal('show');
            var id = $(this).attr("data-id");
            $.ajax({
                url: `admin-room/${id}`,
                type: 'GET',
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
                    if (data.success.avatar != '') {
                        $("#avatar").attr("src", data.success.avatar);
                    } else {
                        $("#avatar").attr("src", "https://www.bootdey.com/img/Content/avatar/avatar7.png");
                    }
                }
            });
        })
    })
</script>
@stop