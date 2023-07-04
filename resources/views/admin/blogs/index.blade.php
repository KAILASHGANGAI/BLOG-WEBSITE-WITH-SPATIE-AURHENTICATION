@extends('../layouts.admin')

@section('content')
<section class="container">
    <div>
        <a href="/admin/blogs/create">Add Blogs</a>
    </div> <hr>
  <table class="table">
<tr>
    <th>S.N</th> <th>Title</th> <th>Image</th> <th>User</th> <th>Action</th>
</tr>
@foreach ($datas as $key=>$data)
    <tr>
        <td>{{++$key}}</td>
        <td>{{$data->title}}</td>
        <td>
            <img src="{{asset($data->image)}}" alt="" height="100px" width="100px">
        </td>
        
            <td>{{$data->user_id}}</td>
        <td>
            <a href="/admin/blogs/delete/{{$data->id}}">delete</a>
            <a href="/admin/blogs/{{$data->id}}/edit">edit</a>
            <a href="/admin/blogs/{{$data->id}}">view</a>
        </td>
    </tr>
@endforeach
  </table>
</section>

@endsection
