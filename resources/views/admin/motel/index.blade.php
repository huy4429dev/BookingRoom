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
                    <h5 class="modal-title" id="staticBackdropLabel">Thông tin</h5>
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
                                @if($post->approve == 1)
                                <span class="badge badge-success" style="cursor:pointer">Phê duyệt</span>
                                @else
                                <span class="badge badge-warning" style="cursor:pointer">Chờ phê duyệt</span>
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
                <h5 class="modal-title" id="staticBackdropLabel">Chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="formResult1" class="pl-3 pr-3">
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Tài khoản</label>
                    <input type="text" class="form-control" id="emailEdit" name="email" disabled>
                    <p class="text-danger title"></p>
                </div>
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" class="form-control" id="titleEdit" name="titleEdit" disabled>
                    <p class="text-danger title"></p>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control" id="descriptionEdit" rows="3" name="descriptionEdit" disabled></textarea>
                    <p class="text-danger description"></p>
                </div>
                <div class="form-group">
                    <label for="description">Địa chỉ</label>
                    <textarea class="form-control" id="addressEdit" rows="3" name="addressEdit" disabled></textarea>
                    <p class="text-danger description"></p>
                </div>
                <div class="form-group">
                    <label for="title">Diện tích (m2)</label>
                    <input type="text" class="form-control" id="areaEdit" name="areaEdit" disabled>
                    <p class="text-danger title"></p>
                </div>
                <div class="form-group">
                    <label for="title">Giá (vnđ)</label>
                    <input type="text" class="form-control" id="priceEdit" name="priceEdit" disabled>
                    <p class="text-danger title"></p>
                </div>
                <div class="form-group">
                    <label for="title">Điện thoại</label>
                    <input type="text" class="form-control" id="phoneEdit" name="phoneEdit" disabled>
                    <p class="text-danger title"></p>
                </div>
                
                <form id="updateStatus" method="POST">
                    @csrf
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="1" name="statusCheckEdit" id="statusCheckEdit" >Phê duyệt
                        </label>
                    </div>
                    
                    <div class="modal-footer">
                    <input type="hidden" name="id" id="motelId">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓng</button>
                        <button type="button" class="btn btn-primary" id="btnEditNews" data-id="" data-row="">Đồng ý</button>
                    </div>
                   </div>

                </form>
        </div>
    </div>
</div>
</div>
@stop

@section('css')
@stop

@section('js')
<script type="text/javascript">
    function resertInput() {
        document.querySelector("#formResult").innerHTML = "";
        document.getElementById("title").value = "";
        document.getElementById('description').value = "";
        document.querySelector("#formResult").innerHTML = "";
    }


    //delete tin 
    var deleteNews = document.getElementsByClassName("deleteNews");
    var table = document.getElementById("myTable");
    var index;
    for (var i = 0; i < deleteNews.length; i++) {
        deleteNews[i].addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            index = this.parentElement.parentElement.rowIndex;
            if (confirm("bạn có muốn xóa")) {
                fetch(`http://localhost:8000/admin/room/posts/delete/${id}`, {
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
            fetch(`http://localhost:8000/admin/room/posts/show/${id}`, {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log(data.success);
                        document.querySelector("#btnEditNews").setAttribute("data-id", data.success.id);
                        document.querySelector("#titleEdit").value = data.success.title;
                        document.querySelector("#emailEdit").value = data.success.user.email;
                        document.querySelector("#descriptionEdit").value = data.success.description;
                        document.querySelector("#addressEdit").value = data.success.address;
                        document.querySelector("#areaEdit").value = data.success.area;
                        document.querySelector("#priceEdit").value = data.success.price;
                        document.querySelector("#phoneEdit").value = data.success.phone;
                        document.querySelector("#motelId").value = data.success.id;
                        if(data.success.approve == 1){
                            document.querySelector("#statusCheckEdit").checked = true;
                        };
                      
                    
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


    // edit news
    var actEditNews = document.querySelector("#btnEditNews");
    actEditNews.addEventListener('click', () => {
        const titleEdit = document.querySelector("#titleEdit").value;
        const descriptionEdit = document.querySelector("#descriptionEdit").value;
        const id = actEditNews.getAttribute("data-id");
        var rowEdit = actEditNews.getAttribute('data-row');
        var form  = document.querySelector('#updateStatus');
        var formId = document.querySelector('#motelId');
        form.setAttribute('action',"/admin/room/posts/update/" + formId.value);
        form.submit();
    })
</script>
@stop