@extends('dashboard.layouts.app')
@section('meta')
@endsection
@section('main')
    <section class="section">
    @include('dashboard.alerts.alert')
        <!-- Cards -->
        <div class="row">
            <!-- car -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card card-height-100 pt-5 pb-5" style="background-color: transparent; background: url({{asset('dashboard/assets/images/Blue-Globe.jpg')}}) no-repeat; background-position: center center; background-size: cover;">
                    <div class="card-body collapse show" id="collapseexample1">
                        <div class="row align-items-center text-center">
                            <div class="col-12">
                                <h1 class="fs-48 text-white-50">{{trans('home.Grand Prize')}}</h1>
                            </div>
                            <div class="col-12">
                                <i class="bi bi-speedometer2 fs-36 text-white"></i>
                            </div>
                            <div class="col-12">
                                <h3 class="fs-36">{{($all_sales <= 300) ? $all_sales : 3000 }} / 3000</h3>
                            </div>
                            <div class="col-12">
                                <div class="img prize_img">
                                    <img src="{{asset('dashboard/assets/images/car.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row">
                                    @foreach($topUsers as $topUser)
                                        @php
                                            $all_network_plans_blade = App\Models\NetworkPlan::where('father_id', $topUser->id)->get();
                                            $all_sales_blade = array_sum($all_network_plans_blade->pluck('money')->toArray());
                                        @endphp
                                        <div class="col-lg-4">
                                            <div class="card prize_name">
                                                <div class="sub_title">
                                                    <h3 class="fs-16">{{$topUser->name}}</h3>
                                                </div>
                                                <span class="fs-36 fw-medium">{{($all_sales_blade <= 3000) ? $all_sales_blade :  3000 }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            
            <!-- win -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card card-height-100 pt-5 pb-5">
                    <div class="card-body collapse show" id="collapseexample1">
                        <div class="row align-items-center text-center">
                            <div class="col-12">
                                <h1 class="fs-36">
                                    {{trans('home.Get 300 sale and win an iphone 14')}}
                                </h1>
                            </div>
                            <div class="col-12">
                                <div class="Frame106" style="width: 238px; height: 631px; padding-left: 50px; padding-right: 49px; border-radius: 102px; overflow: hidden; background-image: url({{asset('dashboard/assets/images/Blue-Globe.jpg')}}); background-position: center center; background-repeat: no-repeat; background-size: cover; flex-direction: column; justify-content: center; align-items: center; display: inline-flex">
                                <div style="color: white; font-size: 102px; font-family: Petrona; font-weight: 400; word-wrap: break-word">{{($all_sales <= 300) ? $all_sales : 300 }} / 300</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- cong -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card card-height-100 pt-5 pb-5 border-1 border-primary">
                    <div class="card-body collapse show" id="collapseexample1">
                        <div class="row">
                            <div class="col-6">
                                <h3>
                                    {{trans('home.Congratulations')}}  🎉 !
                                </h3>
                                <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, voluptate!</p> -->
                            </div>
                            <div class="col-6 text-end">
                                <div class="img prize_img">
                                    <img src="{{asset('dashboard/assets/images/box.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <h2 class="text-primary">${{$user->available_profit}}</h2>
                                <div class="hstack justify-content-between gap-3 mt-lg-3 mt-md-2 mt-sm-2 mt-2">
                                    <a type="button" href="{{LaravelLocalization::localizeUrl('dashboard/withdraw')}}" class="btn btn-primary">{{trans('home.withdraw')}}</a>
                                    <a type="button" href="{{LaravelLocalization::localizeUrl('dashboard/transfer-stwallet')}}" class="btn btn-outline-primary">{{trans('home.Transfer ST Wallet')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card card-height-100 pt-5 pb-5 border-1 border-primary">
                    <div class="card-body collapse show" id="collapseexample1">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-10">
                                <input type="text" class="form-control" id="placeholderInput" value="{{$user->affiliate_link}}" placeholder="{{$user->affiliate_link}}">
                            </div>
                            <!--end col-->
                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                <div class="hstack"> 
                                    <button type="button" class="btn btn-primary copy-button" data-input="placeholderInput">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V2Zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6ZM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1H2Z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-lg-3 mt-md-2 mt-sm-2 mt-2">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-10">
                                <input type="text" class="form-control" id="placeholderInput1" value="{{$user->affiliate_code}}" placeholder="{{$user->affiliate_code}}">
                            </div>
                            <!--end col-->
                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                <div class="hstack"> 
                                    <button type="button" class="btn btn-primary copy-button" data-input="placeholderInput1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V2Zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6ZM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1H2Z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div id="copyAlert" class="alert alert-success mt-3" role="alert" style="display: none;">
                            Text copied successfully!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cards -->
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card border-0 bg-transparent">
                    <div class="card-body">
                        <div class="row g-4 row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                            <div class="col">
                                <div class="card border-2 bg-transparent text-center border-primary mb-0">
                                    <div class="card-body py-4">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <div class="avatar-title bg-primary bg-opacity-25 text-primary fs-24 rounded-circle">
                                                <i class="bi bi-currency-dollar"></i>
                                            </div>
                                        </div>
                                        <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$user->available_profit}}">0</span>$</h4>
                                        <p class="text-muted fs-14 mb-0">{{trans('home.available_profit')}}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div class="card border-2 border-success bg-transparent text-center mb-0">
                                    <div class="card-body py-4">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <div class="avatar-title bg-success-subtle text-success fs-22 rounded-circle">
                                                <i class="bi bi-speedometer2"></i>
                                            </div>
                                        </div>
                                        <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$user->withdrawed_profit}}">0</span>$</h4>
                                        <p class="text-muted fs-14 mb-0">{{trans('home.withdrawed_profit')}}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div class="card border-2 border-ligh bg-transparent text-center mb-0">
                                    <div class="card-body py-4">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <div class="avatar-title text-bg-dark fs-22 rounded-circle">
                                                <img src="{{asset('dashboard/assets/images/okx.png')}}" alt="">
                                            </div>
                                        </div>
                                        <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$user->fees_profit}}">0</span>$</h4>
                                        <p class="text-muted fs-14 mb-0">{{trans('home.fees_profit')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-transparent text-center mb-0">
                                    <div class="card-body py-4">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <div class="avatar-title bg-dark-subtle text-white fs-22 rounded-circle">
                                                <i class="bi bi-credit-card-2-front"></i>
                                            </div>
                                        </div>
                                        <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$user->plans_profit}}">0</span>$</h4>
                                        <p class="text-muted fs-14 mb-0">{{trans('home.plans_profit')}}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div class="card border-2 bg-transparent text-center border-primary mb-0">
                                    <div class="card-body py-4">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <div class="avatar-title bg-primary bg-opacity-25 text-primary fs-24 rounded-circle">
                                                <i class="bi bi-currency-dollar"></i>
                                            </div>
                                        </div>
                                        <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$user->all_profit}}">0</span>$</h4>
                                        <p class="text-muted fs-14 mb-0">{{trans('home.all_profit')}}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div class="card border-2 border-success bg-transparent text-center mb-0">
                                    <div class="card-body py-4">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <div class="avatar-title bg-success-subtle text-success fs-22 rounded-circle">
                                                <i class="bi bi-speedometer2"></i>
                                            </div>
                                        </div>
                                        <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$all_sales}}">0</span>$</h4>
                                        <p class="text-muted fs-14 mb-0">{{trans('home.total_sales')}}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div class="card border-2 border-ligh bg-transparent text-center mb-0">
                                    <div class="card-body py-4">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <div class="avatar-title text-bg-dark fs-22 rounded-circle">
                                                <img src="{{asset('dashboard/assets/images/okx.png')}}" alt="">
                                            </div>
                                        </div>
                                        <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$all_team}}">0</span></h4>
                                        <p class="text-muted fs-14 mb-0">{{trans('home.total_team')}}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div><!--end col-->
            @if(count($user_team) > 0)
            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{trans('home.num')}}</th>
                                            <th>{{trans('home.name')}}</th>
                                            <th>{{trans('home.plan')}}</th>
                                            <th>{{trans('home.date')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_team as $key=>$user_teamItem) 
                                            @php
                                                $username = App\Models\User::select('name')->where('id', $user_teamItem->user_id)->first();
                                            @endphp                          
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td> {{$username->name}}</td>
                                                <td>{{$user_teamItem->pricing->{'name_'.$lang} }}</td>
                                                <td>{{$user_teamItem->created_at}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            @endif

        </div>
    <section>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all elements with the class "copy-button"
        var copyButtons = document.querySelectorAll(".copy-button");

        // Add click event listener to each copy button
        copyButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                // Get the input field associated with the button
                var inputId = button.getAttribute("data-input");
                var inputField = document.getElementById(inputId);

                // Select and copy the text from the input field
                inputField.select();
                document.execCommand("copy");

                // Deselect the input field
                inputField.setSelectionRange(0, 0);
                
                var copyAlert = document.getElementById("copyAlert");
                copyAlert.style.display = "block";

                setTimeout(function () {
                    copyAlert.style.display = "none";
                }, 2000);
            });
        });
    });
</script>
@endsection
