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
 
     <div class="col-sm-4 mx-auto shadow p-2 mt-5">
    <h2 class="text-center">Login Page</h2>
     @if(Session::get('status'))
         
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Success!</strong> {{Session::get('status')}}
        </div>
        @endif

         <form action="login-check" method="post">
            @csrf
             <!-- Email input -->
             <div class="form-outline mb-4">
              @error('email')
              <span class="text-danger">{{ $message }}</span>
              @enderror
               <input type="email" id="form2Example1" name="email" class="form-control" />
               <label class="form-label"  for="form2Example1">Email address</label>
             </div>
           
             <!-- Password input -->
             <div class="form-outline mb-4">
              @error('password')
              <span class="text-danger">{{ $message }}</span>
              @enderror
               <input type="password" id="form2Example2" name="password" class="form-control" />
               <label class="form-label"  for="form2Example2">Password</label>
             </div>
           
             <!-- 2 column grid layout for inline styling -->
             <div class="row mb-4">
               <div class="col d-flex justify-content-center">
                 <!-- Checkbox -->
                 <div class="form-check">
                   <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                   <label class="form-check-label" for="form2Example31"> Remember me </label>
                 </div>
               </div>
           
               <div class="col">
                 <!-- Simple link -->
                 <a href="#!">Forgot password?</a>
               </div>
             </div>
           
             <!-- Submit button -->
             <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
           
             <!-- Register buttons -->
             <div class="text-center">
               <p>Not a member? <a href="/register">Register</a></p>
             
             </div>
           </form>
     </div>
    </div>
   </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        
</body>
</html>