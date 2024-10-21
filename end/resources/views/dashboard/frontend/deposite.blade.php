@extends('dashboard.layouts.app')
@section('meta')

@endsection
@section('main')

<section class="section">
    <!-- start -->
    @include('dashboard.alerts.alert')
    <div class="col">
        <div class="card border-2 bg-transparent text-center border-primary mb-0">
            <div class="card-body py-4">
                <div class="avatar-sm mx-auto mb-4">
                    <div class="avatar-title bg-primary bg-opacity-25 text-primary fs-24 rounded-circle">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                </div>
                <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$user->fees}}">0</span>$</h4>
                <p class="text-muted fs-14 mb-0">S.T Wallet</p>
            </div>
        </div>
    </div><!--end col-->
    <div class="my-wallet">
        <div class="row align-items-center justify-content-center">
            <div class="col-12">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-10">
                        <div class="card h-100 p-5 border-1 border-primary">
                            <div class="card-header border-0">
                                <h1 class="card-title fs-36 mb-0">{{trans('home.wallet_number')}}</h1>
                            </div><!-- end card header -->
                            <div class="card-body form-steps">
                                <form  method="post" action="{{LaravelLocalization::localizeUrl('dashboard/saveTxid')}}">
                                    @csrf
                                    <div id="custom-progress-bar" class="progress-nav mb-4">
                                        <div class="progress" style="height: 1px;">
                                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <ul class="nav nav-pills progress-bar-tab custom-nav" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link rounded-pill active" data-progressbar="custom-progress-bar" id="pills-gen-info-tab" data-bs-toggle="pill" data-bs-target="#pills-gen-info" type="button" role="tab" aria-controls="pills-gen-info" aria-selected="true">1</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link rounded-pill" data-progressbar="custom-progress-bar" id="pills-info-desc-tab" data-bs-toggle="pill" data-bs-target="#pills-info-desc" type="button" role="tab" aria-controls="pills-info-desc" aria-selected="false">2</button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="pills-gen-info" role="tabpanel" aria-labelledby="pills-gen-info-tab">
                                            <div>
                                                <div class="row gy-4">
                                                    <div class="col-xxl-10 col-md-10">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <input type="text" class="form-control" readonly value="{{$data}}" id="copyInput" placeholder="{{$data}}">
                                                            </div>
                                                            <div class="col-12 text-center mt-lg-5 mt-md-3 mt-sm-3 mt-3">
                                                                {{$qrcode}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-2 col-md-2">
                                                        <div class="hstack"> 
                                                            <button type="button" class="btn btn-primary" onclick="copyText()">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16" >
                                                                    <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V2Zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6ZM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1H2Z"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start gap-3 mt-4">
                                                <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-info-desc-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>{{trans('home.Next')}}</button>
                                            </div>
                                        </div>
                                        <!-- end tab pane -->

                                        <div class="tab-pane fade" id="pills-info-desc" role="tabpanel" aria-labelledby="pills-info-desc-tab">
                                            <div>
                                                <div class="row gy-4">
                                                    <div class="col-xxl-12 col-md-12">
                                                        <div class="row gy-4">
                                                            <div class="col-xxl-10 col-md-10">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                    <input type="text" class="form-control" name="txid" id="placeholderInput" placeholder="{{trans('home.text_id')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-xxl-2 col-md-2">
                                                                <div class="hstack"> 
                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModals">
                                                                        <i class="ri-information-line fs-18"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start gap-3 mt-4">
                                                <button type="button" class="btn btn-link text-decoration-none btn-label previestab" data-previous="pills-gen-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back to General</button>
                                                <button type="submit" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Submit</button>
                                            </div>
                                        </div>
                                        <!-- end tab pane -->
                                    </div>
                                    <!-- end tab content -->
                                </form>
                                <div id="signupModals" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content overflow-hidden">
                                            <div class="modal-header border-1 p-3">
                                                <h4 class="card-title mb-0">{{trans('home.How to get a Txid code')}}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12 text-center mt-lg-5 mt-md-3 mt-sm-3 mt-3">
                                                        <img src="{{asset('dashboard/assets/images/popup.jpg')}}" style="width: -webkit-fill-available;" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
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


@section("script")
<script src="{{asset('dashboard/assets/js/pages/form-wizard.init.js')}}"></script>
<script>
    function copyText() {
        var copyText = document.getElementById("copyInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        document.execCommand("copy");
    }
</script>


@endsection
