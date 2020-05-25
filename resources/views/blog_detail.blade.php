@extends('layouts.app')

@section('content')
<main class="blog-detail" style="margin-top:80px">
    <div class="container">
        <h2 class="about__heading display-4 my-5 py-3">
            {{$new->title}}
        </h2>
        <!-- Section: Blog v.3 -->
        <!-- Section: Blog v.4 -->
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

  </div>
  <!-- Grid column -->

</div>

</section>
<!-- Section: Blog v.4 -->
    </div>
</main>
@endsection