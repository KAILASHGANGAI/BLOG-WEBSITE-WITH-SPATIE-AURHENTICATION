@extends('../layouts.admin')

@section('content')
<section class="container">
   
    <table class="table">
        <tr>
            <th>S.N</th> <th>Roles Name</th> <th>Permissions</th>
        </tr>
        @foreach ($roles as $key=>$role)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$role->name}}</td>
                    <td>
                        <ul>
                            @if ( count($role->permissions) == 0 &&  $role->name === "Super-Admin")
                                {{'all'}}
                            @endif
                            @foreach ($role->permissions as $permission)
                                <li>{{$permission->name}}</li>
                            @endforeach
                        </ul>
                        
                    </td>
                </tr>
        @endforeach
    </table>
 
</section>
@endsection
