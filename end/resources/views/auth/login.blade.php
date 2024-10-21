<!DOCTYPE html>
<html lang="en" data-layout="horizontal" data-bs-theme="light" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Smart Trade | Trade Bot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('uploads/configration/'. $configration->fav_icon)}}">

    <!--Swiper slider css-->
    <link href="{{asset('dashboard/assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{asset('dashboard/assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('dashboard/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('dashboard/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('dashboard/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('dashboard/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body oncontextmenu="return false">
    {{ session('registration_code') }}

    <section class="auth-page-wrapper py-5 position-relative d-flex align-i tems-center justify-content-center min-vh-100 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-0">
                                <div class="col-lg-5">
                                    <div class="card auth-card bg-primary h-100 border-0 shadow-none p-sm-3 overflow-hidden mb-0">
                                        <div class="card-body p-4 d-flex justify-content-between flex-column">
                                            <div class="auth-image mb-3">
                                                <img src="{{asset('dashboard/assets/images/log.jpg')}}" alt="" class="auth-effect" />
                                            </div>
    
                                            <div>
                                                <h3 class="text-white">{{trans('home.Start your journey with us.')}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-7">
                                    <div class="card mb-0 border-0 shadow-none">
                                        <div class="card-body px-0 p-sm-5 m-lg-4">
                                            <div class="text-center mt-2">
                                                <h5 class="text-primary fs-20">{{trans('home.Welcome Back !')}}</h5>
                                                <p class="text-muted">{{trans('home.Sign in to continue to Smart Trade.')}}</p>
                                            </div>
                                            <div class="p-2 mt-5">
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                            
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">{{trans('home.email')}}</label>
                                                        <input type="text" class="form-control" type="email" id="email" required="" name="email" placeholder="{{trans('home.Enter your email')}}" required="">
                                                        @error('email')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                            
                                                    <div class="mb-3">
                                                        <div class="float-end">
                                                            <a href="{{ route('password.request') }}" class="text-muted">{{trans('home.Forgot password?')}}</a>
                                                        </div>
                                                        <label class="form-label" for="password-input">{{trans('home.password')}}</label>
                                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                                            <input type="password" class="form-control" type="password" id="password" name="password" placeholder="{{trans('home.enter your password')}}" required="">
                                                            @error('password')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon">
                                                                <i class="ri-eye-fill align-middle"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    {!! htmlFormSnippet() !!}

                                                    @if($errors->has('g-recaptcha-response'))
                                                    
                                                        <span class="text-danger">
                                                            <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                                        </span>
                                                    @endif
                                            
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                                        <label class="form-check-label" for="auth-remember-check">{{trans('home.Remember me')}}</label>
                                                    </div>
                                            
                                                    <div class="mt-4">
                                                        <button class="btn btn-primary w-100" type="submit">{{trans('home.Sign In')}}</button>
                                                    </div>
                                                </form>
                                            
                                                <div class="text-center mt-5">
                                                    <p class="mb-0">{{trans("home.Don't have an account ?")}} <a href="{{route('register')}}" class="fw-semibold text-primary text-decoration-underline"> Sign Up</a> </p>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>

    <!-- JAVASCRIPT -->
    <script src="{{asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/plugins.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('dashboard/assets/js/app.js')}}"></script>
    
    <script  type="text/javascript">
        // Disable F12 key
        document.addEventListener('keydown', function (event) {
          if (event.key === 'F12' || event.keyCode === 123) {
            event.preventDefault();
          }
        });
        
        // Disable Ctrl+Shift+I
        document.addEventListener('keydown', function (event) {
          if (event.ctrlKey && event.shiftKey && (event.key === 'I' || event.keyCode === 73)) {
            event.preventDefault();
          }
        });
    	document.onkeydown = function(e) {
            if (e.ctrlKey && 
                 e.keyCode === 85 || 
                 e.keyCode === 117)) {
    				//  alert('Content is protected\nYou cannot view the page source.');
                return e.preventDefault();
            } else {
                return true;
            }
        };
        
    	document.addEventListener('keypress', function (e) {
            if (e.key === 'u' && e.ctrlKey) {
                e.preventDefault();
            } else {
                return true;
            }
        });

    </script>
    <!-- Your custom JavaScript code -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get references to the password field and the button
            var passwordField = document.getElementById("password");
            var passwordAddon = document.getElementById("password-addon");
    
            // Add a click event listener to the button
            passwordAddon.addEventListener("click", function() {
                // Toggle the password field's type between "password" and "text"
                passwordField.type = passwordField.type === "password" ? "text" : "password";
            });
        });
    </script>
</body>
</html>