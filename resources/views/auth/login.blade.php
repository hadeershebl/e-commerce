@extends('layouts.auth-layout')

@section('content')
<div class="main">

    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                <figure>
                    <a href="{{ url('/') }}">
                    <img src="{{asset('img/login-user-photo.jpg')}}" alt="sing up image">
                    </a>
                </figure>
                    <a href="{{ route('register') }}"
                     class="signup-image-link">Create an user account</a>
                </div>
               
                <div class="signin-form">
                    <h2 class="form-title">Login as user</h2>
                    <form method="POST" class="register-form" id="login-form" 
                            action="{{ route('login') }}">
                       @csrf
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="email" id="your_name" placeholder="Your email" class=" @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required autocomplete="email" autofocus/>
                        
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" 
                            placeholder="Password" class="@error('password') is-invalid @enderror" required autocomplete="current-password"/>
                        
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('seller_login') }}" class="log-link">Login as vendor</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
    

   