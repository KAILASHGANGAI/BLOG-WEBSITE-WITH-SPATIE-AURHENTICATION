@extends('../../layouts.admin')

@section('content')
<a href="{{route('notes.create')}}">Add new Notes</a>

<table class="table">
    <tr>
        <th>S.N</th> <th>Title</th> <th>Faculty</th> <th>Subject</th>  <th>Action</th>
    </tr>
    @foreach($datas as $key=>$item)
    <tr>
        <td>{{++$key}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->faculty->faculty_name}}</td>
        <td>{{$item->subject->subject_name}}</td>
        <td>
            <a href="{{route('notes.show', [$item->id])}}">View</a>
            <a href="{{route('notes.edit', [$item->id])}}">Edit</a>
            <a href="{{route('notes.destroy', [$item->id])}}">delete</a>
        </td>
    </tr>
    @endforeach
</table>

@endsection
