@extends('dashboard.layouts.app')
@section('meta')

@endsection
@section('main')

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
                                                <h3 class="text-white">Two Factor Authenticator</h3>
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
                                                <p class="text-muted">you can enable\disable 2fa</p>
                                            </div>
                                            <div class="p-2 mt-5">
                                                <form method="POST" action="{{ route('two-factor.enable') }}">
                                                    @csrf
                                                    @if (session('status') == 'two-factor-authentication-enabled')
                                                        <div class="mb-4 font-medium text-sm">
                                                            Please finish configuring two factor authentication below.
                                                        </div>
                                                    @endif
                                                    @if(! $user->two_factor_secret)
                                                        <div class="mt-4">
                                                            <button class="btn btn-primary w-100" type="submit">Enable</button>
                                                        </div>
                                                    @else
                                                        <div class="mt-4">
                                                            {!! $user->twoFactorQrCodeSvg() !!}
                                                        </div>
                                                        <h3>Recovery Codes</h3>
                                                        <ul class="mb-3">
                                                            @foreach(json_decode(decrypt($user->two_factor_recovery_codes)) as $code)
                                                                <li>{{$code}}</li>
                                                            @endforeach
                                                        </ul>
                                                        @method('delete')
                                                        <div class="mt-4">
                                                            <button class="btn btn-primary w-100" type="submit">Disable</button>
                                                        </div>
                                                    @endif
                                                </form>
                                        
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
@endsection