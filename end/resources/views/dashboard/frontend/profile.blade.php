@extends('dashboard.layouts.app')
@section('meta')

@endsection
@section('main')

    <!-- start -->
    <div class="section">   
    @include('dashboard.alerts.alert')
                    
        <div class="row">
            <div class="col-lg-12">
                <div class="card overflow-hidden">
                    <!-- <div class="rounded profile-basic position-relative" style="background-image: url('{{ asset('dashboard/assets/images/profile-bg.jpg') }}'); background-size: cover;background-position: center;">
                        <div class="bg-overlay bg-primary"></div>
                    </div> -->
                    <div class="card-body">
                        <!-- <div class="position-relative">
                            <div class="mt-n5">
                                <img src="{{asset('dashboard/assets/images/users/avatar-2.jpg')}}" alt="" class="avatar-lg rounded-circle p-1 mt-n4">
                            </div>
                        </div> -->
                        <div class="pt-3">
                            <div class="row justify-content-between gy-4">
                                <div class="col-xl-5 col-lg-5">
                                    <h5 class="fs-17">{{$user->name}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2 mt-lg-4 gy-3">
                            <div class="col-md order-1">
                            <ul class="nav nav-pills animation-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">{{trans('home.Personal Details')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#changePassword" role="tab" aria-selected="false" tabindex="-1">
                                        <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">{{trans('home.Changes Password')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link fs-14" href="{{LaravelLocalization::localizeUrl('dashboard/auth/user/2fa')}}">
                                        <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">{{trans('home.Two Factor Authntcation')}}</span>
                                    </a>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        
        <div class="row">
            <!--end col-->
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                <form action="{{LaravelLocalization::localizeUrl('/dashboard/update-profile')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="firstnameInput" class="form-label">{{trans('home.name')}}</label>
                                                <input type="text" class="form-control" id="firstnameInput" name="name" placeholder="{{trans('home.Enter your name')}}" value="{{$user->name}}">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">{{trans('home.email')}}</label>
                                                <input type="email" class="form-control" id="emailInput" name="email" placeholder="{{trans('home.Enter your email')}}" value="{{$user->email}}">
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">{{trans('home.phone')}}</label>
                                                <input type="number" class="form-control" id="phonenumberInput" name="phone" placeholder="{{trans('home.Enter your phone number')}}" value="{{$user->phone}}">
                                                @error('phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
<!-- 
                                        <div class="col-lg-12">
                                            <div class="mb-3 pb-2">
                                                <label for="exampleFormControlTextarea" class="form-label">Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea" placeholder="Enter your description" rows="3">Hi I'm Edward Diana,It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is European languages are members of the same family.</textarea>
                                            </div>
                                        </div> -->
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="submit" class="btn btn-primary">{{trans('home.update')}}</button>
                                                <!-- <button type="button" class="btn btn-soft-success">{{trans('home.cancel')}}</button> -->
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane" id="changePassword" role="tabpanel">
                                <form action="{{LaravelLocalization::localizeUrl('/dashboard/update-password')}}" method="post">
                                    @csrf
                                    <div class="row g-2 justify-content-lg-between align-items-center">
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="oldpasswordInput" class="form-label">{{trans('home.Old Password')}}*</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control" id="oldpasswordInput" name="old_password" placeholder="{{trans('home.Enter current password')}}">
                                                    @error('old_password')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <button class="btn btn-link position-absolute top-0 end-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="auth-pass-inputgroup">
                                                <label for="password-input" class="form-label">{{trans('home.New Password')}}*</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control password-input" id="password-input" name="new_password"  onpaste="return false" placeholder="{{trans('home.Enter new password')}}" aria-describedby="passwordInput" required>
                                                    @error('new_password')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                            
                                        <div class="col-lg-4">
                                            <div class="auth-pass-inputgroup">
                                                <label for="confirm-password-input" class="form-label">{{trans('home.Confirm Password')}}*</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control password-input" name="new_password_confirmation" onpaste="return false" id="confirm-password-input" placeholder="{{trans('home.Confirm Password')}}"  required>
                                                    @error('new_password_confirmation')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="confirm-password-input"><i class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <!-- <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a> -->
                                                <div class="">

                                                    <button type="submit" class="btn btn-success">{{trans('home.Change Password')}}</button>
                                                </div>
                                            </div>
                                        
                                        <!--end col-->

                                        <div class="col-lg-12">
                                            <div class="card bg-light passwd-bg" id="password-contain">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <h5 class="fs-13">Password must contain:</h5>
                                                    </div>
                                                    <div class="">
                                                        <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                                        <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                                        <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                                        <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <!--end tab-pane-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
@endsection


@section("script")

@endsection
