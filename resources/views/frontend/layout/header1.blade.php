<!--Header-->
<style>
    .top-socials{
        font-size:20px;
    }
    .cartlink{
        position:relative;
         margin-right:10px;
    }
    .cartlink i{
        font-size:15px;
        color:white;
    }
    .align-items{
        align-items:center;
    }
    span.cart_item {
    position: absolute;
    top: -11px;
    right: -10px;
    background-color: #23527c;
    display: inline-block;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 10px;
   
}
</style>
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between w-100 justify-content-md-between">
        <div class="contact-info d-flex align-items-center flex-wrap">
            <div class='d-flex'>
                <a class="logo " href="{{ route('home_page') }}">
                    <img src="{{ asset('../asset2/images/logo-3.png') }}" class="img-fluid" alt="">

                </a>
                <div class="search-bar d-block m-auto m-lg-0 d-md-flex align-items-center">
                    <form class="form w-100" action="{{ route('search') }}" method="GET">
                        @csrf
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        <input class="text" name="search" value="{{ @$search }}" placeholder="Search"
                            required="" type="text">
                        <button class="reset" type="reset">
                            <i class="ri-close-fill"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="alert tobar_info">
                <a href="tel:+971567868955"><i class="fa fa-phone d-flex align-items-center"><span>+971567868955
                        </span></i></a>
                <a href="mailto:info@rizqel.com"><i
                        class="fa fa-envelope d-flex align-items-center"><span>info@rizqel.com</span></i></a>
            </div>
        </div>

        <div class="top-socials  d-flex align-items-center">
            <ul class="d-flex">
                <li >
                   

                </li>
                @if (Auth::user())
                    <li>

                        <a href="{{ route('logout') }}" style="margin-right:  10px;"
                            onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="fa-solid fa-user"></i>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="#" data-toggle="modal" style="margin-right:  10px;" data-target="#loginModal">
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#signupModal">
                            Signup
                        </a>
                    </li>
                @endif
                <li>
                    <a href="#">
                        <i class="fa fa-cart"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<header id="header" class="fixed-top d-flex align-items-center">
    <div
        class="container-fluid container-xl w-100 flex-wrap  justify-content-between d-flex align-items-center align-items justify-content-md-between">


        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">All Categories <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                      @foreach ($side_category as $side_items)
                      <li>
                        <a href="{{ route('category_all_products', $side_items->name) }}">

                          <div> {{ $side_items->name }}</div>
  
                      </a>
                      </li>
                      @endforeach

                    </ul>
                </li>
                <li><a class="nav-link scrollto " href="{{ route('home_page') }}">Home</a></li>
                <li class="d-flex flex-column flex-lg-row">
                    @foreach ($side_category as $side_items)
                        @if ($loop->iteration > 5)
                        @break
                    @endif


                    <a href="{{ route('category_all_products', $side_items->name) }}">

                        <div> {{ $side_items->name }}</div>

                    </a>
                @endforeach
            </li>
            <li><a class="nav-link scrollto" href="{{ route('products_page') }}">Product</a></li>
            <li><a class="nav-link scrollto" href="{{ route('contact_us') }}">Contact Us</a></li>

            <li><a class="nav-link scrollto" href="{{ route('orderslist') }}">Orders</a></li>
            <li><a class="nav-link scrollto" href="{{ route('aboutus') }}">About Us</a></li>
        </ul>
        <i class="ri-menu-2-line mobile-nav-toggle alert fa fa-bars d-block d-md-none"></i>
    </nav>

<div>
     <livewire:cartcount />
</div>
</div>
</header>
<!--Header-->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
aria-hidden="true">
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
                        <!-- <img src="{{ asset('../assets/assets/img/logo.png') }}" style="width:100px; height:100px;"> -->
                        <form method="POST" action="{{ route('userlogin') }}">
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
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <!-- Password input -->
                            <div class="form-group mb-4">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input id="login_password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

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
                            <button type="submit" class="btn btn-primary btn-block rounded-1 mb-4"
                                style="background-color:;">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>or sign up with:<a href="#" data-toggle="modal"
                                        data-target="#signupModal">Sign Up</a>
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
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
aria-hidden="true">
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
                <div class="p-5 bg-image"></div>
                <!-- Background image -->

                <div class="row d-flex justify-content-center popup">
                    <div class="w-60 mx-3">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="form-group">
                                <label class="form-label" for="form3Example1">Name</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>


                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>




                            <!-- Email input -->
                            <div class="form-group mb-4">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <!-- Password input -->
                            <div class="form-group mb-4">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-group mb-4">
                                <label class="form-label" for="form3Example4">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <!-- Checkbox
    <div class="form-check d-flex justify-content-center mb-4">
      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
      <label class="form-check-label" for="form2Example33">
        Subscribe to our newsletter
      </label>
    </div> -->

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block rounded-1 mb-4"
                                style="background-color:;">
                                {{ __('Register') }}
                            </button>



                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>or sign in with:<a href="#" data-toggle="modal"
                                        data-target="#loginModal">Sign In</a></p>


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
    document.addEventListener('DOMContentLoaded', function() {
        // Get references to the form and its input fields
        const form = document.querySelector('#signupModal form');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password-confirm');
        const submitButton = document.querySelector('#signupModal form button[type="submit"]');

        // Add blur event listeners to the input fields
        passwordInput.addEventListener('blur', validatePassword);
        confirmPasswordInput.addEventListener('blur', validateConfirmPassword);

        // Function to enable/disable the submit button based on validation
        function updateSubmitButton() {
            if (validateForm()) {
                submitButton.removeAttribute('disabled');
            } else {
                submitButton.setAttribute('disabled', 'disabled');
            }
        }

        // Add event listener to the form for submission
        form.addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission if validation fails
                // Optionally, you can also display error messages here
            }
        });

        // Function to validate the entire form
        function validateForm() {
            return validatePassword() && validateConfirmPassword();
        }

        // Function to validate the password field
        function validatePassword() {
            const passwordValue = passwordInput.value.trim();
            const errorElement = passwordInput.nextElementSibling;
            if (passwordValue.length < 8) {
                displayError(passwordInput, 'Password must be at least 8 characters long.');
                return false;
            }
            clearError(errorElement);
            return true;
        }

        // Function to validate the confirm password field
        function validateConfirmPassword() {
            const passwordValue = passwordInput.value.trim();
            const confirmPasswordValue = confirmPasswordInput.value.trim();
            const errorElement = confirmPasswordInput.nextElementSibling;
            if (confirmPasswordValue !== passwordValue) {
                displayError(confirmPasswordInput, 'Passwords do not match.');
                return false;
            }
            clearError(errorElement);
            return true;
        }

        // Function to display error messages below input fields
        function displayError(inputElement, errorMessage) {
            // Remove any existing error message
            clearError(inputElement.nextElementSibling);

            // Create and append the new error message
            const newErrorElement = document.createElement('div');
            newErrorElement.className = 'text-danger';
            newErrorElement.textContent = errorMessage;
            inputElement.parentNode.insertBefore(newErrorElement, inputElement.nextSibling);
        }

        // Function to clear error messages below input fields
        function clearError(errorElement) {
            if (errorElement && errorElement.classList.contains('text-danger')) {
                errorElement.remove();
            }
        }
    });
</script>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="fa fa-angle-up"></i></a>
<script src="{{ asset('./asset2/js/header.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the current URL
        var currentUrl = window.location.href;

        // Get all navigation links
        var navLinks = document.querySelectorAll('#navbar ul li a');

        // Loop through each navigation link
        navLinks.forEach(function(link) {
            // Check if the link's href matches the current URL
            if (link.href === currentUrl) {
                // Add the active class to the link
                link.classList.add('active');
            }
        });

        // If no link is active (e.g., when the page is loaded for the first time), add the active class to the "Home" link
        var activeLink = document.querySelector('#navbar ul li a.active');
        if (!activeLink) {
            document.querySelector('#navbar ul li:first-child a').classList.add('active');
        }
    });
</script>
