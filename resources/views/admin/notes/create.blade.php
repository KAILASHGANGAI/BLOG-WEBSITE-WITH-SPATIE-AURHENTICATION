@extends('layouts.admin')

@section('content')
    <h1>
        Add Notes Here!!</h1>
{{Session::get('status')}}
    <div class="container">
        <form action="@if (isset($data)) {{ route('notes.update') }} @else{{ route('notes.store') }} @endif" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($data))
                <input type="hidden" name="id" value="{{$data->id}}">
            @endif
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Faculty / Cources</label> <br>
                        <select class="form-control" name="faculty" id="">
                            <option value="@if (isset($data)) {{ $data->faculty->id }} @endif">
                                @if (isset($data))
                                    {{ $data->faculty->faculty_name }}
                                @else
                                    {{ '--Select--' }}
                                @endif
                            </option>


                            @foreach ($faculty as $item)
                                <option value="{{ $item->id }}">{{ $item->faculty_name }}</option>
                            @endforeach


                        </select>
                        @error('faculty') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Subject</label> <br>
                        <select class="form-control" name="subject" id="">
                            <option value="@if (isset($data)) {{ $data->subject->id }} @endif">
                                @if (isset($data))
                                    {{ $data->subject->subject_name }}
                                @else
                                    {{ '--Select--' }}
                                @endif
                            </option>
                            @foreach ($subject as $item)
                                <option value="{{ $item->id }}">{{ $item->subject_name }}</option>
                            @endforeach


                        </select>
                        @error('subject') <span class="text-danger">{{$message}}</span> @enderror

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Title </label> <br>
                        <input class="form-control" type="text" name="title" value="@if (isset($data)) {{ $data->title }} @endif">
                        @error('title') <span class="text-danger">{{$message}}</span> @enderror

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Attach File</label> <br>
                        <input class="form-control" type="file" name="file">
                        @error('file') <span class="text-danger">{{$message}}</span> @enderror

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Description </label> <br>
                        @error('description') <span class="text-danger">{{$message}}</span> @enderror

                        <textarea class="form-control" name="description" id="mytextarea" >
                            @isset($data) {{$data->description}}    @endif
                        </textarea>                   
                     </div>
                </div>
                <div class="col-sm-3">
                    <input type="submit" value="save" class="btn btn-success">
                </div>
            </div>
        </form>

    </div>
    <script src="https://cdn.tiny.cloud/1/17vw4tb4bqnyig42ppb7v631gii7g5n6s9yk8be02f7rq7uw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script> 
tinymce.init({
        selector: '#mytextarea'
      });
 </script>
@endsection
