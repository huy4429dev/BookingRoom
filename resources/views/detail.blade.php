@extends('layouts.app')
@section('content')
<?php
function limit_description($string)
{
	$string = strip_tags($string);
	if (strlen($string) > 150) {

		// truncate string
		$stringCut = substr($string, 0, 150);
		$endPoint = strrpos($stringCut, ' ');

		//if the string doesn't contain any space then it will cut without word basis.
		$string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
		$string .= '...';
	}
	return $string;
}
function time_elapsed_string($datetime, $full = false)
{
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'năm',
		'm' => 'tháng',
		'w' => 'tuần',
		'd' => 'ngày',
		'h' => 'giờ',
		'i' => 'phút',
		's' => 'giây',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' trước' : 'Vừa xong';
}
?>
<div class="container" style=" margin-top: 100px;">
	<div class="gap"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li class="active">{{ $motelroom->title }}</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="entry-title entry-prop">{{ $motelroom->title }}</h1>

				<hr>
				<div class="row mb-4">
					<div class="col-md-6">
						<span class="price_area">{{ number_format($motelroom->price) }} <span class="price_label">VND</span></span>
					</div>
					<div class="col-md-6">
						<span class="pull-right">Lượt xem: {{ $motelroom->count_view }} - <span>Ngày đăng: </span> <span style="color: red; font-weight: bold;">
								<?php echo time_elapsed_string($motelroom->created_at); ?>
							</span></span>
					</div>
				</div>
				<div id="map-detail"></div>

				<hr>
				<div class="detail">
					<p><strong>Địa chỉ: {{ $motelroom->address }}</strong><br></p>
					<p>
						<strong>Giá phòng: </strong><span class="price_area"><?php echo number_format($motelroom->price); ?> <span class="price_label">VND</span></span>
						<strong><i class="fas fa-street-view"></i> Diện tích: </strong><span> {{$motelroom->area}} m <sup>2</sup> </span>
					</p>
					<!-- Tiện ích -->
					<?php $arrtienich = json_decode($motelroom->utilities, true); ?>
					<div id="km-detail">
						<div class="fs-dtslt">Tiện ích Phòng Trọ</div>
						<div style="padding: 5px;">
							@foreach($arrtienich as $tienich)
							<span><i class="fas fa-check"></i> {{ $tienich }}</span>
							@endforeach
						</div>
					</div>
					<h4>Mô tả:</h4>
					<pre>
					<p class="pre">{{ $motelroom->description }}</p>
				</pre>
				</div>

				<?php
				$arrimg =  json_decode($motelroom->images, true);
				?>
				<center>
					<!-- Slider Hình Ảnh -->
					@foreach($arrimg as $img)
					<img src="{{url('uploads/images/'.$img)}}" width="50%">
					@endforeach
				</center>
				<!-- END Slider Hình Ảnh -->
				<div class="gap"></div>
			</div>
			<div class="col-md-4">
				<div class="contactpanel">
					<div class="row">
						<div class="col-md-4 text-center">
							<img src="{{url($motelroom->user->avatar)}}" class="img-circle" alt="Cinque Terre" width="100" height="100">
						</div>
						<div class="col-md-8">
							<h4>Thông tin người đăng</h4>
							<strong>{{ $motelroom->user->name }}</strong><br>
							<i class="far fa-clock"></i> <span style="font-size:14px">Ngày tham gia: <br /> {{date('d - m - Y',strtotime($motelroom->user->created_at))}} </span>

						</div>
					</div>
				</div>
				<div class="phone_btn my-2">
					<a id="show_phone_bnt" href="callto:{{ $motelroom->phone }}" class="btn btn-primary btn-block" style="font-weight: bold !important;
				font-size: 14px;">
						<i class="fas fa-phone-square" style="font-size: 20px"></i>
						<span>SĐT: {{ $motelroom->phone }}</span></a>
				</div>

				<div class="gap"></div>


				@if(session('thongbao'))
				<div class="alert bg-success">
					<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
					<span class="text-semibold">Well done!</span> {{session('thongbao')}}
				</div>
				@else
				<div class="report">
					<h4>Trạng thái: {{ $motelroom->status === 1  ?  'Đã cho thuê' : 'Chưa được thuê' }}</h4>
					<button style="font-size:12px" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Thuê phòng</button>
				</div>
				@endif
				<img src="{{url('images/banner.jpg')}}" width="100%" style="margin-top: 20px">
			</div>
		</div>
	</div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel">Nhập thông tin</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="md-form">
						<input type="text" class="form-control" id="recipient-name" placeholder="Họ tên" name="c_fullname">
					</div>
					<div class="md-form">
						<input type="text" class="form-control" id="recipient-phone" placeholder="Số điện thoại" name="c_phone">
					</div>
					<div class="md-form">
						<input type="email" class="form-control" id="recipient-email" placeholder="Email" name="c_email">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button style="font-size:12px" type="button" class="btn btn-secondary" data-dismiss="modal">Đóng </button>
				<button style="font-size:12px" type="button" class="btn btn-primary" id="bookroom">Đặt phòng</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('css')
<style>
	#map-detail {
		height: 400px;
	}
</style>
@endsection
@section('script')

<script type="text/javascript">
	// $(document).ready(function() {
	// 	var slider = $('.pgwSlider').pgwSlider();
	// 	slider.previousSlide();
	// });
</script>
<script>
	var map;

	function initMap() {
		map = new google.maps.Map(document.getElementById('map-detail'), {
			center: {
				lat: 16.067011,
				lng: 108.214388
			},
			zoom: 15,
			draggable: true
		});
		/* Get latlng vị trí phòng trọ */
		<?php
		$arrmergeLatln = array();

		$arrlatlng = json_decode($motelroom->latlng, true);

		$arrmergeLatln[] = ["lat" => $arrlatlng[0], "lng" => $arrlatlng[1], "title" => $motelroom->title, "address" => $motelroom->address, "phone" => $motelroom->phone, "slug" => $motelroom->slug];
		$js_array = json_encode($arrmergeLatln);
		echo "var javascript_array = " . $js_array . ";\n";

		?>
		/* ---------------  */

		for (i in javascript_array) {
			var data = javascript_array[i];
			var latlng = new google.maps.LatLng(data.lat, data.lng);
			var phongtro = new google.maps.Marker({
				position: latlng,
				map: map,
				title: data.title,
				icon: "{{url('images/gps.png')}}",
				content: 'dgfdgfdg'
			});
			var infowindow = new google.maps.InfoWindow();
			(function(phongtro, data) {
				var content = '<div id="iw-container">' +
					'<a href="phongtro/' + data.slug + '"><div class="iw-title">' + data.title + '</div></a>' +
					'<p><i class="fas fa-map-marker" style="color:#003352"></i> ' + data.address + '<br>' +
					'<br>Phone. ' + data.phone + '</div>';
				infowindow.setContent(content);
				infowindow.open(map, phongtro);
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
<script>

		let bookRoom = document.querySelector('#bookroom');

	function addBookRoom() {

		let url = "{{url('room/'.$motelroom->slug.'/add-customer')}}";
		
		let fullname = document.querySelector('input[name="c_fullname"]').value;
		let email = document.querySelector('input[name="c_email"]').value;
		let phone = document.querySelector('input[name="c_phone"]').value;

		let data = {

			email: email,
			phone: phone,
			fullname: fullname,

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

				if (data === 'createdCustomerSuccess') {
					console.log('okk');
					
				}

			

			})
			.catch(err => {
				console.log(err);
			})
	}

	bookRoom.addEventListener('click',addBookRoom);
</script>
@endsection