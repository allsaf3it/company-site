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
                            <div class="card-header border-0">
                                <h1 class="card-title fs-36 mb-0">{{trans('home.Transfer to ST wallet')}}</h1>
                            </div><!-- end card header -->
                            @include('dashboard.alerts.alert')
                            <form method="post" action="{{LaravelLocalization::localizeUrl('dashboard/save-transfer-stwallet')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="row gy-4">
                                        <!--end col-->
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="placeholderInput">
                                                    <h1 class="card-title fs-16 mb-2">{{trans('home.Withdraw Value')}}</h1>
                                                </label>
                                                <input type="number" class="form-control" id="placeholderInput" name="transfer" placeholder="100 USD">
                                                @error('transfer')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    <div class="hstack gap-3 mt-lg-5 mt-md-3 mt-sm-3 mt-3"> 
                                        <button type="submit" class="btn btn-primary">{{trans('home.transfer')}}</button>
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