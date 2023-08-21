@extends('layouts.app')

@section('content')
<style>
  .banner {

  background-color: #bdd4e7;
background-image: linear-gradient(315deg, #bdd4e7 0%, #8693ab 74%);

  color: #f1f1f1;
  height: 100vh;
}
.banner-container {
  height: 100vh;
}
.banner-row {
  align-items: center;
  height: 100vh;
  overflow:hidden;
}


@media screen and (min-width: 769px) {
  p {
    font-size: 1.2em;
  }
}
@media screen and (max-width: 768px) {
  .banner {
    padding: 2em;
    text-align: center;
  }
}
@media screen and (max-width: 567px) {
  .banner-img {
    width: 70%;
  }
}

</style>
@if(url()->full() == 'http://127.0.0.1:8000')
<section>
  <div class="banner ">
    <div class="container banner-container">
      <div class="banner-row row">
        <div class="col-sm-6 order-2 order-sm-1">
          <h1 class="fw-bold display-4">Write Your Blog here!</h1>
          <p>You don't need to read this. Now that you hav decided to read it anyways, its just some random dummy text to fill up the space for Bootstrap banner or hero section.</p>
          <a href="#" class="btn btn-light"> Learn More</a>
        </div>
        <div class="col-sm-6 order-1 order-sm-2">
          <img src="{{asset('image/banner/a.png')}}" class="banner-img img-fluid" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<section class="text-center container" id="blog">
    <h2 class="mb-5 pt-5"><strong>Latest Blog posts</strong></h2>
@if(count($blogs) > 0)
    <div class="row">
  @foreach ($blogs as $blog)
      
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="{{$blog->image}}" class="img-fluid" style="height: 250px" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$blog->title}}</h5>
            <div>
              <div class="d-flex justify-content-sm-between">
                @if($blog->type =='free')
                <span class="text-left text-info">{{ucfirst($blog->type)}}</span>
                @else
                <span class="text-left  text-success">{{ucfirst($blog->type)}}</span>
                <span class="text-left  text-success">Nrs.{{$blog->price}}/-</span>
              
                @endif
              </div>
  @php
  $start = strpos($blog->description, '<p>');
  $end = strpos($blog->description, '</p>', $start);
  $paragraph = substr($blog->description, $start, $end-$start+4);
      
  @endphp
  {!! $paragraph !!}
            </div>
            @if($blog->type =='free')
            <a href="/single-blog/{{$blog->id}}" class="btn btn-primary">Read more..</a>
            @else
            <a href="/choose-payment-methods/blog/{{$blog->id}}" class="btn btn-danger">Buy Now!</a>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @if($blogs instanceof \Illuminate\Pagination\LengthAwarePaginator )

    {{$blogs->links()}}
 
    @endif 
  </section>
  
  @else
    <h1>Result Not Found !!</h1>
  @endif
@endsection
