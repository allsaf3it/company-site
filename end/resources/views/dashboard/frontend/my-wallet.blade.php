@extends('dashboard.layouts.app')
@section('meta')

@endsection
@section('main')

<section class="section">
    @include('dashboard.alerts.alert')
    <!-- start -->
    <div class="my-wallet">

        <div class="img row align-items-center justify-content-center">
            <div class="col-12">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-10">
                        <div class="card p-5 border-1 border-primary">
                            <div class="card-header border-0">
                                <h1 class="card-title fs-36 mb-0">{{trans('home.My Wallet')}}</h1>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <form method="post" action="{{LaravelLocalization::localizeUrl('dashboard/save-my-wallet')}}">
                                    @csrf
                                    <div class="row gy-4">
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label>{{trans('home.Type Wallet')}}</label>
                                                <select class="form-select mb- " id="selection" name="wallet_type" aria-label="Default select example">
                                                    <option @if($user->exchange == null) selected @endif>{{trans('home.Type Wallet')}} </option>
                                                    @foreach($exchanges as $exchange)
                                                        <option value="{{$exchange->name}}" @if($user->exchange == $exchange->name) selected @endif >{{$exchange->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label>API Key</label>
                                                <input type="password" class="form-control" name="apikey"  value="{{$user->apikey}}" id="placeholderInput" placeholder="API Key">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label>API Secret</label>
                                                <input type="password" class="form-control" name="secretkey" value="{{$user->secretkey}}" id="placeholderInput" placeholder="API Secret">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-6 col-md-6" id="apiPassphraseDiv" style="display:none;">
                                            <div>
                                                <label>API Passphrase</label>
                                                <input type="password" class="form-control" name="passphrase" value="{{$user->passphrase}}" id="placeholderInput" placeholder="API Passphrase">
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    <div class="hstack gap-3 mt-lg-5 mt-md-3 mt-sm-3 mt-3"> 
                                        <button type="submit" class="btn btn-primary">{{trans('home.save')}}</button>
                                        <div class="vr"></div>
                                        <button type="button" class="btn btn-outline-primary">{{trans('home.Reset')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</section>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#selection').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'okx' || selectedValue === 'kucoin') {
                $('#apiPassphraseDiv').show();
            } else {
                $('#apiPassphraseDiv').hide();
            }
        });
    });
</script>
@endsection
