@extends('layouts.app')

@section('content')
@if(Session::get('status'))
 <div class="alert alert-success alert-dismissible">
   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
   <strong>Success!</strong> {{Session::get('status')}}
 </div>
@endif
<p>This is my body content.</p>

@endsection
