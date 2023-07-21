@extends('../layouts/admin')
@section('content')
    <h2>Add FAculty / Cources</h2>
    {{Session::get('status')}}
    <form action="
    @isset($data)
    {{route('faculty.update')}}
    @else
    {{route('faculty.store')}}
    @endif
    " method="post">
        @csrf
        <div class="form-group">
            <label for="">Faculty / Course name</label> <br>
            @error('faculty_name')
                       
                  <br>  <span class="text-danger">{{$message}}</span> <br>
                   @enderror 
            <input type="text" name="faculty_name" id="" value="@if(isset($data)) {{$data->faculty_name}} @endif">
            @if (isset($data))
                <input type="hidden" name="id" value="{{$data->id}}">
            @endif
            <input type="submit" value="save" class="btn btn-success">
        </div>
    </form>
    <table class="table">
        <tr>
            <th>S.N</th> <th>Faculty / Cources</th> <th>Action</th>
        </tr>
        @foreach ($faculty as $key=>$item)
            <tr>
                <td>{{++$key}}</td> <td>{{$item->faculty_name}}</td> 
                <td>
                    <a href="{{route('faculty.edit', [$item->id])}}">Edit</a>
                    <a href="{{route('faculty.destroy', [$item->id])}}">delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection