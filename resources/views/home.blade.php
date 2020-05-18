@extends('layouts.app')


@section('content')
<!-- HEADER  -->
<header class="header">
    <div id="map"></div>
    <div class="container d-flex justify-content-between align-items-center h-100 text-center">
        <div class="header__content mx-auto">
            <div class="header__heading">
                VeXeRe.com - Hệ thống đặt vé xe khách lớn nhất Việt Nam
            </div>
            <form class="header__form-search d-flex justify-content-center">
                <div>
                    <i class="fas fa-map-marker-alt"></i>
                    <input type="text" class="header__form-search-input" placeholder="Điểm xuất phát">
                </div>
                <div>
                    <i class="fas fa-map-marker-alt"></i>
                    <input type="text" class="header__form-search-input" placeholder="Điểm đến  ">
                </div>
                <div class="header__form-search-input-date-picker">
                    <i class="far fa-calendar-alt"></i>
                    <input type="text" class="header__form-search-input" id="datepicker">
                </div>
                <button class="btn btn-warning header__form-search-button">Tìm Vé Xe</button>
            </form>
        </div>
    </div>
</header>
<!-- BANNER  -->

<div class="banner">
    <div class="container">
        <h2 class="banner__heading heading">
            Ưu đãi nổi bật
        </h2>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="banner__item">
                    <img class="img-fluid" src="./assets/images/banner-home-(1).png" alt="" class="banner__item-img">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="banner__item">
                    <img class="img-fluid" src="./assets/images/banner-home.png" alt="" class="banner__item-img">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="banner__item">
                    <img class="img-fluid" src="./assets/images/banner-trang-chu-ok.png" alt="" class="banner__item-img">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SERVICE  -->
<div class="service">
    <div class="container">
        <h2 class="service__heading heading">
            Hệ thống vé xe khách và vé xe limousine lớn nhất Việt Nam
        </h2>
        <div class="row">
            <div class="col-6 col-md-3">
                <div class="service__item d-flex justify-content-center">
                    <div class="d-flex">
                        <img src="./assets/images/static-icon-1.svg" alt="" class="service__item-img">
                        <div class="service__item-content ">
                            <h4 class="service__item-qty">
                                5000+
                            </h4>
                            <span class="service__title">
                                Tuyến đường
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="service__item d-flex justify-content-center">
                    <div class="d-flex">
                        <img src="./assets/images/static-icon-2.svg" alt="" class="service__item-img">
                        <div class="service__item-content ">
                            <h4 class="service__item-qty">
                                2000+
                            </h4>
                            <span class="service__title">
                                Nhà xe
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="service__item d-flex justify-content-center">
                    <div class="d-flex">
                        <img src="./assets/images/static-icon-3.svg" alt="" class="service__item-img">
                        <div class="service__item-content ">
                            <h4 class="service__item-qty">
                                5000+
                            </h4>
                            <span class="service__title">
                                Đại lý bán vé
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="service__item d-flex justify-content-center">
                    <div class="d-flex">
                        <img src="./assets/images/static-icon-4.svg" alt="" class="service__item-img">
                        <div class="service__item-content ">
                            <h4 class="service__item-qty">
                                400+
                            </h4>
                            <span class="service__title">
                                Bến xe
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ROOM HOT -->
<div class="room-hot">
    <div class="container">
        <h2 class="room-hot__heading heading">
            Vé sale
        </h2>
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="room-hot__item">
                    <div class="room-hot__img">
                        <img class="img-fluid" src="https://place-hold.it/400" alt="">
                    </div>
                    <h2 class="room-hot__title">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit...
                    </h2>
                    <p class="room-hot__price">
                        500.000 đ
                    </p>
                    <div class="room-hot__author d-flex justify-content-between ">
                        <span class="room-hot__author-name">
                            <i class="far fa-smile"></i>
                            <a href="">
                                Nguyễn Văn A
                            </a>
                        </span>
                        <span class="room-hot__author-phone">
                            <i class="fas fa-mobile-alt"></i>
                            09432432
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="room-hot__item">
                    <div class="room-hot__img">
                        <img class="img-fluid" src="https://place-hold.it/400" alt="">
                    </div>
                    <h2 class="room-hot__title">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit...
                    </h2>
                    <p class="room-hot__price">
                        500.000 đ
                    </p>
                    <div class="room-hot__author d-flex justify-content-between ">
                        <span class="room-hot__author-name">
                            <i class="far fa-smile"></i>
                            <a href="">
                                Nguyễn Văn A
                            </a>
                        </span>
                        <span class="room-hot__author-phone">
                            <i class="fas fa-mobile-alt"></i>
                            09432432
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="room-hot__item">
                    <div class="room-hot__img">
                        <img class="img-fluid" src="https://place-hold.it/400" alt="">
                    </div>
                    <h2 class="room-hot__title">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit...
                    </h2>
                    <p class="room-hot__price">
                        500.000 đ
                    </p>
                    <div class="room-hot__author d-flex justify-content-between ">
                        <span class="room-hot__author-name">
                            <i class="far fa-smile"></i>
                            <a href="">
                                Nguyễn Văn A
                            </a>
                        </span>
                        <span class="room-hot__author-phone">
                            <i class="fas fa-mobile-alt"></i>
                            09432432
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="room-hot__item">
                    <div class="room-hot__img">
                        <img class="img-fluid" src="https://place-hold.it/400" alt="">
                    </div>
                    <h2 class="room-hot__title">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit...
                    </h2>
                    <p class="room-hot__price">
                        500.000 đ
                    </p>
                    <div class="room-hot__author d-flex justify-content-between ">
                        <span class="room-hot__author-name">
                            <i class="far fa-smile"></i>
                            <a href="">
                                Nguyễn Văn A
                            </a>
                        </span>
                        <span class="room-hot__author-phone">
                            <i class="fas fa-mobile-alt"></i>
                            09432432
                        </span>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- NEWS  -->

<div class="news">
    <div class="container">
        <h2 class="news__heading heading">
            Tin tức
        </h2>
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="news__item">
                    <div class="news__img">
                        <img class="img-fluid" src="https://place-hold.it/400" alt="">
                    </div>
                    <h2 class="news__title">
                        Lorem ipsum dolor sit amet.
                    </h2>
                    <div class="news__description">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi, enim.
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="news__item">
                    <div class="news__img">
                        <img class="img-fluid" src="https://place-hold.it/400" alt="">
                    </div>
                    <h2 class="news__title">
                        Lorem ipsum dolor sit amet.
                    </h2>
                    <div class="news__description">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi, enim.
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="news__item">
                    <div class="news__img">
                        <img class="img-fluid" src="https://place-hold.it/400" alt="">
                    </div>
                    <h2 class="news__title">
                        Lorem ipsum dolor sit amet.
                    </h2>
                    <div class="news__description">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi, enim.
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="news__item">
                    <div class="news__img">
                        <img class="img-fluid" src="https://place-hold.it/400" alt="">
                    </div>
                    <h2 class="news__title">
                        Lorem ipsum dolor sit amet.
                    </h2>
                    <div class="news__description">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi, enim.
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('css')

<style>
    #map {
        height: 100vh;
        margin-top: 60px;
    }

    #map-detail {
        height: 400px;
    }
</style>

@endsection

@section('script')
<script>
    $(function() {
        $('input[id$=datepicker]').datepicker({
            dateFormat: 'dd/mm/yy'
        });
        const now = new Date();
        $("#datepicker").val(now.toLocaleDateString('en-GB'));
    });
</script>
<script>
    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 16.070372,
                lng: 108.214388
            },
            zoom: 15,
            draggable: true
        });
        /* Get latlng list phòng trọ */
        // <?php
            // $arrmergeLatln = array();
            // foreach ($map_motelroom as $room) {
            // 	$arrlatlng = json_decode($room->latlng,true);
            // 	$arrImg = json_decode($room->images,true);
            // 	$arrmergeLatln[] = ["slug"=> $room->slug ,"lat"=> $arrlatlng[0],"lng"=> $arrlatlng[1],"title"=>$room->title,"address"=> $room->address,"image"=>$arrImg[0],"phone"=>$room->phone];

            // }

            // $js_array = json_encode($arrmergeLatln);
            // echo "var javascript_array = ". $js_array . ";\n";

            // 
            ?>
        /* ---------------  */

        var listphongtro = [{
                lat: 16.067011,
                lng: 108.214388,
                title: '33 Hoàng diệu',
                content: 'bbbb'
            },
            {
                lat: 16.066330603904397,
                lng: 108.2066632380371,
                title: '33 Hoàng diệu',
                content: 'bbbb'
            }
        ];

        for (i in listphongtro) {
            var data = listphongtro[i];
            var latlng = new google.maps.LatLng(data.lat, data.lng);
            var phongtro = new google.maps.Marker({
                position: latlng,
                map: map,
                title: data.title,
                icon: "images/gps.png",
                content: 'dgfdgfdg'
            });
            var infowindow = new google.maps.InfoWindow();
            (function(phongtro, data) {
                var content = '<div id="iw-container">' +
                    '<img height="200px" width="300" src="uploads/images/' + data.image + '">' +
                    '<a href="phongtro/' + data.slug + '"><div class="iw-title">' + data.title + '</div></a>' +
                    '<p><i class="fas fa-map-marker" style="color:#003352"></i> ' + data.address + '<br>' +
                    '<br>Phone. ' + data.phone + '</div>';

                google.maps.event.addListener(phongtro, "click", function(e) {

                    infowindow.setContent(content);
                    infowindow.open(map, phongtro);
                    // alert(data.title);
                });
            })(phongtro, data);

        }
        // google.maps.event.addListener(map, 'mousemove', function (e) {
        // 	document.getElementById("flat").innerHTML = e.latLng.lat().toFixed(6);
        // 	document.getElementById("lng").innerHTML = e.latLng.lng().toFixed(6);

        // });


    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initMap" async defer></script>

@endsection