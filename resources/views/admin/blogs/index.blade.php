@extends('../layouts.admin')

@section('content')

<section class="container">
    @can('edit articles')
        
    
    <div>
        <a href="/admin/blogs/create">Add Blogs</a>
    </div> <hr>
    @endcan
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
            @can('edit articles')
            <a href="/admin/blogs/delete/{{$data->id}}">delete</a>
            @endcan

            @can('edit articles')
            <a href="/admin/blogs/{{$data->id}}/edit">edit</a>
            @endcan
            @can('publish articles')
            @if ($data->status == 0)
            <a href="/admin/blogs/publish/{{$data->id}}">Publish</a>
                @else 
                <a href="/admin/blogs/publish/{{$data->id}}">unPublish</a>

            @endif

            @endcan
            
            <a href="/admin/blogs/{{$data->id}}">view</a>
            
        </td>
    </tr>
@endforeach
  </table>
</section>

@endsection
