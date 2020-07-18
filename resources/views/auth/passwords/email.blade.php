@extends('layouts.login')

@section('content')

<div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{ asset('img/c.png')}}" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <br>
                <br><br>
        <center><b><font color="#01f403">Forgot Password</font></b>
        </center>
        <br>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="forgot-password-form" class="text-left" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="etc-login-form">

                <p>Please Enter here your registered Email Id. We will 
send a reset password link via mail.</p>
            </div>
            <div class="login-form-main-message"></div>
             @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <div class="main-login-form">
                <div class="login-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="form-group">
                        <b><font color="#01f403">Email address</font></b>
                        <label for="fp_email" class="sr-only">Email address</label>
                        <input id="email" type="email" placeholder="Email address" class="form-control" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
            <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" name="button" class="btn login_btn">Submit</button>
                   </div>
                   <div class="mt-4">
            <div class="d-flex justify-content-center links">
                        <a href="{{ url('login') }}">Back To Login</a>
                                                  
                    </div>
        </form>
    </div>
                </div>
        
            </div>
        </div>
    </div>
@endsection
