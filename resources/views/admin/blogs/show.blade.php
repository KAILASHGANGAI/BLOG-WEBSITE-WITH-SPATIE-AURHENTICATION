@extends('../layouts.admin')

@section('content')

<section class="container">
    <div>   
        Blogs
    </div>
    <div>
       <img src="{{asset($data->image)}}"  class="w-100" style="height: 30vh">
       <h2>{{$data->title}}</h2>
       <div>
        <span>Published By: {{$data->user_id}}</span> <br>
        <span>Published date: {{$data->created_at}}</span>
       </div>
       <div class="conrainer">
        <p>
            {!! $data->description !!}
        </p>
       </div>
    </div>
</section>
@endsection
