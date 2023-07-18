<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.5.1/tinymce.min.js" integrity="sha512-UhysBLt7bspJ0yBkIxTrdubkLVd4qqE4Ek7k22ijq/ZAYe0aadTVXZzFSIwgC9VYnJabw7kg9UMBsiLC77LXyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow sticky-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">MyBlog</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                
                  @auth
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="/admin/dashboard">Dashboard</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="/logout">LogOut</a></li>
                    </ul>
                  </li>
                  @endauth
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      @foreach ($categories as $category)

                      <li><a class="dropdown-item" href="/blog/category/{{$category->id}}">{{$category->categoryName}}</a></li>
                          
                      @endforeach
                      
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('notes')}}">Notes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('notes')}}">Loke Sewa Aaayog</a>
                  </li>
                </ul>
                @if (!Auth::user())
                <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                <li class="nav-item">
                  <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('register')}}" tabindex="-1" aria-disabled="true">Register</a>
                </li>
                </ul>
               @endif
                <form class="d-flex" action="/search-blog" method="post">
                  @csrf
                  <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
            <main>
                @yield('content')
            </main>
            <footer class="bg-white text-center text-lg-start" style="box-shadow: 0 0 2px 2px  black;">
              <!-- Copyright -->
              <div class="text-center p-3" style="">
                © 2023 Copyright:
                <a class="text-dark" href="#">kailash.com</a>
              </div>
              <!-- Copyright -->
            </footer>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body> 
</html>
