<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Food</title>

    <!-- Font Icon -->
<link rel="stylesheet" href="{{asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
<link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>

    
    <a  style="color:#eb6c0d ; font-size:14pt;
     margin-left:5%; text-decoration:none; display: flex; " 
        href="{{ url('/') }}">
        <img src="/img/logo.jpg" width="60" height="10" 
        style="border-radius: 50%" alt="" loading="lazy">        
        <h3 >Food</h3>
    </a>
            @yield('content')


        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
