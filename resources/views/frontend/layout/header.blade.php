<div class="pull-right toggle-right-sidebar">
  
    </div>
    
    <div id="right-sidebar" class="right-sidebar-notifcations nav-collapse">
    <div class="bs-example bs-example-tabs right-sidebar-tab-notification" data-example-id="togglable-tabs">
    
 
            <!---<div class="responsive-icons">
                <a href="#url" class="desktop-mode">
                    <span class="w3l-icon -desktop">
                        <span class="fa fa-desktop"></span>
                    </span>
                </a>
                <a href="#url" class="tablet-mode">
                    <span class="w3l-icon -tablet">
                        <span class="fa fa-tablet"></span>
                    </span>
                </a>
                <a href="#url" class="mobile-mode no-margin-bottom">
                    <span class="w3l-icon -mobile">
                        <span class="fa fa-mobile"></span>
                    </span>
                </a>
            </div>-->
        </div>
        <div class="right-sidebar-panel-content animated fadeInRight" tabindex="5003"
            style="overflow: hidden; outline: none;">
        </div>
    </div>
    </div>
    </div>
    
    <!-- header -->
        <div class="agileits_header d-flex justify-content-between main-container-flex-column">
        <div class="d-flex justify-content-between flex-column w-60" id="headers">

            <div class="w3l_offers ">
                <a href="products.html">Today's special Offers !</a>
            </div>
            <div class="w3l_search ">
                <form action="{{route('search')}}" method="GET">
                  @csrf
                    <input type="text" name="search" value="{{@$search}}" placeholder="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
                    <input type="submit" value="">
                </form>
            </div>
        </div>
            <div class="d-flex flex-end  w-35">
            <div class="w3l_header_right mr-1">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                        <div class="mega-dropdown-menu">
                            <div class="w3ls_vegetables">
                                <ul class="dropdown-menu drp-mnu">
                                    <li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li> 
                                    <li><a href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a></li>
                                </ul>
                            </div>                  
                        </div>	
                    </li>
                </ul>
            </div>
            <livewire:cartcount /> 
            </div>
            <div class="clearfix"> </div>
        </div>
    <!-- script-for sticky-nav -->
        <script>
        $(document).ready(function() {
             var navoffeset=$(".agileits_header").offset().top;
             $(window).scroll(function(){
                var scrollpos=$(window).scrollTop(); 
                if(scrollpos >=navoffeset){
                    $(".agileits_header").addClass("fixed");
                }else{
                    $(".agileits_header").removeClass("fixed");
                }
             });
             
        });
        </script>
    <!-- //script-for sticky-nav -->
        <div class="logo_products">
            <div class="container">
                <div class="w3ls_logo_products_left logo">
                    <h1><a href="{{route('home_page')}}">
                        <img src="{{asset('./asset2/images/logo.png')}}" class="img-fluid" alt="">
                    </a></h1>
                </div>
                <div class="w3ls_logo_products_left1">
                    <ul class="special_items">
                        <li><a class="mr-1" href="{{route('products_page')}}">Products</a></li>
                        <li><a class="mr-1" href="{{route('contact_us')}}">Contact Us</a></li>
                        <li><a class="mr-1" href="{{route('complete_orders')}}">Complete Orders</a></li>
                        <li><a class="mr-1" href="services.html">Services</a></li>
                    </ul>
                </div>
                <div class="w3ls_logo_products_left1">
                    <ul class="phone_email">
                        <li><i class="fa fa-phone" aria-hidden="true"></i>+447481850121</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@delidove.com"><span class="__cf_email__" data-cfemail="info@delidove.com" style="color:white;">[info@delidove.com]</span></a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    <!-- //header -->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog w-50" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add your login form here -->
        <section class="text-center">
  <!-- Background image -->
      <div class="row d-flex justify-content-center popup">
        <div class="w-60 mx-3">
          <!-- <img src="{{asset('../assets/assets/img/logo.png')}}" style="width:100px; height:100px;"> -->
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <!-- <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control" />
                  <label class="form-label" for="form3Example1">First name</label>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example2" class="form-control" />
                  <label class="form-label" for="form3Example2">Last name</label>
                </div>
              </div>
            </div> -->

            <!-- Email input -->
            <div class="form-group mb-4"> 
                <label class="form-label" for="form3Example3">Email address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

            </div>

            <!-- Password input -->
            <div class="form-group mb-4">
                <label class="form-label" for="form3Example4">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
            </div>

            <!-- Checkbox
            <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
              <label class="form-check-label" for="form2Example33">
                Subscribe to our newsletter
              </label>
            </div> -->

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block rounded-1 mb-4" style="background-color:green;">
            {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

            <!-- Register buttons -->
            <div class="text-center">
              <p>or sign up with:<a href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a>
              </p>
             

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    
  
</section>
      </div>
    </div>
  </div>
</div>

<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add your signup form here -->
        <section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" ></div>
  <!-- Background image -->

      <div class="row d-flex justify-content-center popup">
        <div class="w-60 mx-3">
          <form method="POST" action="{{ route('register') }}">
           @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="form-group">
                    <label class="form-label" for="form3Example1">Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>


@error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                  
                </div>
              
            
           

            <!-- Email input -->
            <div class="form-group mb-4">
                <label class="form-label" for="form3Example3">Email address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

            </div>

            <!-- Password input -->
            <div class="form-group mb-4">
                <label class="form-label" for="form3Example4">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
            </div>

             <!-- Password input -->
             <div class="form-group mb-4">
                 <label class="form-label" for="form3Example4">Confirm Password</label>
             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <!-- Checkbox
            <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
              <label class="form-check-label" for="form2Example33">
                Subscribe to our newsletter
              </label>
            </div> -->

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block rounded-1 mb-4" style="background-color:green;">
            {{ __('Register') }}
                                </button>

                    

            <!-- Register buttons -->
            <div class="text-center">
              <p>or sign in with:<a href="#" data-toggle="modal" data-target="#loginModal">Sign In</a></p>
             

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
   
 
</section>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
      // Event listener for showing the login modal
      var loginModalTrigger = document.querySelector('[data-target="#loginModal"]');
      if (loginModalTrigger) {
        loginModalTrigger.addEventListener('click', function () {
          // Close the signup modal if open
          $('#signupModal').modal('hide');
          // Show the login modal after a delay
          setTimeout(function () {
            $('#loginModal').modal('show');
          }, 500);
        });
      }
  
      // Event listener for showing the signup modal
      var signupModalTrigger = document.querySelector('[data-target="#signupModal"]');
      if (signupModalTrigger) {
        signupModalTrigger.addEventListener('click', function () {
          // Close the login modal if open
          $('#loginModal').modal('hide');
          // Show the signup modal after a delay
          setTimeout(function () {
            $('#signupModal').modal('show');
          }, 500);
        });
      }
    });
  </script>
  
  