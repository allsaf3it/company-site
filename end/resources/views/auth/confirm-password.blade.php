@extends('dashboard.layouts.app')
@section('meta')

@endsection
@section('main')
<section class="">
@include('dashboard.alerts.alert')

    <div class="my-wallet">
        <div class="img row align-items-center justify-content-center">
            <div class="col-12">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-10">
                        <div class="card p-5 border-1 border-primary">
                            @include('dashboard.alerts.alert')
                            <div class="card-header border-0">
                                <h5 class="card-title fs-36 mb-0">{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</h5>
                            </div><!-- end card header -->
                            <form method="post" action="{{ route('password.confirm') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row gy-4">
                                        <!--end col-->
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="placeholderInput">
                                                    <h1 class="card-title fs-16 mb-2">{{trans('home.confirm_password')}}</h1>
                                                </label>
                                                <input type="password" id="password" class="form-control" name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                    <div class="hstack gap-3 mt-lg-5 mt-md-3 mt-sm-3 mt-3"> 
                                        <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end col-->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
