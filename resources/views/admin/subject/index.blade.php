@extends('../layouts/admin')
@section('content')
    <h2>Add subject / Cources</h2>
    {{ Session::get('status') }}
    <form class="d-flex "
        action="
    @isset($data)
    {{ route('subject.update') }}
    @else
    {{ route('subject.store') }}
    @endif
    " method="post">
        @csrf
      
        <div class="form-group mx-2">

            <label for="">Select Faculty / Cource</label> <br>
            @error('faculty_id')
                <br>  <span class="text-danger">{{ $message }}</span> <br>
                   @enderror
            <select name="faculty_id" id="">
                
                <option value="@if (isset($data)){{ $data->faculty->id }} @endif"> @if (isset($data)){{ $data->faculty->faculty_name }} @else {{ '--Select--' }}@endif</option>
               

                @foreach ($faculty as $item)
                <option value="{{ $item->id }}">{{ $item->faculty_name }}</option>
                    
                @endforeach

               
            </select>
        </div>
        <div class="form-group">
            <label for="">subject / Course name</label> <br>
            @error('subject_name')
                <br>  <span class="text-danger">{{ $message }}</span> <br>
                   @enderror 
            <input type="text" name="subject_name" id="" value="@if (isset($data)) {{ $data->subject_name }} @endif">
            @if (isset($data))
                <input type="hidden" name="id" value="{{ $data->id }}">
            @endif
            <input type="submit"
        value="save" class="btn btn-success">
        </div>
    </form>
    <table class="table">
        <tr>
            <th>S.N</th>
            <th>subject name</th>
            <th>Faculty / cources</th>
            <th>Action</th>
        </tr>
        @foreach ($subject as $key => $item)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $item->subject_name }}</td>
                <td>{{ $item->faculty->faculty_name }}</td>
                <td>
                    <a href="{{ route('subject.edit', [$item->id]) }}">Edit</a>
                    <a href="{{ route('subject.destroy', [$item->id]) }}">delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
