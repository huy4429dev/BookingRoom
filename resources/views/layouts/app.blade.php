<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Room - @yield('title')</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/app.css">
    <link rel="stylesheet" href="./assets/css/jquery-ui.css">
    <script src="./assets/js/fontawesome.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    @yield('css')
</head>

<body>

    <!-- NAVIGATION  -->
    <nav class="nav">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="nav__logo">
                <a href="{{url('/')}}" class="nav__logo-link">
                <img class="img-fluid" src="https://storage.googleapis.com/fe-production/icon_vxr_full.svg" alt="">
            </a>
            </div>
            <div class="nav__icon-bar">
                <i class="fas fa-bars"></i>
            </div>
            <ul class="nav__list d-flex">
                <li class="nav__item"><a href="{{url('/')}}" class="nav__link">Trang chủ</a></li>
                <li class="nav__item"><a href="{{url('/')}}" class="nav__link">Phòng trọ</a></li>
                <li class="nav__item"><a href="{{url('/blog')}}" class="nav__link">Tin tức</a></li>
                <li class="nav__item"><a href="{{url('/about')}}" class="nav__link">Giới thiệu</a></li>
                <li class="nav__item"><a href="{{url('/contact')}}" class="nav__link">Liên hệ</a></li>
                <li class="nav__item"><a href="" class="nav__link hotline"> <i class="fas fa-phone-alt"></i> Hotline</a>
                </li>
            </ul>
        </div>
    </nav>
        
    @yield('content')

    <!-- FOOTER  -->

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
    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/jquery-ui.js"></script>
    <script src="./assets/js/app.js"></script>
    @yield('script')
</body>

</html>