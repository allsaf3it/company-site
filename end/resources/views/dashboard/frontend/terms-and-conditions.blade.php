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
                    <h1>{{trans('home.terms_and_conditions')}}</h1>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        
        <div class="row">
            <!--end col-->
            <div class="col-xxl-12">
                {!! $configration->{'terms_and_conditions_' . $lang} !!}
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
@endsection


@section("script")

@endsection
