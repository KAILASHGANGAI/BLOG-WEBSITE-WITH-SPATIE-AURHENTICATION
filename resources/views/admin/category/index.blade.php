@extends('../layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto">
            {{Session::get('status')}}
         
            <form action="@isset($id){{'/admin/category/update'}} @else {{'/admin/category/store'}} @endif" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Category Name</label> <br>
                    @error('name')
                       
                    <span class="text-danger">{{$message}}</span>
                   @enderror
                    <div class="d-flex">
                    <input type="text" name="name" value=" @isset($id){{$id->categoryName}} @endif" class="form-control" placeholder="category name...">
                        
                    @isset($id)
                            <input type="hidden" name="id" value="{{$id->id}}">
                    @endif

                    <input type="submit" value="Save" class="btn btn-success mx-4">
                </div>

                </div>
            </form>
        </div>
    </div> <hr>
    <table class="table">
        <tr>
            <th>S.N</th> <th>Category Name</th> <th>Created At</th> <th>Aaction</th>
        </tr>
        @foreach ($data as $key=>$item)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$item->categoryName}}</td>
                <td>{{$item->created_at}}</td>
                <td>
                    <a href="/admin/category/{{$item->id}}/edit">edit</a>
                     <a href="/admin/category/delete/{{$item->id}}">delete</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection
