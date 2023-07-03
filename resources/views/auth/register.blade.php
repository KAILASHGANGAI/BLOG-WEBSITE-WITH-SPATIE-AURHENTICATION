<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
   <div class="container">
    <div class="row">
 
     <div class="col-sm-6 mx-auto shadow p-2 mt-3">
        <form class="mx-1 mx-md-4" action="/register-save" method="post">
          @csrf
        <h2 class="text-center">Login Page</h2>
          
            <div class=" align-items-center">
              @error('name')
                 <span class="text-danger">{{ $message }}</span>
               @enderror 
               <div class="form-outline flex-fill mb-0">
                <input type="text" id="form3Example1c" name="name" class="form-control" />
                <label class="form-label" for="form3Example1c">Your Name <span class="text-danger">*</span></label>
              </div>
            </div>

            <div class=" align-items-center"> 
              @error('email')
                 <span class="text-danger">{{ $message }}</span>
               @enderror
              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <input type="email" name="email" id="form3Example3c" class="form-control" />
                <label class="form-label" for="form3Example3c">Your Email <span class="text-danger">*</span></label>
              </div>
            </div>
            <div class=" align-items-center"> 
              @error('phone')
                 <span class="text-danger">{{ $message }}</span>
               @enderror
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <input type="text" name="phone" id="form3Example3c" class="form-control" />
                  <label class="form-label" for="form3Example3c">Your phone <span class="text-danger">*</span></label>
                </div>
              </div>
            <div class=" align-items-center"> 
              @error('password')
                 <span class="text-danger">{{ $message }}</span>
               @enderror
              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <input type="password" name="password" id="form3Example4c" class="form-control" />
                <label class="form-label"  for="form3Example4c">Password <span class="text-danger">*</span></label>
              </div>
            </div>

            <div class=" align-items-center"> 
              @error('password_confirmation')
                 <span class="text-danger">{{ $message }}</span>
               @enderror
              <i class="fas fa-key fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <input type="password" name="password_confirmation" id="form3Example4cd" class="form-control" />
                <label class="form-label" for="form3Example4cd">Repeat your password <span class="text-danger">*</span></label>
              </div>
            </div>

            <div class="form-check d-flex justify-content-center mb-5">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
              <label class="form-check-label" for="form2Example3">
                I agree all statements in <a href="#!">Terms of service</a>
              </label>
            </div>

            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <button type="submit" class="btn btn-primary btn-lg">Register</button>
            </div>

          </form>
     </div>
    </div>

   </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        
</body>
</html>