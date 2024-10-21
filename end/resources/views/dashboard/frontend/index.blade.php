@extends('dashboard.layouts.app')
@section('meta')

@endsection
@section('main')
<section class="">
    @include('dashboard.alerts.alert')
    <!-- Sliders -->
    <div class="row">
        @if(count($sliders) > 0)
            <div class="col-12">
                <div class="slider showcase-full">
                    <div class="swiper-container parallax-slider">
                        <div class="swiper-wrapper">
                            @foreach($sliders as $slider)
                                <div class="swiper-slide">
                                    <div class="bg-img valign" data-background="{{asset('uploads/home-sliders/' . $slider->image)}}" data-overlay-dark="4">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-10 offset-lg-1">
                                                    <div class="caption">
                                                        <h1>
                                                            <a href="javascript:;">
                                                                <div class="stroke" data-swiper-parallax="-2000">{{$slider->{'title_'.$lang} }}</div> <span data-swiper-parallax="-5000">{!! $slider->{'text_'.$lang} !!}</span>
                                                            </a>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- slider setting -->
                        <div class="txt-botm">
                            <div class="swiper-button-next swiper-nav-ctrl next-ctrl cursor-pointer">
                                <div>
                                    <span class="custom-font">{{trans('home.Next Slide')}}</span>
                                </div>
                                <div><i class="bi bi-chevron-right"></i></div>
                            </div>
                            <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer">
                                <div><i class="bi bi-chevron-left"></i></div>
                                <div>
                                    <span class="custom-font">{{trans('home.Prev Slide')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination steps custom-font"></div>
                    </div>
                </div>
            </div>
        @endif
        @if(count($bots) > 0)
            <div class="col-12 mt-5">
                <h1 class="text-decoration-underline mb-3 mt-2 pb-3">{{trans('home.Trade Bot')}}</h1>
            </div>
            <div class="col-xl-12">
                <!-- ==================== Start Slider ==================== -->
                <div class="slider circle-slide showcase-carus" data-carousel="swiper" data-items="3" data-speed="1000" data-loop="true" data-space="300" data-parallax="true" data-mousewheel="false" data-center="true">
                    <div id="content-carousel-container-unq-1" class="swiper-container" data-swiper="container">
                        <div class="swiper-wrapper">
                            @foreach($bots as $bot)
                            @php
                                $childBots = App\Models\BotTypeChild::where('type_id' , $bot->id)->where('status', 1)->get();
                                $parentProfit = [];
                                foreach($childBots as $child){
                                    $profits = App\Models\BotOrder::select('profit')->where('bot_id', $child->id)->where('side', 'sell')->get()->pluck('profit')->toArray();
                                    $profit = array_sum($profits);
                                    $parentProfit[] = $profit;
                                }
                                $finallparentProfit = array_sum($parentProfit);
                            @endphp
                                <div class="swiper-slide">
                                    <div class="full-width">
                                        <div class="bg-img valign" data-background="{{ !empty($bot->image) ? asset('uploads/tradeBots/' . $bot->image) : asset('uploads/no_image.jpg')}}" data-overlay-dark="1">
                                            <div class="caption ontop valign">
                                                <div class="o-hidden">
                                                    <h1 data-swiper-parallax="-2000">
                                                        <a href="{{LaravelLocalization::localizeUrl('dashboard/bot/'.$bot->link )}}">
                                                            <div class="stroke">{{$bot->name }}</div>
                                                            <br>
                                                            <div class="stroke num">{{number_format($finallparentProfit, 2, '.', '')}}</div> <span class="num">%</span>
                                                        </a>
                                                    </h1>
                                                </div>
                                            </div>
                                            <div class="copy-cap valign">
                                                <div class="cap">
                                                    <h1 data-swiper-parallax="-2000">
                                                        <a href="{{LaravelLocalization::localizeUrl('dashboard/bot/'.$bot->link )}}">
                                                            <div class="stroke">{{$bot->name }}</div> 
                                                            <br>
                                                            <div class="stroke num">{{number_format($finallparentProfit, 2, '.', '')}}</div> <span class="num">%</span>
                                                        </a>
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- slider setting -->
                        <div class="txt-botm">
                            <div class="swiper-button-next swiper-nav-ctrl next-ctrl cursor-pointer">
                                <div>
                                    <span class=" custom-font">{{trans('home.Next Slide')}}</span>
                                </div>
                                <div><i class="bi bi-chevron-right"></i></div>
                            </div>
                            <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer">
                                <div><i class="bi bi-chevron-left"></i></div>
                                <div>
                                    <span class=" custom-font">{{trans('home.Prev Slide')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination steps custom-font"></div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- Cards -->
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card border-0 bg-transparent">
                <div class="card-body">
                    <div class="row g-4 row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                        <!-- <div class="col">
                            <div class="card border-danger-subtle border-2 bg-transparent text-center mb-0">
                                <div class="card-body py-4">
                                    <div class="avatar-sm mx-auto mb-4">
                                        <div class="avatar-title bg-danger-subtle text-danger fs-24 rounded-circle">
                                            <i class="bi bi-cpu"></i>
                                        </div>
                                    </div>
                                    <h4 class="fs-22 fw-semibold"><span>OFF</span></h4>
                                    <p class="text-muted fs-14 mb-0">Bot Status</p>
                                </div>
                            </div>
                        </div> -->
                        <!--end col-->
                        <!-- <div class="col">
                            <div class="card border-2 bg-transparent text-center border-primary mb-0">
                                <div class="card-body py-4">
                                    <div class="avatar-sm mx-auto mb-4">
                                        <div class="avatar-title bg-primary bg-opacity-25 text-primary fs-24 rounded-circle">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                    </div>
                                    <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{-- $usdt --}}">0</span>$</h4>
                                    <p class="text-muted fs-14 mb-0">USDT</p>
                                </div>
                            </div>
                        </div> -->
                        <!--end col-->
                        
                        <!--end col-->
                        <div class="col">
                            <div class="card border-2 border-ligh bg-transparent text-center mb-0">
                                <div class="card-body py-4">
                                    <div class="avatar-sm mx-auto mb-4">
                                        <div class="avatar-title text-bg-dark fs-22 rounded-circle">
                                            <img src="assets/images/okx.png" alt="">
                                        </div>
                                    </div>
                                    <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$user->all_profit}}">0</span>$</h4>
                                    <p class="text-muted fs-14 mb-0">User Affilate</p>
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
                                    <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$user->fees}}">0</span>$</h4>
                                    <p class="text-muted fs-14 mb-0">S.T Wallet</p>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
        <!--end col-->

    </div>
</section>
@endsection