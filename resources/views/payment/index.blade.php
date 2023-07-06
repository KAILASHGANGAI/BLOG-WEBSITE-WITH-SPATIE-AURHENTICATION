@extends('layouts.admin')

@section('content')

<section class="container-fluid">
    <h1>Payment Details</h1>
</section>

<table class="table border">
   <tr> <th>S.N</th> <th>Name</th> <th>Contact</th><th>Amount</th> <th>Status</th> <th>Blog Title</th>  <th>Date</th> </tr>
@php
     $total = 0;
@endphp
   @foreach ($datas as $key=>$item)
      <tr>
            <td>{{++$key}}</td>
            <td>{{$item->username}}</td>
            <td>{{$item->users->phone}}</td>
            <td>{{$item->amount}}</td>
            <td>{{$item->esewa_status}}</td>
            <td>{{$item->blogs->title}}</td>
            <td>{{$item->created_at}}</td>
            @php
                if ($item->esewa_status == 'verified') {
                    $total = $total +  $item->amount;
                    
                } 
            @endphp

    </tr> 
   @endforeach

    <tr>
        <td colspan="3">Total  Received: </td> <td>Nrs. {{$total}}</td>
    </tr>
</table>

@endsection
