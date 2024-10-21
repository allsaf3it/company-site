<!-- Page Navigation -->
<div id="page-nav">
    <div class="page-nav-wrap">
        <div class="content-row row_padding_top row_padding_left row_padding_right full dark-section">
            <hr class="animated-line has-animation">
            <hr>
            <hr>
            <hr>
        </div>
        @php
            if(Request::segment(2) == ''){
                $thisPage = App\Models\MenuItem::where('type', 'home')->first();
                $nextMenu = App\Models\MenuItem::where('order', '>', $thisPage->order)->where('status', 1)->first();
            }else{
                $thisPage = App\Models\MenuItem::where('type', Request::segment(2))->first();
                $nextMenuAfter = App\Models\MenuItem::where('order', '>', $thisPage->order)->where('status', 1)->first();
                if($nextMenuAfter == ''){
                    $nextMenu = App\Models\MenuItem::where('type', 'home')->first();
                }else{
                    $nextMenu = $nextMenuAfter;
                }
            }

        @endphp
        <div class="page-nav-caption content-full-width block-title marquee-title">
            <div class="inner">
                <a class="page-title next-ajax-link-page" data-type="page-transition" data-firstline="{{trans('home.Next')}}" data-secondline="{{trans('home.Page')}}" href='{{ ($nextMenu->type == "home") ? LaravelLocalization::localizeUrl("/") : LaravelLocalization::localizeUrl("/$nextMenu->type") }}'>
                    <div class="next-hero-title-wrapper">
                        <div class="next-hero-title"><span>{{trans('home.Smart')}}</span> <span>{{trans('home.Trade')}}</span></div>
                    </div>
                </a>
                <div class="next-hero-subtitle-wrapper">
                    <div class="next-hero-subtitle">
                        <span>{!! $configration->{'about_app_'.$lang} !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Page Navigation -->