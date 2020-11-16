<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Food</title>
            <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

           

            
    </head>
    <body>
        {{-- nav bar section --}}
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-base shadow-sm">
            <div class="container">
            @if (Route::has('login'))
            <a class="navbar-brand" style="color:white; font-size:16pt; font-weight:bold" href="{{url('/')}}">
                <img src="/img/logo.jpg" width="40" height="40"
                 style="border-radius: 50%" alt="" loading="lazy">
                 Food
            </a>
       
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto mr-4 ">
                @auth 
                <li class="nav-item active">
                    <a class="nav-link" style="color:white; font-size:16pt; font-weight:bold" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
                  </li>
    
                  {{-- if authenticated user is seller --}}
                @elseif (Auth::guard('seller')->check())
                   <li class="nav-item active">
                    <a class="nav-link" style="color:white; font-size:16pt; font-weight:bold" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
                  </li>
                   @else
                <li class="nav-item dropdown ">
                    <a class="nav-link btn bg-two text-dark dropdown-toggle"
                     href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                     aria-haspopup="true" aria-expanded="false">
                      Login
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('login') }}">As user</a>
                      <a class="dropdown-item" href="{{ route('seller_login')}}">As seller</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Register
                    </a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('register') }}">As user</a>
                      <a class="dropdown-item" href="{{ route('show_seller_registeration_page') }}">As seller</a>
                    </div>
                  </li>
                 
              </ul>
              @endauth
            </div>
            @endif
            </div>
        </nav>
      
    

    </body>
</html>
