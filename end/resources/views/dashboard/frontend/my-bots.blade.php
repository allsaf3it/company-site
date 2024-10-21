@extends('dashboard.layouts.app')
@section('meta')

@endsection
@section('main')
<section class="section">
    @include('dashboard.alerts.alert')
    @if(count($bots) > 0 || count($bots_disabled) > 0)
        @if(count($bots) > 0)
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
            <div class="img-bot">
                <img src="{{asset('frontend/assets/images/1.gif')}}" alt="bot" style="height: 450px; object-fit: cover;">
            </div>
        </div>
        <form action="{{LaravelLocalization::localizeUrl('dashboard/shutdown-all')}}" method="post">
            @csrf
            <div class="hstack gap-3 mt-lg-5 mt-md-3 mt-sm-3 mt-3" style="margin-bottom: 30px;"> 
                <button type="submit" class="btn btn-primary">{{trans('home.shutdown_allbots')}}</button>
            </div>
        </form>
        <h2>{{trans('home.active_bots')}}</h2>
        <div class="row">
            <!-- <div class="col-12 mt-5">
                <h1 class="text-decoration-underline mb-3 mt-2 pb-3">Statistics Bot</h1>
            </div> -->
            @foreach($bots as $key=>$bot)
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="Frame24" style="width: 100%; height: 220px; position: relative; background: #0E0E23; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 16px; overflow: hidden; padding: 20px 0;">
                        <div class="Vector" style="width: 153px; height: 153px; left: 39px; top: 13px; position: absolute; border: 6px #505065 solid; border-radius: 9999px"></div>
                        <div class="Frame31" style="width: 161px; padding-top: 6px; padding-bottom: 6px; padding-right: 84px; left: 77px; top: 7px; position: absolute; flex-direction: column; justify-content: center; align-items: center; display: inline-flex">
                            <div class="Frame30" style="width: 153px; height: 153px; position: relative; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: flex">
                                <div class="Vector" style="width: 153px; height: 153px; border: 6px #0088CE solid; border-radius: 9999px"></div>
                            </div>
                        </div>
                        <div class="MaskGroup" style="width: 130px; height: 130px; left: 50px; top: 25px; position: absolute; overflow: hidden">
                            <div class="Ellipse9" style="width: 130px; height: 130px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 9999px; background-image: url({{ !empty($bot->image) ? asset('uploads/tradeBotsChild/' . $bot->image) : asset('uploads/no_image.jpg')}}); background-repeat: no-repeat; background-size: cover; background-position: center center;"></div>
                            <!-- <img class="Boooooot1" style="width: 136.19px; height: 201.63px; left: 0.88px; top: -28.30px; position: absolute" src="assets/images/1.jpeg" /> -->
                        </div>
                        <div class="BullihsBot" style="left: 30px; top: 166px; position: absolute; color: white; font-size: 23px; font-weight: 700; word-wrap: break-word">{{$bot->bot_name}}</div>
                        <div class="Frame32" style="padding: 10px; right: 10px; top: 125px; position: absolute; background: #0088CE; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 4px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
                            <div class="MoreDetails" style="color: white; font-size: 16px; font-weight: 700; word-wrap: break-word"><a href="{{LaravelLocalization::localizeUrl('dashboard/my-bots/details/'.$bot->link )}}" class="text-white">{{trans('home.More Details')}}</a></div>
                        </div>
                        <div class="ProfileLastMonth" style="right: 50px; top: 21px; position: absolute; color: white; font-size: 16px; font-weight: 500; word-wrap: break-word">{{trans('home.profit')}}</div>
                        <div class="Vector" style="width: 59px; height: 59px; right: 50px; top: 43px; position: absolute; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 2px rgba(0, 136, 206, 0.45) solid; border-radius: 50%;"></div>
                        <div class="3924989  @if($profits[$key] >= 0) text-success @else text-danger @endif" style="right: 80px; top: 63px; position: absolute; color: white; font-size: 16px; font-weight: 500; word-wrap: break-word">
                            <span class="counter-value" data-target="{{ number_format($profits[$key], 2, '.', '') }}">0</span>%
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
        @if(count($bots_disabled) > 0)
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
            <div class="img-bot">
                <img src="{{asset('frontend/assets/images/dem2.GIF')}}" alt="bot" style="height: 450px; object-fit: cover;">
            </div>
        </div>

        <h2>{{trans('home.deactive_bots')}}</h2>
        <div class="row">
            <!-- <div class="col-12 mt-5">
                <h1 class="text-decoration-underline mb-3 mt-2 pb-3">Statistics Bot</h1>
            </div> -->
            @foreach($bots_disabled as $key=>$bot_disabled)
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="Frame24" style="width: 100%; height: 220px; position: relative; background: #0E0E23; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 16px; overflow: hidden; padding: 20px 0;">
                        <div class="Vector" style="width: 153px; height: 153px; left: 39px; top: 13px; position: absolute; border: 6px #505065 solid; border-radius: 9999px"></div>
                        <div class="Frame31" style="width: 161px; padding-top: 6px; padding-bottom: 6px; padding-right: 84px; left: 77px; top: 7px; position: absolute; flex-direction: column; justify-content: center; align-items: center; display: inline-flex">
                            <div class="Frame30" style="width: 153px; height: 153px; position: relative; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: flex">
                                <div class="Vector" style="width: 153px; height: 153px; border: 6px #0088CE solid; border-radius: 9999px"></div>
                            </div>
                        </div>
                        <div class="MaskGroup" style="width: 130px; height: 130px; left: 50px; top: 25px; position: absolute; overflow: hidden">
                            <div class="Ellipse9" style="width: 130px; height: 130px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 9999px; background-image: url({{ !empty($bot->image) ? asset('uploads/tradeBotsChild/' . $bot->image) : asset('uploads/no_image.jpg')}}); background-repeat: no-repeat; background-size: cover; background-position: center center;"></div>
                            <!-- <img class="Boooooot1" style="width: 136.19px; height: 201.63px; left: 0.88px; top: -28.30px; position: absolute" src="assets/images/1.jpeg" /> -->
                        </div>
                        <div class="BullihsBot" style="left: 30px; top: 166px; position: absolute; color: white; font-size: 23px; font-weight: 700; word-wrap: break-word">{{$bot_disabled->bot_name}}</div>
                        <div class="Frame32" style="padding: 10px; right: 10px; top: 125px; position: absolute; background: #0088CE; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 4px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
                            <div class="MoreDetails" style="color: white; font-size: 16px; font-weight: 700; word-wrap: break-word"><a href="{{LaravelLocalization::localizeUrl('dashboard/my-bots/details/'.$bot_disabled->link )}}" class="text-white">{{trans('home.More Details')}}</a></div>
                        </div>
                        <div class="ProfileLastMonth" style="right: 50px; top: 21px; position: absolute; color: white; font-size: 16px; font-weight: 500; word-wrap: break-word">{{trans('home.profit')}}</div>
                        <div class="Vector" style="width: 59px; height: 59px; right: 50px; top: 43px; position: absolute; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 2px rgba(0, 136, 206, 0.45) solid; border-radius: 50%;"></div>
                        <div class="3924989 @if($profitsDeactivate[$key] >= 0) text-success @else text-danger @endif" style="right: 80px; top: 63px; position: absolute; color: white; font-size: 16px; font-weight: 500; word-wrap: break-word">
                            <span class="counter-value" data-target="{{ number_format($profitsDeactivate[$key], 2, '.', '') }}">0</span>%
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    @else
    <div class="row">
        <p style="text-align: center; font-weight: bold; font-size:20px; margin:auto; color: #fff">{{trans('home.no_data_in_this_page')}}</p>
    </div>
    @endif
</section>
@endsection