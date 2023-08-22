@extends('../../layouts.admin')

@section('content')
@can('edit articles')
<a href="{{route('notes.create')}}">Add new Notes</a>
@endcan
<table class="table">
    <tr>
        <th>S.N</th> <th>Title</th> @can('edit artical')<th>Faculty</th> <th>Subject</th>@endcan <th>Type</th>  <th>Price</th> <th>Action</th>
    </tr>
   
    @foreach($datas as $key=>$item)
    <tr>
        <td>{{++$key}}</td>
        <td>{{$item->title}}</td>
        @can('edit artical')
        <td>{{$item->faculty->faculty_name}}</td>
        <td>{{$item->subject->subject_name}}</td>
        @endcan
        <td>{{$item->type}}</td>
        <td>{{$item->price}}</td>
        <td>
            @if($user_type == 'default')
            <a href="{{route('notes.show', [$item->note_id])}}">View</a>

            @else            
            <a href="{{route('notes.show', [$item->id])}}">View</a>
            @endif
            @can('edit artical')
            <a href="{{route('notes.edit', [$item->id])}}">Edit</a>
            <a href="{{route('notes.destroy', [$item->id])}}">delete</a>
            @endcan
        </td>
    </tr>
    @endforeach
</table>

@endsection
