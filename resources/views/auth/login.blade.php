<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
    body{
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: url('https://i.ibb.co/yFWzhXd/login-3-bg.png');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    font-family: 'Roboto', sans-serif;
}

.form-2-wrapper {
    background: #9d00ff29;
    padding: 50px;
    border-radius: 8px;
    width:70%;
}
input.form-control{
    padding: 11px;
    border: none;
    border: 2px solid #405c7cb8;
    border-radius: 4px;
    background-color: transparent;
    font-family: Arial, Helvetica, sans-serif;
   
   
}
input.form-control:focus{
    box-shadow: none !important;
    outline: 0px !important;
    background-color: transparent;
}
button.login-btn{
    background: #b400ff;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 30px;
}
.register-test a{
    color: #000;
}
.social-login button{
    border-radius: 30px;
}
</style>
</head>
<body>
    <div class="container">
  <div class="row">
    <!-- Left Blank Side -->
    <div class="col-lg-6"></div>

    <!-- Right Side Form -->
    <div class="col-lg-6 d-flex align-items-center justify-content-center right-side">
      <div class="form-2-wrapper">
        <div class="logo text-center">
           <img src="{{asset('../asset2/images/logo-3.png')}}" style="width:140px; height:65px;">
        </div>
        <h4 class="text-center mb-4">Sign Into Your Account</h4>
                  <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="mb-3 form-box">
            <input placeholder="Enter Your Email"
            id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
            
            required>
            @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
          </div>
          <div class="mb-3">
            <input  placeholder="Enter Your Password"
            id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
          </div>
          <div class="mb-3">
            <div class="form-check">
              @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
            </div>

          </div>
          <button type="submit" class="btn btn-outline-secondary login-btn w-100 mb-3">{{ __('Login') }}</button>
            
         
        </form>

     
      </div>
    </div>
  </div>
</div>
    
    <!-- Section: Design Block -->


   <!-- Scripts -->

</body>
</html>
