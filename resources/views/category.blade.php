@extends('layouts.app')

@section('content')
<section class="text-center container">
    <h4 class="mb-5"><strong>Latest Blog posts of {{$category_name->categoryName}}</strong></h4>
@if(count($blogs) > 0)
    <div class="row">
  @foreach ($blogs as $blog)
      
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="{{'../../'.$blog->image}}" class="img-fluid" style="height: 250px" />
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
