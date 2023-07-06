@extends('../layouts.admin')

@section('content')
<section class="container">
    <form action="@isset($data) {{'/admin/blogs/'.$data->id}}  @else  {{'/admin/blogs/store'}}  @endif" method="POST"  enctype="multipart/form-data">
    @csrf
       <div class="row">
        <div class="form-group col-sm-6">
            <label for="">Title</label> <br>
            <input type="text" class="form-control" name="title" id="" @isset($data) value="{{$data->title}}"    @endif >
            @error('title')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-sm-6">
            <label for="">Image</label> <br>
            <input type="file" class="form-control" name="image" id="">
                 @isset($data) 
                     <img src="{{asset($data->image)}}" alt="" height="100px" width="100px">
                 @endif
            @error('image')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group col-sm-6">
            <label for="#"> Blog Types</label> <br>
            <select name="type" id="" class="form-control">
              
                <option value="@isset($data->type) {{$data->type}} @else {{ ''}} @endif">@isset($data->type) {{$data->type}} @else {{'Choose'}} @endif</option>
                  
          
                <option value="free">Free</option>
                <option value="paid">Paied</option>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label for="#">Price</label> <br>
            <input type="text" name="price" id="" class="form-control">
        </div>
        <div class="form-group">
            
                <label for="">description</label> <br>
                @error('description')
            <span class="text-danger">{{$message}}</span> <br>
        @enderror
                <textarea class="form-control" name="description" id="mytextarea" >
                    @isset($data) {{$data->description}}    @endif
                </textarea>
                
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
       </div>
    </form>
</section>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
        selector: '#mytextarea'
      });
 </script>
@endsection
