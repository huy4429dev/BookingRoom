@extends('layouts.app')

@section('title','room')

@section('content')
<main class="blog">
    <div class="container">
        <h2 class="about__heading display-4 my-5 py-3">
            Phòng trọ
        </h2>
        <!-- Section: Blog v.3 -->
        <section class="my-5">
            <div class="row">
                @foreach($rooms as $room)
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
        </section>

        {{ $rooms->links() }}
        <!-- Section: Blog v.3 -->
    </div>
</main>
@endsection
