<!DOCTYPE html>
<html lang="en" data-layout="horizontal" data-bs-theme="light" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Smart Trade | Trade Bot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('uploads/configration/'. $configration->fav_icon)}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

<body>

    <section class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100 bg-light" oncontextmenu="return false">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-0">
                                <div class="col-lg-5">
                                    <div class="auth-card card h-100 border-0 shadow-none p-sm-3 overflow-hidden">
                                        <div class="card-body p-4 d-flex justify-content-between flex-column">
                                            <div class="auth-image">
                                                <img src="{{asset('dashboard/assets/images/log.jpg')}}" alt="" class="auth-effect" />
                                            </div>

                                            <div>   
                                                <h3 class="text-white">{{trans('home.Start your journey with us.')}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-7">
                                    <div class="card mb-0 border-0 py-3 shadow-none">
                                        <div class="card-body px-0 p-sm-5 m-lg-4">
                                            <div class="text-center mt-2">
                                                <h5 class="text-primary fs-20">{{trans('home.Create New Account')}}</h5>
                                                <p class="text-muted">{{trans('home.Get your free Smart Trade account now')}}</p>
                                            </div>
                                            <div class="p-2 mt-5">
                                                @include('dashboard.alerts.alert')
                                                <form class="needs-validation" novalidate method="POST" action="{{ route('register') }}">
                                                    @csrf
                                                    <input type="hidden" name="code" value="{{ request('invite') }}">
                                                    <div class="mb-3">
                                                        <label for="useremail" class="form-label">{{trans('home.email')}} <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" class="form-control" id="email" placeholder="{{trans('home.Enter email address')}}" required>
                                                        @error('email')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Please enter email
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">{{trans('home.username')}} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="username" name="name" placeholder="{{trans('home.Enter username')}}" required>
                                                        @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Please enter username
                                                        </div>
                                                    </div>
                                        
                                                    <div class="mb-3">
                                                        <label class="form-label" for="password-input">{{trans('home.password')}}</label>
                                                        <div class="position-relative auth-pass-inputgroup">
                                                            <input type="password" name="password" class="form-control pe-5" onpaste="return false" placeholder="{{trans('home.Enter password')}}" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                            @error('password')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon">
                                                                <i class="ri-eye-fill align-middle"></i>
                                                            </button>
                                                            <div class="invalid-feedback">
                                                                Please enter password
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label" for="password-input">{{trans('home.Password Confirmation')}}</label>
                                                        <div class="position-relative auth-pass-inputgroup">
                                                            <input type="password" name="password_confirmation" class="form-control pe-5" onpaste="return false" placeholder="{{trans('home.Enter Password Confirmation')}}" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                            @error('password_confirmation')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                            <div class="invalid-feedback">
                                                                Please enter confirmation password
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="invite_code" class="form-label">{{trans('home.Invitation code')}}</label>
                                                        <input type="text" class="form-control" id="invite_code" name="invite_code" value="{{(request('invite')) ? (request('invite')) : ''}}" placeholder="{{trans('home.Enter Invitation code')}}">
                                                        @error('invite_code')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Please enter Invitation code
                                                        </div>
                                                    </div>
                                        
                                                    <!--<div class="mb-4">-->
                                                    <!--    <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the Hybrix <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>-->
                                                    <!--</div>-->
                                                    
                                                    {!! htmlFormSnippet() !!}

                                                    @if($errors->has('g-recaptcha-response'))
                                                    
                                                        <span class="text-danger">
                                                            <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                                        </span>
                                                    @endif
                                            
                                        
                                                    <!-- <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                        <h5 class="fs-13">Password must contain:</h5>
                                                        <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                                        <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                                        <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                                        <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                                    </div> -->
                                        
                                                    <div class="mt-4">
                                                        <button class="btn btn-primary w-100" type="submit">{{trans('home.Sign Up')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <p class="mb-0">{{trans('home.Already have an account ?')}} <a href="{{route('login')}}" class="fw-semibold text-primary text-decoration-underline"> {{trans('home.Sign in')}} </a> </p>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
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
            var passwordField = document.getElementById("password-input");
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