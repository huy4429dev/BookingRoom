@extends('layouts.app')

@section('title','blog')

@section('content')
<main class="blog">
    <div class="container">
        <h2 class="about__heading display-4 my-5 py-3">
            Tin tức
        </h2>
        <!-- Section: Blog v.3 -->
<section class="my-5">

@foreach($news as $item)
<!-- Grid row -->
<div class="row">

  <!-- Grid column -->
  <div class="col-lg-5 col-xl-4">

    <!-- Featured image -->
    <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
        <img class="img-fluid" src="{{url('uploads/images/'.$item->thumbnail)}}" alt="Sample image">
      <a href="{{url('blog/'.$item->id)}}">

        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="col-lg-7 col-xl-8">

    <!-- Post title -->
    <div class="d-flex justify-content-between">
      <h3 class="font-weight-bold mb-3"><strong>{{$item->title}}</strong></h3>
      <div class="fb-like" data-href='{{url("/blog/$item->id")}}' data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
    </div>
    <!-- Excerpt -->
    <p class="dark-grey-text">{{$item->description}}</p>
    <!-- Post data -->
    <p>by <a class="font-weight-bold">{{$item->user->name}}</a>, {{Date('d / m / Y'), strtotime($item->created_at)}}</p>
    <!-- Read more button -->
    <a class="btn btn-primary btn-md" style="font-size:12px" href="{{url('blog/'.$item->id)}}">Read more</a>

  </div>
  <!-- Grid column -->

</div>
<!-- Grid row -->

<hr class="my-5">
@endforeach
{{ $news->links() }}
</section>
<!-- Section: Blog v.3 -->
    </div>
</main>
<div id="fb-root"></div>
@endsection

@section('css')
<style>
   li.page-item a, span {
    font-size: 2rem !important;
    }
</style>
@endsection
@section('script')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=543121906576699&autoLogAppEvents=1" nonce="0NTZma8a"></script>
@endsection