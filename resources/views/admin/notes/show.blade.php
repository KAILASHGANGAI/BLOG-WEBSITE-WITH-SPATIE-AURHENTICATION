@extends('layouts.admin')

@section('content')

<h1>{{$data->title}}</h1>
<h3>faculty: {{$data->faculty->faculty_name}}</h3>
<h3>subject: {{$data->subject->subject_name}}</h3>
<p>{!! $data->description !!}</p>

<embed src="{{asset($data->files.'#toolbar=0')}}" class="w-100" style="height:600px;">

@endsection
