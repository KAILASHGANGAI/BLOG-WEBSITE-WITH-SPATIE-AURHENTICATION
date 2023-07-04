@extends('../layouts.admin')

@section('content')

<section class="container">
    <div class="col-sm-12 mx-auto shadow p-2 mt-3">
        <form class="mx-1 mx-md-4 row" action="/admin/users-save/{{$data->id}}" method="post">
          @csrf
        <h2 class="text-center">Users Page</h2>
        @if(Session::get('status'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Success!</strong> {{Session::get('status')}}
        </div>
        @endif
          
            <div class=" align-items-center col-sm-6">
              @error('name')
                 <span class="text-danger">{{ $message }}</span>
               @enderror 
               <div class="form-outline flex-fill mb-0">
                <input type="text" id="form3Example1c" name="name" class="form-control" @isset($data) value="{{$data->name}}"    @endif />
                <label class="form-label" for="form3Example1c">Your Name <span class="text-danger">*</span></label>
              </div>
            </div>

            <div class=" align-items-center col-sm-6"> 
              @error('email')
                 <span class="text-danger">{{ $message }}</span>
               @enderror
             
              <div class="form-outline flex-fill mb-0">
                <input type="email" name="email" id="form3Example3c" class="form-control"@isset($data) value="{{$data->email}}"    @endif />
                <label class="form-label" for="form3Example3c">Your Email <span class="text-danger" >*</span></label>
              </div>
            </div>
            <div class=" align-items-center col-sm-6"> 
              @error('phone')
                 <span class="text-danger">{{ $message }}</span>
               @enderror
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <input type="text" name="phone" id="form3Example3c" class="form-control"@isset($data) value="{{$data->phone}}"    @endif />
                  <label class="form-label" for="form3Example3c">Your phone <span class="text-danger">*</span></label>
                </div>
              </div>
           
            
          <div class="col-sm-6">
            <label for="">Select the Role</label>
            <select name="role" id="" class="form-control">
                @if (count($data->roles) > 0)
                  <option value="@isset($data->roles){{$data->roles[0]->id}} @endif">@isset($data->roles) {{$data->roles[0]->name}} @else {{'Choose'}} @endif</option>
                    @else
                   <option value="">Choose</option>
                @endif
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
          </div>

           

            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <button type="submit" class="btn btn-primary btn-lg">Register</button>
            </div>

          </form>
     </div>
</section>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
        selector: '#mytextarea'
      });
 </script>
@endsection
