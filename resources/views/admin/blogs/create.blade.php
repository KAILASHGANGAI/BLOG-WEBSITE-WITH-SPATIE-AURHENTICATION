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
        <div class="form-group col-sm-4">
            <label for="#"> Blog Types</label> <br>
            <select name="type" id="" class="form-control">
              
                <option value="@isset($data->type) {{$data->type}} @else {{ ''}} @endif">@isset($data->type) {{$data->type}} @else {{'Choose'}} @endif</option>
                  
          
                <option value="free">Free</option>
                <option value="paid">Paied</option>
            </select>
        </div>
        <div class="form-group col-sm-4">
            <label for="#"> Choose Category</label> <br>
            <select name="category_id" id="" class="form-control">
              
             <option value="@isset($data->category_id) {{$data->category_id}} @else {{ ''}} @endif">@isset($data->category_id) {{$data->category->categoryName}} @else {{'Choose'}} @endif</option>
                  
          @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->categoryName}}</option>
              
          @endforeach
               
            </select>
            @error('category_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-sm-4">
            <label for="#">Price</label> <br>
            <input type="text" name="price" id="" class="form-control" value="@isset($data) {{$data->price}}    @endif">
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
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
       </div>
    </form>
</section>
<script src="https://cdn.tiny.cloud/1/17vw4tb4bqnyig42ppb7v631gii7g5n6s9yk8be02f7rq7uw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script> 
tinymce.init({
        selector: '#mytextarea'
      });
 </script>
@endsection
