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
    <th>S.N</th> <th>Title</th> <th>Image</th> @if($user_type != 'default')  <th>User</th> <th>Category</th> @endif <th>Type</th>  <th>Price</th> <th>Action</th>
</tr>
@foreach ($datas as $key=>$data)
    <tr>
        <td>{{++$key}}</td>
        <td>{{$data->title}}</td>
        <td>
            <img src="{{ asset($data->image)}}" alt="" height="100px" width="100px">
        </td>
        @if($user_type != 'default')            
        <td>{{$data->users->name}}</td>
        <td>{{$data->category->categoryName}}</td>
        @endif
            <td>{{$data->type}}</td>
             
            

            <td>{{$data->price}}</td>
        <td>
            @can('edit articles')
            <a href="/admin/blogs/delete/{{$data->id}}">delete</a>
            @endcan

            @can('edit articles')
            <a href="/admin/blogs/{{$data->id}}/edit">edit</a>
            @endcan
            @can('publish articles')
            @if ($data->status == 0)
            <a href="/admin/blogs/publish/{{$data->id}}" class="text-danger">Publish</a>
                @else 
                <a href="/admin/blogs/publish/{{$data->id}}" class="text-success">unPublish</a>
            @endif

            @endcan

            @if($user_type == 'default')
            <a href="/admin/blogs/{{$data->blog_id}}">view</a>

            @else            
            <a href="/admin/blogs/{{$data->id}}">view</a>
            @endif
        </td>
    </tr>
@endforeach
  </table>
 
</section>
@if($user_type != 'default')
<div class="d-flex justify-content-center">
    {!! $datas->links() !!}
</div>
@endif
@endsection
