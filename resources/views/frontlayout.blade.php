<!-- header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
  <!-- Bootsrap CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('lib')}}/bs4/bootstrap.min.css"/>
  <!-- Jquery -->
  <link rel="stylesheet" type="text/javascript" href="{{asset('lib')}}/jquery-3.6.0.min.js">
  <!-- Bs4 js -->
  <link rel="stylesheet" type="text/css" href="{{asset('lib')}}/bs4/bootstrap.bundle.min.js"/>

</head>
<body>
   
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
             <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/all-categories')}}">Categories</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{url('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('register')}}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/login')}}">Admin</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{url('save-post-form')}}">Add Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('manage-posts')}}">Manage Post</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" href="{{url('logout')}}">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
                </form>
                @endguest
                </ul>
             </div>
      </div>
</nav>
<!-- get latest post     -->
<main class="container mt-4">
<!-- Content -->

@yield('content')




<!-- footer -->
</main>
</body>
</html>