<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Room - @yield('title')</title>
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/jquery-ui.css')}}">
    <script src="{{url('/assets/js/fontawesome.js')}}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url('/Mdbootstrap/css/mdb.min.css')}}">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        ul.nav.nav-tabs.md-tabs.tabs-2.light-blue.darken-3 {
            top: -10%;
            left: -2%;
        }

        a.nav-link {
            color: white;
        }
    </style>
    @yield('css')
</head>

<body>

    <!-- NAVIGATION  -->

    <nav class="nav">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="nav__logo">
                <a href="{{url('/')}}" class="nav__logo-link">
                    <img class="img-fluid" style="width:16rem" src="{{url('assets/images/logo.png')}}" alt="">
                </a>
            </div>
            <div class="nav__icon-bar">
                <i class="fas fa-bars"></i>
            </div>
            <ul class="nav__list d-flex">
                <li class="nav__item"><a href="{{url('/')}}" class="nav__link">Trang chủ</a></li>
                <li class="nav__item"><a href="{{url('/room')}}" class="nav__link">Phòng trọ</a></li>
                <li class="nav__item"><a href="{{url('/blog')}}" class="nav__link">Tin tức</a></li>
                <li class="nav__item"><a href="{{url('/about')}}" class="nav__link">Giới thiệu</a></li>
                <li class="nav__item"><a href="{{url('/contact')}}" class="nav__link">Liên hệ</a></li>
                <li class="nav__item"><a href="{{url('/user/post')}}" class="nav__link">Đăng tin <i class="far fa-edit"></i></a></li>
                @if(!is_null(Auth::user()))
                <li class="nav__item">
                    <div class="dropdown">
                        <!--Trigger-->
                        <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài khoản</a>
                        <!--Menu-->
                        <div class="dropdown-menu dropdown-primary p-4">
                            <a class="dropdown-item" href="{{route('user.profile')}}" style="font-size:14px">Hồ sơ</a>
                            <form action="{{route('logout')}}" method="POST" class="dropdown-item">
                                @csrf
                                <button style="border:none; font-size:14px; background:none; padding:0" type="submit">Đăng xuất</button>
                            </form>
                        </div>
                    </div>
                </li>
                @else
                <li class="nav__item"><a href="" class="nav__link hotline" data-toggle="modal" data-target="#modalLRForm"> Đăng nhập</a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')

    <!--Modal: Login / Register Form-->

    <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                                Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                                Đăng ký</a>
                        </li>
                    </ul>

                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                            <!--Body-->
                            <div class="modal-body mb-1">
                                <ul id="errLogin">

                                </ul>
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="email" id="modalLRInput10" class="form-control form-control-sm validate" name="txtemail">
                                    <label data-error="wrong" data-success="right" for="modalLRInput10">Email</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput11" class="form-control form-control-sm validate" name="txtpass">
                                    <label data-error="wrong" data-success="right" for="modalLRInput11">Password</label>
                                </div>
                                <div class="text-center mt-2">
                                    <a href="{{ url('auth/google') }}" class="btn btn-danger"><i class="fab fa-google"></i></a>
                                    <a href="{{ url('auth/facebook') }}" class="btn btn-primary"><i class="fab fa-facebook-f"></i></a>
                                    <button id="btnLogin" class="btn btn-info">Đăng nhập <i class="fas fa-sign-in ml-1"></i></button>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Đóng</button>
                            </div>

                        </div>
                        <!--/.Panel 7-->

                        <!--Panel 8-->
                        <div class="tab-pane fade" id="panel8" role="tabpanel">

                            <!--Body-->
                            <div class="modal-body">
                                <ul id="errRegister">
                                </ul>
                                <ul id="successRegister">
                                </ul>
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input  id="modalLRInput15" class="form-control form-control-sm validate" name="txtname">
                                    <label data-error="wrong" data-success="right" for="modalLRInput15" >Họ tên</label>
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="email" id="modalLRInput12" class="form-control form-control-sm validate" name="re-txtemail">
                                    <label data-error="wrong" data-success="right" for="modalLRInput12" >Email</label>
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput13" class="form-control form-control-sm validate" name="re-txtpass">
                                    <label data-error="wrong" data-success="right" for="modalLRInput13" >Mật khẩu</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput14" class="form-control form-control-sm validate" name="txt-repass">
                                    <label data-error="wrong" data-success="right" for="modalLRInput14" >Nhập lại mật khẩu</label>
                                </div>
                             
                                <div class="text-center form-sm mt-2">
                                    <button id="btnRegister" class="btn btn-info">Đăng ký <i class="fas fa-sign-in ml-1"></i></button>
                                </div>

                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                        <!--/.Panel 8-->
                    </div>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="footer__categories">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h4 class="footer__category-heading">
                            Tin tức
                        </h4>
                        <ul class="footer__category-news">
                            <li class="footer__news-item">
                                <a href="#" class="footer__news-link">Xe giường nằm Limousine – đỉnh cao mới của ngành
                                    xe khách</a>
                            </li>
                            <li class="footer__news-item">
                                <a href="#" class="footer__news-link">Xe limousine đi Vũng Tàu: Tổng hợp top 6 xe chất
                                    lượng cao</a>
                            </li>
                            <li class="footer__news-item">
                                <a href="#" class="footer__news-link">Review xe limousine đi Đà Lạt: những câu hỏi
                                    thường gặp</a>
                            </li>
                            <li class="footer__news-item">
                                <a href="#" class="footer__news-link">Xe limousine đi Sapa: Tổng hợp top các hãng xe
                                    chất lượng cao</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3">
                        <h4 class="footer__category-heading">
                            Tuyến đường
                        </h4>
                        <ul class="footer__category-street">
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Sài Gòn đi Buôn Ma Thuột</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Sài Gòn đi Buôn Ma Thuột</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Sài Gòn đi Buôn Ma Thuột</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Sài Gòn đi Buôn Ma Thuột</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Sài Gòn đi Buôn Ma Thuột</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Sài Gòn đi Buôn Ma Thuột</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Sài Gòn đi Buôn Ma Thuột</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3">
                        <h4 class="footer__category-heading">
                            Xe Limousine
                        </h4>
                        <ul class="footer__category-street">
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Limousine Buôn Ma Thuột Đà Lạt</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Limousine Buôn Ma Thuột Đà Lạt</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Limousine Buôn Ma Thuột Đà Lạt</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Limousine Buôn Ma Thuột Đà Lạt</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Limousine Buôn Ma Thuột Đà Lạt</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <hr />
            <div class="footer__about">
                <div class="row">

                    <div class="col-6 col-md-3">
                        <h4 class="footer__category-heading">
                            Về chúng tôi
                        </h4>
                        <ul class="footer__category-street">
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Giới thiệu</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Tin tức</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Liên hệ</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Chấp cánh giấc mơ</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-6 col-md-3">
                        <h4 class="footer__category-heading">
                            Hỗ trợ
                        </h4>
                        <ul class="footer__category-street">

                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Hướng dẫn thanh toán</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Quy chế vé xe</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">Câu hỏi thường gặp</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-6 col-md-3">
                        <h4 class="footer__category-heading">
                            Chứng nhận
                        </h4>
                        <ul class="footer__category-street">
                            <li class="footer__street-item">
                                <img src="./assets/images/certificate1.png" alt="" class="img-fluid">
                            </li>
                            <li class="footer__street-item">
                                <img src="./assets/images/certificate3.png" alt="" class="img-fluid">
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3">
                        <h4 class="footer__category-heading">
                            Hotline
                        </h4>
                        <ul class="footer__category-street">

                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">09432433</a>
                            </li>
                            <li class="footer__street-item">
                                <a href="" class="footer__street-link">vexer@gmail.com.vn</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
    </footer>
    <!-- COPYRIGHT  -->
    <div class="copy-right text-center">
        <h4 class="copy-right__heading">Công ty cổ phần Vexere</h4>
        <p class="copy-right__desc">
            Địa chỉ đăng ký kinh doanh: 8C Chữ Đồng Tử, Phường 7, Quận Tân Bình, Thành Phố Hồ Chí Minh, Việt Nam
        </p>
        <p class="copy-right__desc">
            Địa chỉ: Lầu 8,9, Tòa nhà CirCO, 222 Điện Biên Phủ, Quận 3, TP. Hồ Chí Minh, Việt Nam
        </p>
        <p class="copy-right__desc">
            Giấy chứng nhận ĐKKD số 0312387105 do Sở KH và ĐT TP. Hồ Chí Minh cấp lần đầu ngày 25/7/2013
        </p>
        <p class="copy-right__desc">
            Bản quyền © 2019 thuộc về VeXeRe.Com
        </p>
    </div>
    <script src="{{url('/assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('/assets/js/jquery-ui.js')}}"></script>
    <script src="{{url('/assets/js/app.js')}}"></script>
    <script type="text/javascript" src="{{url('/Mdbootstrap/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{url('/Mdbootstrap/js/mdb.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
    <script>
        //================== LOGIN 

        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


        let btnLogin        = document.querySelector('#btnLogin');
        let btnRegister     = document.querySelector('#btnRegister');
        let loginErr        = document.querySelector('#errLogin');
        let registerErr     = document.querySelector('#errRegister');
        let successRegister = document.querySelector('#successRegister');

        function Login() {
            let url = "{{url('user/login')}}";
            let txtemail = document.querySelector('input[name="txtemail"]').value;
            let txtpass = document.querySelector('input[name="txtpass"]').value;


            let data = {

                txtemail: txtemail,
                txtpass: txtpass,

            };

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

                    console.log(data);
                    
                    if (data === 'loginSuccess') {
                        window.location.href = '/';
                    }

                    if (data.loginErr != undefined) {
                        loginErr.innerHTML = '';
                        if (data.loginErr.length > 0) {
                            loginErr.classList.add('alert', 'alert-danger');
                            data.loginErr.forEach(err => {
                                loginErr.innerHTML += '<li>' + err + '</li>';
                            });
                        }
                    }

                })
                .catch(err => {
                    console.log(err);
                })
        }


        function Register(){

            let url = "{{url('user/register')}}";

            let txtname = document.querySelector('input[name="txtname"]').value;
            let txtemail = document.querySelector('input[name="re-txtemail"]').value;
            let txtpass = document.querySelector('input[name="re-txtpass"]').value;
            let txtRepass = document.querySelector('input[name="txt-repass"]').value;

            
            let data = {

                txtemail: txtemail,
                txtname: txtname,
                txtpass: txtpass,
                txtRepass: txtRepass,

            };

            

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

                    console.log(data);
                    
                    if (data === 'registerSuccess') {
                        successRegister.classList.add('alert','alert-success');
                        successRegister.innerHTML = 'Tạo tài khoản thành công';
                    }

                    if (data.registerErr != undefined) {
                        registerErr.innerHTML = '';
                        if (data.registerErr.length > 0) {
                            registerErr.classList.add('alert', 'alert-danger');
                            data.registerErr.forEach(err => {
                                registerErr.innerHTML += '<li>' + err + '</li>';
                            });
                        }
                    }

                })
                .catch(err => {
                    console.log(err);
                })
        }

        btnLogin.addEventListener('click', Login);
        btnRegister.addEventListener('click', Register);

        //================== REGISTER
    </script>
    @yield('script')
</body>

</html>