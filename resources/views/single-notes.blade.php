@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$data->title}}</h1>
<h3>faculty: {{$data->faculty->faculty_name}}</h3>
<h3>subject: {{$data->subject->subject_name}}</h3>
<p>{!! $data->description !!}</p>
{{$data}}
@if($data->type == 'free')
<embed src="{{asset($data->files.'#toolbar=0')}}" class="w-100" style="height:600px;">
    @else
    <a href="/choose-payment-methods/{{$data->id}}" class="btn btn-danger">Buy Now!</a>
    @endif
</div>

@endsection
