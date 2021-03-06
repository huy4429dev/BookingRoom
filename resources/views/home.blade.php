@extends('layouts.app')


@section('content')
<!-- HEADER  -->
<header class="header">
    <div id="map"></div>
    <div class="box-search">
        <!-- <div id="flat"></div>
					<div id="lng"></div> -->
        <form onsubmit="return false">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
                <div class="col-xs-6 mr-2">
                    <select class="selectpicker search-districts" data-live-search="true" id="selectdistrict">
                        @foreach($district as $quan)
                        <option data-tokens="{{$quan->slug}}" value="{{ $quan->id }}">{{ $quan->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-6">
                    <select class="selectpicker search-districts" data-live-search="true" id="selectcategory">
                        @foreach($categories as $category)
                        <option data-tokens="{{ $category->slug }}" value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <select class="selectpicker" id="selectprice" data-live-search="true">
                        <option data-tokens="khoang gia" min="1" max="10000000">Mức giá</option>
                        <option data-tokens="Tu 500.000 VNĐ - 700.000 VNĐ" min="500000" max="700000">Từ 500.000 VNĐ - 700.000 VNĐ</option>
                        <option data-tokens="Tu 700.000 VNĐ - 1.000.000 VNĐ" min="700000" max="1000000">Từ 700.000 VNĐ - 1.000.000 VNĐ</option>
                        <option data-tokens="Tu 1.000.000 VNĐ - 1.500.000 VNĐ" min="1000000" max="1500000">Từ 1.000.000 VNĐ - 1.500.000 VNĐ</option>
                        <option data-tokens="Tu 1.500.000 VNĐ - 3.000.000 VNĐ" min="1500000" max="3000000">Từ 1.500.000 VNĐ - 3.000.000 VNĐ</option>
                        <option data-tokens="Tren 3.000.000 VNĐ" min="3000000" max="10000000">Trên 3.000.000 VNĐ</option>
                    </select>
                </div>
                <div class="col-xs-6">
                    <button class="btn btn-success" onclick="searchMotelajax()" style="font-size: 10px; margin:0">Tìm kiếm ngay</button>
                </div>
            </div>

            <form>
    </div>
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
                    <img class="img-fluid" src="./assets/images/a.png" alt="" class="banner__item-img">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="banner__item">
                    <img class="img-fluid" src="./assets/images/bb.png" alt="" class="banner__item-img">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="banner__item">
                    <img class="img-fluid" src="./assets/images/c.png" alt="" class="banner__item-img">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SERVICE  -->
<div class="service">
    <div class="container">
        <h2 class="service__heading heading">
            Hệ thống phòng trọ lớn nhất Việt Nam
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
                                Hiện đại
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
                                Phòng trọ
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
                                Vị trí đẹp 
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
                                Tiện nghi
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
            Phòng Trọ Xem nhiều
        </h2>
        <div class="row">
            @foreach($hot_motelroom as $room)
            <?php
            $img_thumb = json_decode($room->images, true);
            ?>
            <div class="col-md-4 col-sm-6 mb-5">
                <div class="room-item"> 
                    <a href="room/{{ $room->slug }}">
                        <div class="wrap-img mb-4" style=" height:200px; background: lightblue url(uploads/images/<?php echo $img_thumb[0]; ?>) center;     background-size: cover;">
                            <img src="" class="lazyload img-responsive">
                        </div>
                    </a>
                    <div class="room-detail">
                        <h4><a href="room/{{ $room->slug }}">{{ $room->title }}</a></h4>
                        <div class="room-meta">
                            <span><i class="fas fa-user-circle"></i> Người đăng: <a href="/"> {{ $room->user->name }}</a></span>
                            <span class="pull-right"><i class="far fa-clock"></i>
                                <?php
                                // echo time_elapsed_string($room->created_at);
                                ?>
                            </span>
                        </div>
                        <div class="room-description"><i class="fas fa-audio-description"></i>
                            {{$room->description}}
                        </div>
                        <div class="room-info">
                            <span><i class="far fa-stop-circle"></i> Diện tích: <b>{{ $room->area }} m<sup>2</sup></b></span>
                            <span class="pull-right"><i class="fas fa-eye"></i> Lượt xem: <b>{{ $room->count_view }}</b></span>
                            <div><i class="fas fa-map-marker"></i> Địa chỉ: {{ $room->address }}</div>
                            <div class="text-primary"><i class="fas fa-dollar-sign mr-2"></i>Giá thuê:
                                <b>{{ number_format($room->price) }} VNĐ</b></div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

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
            <!-- Section: Blog v.2 -->
            <section class="text-center">
               
                <div class="row">
                    
                   @foreach($news as $item)
                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">

                        <!-- Featured image -->
                        <div class="view overlay rounded z-depth-2 mb-4">
                            <img class="img-fluid" src="{{url('/uploads/images/'.$item->thumbnail)}}" alt="Sample image">
                            <a href="{{url('blog/'.$item->id)}}">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!-- Post title -->
                        <h4 class="font-weight-bold mb-3"><strong>{{$item->title}}</strong></h4>
                        <!-- Post data -->
                        <p>by <a class="font-weight-bold">{{$item->user->name}}</a>, {{Date('d/m/y', strtotime($item->created_at))}}</p>
                        <!-- Excerpt -->
                        <p class="dark-grey-text">
                            {{strlen($item->description) > 150 ? substr($item->description,0,150)."..." : $item->description}}
                        </p>
                        <!-- Read more button -->
                        <a href="{{url('/blog/'.$item->id)}}" class="btn btn-primary" style="font-size:11px">Read more</a>

                    </div>
                    @endforeach
                </div>
                <!-- Grid row -->

            </section>
            <!-- Section: Blog v.2 -->
        </div>
    </div>
</div>
<div id="show-result" class="modal fade right show" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-gtm-vis-first-on-screen-2340190_1302="190310" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1" style="display: none; padding-right: 16px;" aria-modal="true">
      <div class="modal-dialog modal-full-height modal-right" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <h4 class="modal-title w-100" id="countResult" style="font-size:20px">Kết quả tìm kiếm </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span id="close-result" style="font-size: 25px;">×</span>
            </button>
          </div>
          <!--Body-->
          <div class="modal-body">
       

            <ul class="list-group z-depth-0" id="list-result">
              <li class="list-group-item justify-content-between">
                Cras justo odio
                <span class="badge badge-primary badge-pill">14</span>
              </li>

            </ul>

          </div>
          <!--Footer-->
        </div>
        <!--/.Content-->
      </div>
    </div>
    <div id="backdrop" ></div>
@endsection

@section('css')

<link rel="stylesheet" href="assets/select-2/select2.min.css">
<link rel="stylesheet" href="assets/toast/toastr.min.css">
</link>

<style>
    #map {
        height: 100vh;
        margin-top: 60px;
    }

    #map-detail {
        height: 400px;
    }

    .search-map {
        position: relative;
    }

    .box-search {
        position: absolute;
        bottom: 50%;
        right: 50%;
        transform: translate(50%, 50%);
        background: #0033522e;
        width: 60rem;
        border: 1px solid #f0f0f0;
        border-radius: 4px;
        padding: 6rem;
    }

    .box-search select {}

    span#select2-selectdistrict-container {
        width: 200px;
    }

    span#select2-selectcategory-container {
        width: 200px;
    }

    span.select2.select2-container.select2-container--default.select2-container--below {}

    select#selectprice {
        border-radius: 4px;
        padding: 4px;
        margin-right: 46px;
        color: #232121e6;
        font-size: 16px;
    }

    span.select2-selection.select2-selection--single {
        height: 35px;
    }

    button.btn.btn-success {
        padding: 8px;
    }
</style>

@endsection

@section('script')


<script type="text/javascript" src="assets/select-2/select2.min.js"></script>
<script type="text/javascript" src="assets/toast/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $('.search-districts').select2();
    });
</script>

<script>
    $(function() {
        $('input[id$=datepicker]').datepicker({
            dateFormat: 'dd/mm/yy'
        });
        const now = new Date();
        $("#datepicker").val(now.toLocaleDateString('en-GB'));
    });

    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "0",
            "timeOut": "0",
            "extendedTimeOut": "0",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });

    function searchMotelajax() {
        var min = $("#selectprice option:selected").attr("min");
        var max = $("#selectprice option:selected").attr("max");
        var id_ditrict = $("#selectdistrict").val();
        var id_category = $("#selectcategory").val();
        // console.log(min,max,id_category,id_ditrict);
        var data_send = {
            min_price: min,
            max_price: max,
            id_ditrict: id_ditrict,
            id_category: id_category 
        }
        console.log(min, max);
        // console.log(data); 
        $.ajax({
            url: "search-motel",
            method: "POST",
            data: data_send,
            success: function(result) {
                var result_room = JSON.parse(result);
                if (result_room.length != 0)
                    {
                        console.log(result_room);
                        
                    toastr.success('Tìm thấy ' + result_room.length + ' kết quả',
                    '',
                    {onclick: function() {
                        $('#show-result').css('display','block');
                        $('#backdrop').addClass('modal-backdrop fade show')
                        $('#close-result').on('click', function(){
                            $('#show-result').css('display','none');
                            $('#backdrop').removeClass('modal-backdrop fade show')
                        })
                        $('#backdrop').on('click', function(){
                            
                            $('#show-result').css('display','none');
                            $('#backdrop').removeClass('modal-backdrop fade show')
                        })
                        $('#countResult').html('Kết quả tìm kiếm (' + result_room.length + ')');
                        let result = '';
                        result_room.forEach(item => {
                            result += `<li> <a href="{{url('/room/${item.slug}')}}">${item.title}</a></li>`;
                        });

                        $('#list-result').html(result);

                    }}
                    );

                    }

                else
                    toastr.warning('Không tìm thấy kết quả nào');
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: 18.661380,
                        lng: 105.697430
                    },
                    zoom: 15,
                    draggable: true
                });

                for (i in result_room) {
                    var data = result_room[i];
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
                            '<a href="room/' + data.slug + '"><div class="iw-title">' + data.title + '</div></a>' +
                            '<p><i class="fas fa-map-marker" style="color:#003352"></i> ' + data.address + '<br>' +
                            '<br>Phone. ' + data.phone + '</div>';

                        google.maps.event.addListener(phongtro, "click", function(e) {

                            infowindow.setContent(content);
                            infowindow.open(map, phongtro);
                            // alert(data.title);
                        });
                    })(phongtro, data);

                }
            }
        });

    }
</script>
<script>
    var map;

    function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 18.661380,
                lng: 105.697430
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