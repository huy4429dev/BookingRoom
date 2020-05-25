@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:100px">

    <div class="row">
        <div class="col-12 mx-auto">

            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden ">
                <div class="px-4 pt-0 pb-4 bg-primary">
                    <div class="media align-items-end profile-header">
                        <div class="profile mr-3 mt-4">
                            <div style="position:relative">
                                <img  src="{{url(Auth::user()->avatar)}}" alt="..." width="130" class="rounded mb-2 img-thumbnail">
                                <input id="edit-avatar" type="file" name="avatar" style="position: absolute; bottom: 0; right: 0; width:50px; z-index:999; opacity:0;">
                                <button style="position: absolute; bottom:0; right:0">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>

                            <a href="" class="btn btn-primary btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#modalContactForm">
                                Cập nhật hồ sơ
                                <i class="far fa-eye ml-1"></i></a>
                        </div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="mt-0 mb-0">{{Auth::user()->name}}</h4>
                            <p class="small mb-4"> <i class="fa fa-map-marker mr-2"></i>{{Auth::user()->roles->pluck('name')->first()}}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-light p-4 d-flex justify-content-end text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Photos</small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"> <i class="fas fa-book mr-1"></i>Bài đăng</small>
                        </li>
                    </ul>
                </div>

                <div class="py-4 px-4">
                    <div class="py-4">
                        <h5 class="mb-5">Bài đã đăng</h5>
                        @foreach($mypost as $post)
                        <div class="p-4 bg-light rounded shadow-sm">
                            <p class="font-italic mb-0">
                                <a href="{{route('user.post.edit',['slug' => $post->slug])}}">{{$post->title}}</a>
                            </p>
                            <ul class="list-inline small text-muted mt-3 mb-0">
                                <li class="list-inline-item"><i class="far fa-clock mr-2"></i>{{Date('d/m/Y'),strtotime($post->created_at)}}</li>
                                <li class="list-inline-item"><i class="far fa-eye mr-2"></i></i>{{$post->count_view}}</li>
                            </ul>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div><!-- End profile widget -->

        </div>
    </div>


    <!-- Modal: Contact form -->
    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!-- Content -->
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header light-blue darken-3 white-text">
                    <h4 class=""><i class="fas fa-pencil-alt"></i> Hồ sơ </h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Body -->
                <div class="modal-body mb-0">
                    <ul id="updateErrors"></ul>
                    <ul id="updateSuccess"></ul>
                    <div class="md-form form-sm">
                        <i class="fas fa-user prefix"></i>
                        <input type="text" id="form19" class="form-control form-control-sm" name="name" value="{{Auth::user()->name}}">
                        <label for="form19">Họ tên</label>
                    </div>

                    <div class="md-form form-sm">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="email" id="form20" class="form-control form-control-sm" name="email" value="{{Auth::user()->email}}">
                        <label for="form20">Email</label>
                    </div>

                    <div class="md-form form-sm">
                        <i class="fas fa-lock prefix"></i>
                        <input type="text" id="form21" class="form-control form-control-sm" name="password" placeholder="********">
                        <label for="form21">Mật khẩu</label>
                    </div>

                    <div class="md-form form-sm">
                        <i class="fas fa-pencil-alt prefix"></i>
                        <textarea type="text" id="form8" class="md-textarea form-control form-control-sm" name="address" rows="3">{{Auth::user()->address}}</textarea>
                        <label for="form8">Địa chỉ</label>
                    </div>
                    <div class="md-form form-sm">
                        <i class="fas fa-phone prefix"></i>
                        <input type="text" id="form22" class="form-control form-control-sm" name="phone" value="{{Auth::user()->phone}}">
                        <label for="form22">Số điện thoại</label>
                    </div>

                    <div class="text-center mt-1-half">
                        <button id="btnUpdateProfile" class="btn btn-info mb-2">Cập nhật <i class="fas fa-paper-plane ml-1"></i></button>
                    </div>

                </div>
            </div>
            <!-- Content -->
        </div>
    </div>
    <!-- Modal: Contact form -->

</div>
@endsection
@section('css')
<style>
    form input {
        font-size: 2rem !important;
    }
</style>
@endsection

@section('script')
<script>

 let btnUpdateProfile = document.querySelector('#btnUpdateProfile');
 let updateSuccess = document.querySelector('#updateSuccess');
 let updateErrors = document.querySelector('#updateErrors');
 

 function UpdateProfile(){

            let url = "{{url('user/profile/edit')}}";

            let name = document.querySelector('input[name="name"]').value;
            let email = document.querySelector('input[name="email"]').value;
            let password = document.querySelector('input[name="password"]').value;
            let phone = document.querySelector('input[name="phone"]').value;
            let address = document.querySelector('textarea[name="address"]').value;
            console.log(address);
            
            let data = {

                name: name,
                email: email,
                password: password,
                phone: phone,
                address: address,

            };

            console.log(data);
            
            

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {

                    if (data === 'updateSuccess') {
                                             updateErrors.innerHTML = '';
                        updateSuccess.classList.add('alert','alert-success');
                        updateSuccess.innerHTML = 'Cập nhật thông tin thành công';
                    }

                    if (data.updateErrors != undefined) {
                        updateErrors.innerHTML = '';
                        if (data.updateErrors.length > 0) {
                            updateErrors.classList.add('alert', 'alert-danger');
                            data.updateErrors.forEach(err => {
                                updateErrors.innerHTML += '<li>' + err + '</li>';
                            });
                        }
                    }

                })
                .catch(err => {
                    console.log(err);
                })
        }

        btnUpdateProfile.addEventListener('click', UpdateProfile);


    let inputEditAvatar = document.querySelector('#edit-avatar');
    inputEditAvatar.addEventListener('change', function() {
        
        let avatar = document.querySelector('.img-thumbnail');

        
        var url = "{{route('user.profile.edit.avatar')}}";
           
            var formData = new FormData();
            formData.append("userId" , {{Auth::user()->id}} );
            formData.append("avatar", inputEditAvatar.files[0]);

            console.log(inputEditAvatar.files[0]);
            
            const root = "{{url('/')}}";

        fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    
                    avatar.setAttribute('src', root + '/' + data.url);
                    
                })
                .catch(err => {
                    console.log(err);
                })
        })

 

</script>
@endsection