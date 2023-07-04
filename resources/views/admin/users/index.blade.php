@extends('../layouts.admin')

@section('content')
<section class="container">
    @can('edit articles')
        
    
    <div>
        <a href="/admin/users/create">Add users</a>
    </div> <hr>
    @endcan
  <table class="table">
<tr>
    <th>S.N</th> <th>Name</th> <th>Email</th> <th>Phone</th> <th>Role</th><th>Action</th>
</tr>
@foreach ($datas as $key=>$data)
    <tr>
        <td>{{++$key}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->phone}}</td>
        <td>
            @foreach($data->roles as $role)
                {{$role->name}}
            @endforeach 
        
        </td>
        <td>
            @can('edit articles')
            <a href="/admin/users/delete/{{$data->id}}">delete</a>
            @endcan

            @can('edit articles')
            <a href="/admin/users/{{$data->id}}/edit">edit</a>
            @endcan
           
            
            <a href="/admin/users/{{$data->id}}">view</a>
            
        </td>
    </tr>
@endforeach
  </table>
</section>

@endsection
