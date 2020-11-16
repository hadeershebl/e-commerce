@extends('layouts.auth-layout')

@section('content')

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up as seller</h2>
                        <form method="POST" action="{{ route('create_seller') }}" class="register-form" id="register-form" enctype="multipart/form-data">
                            @csrf
                            {{-- name section --}}
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus/>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            {{-- email section --}}
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"
                                value="{{ old('email') }}" required autocomplete="email"/>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            {{-- avatar section --}}
                            <div class="form-group">
                                <div class="">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input id="avatar" type="file" 
                                    class="custom-file-input @error('avatar') is-invalid @enderror" 
                                    name="avatar">
    
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- password section --}}
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"
                                name="password" required autocomplete="new-password"/>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                 {{-- password_confirmation section --}}
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" id="re_pass" 
                                placeholder="Repeat your password"
                                name="password_confirmation" required autocomplete="new-password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>


                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" 
                                value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure> 
                            <a href="{{ url('/') }}">
                            <img src="{{asset('img/login-seller-photo.jpg')}}"
                               alt="sing up image">
                            </a>
                        </figure>
                        <a href="{{route('seller_login')}}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

        
@endsection