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
    <center class="mt-4"><b><font color="#01f403">Login</font></b>
    </center>
    <br>
  <!-- Main Form -->
  <div class="login-form-1">
    <form method="POST" action="{{ route('login') }}" id="forgot-password-form" class="text-left">
     {{ csrf_field() }}

      <div class="main-login-form">
            <div class="login-group">
          <div class="form-group">
              <b><font color="#01f403">Email address</font></b>
          
            <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->email }}</strong>
                            </span>
                        @endif
          </div>
        </div>
        <div class="login-group">
          <div class="form-group">
              <b><font color="#01f403">Password</font></b>
          
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            @if($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->passsword }}</strong>
            </span>
            @endif
          </div>
        </div>
          <div class="d-flex  links">
            <a href="{{ route('password.request')}}"><u>Can't Login?</u></a>
          </div>
      <div class="d-flex justify-content-center mt-3 login_container">
          <button type="submit" name="button" class="btn login_btn">Submit</button>
           </div>
           <div class="mt-4">
           </form>
           </div>
          </div>
      </div>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>
@endsection
