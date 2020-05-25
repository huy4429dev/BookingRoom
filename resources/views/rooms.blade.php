@extends('layouts.app')

@section('title','rooms')

@section('content')
<main class="blog">
    <div class="container">
        <h2 class="about__heading display-4 my-5 py-3">
            Phòng trọ
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
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="col-lg-7 col-xl-8">

    <!-- Post title -->
    <h3 class="font-weight-bold mb-3"><strong>{{$item->title}}</strong></h3>
    <!-- Excerpt -->
    <p class="dark-grey-text">{{$item->description}}</p>
    <!-- Post data -->
    <p>by <a class="font-weight-bold">{{$item->user->name}}</a>, {{Date('d / m / Y'), strtotime($item->created_at)}}</p>
    <!-- Read more button -->
    <a class="btn btn-primary btn-md" href="{{url('blog/'.$item->id)}}">Read more</a>

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
@endsection

@section('css')
<style>
   li.page-item a, span {
    font-size: 2rem !important;
    }
</style>
@endsection
@section('script')

@endsection