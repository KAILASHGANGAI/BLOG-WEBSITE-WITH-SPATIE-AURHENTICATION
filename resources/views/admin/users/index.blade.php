@extends('../layouts.admin')

@section('content')
<section class="container">
    @can('edit articles')
        
    
    <div>
        <a href="/admin/users/create">Add users</a>
    </div> 
    <form action="{{ route('import') }}" class="float-end d-flex" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
            <div class="custom-file text-left">
                <input type="file" name="file" class="custom-file-input" id="customFile">
            </div>
        </div>
        <button class="btn btn-primary mx-3">Import Users</button>
        <a class="btn btn-success" href="{{ route('export-users') }}">Export Users</a>
    </form>
  
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

  {{$datas->links()}}
</section>

@endsection
