<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
      </head>
      <style>
        .dropdown-menu[data-bs-popper] {
          right: 0;
          left: auto;
        }
        .count{
          position: absolute;
          background: red;
          color: white;
          border-radius: 75%;
          padding: 2px;
          right: 8px;
          top: 10px;
          font-size: 8px;
        }
      </style>
    
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="container-fluid">
              <a class="navbar-brand bg-danger " href="#">MyBlog</a>
              <div class="dropdown">
                <div class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
                  <i class="fa-solid fa-bell"></i>
                  @if(count(auth()->user()->unreadnotifications))
                  <span class="count">{{count(auth()->user()->unreadnotifications)}}</span>
                  @endif
                </div>
                <ul class="dropdown-menu r-0" aria-labelledby="dropdownMenuButton1">
               
                      
                 @foreach (auth()->user()->unReadnotifications as $item)
                 <li>
                  <a class="dropdown-item bg-info" href="{{route('markedread',[$item->id])}}"> 
                    <span>New Blog is Posted By {{$item->data['auther']}} </span> <br>
                   Title :{{$item->data['title']}} <br>
                   
                  </a></li>

                    
                 @endforeach
                  <a class="" href="#">See All ..</a>
                </ul>
              </div>
            </div>
           
          </nav>
          {{-- sidebar --}}
          <div class="d-flex flex-column flex-shrink-0 bg-light sidenav" style="width: 8.5rem; height:100%;">
            <a href="/" class="d-block p-3 link-dark text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
              Dashboard
            </a>
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
              <li class="nav-item">
                <a href="#" class="nav-link active py-3 border-bottom" aria-current="page" title="Home" data-bs-toggle="tooltip" data-bs-placement="right">
                    Home
                </a>
              </li>
              <li>
                <a href="/admin/blogs" class="nav-link py-3 border-bottom" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                  Blogs
                  </a>
              </li>
              @can('super-admin')
              <li>
                <a href="/admin/category" class="nav-link py-3 border-bottom" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                  Category
                  </a>
              </li>
              <li>
                <a href="/admin/users" class="nav-link py-3 border-bottom" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                  Users
                  </a>
              </li>
              <li>
                <a href="/admin/roles" class="nav-link py-3 border-bottom" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right">
                    Roles
                </a>
              </li>
              <li>
                <a href="/admin/payments" class="nav-link py-3 border-bottom" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right">
                    Payments
                </a>
              </li>
              @endcan
              <li>
                <a href="/admin/notes" class="nav-link py-3 border-bottom" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right">
                    Notes
                </a>
              </li>
            </ul>
            <div class="dropdown border-top">
              <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
              </a>
              <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                <li class="text-center">{{Auth::user()->name}}</li> <hr>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/logout">Sign out</a></li>
              </ul>
            </div>
          </div>
            <main class="main">
                @yield('content')
            </main>
            <span class="open-button text-white" onclick="openForm()"><i class="fas fa-paper-plane"></i></span>

            <div class="chat-popup" id="myForm">
              <form class="form-container">          
               <div class="d-flex justify-content-between">
                <label for="msg"><b>Message</b></label>        
                <span  class="" onclick="closeForm()"><i class="fa-solid fa-xmark"></i></span>
               </div>

                <div class="message">
                  <div class="d-flex flex-row justify-content-start mb-4">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                      alt="avatar 1" style="width: 45px; height: 100%;">
                    <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                      <p class="small mb-0">Hello and thank you for visiting MDBootstrap. Please click the video
                        below.</p>
                    </div>
                  </div>


                  <div class="d-flex flex-row justify-content-end mb-4">
                    <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                      <p class="small mb-0">Thank you, I really like your product.</p>
                    </div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                      alt="avatar 1" style="width: 45px; height: 100%;">
                  </div>
                  <div class="d-flex flex-row justify-content-end mb-4">
                    <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                      <p class="small mb-0">Thank you, I really like your product.</p>
                    </div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                      alt="avatar 1" style="width: 45px; height: 100%;">
                  </div>
                  <div class="d-flex flex-row justify-content-end mb-4">
                    <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                      <p class="small mb-0">Thank you, I really like your product.</p>
                    </div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                      alt="avatar 1" style="width: 45px; height: 100%;">
                  </div>
                  <div class="d-flex flex-row justify-content-end mb-4">
                    <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                      <p class="small mb-0">Thank you, I really like your product.</p>
                    </div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                      alt="avatar 1" style="width: 45px; height: 100%;">
                  </div>
                </div>
                <div class="d-flex my-2 text-center">
                  <input type="text" class="form-control form-control-lg w-100" id="exampleFormControlInput1"
              placeholder="Type message">
                <button class="-3 submit-btn"><i class="fas fa-paper-plane"></i></button>
                </div>
              </form>
            </div>
<script>
  function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";

}
</script>

 
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body> 
</html>
