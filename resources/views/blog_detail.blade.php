@extends('layouts.app')

@section('content')
<main class="blog-detail" style="margin-top:80px">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2 class="about__heading display-4 my-5 py-3">
            {{$new->title}}
        </h2>
        <div class="fb-like" data-href='{{url("/blog/$new->id")}}' data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
      </div>
<section class="my-5">

<!-- Grid row -->
<div class="row">

  <!-- Grid column -->
  <div class="col-md-12">

    <!-- Card -->
    <div class="card card-cascade wider reverse">

      <!-- Card image -->
      <div class="view view-cascade overlay">
        <img class="card-img-top" src="{{url('uploads/images/'.$new->thumbnail)}}" alt="Sample image">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!-- Card content -->
      <div class="card-body card-body-cascade text-center">

        <!-- Title -->
        <h2 class="font-weight-bold"><a>{{$new->title}}</a></h2>
        <!-- Data -->
        <p> Tác giả: <a><strong> {{$new->user->name}}</strong></a>,    {{Date('d / m / Y'),strtotime($new->create_at)}}</p>

      </div>
      <!-- Card content -->

    </div>
    <!-- Card -->

    <!-- Excerpt -->
    <div class="mt-5">
        {{$new->description}}
        {{$new->content}}
    </div>
    <div class="fb-comments" data-href='{{url("/blog/$new->id")}}' data-numposts="5" data-width="100%"></div>
  </div>
  <!-- Grid column -->

</div>

</section>
<!-- Section: Blog v.4 -->
    </div>
</main>
@endsection
@section('script')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=543121906576699&autoLogAppEvents=1" nonce="0NTZma8a"></script>
@endsection