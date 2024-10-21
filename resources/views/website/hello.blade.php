@extends('layouts.hello_app')

@section('meta')
    @php echo $metatags @endphp

    @php echo $schema @endphp
@endsection

@section('content')
    <div class="cb-navbar -inverse">
        <div class="cb-navbar-strip">
            <div class="cb-navbar-grid">
                <div class="cb-navbar-grid-col -left">
                    <div class="cb-navbar-logo">
                        <a href="{{LaravelLocalization::localizeUrl('/')}}">
                            <img src="{{url('uploads/settings/source/'.$configration->about_image)}}" alt="Logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="cb-intro" data-menu-inverse data-cursor="-inverse">
        <div class="cb-intro-content">
            <div class="cb-intro-body">
                <div class="cb-intro-container -sm">
                    <div class="cb-intro-header">
                        <h1><em><span class="-word">{{trans('home.We')}}</span></em><br class="-lsm"><span
                                class="cb-btn cb-btn_cta -intro -tertiary"><span
                                    class="cb-btn_cta-border"></span><span
                                    class="cb-btn_cta-ripple"><span></span></span><span
                                    class="cb-btn_cta-title"><span
                                        data-text="{{trans('home.create')}}">{{trans('home.create')}}</span></span></span><br><em><span
                                    class="-word">{{trans('home.digital')}}</span></em><br><em><span class="-word"><span
                                        class="-gxs -blink">_</span>{{trans('home.solutions')}}</span></em></h1>
                    </div>
                </div>
                <div class="cb-intro-details">
                    <div class="cb-intro-detail">Est. {{date("Y")}}</div>
                    <div class="cb-intro-detail">(SCROLL)</div>
                </div>
            </div>
            <div class="cb-intro-bottom">
                <div class="cb-intro-figure">
                    <div class="cb-intro-figure-media"><video
                            data-src="{{url('uploads/hello/source/' . $hello->first_video)}}" autoplay playsinline loop
                            muted></video></div>
                </div>
            </div>
        </div>
    </header>
    <section class="cb-focused" data-menu-inverse data-cursor="-inverse">
        <div class="cb-focused-content">
            <div class="cb-focused-container -sm">
                <div class="cb-focused-text">
                    <p>
                        {!! app()->getLocale() == 'en' ? $hello->first_text_en : $hello->first_text_ar !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="cb-overview">
        <div class="cb-overview-content -rt">
            <div class="cb-overview-container -sm">
                <div class="cb-overview-figure -lsm">
                    <div class="cb-overview-figure-media"><video
                            data-src="{{url('uploads/hello/source/' . $hello->creative_video)}}" autoplay playsinline loop
                            muted></video></div>
                </div>
            </div>
            <div class="cb-overview-reel">
                <div class="cb-overview-reel-wrap">
                    <div class="cb-overview-reel-item">
                        <div class="cb-overview-reel-item-figure">
                            <div class="cb-overview-reel-item-figure-media"><video
                                    src="{{url('uploads/hello/source/' . $hello->creative_video)}}" autoplay playsinline
                                    loop muted></video></div>
                        </div>
                        <div class="cb-overview-reel-item-title">{{trans('home.Creative')}}<br> <em>{{trans('home.Design')}}</em></div>
                    </div>
                </div>
            </div>
            <div class="cb-overview-container -sm">
                <div class="cb-overview-divider">
                    <div class="cb-divider"></div>
                </div>
                <div class="cb-overview-grid">
                    <div class="cb-overview-grid-col -left">
                        <div class="cb-overview-icon -rotating"><svg class="cb-svgsprite -star">
                                <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#star')}}"></use>
                            </svg></div>
                    </div>
                    <div class="cb-overview-grid-col -right">
                        <div class="cb-overview-info">
                            <div class="cb-overview-caption -offset">
                                <h2>{{app()->getLocale() == 'en' ? $hello->creative_title_en : $hello->creative_title_ar}}</h2>
                            </div>
                            <div class="cb-overview-text">
                                <p>
                                    {!! app()->getLocale() == 'en' ? $hello->creative_text_en : $hello->creative_texr_ar !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cb-overview -inverse" data-menu-inverse data-cursor="-inverse">
        <div class="cb-overview-content">
            <div class="cb-overview-container -sm">
                <div class="cb-overview-header">
                    <h2><em>{{trans('home.SMART')}}</em><br> {{trans('home.DEVELOPMENT')}}<span class="-gxs -blink">_</span></h2>
                </div>
                <div class="cb-overview-offset">
                    <div class="cb-overview-figure -offsetable">
                        <div class="cb-overview-figure-bg -v1"></div>
                        <div class="cb-overview-figure-media -sm"><video autoplay playsinline loop muted>
                                <source data-src="{{url('uploads/hello/source/' . $hello->smart_video)}}"
                                    type="video/webm">
                                <source data-src="{{url('uploads/hello/source/' . $hello->smart_video)}}"
                                    type="video/mp4">
                            </video></div>
                    </div>
                </div>
                <div class="cb-overview-divider">
                    <div class="cb-divider"></div>
                </div>
                <div class="cb-overview-grid">
                    <div class="cb-overview-grid-col -left">
                        <div class="cb-overview-icon"><video data-src="{{url('uploads/hello/source/' . $hello->smart_video2)}}"
                                autoplay playsinline loop muted></video></div>
                    </div>
                    <div class="cb-overview-grid-col -right">
                        <div class="cb-overview-info">
                            <div class="cb-overview-caption -offset">
                                <h3>{{app()->getLocale() == 'en' ? $hello->smart_title_en : $hello->smart_title_ar}}</h3>
                            </div>
                            <div class="cb-overview-text">
                                <p>
                                    {!! app()->getLocale() == 'en' ? $hello->smart_text_en : $hello->smart_text_ar !!}
                                </p>
                            </div>
                        </div>
                        <?php 
                            $smartArea = App\Hello::first();
                            $smart = app()->getLocale() == 'en' ? $smartArea->smart_area_en : $smartArea->smart_area_ar;
                            $smartArr = explode(',', $smart);
                        ?>
                        @if(count($smartArr) > 0)
                            <div class="cb-overview-info">
                                <div class="cb-overview-caption -offset">
                                    <h3>{{trans('home.areas')}}</h3>
                                </div>
                                <div class="cb-overview-tags">
                                    @foreach($smartArr as $smartItem)
                                        <div class="cb-overview-tag">{{$smartItem}}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cb-overview">
        <div class="cb-overview-bg">
            <div class="cb-overview-bg-media"><video data-src="{{url('uploads/hello/source/' . $hello->brand_video)}}"
                    autoplay playsinline loop muted></video></div>
        </div>
        <div class="cb-overview-content">
            <div class="cb-overview-container -sm">
                <div class="cb-overview-header">
                    <h2>{{trans('home.Brand')}}<br> <em>{{trans('home.identities')}}</em></h2>
                </div>
                <div class="cb-overview-divider">
                    <div class="cb-divider"></div>
                </div>
                <div class="cb-overview-grid">
                    <div class="cb-overview-grid-col -left">
                        <div class="cb-overview-icon -stroka"><svg viewBox="0 0 64 64"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="16" y="2" width="32" height="60" rx="16" fill="none"
                                    stroke="currentColor" stroke-width="4" />
                                <rect x="2" y="48" width="32" height="60" rx="16" fill="none"
                                    transform="rotate(-90 2 48)" stroke="currentColor" stroke-width="4" />
                            </svg>
                        </div>
                    </div>
                    <div class="cb-overview-grid-col -right">
                        <div class="cb-overview-info">
                            <div class="cb-overview-caption -offset">
                                <h3>{{app()->getLocale() == 'en' ? $hello->brand_title_en : $hello->brand_title_ar}}</h3>
                            </div>
                            <div class="cb-overview-text">
                                <p>
                                    {!! app()->getLocale() == 'en' ? $hello->brand_text_en : $hello->brand_text_ar !!}                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cb-overview-spacer"></div>
            </div>
        </div>
    </section>
    <section class="cb-overview">
        <div class="cb-overview-content">
            <div class="cb-overview-container -sm">
                <div class="cb-overview-header">
                    <h2><em>{{trans('home.Art')}}</em><br> {{trans('home.direction')}}</h2>
                </div>
                <div class="cb-overview-offset">
                    <div class="cb-overview-figure -offsetable -offsetable-opaque">
                        <div class="cb-overview-figure-bg -v2"></div>
                        <div class="cb-overview-figure-media -sm"><video autoplay playsinline loop muted>
                                <source data-src="{{url('uploads/hello/source/' . $hello->art_video)}}"
                                    type="video/webm">
                                <source data-src="{{url('uploads/hello/source/' . $hello->art_video)}}"
                                    type="video/mp4">
                            </video></div>
                    </div>
                </div>
                <div class="cb-overview-divider">
                    <div class="cb-divider"></div>
                </div>
                <div class="cb-overview-caption">
                    <h3>{{app()->getLocale() == 'en' ? $hello->art_title_en : $hello->art_title_ar}}</h3>
                </div>
                <div class="cb-overview-grid -equal">
                    <div class="cb-overview-grid-col -left">
                        <div class="cb-overview-info">
                            <div class="cb-overview-text">
                                <p>
                                    {!! app()->getLocale() == 'en' ? $hello->art_text_en : $hello->art_text_ar !!} 
                                </p>
                            </div>
                            <div class="cb-overview-icon -rotating"><svg class="cb-svgsprite -star2">
                                    <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#star2')}}"></use>
                                </svg></div>
                        </div>
                    </div>
                    <?php 
                        $artArea = App\Hello::first();
                        $art = app()->getLocale() == 'en' ? $artArea->art_details_en : $artArea->art_details_ar;
                        $artArr = explode(',', $art);
                    ?>
                    @if(count($artArr) > 0)
                        <div class="cb-overview-grid-col -right">
                            <div class="cb-overview-info">
                                <div class="cb-overview-tags">
                                    @foreach($artArr as $artItem)
                                        <div class="cb-overview-tag">{{$artItem}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="cb-greeting">
        <div class="cb-greeting-bg">
            <div class="cb-greeting-bg-media"><img src="{{url('uploads/hello/source/' . $hello->greeting_image)}}"
                    loading="lazy" alt></div>
        </div>
        <div class="cb-greeting-content">
            <div class="cb-greeting-container -sm">
                <div class="cb-greeting-header">
                    <h2>{!! app()->getLocale() == 'en' ? $hello->greeting_title_en : $hello->greeting_title_ar !!}</h2>
                </div>
                <div class="cb-greeting-text">
                    <p>
                        {!! app()->getLocale() == 'en' ? $hello->greeting_text_en : $hello->greeting_text_ar !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    @if(count($projects) > 0)
    <section class="cb-showcase" data-menu-inverse data-cursor="-inverse">
        <div class="cb-showcase-content -cb">
            <div class="cb-showcase-container -sm">
                <div class="cb-showcase-header">
                    <h2><em>{{trans('home.Co')}}<span class="cb-coin -sm"><span class="cb-coin-svg -v2"></span><span
                                    class="cb-coin-stars"></span><span
                                    class="cb-coin-letter">{[trans('home.o')}}</span></span>{{trans('home.lest')}}</em><br><video
                            data-src="{{url('resources/assets/front/hello/img/header.mp4')}}" autoplay playsinline
                            loop muted></video> {{trans('home.projects')}}</h2>
                </div>
            </div>
            <div class="cb-showcase-container -xs">
                <div class="cb-showcase-items">@foreach($projects as $project)<a class="cb-showcase-item"
                        href="{{app()->getLocale() == 'en' ? LaravelLocalization::localizeUrl('project/'.$project->link_en) : LaravelLocalization::localizeUrl('project/'.$project->link_ar) }}">
                        <div class="cb-showcase-item-bg">
                            <div class="cb-showcase-item-bg-media"><video
                                    data-src="{{url('uploads/projects/source/' . $project->hello_video)}}" autoplay
                                    playsinline loop muted></video></div>
                        </div>
                        <div class="cb-showcase-item-reel">
                            <div class="cb-showcase-item-reel-wrap">
                                <div class="cb-showcase-item-reel-item">
                                    <div class="cb-showcase-item-title">{{trans('home.View case')}}</div>
                                    <div class="cb-showcase-item-ico"><span class="cb-coin"><span
                                                class="cb-coin-svg -v1"></span><span class="cb-coin-ico"><svg
                                                    class="cb-svgsprite -arrow-down-right-o">
                                                    <use
                                                        xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-down-right-o')}}">
                                                    </use>
                                                </svg></span></span></div>
                                </div>
                            </div>
                        </div>
                    </a>@endforeach</div>
            </div>
        </div>
    </section>
    @endif
    @if(count($brands) > 0)
        <section class="cb-brandreel" data-menu-inverse data-cursor="-inverse">
            <div class="cb-brandreel-content">
                <div class="cb-brandreel-container -sm">
                    <div class="cb-brandreel-grid">
                        <div class="cb-brandreel-grid-col -left">
                            <div class="cb-brandreel-figure">
                                <div class="cb-brandreel-figure-media"><video autoplay playsinline loop muted>
                                        <source data-src="{{url('uploads/hello/source/' . $hello->brandreel_video)}}"
                                            type="video/mp4">
                                    </video></div>
                            </div>
                        </div>
                        <div class="cb-brandreel-grid-col -right">
                            <div class="cb-brandreel-text">
                                <p>{!! app()->getLocale() == 'en' ? $hello->brandreel_text_en : $hello->brandreel_text_ar !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="cb-brandreel-divider">
                        <div class="cb-divider"></div>
                    </div>
                </div>
                <div class="cb-brandreel-reels">
                        <div class="cb-brandreel-reel">
                            <div class="cb-brandreel-reel-wrap">
                            @isset($brands[0]->brands()[0])
                                @foreach($brands[0]->brands()[0]  as $brandItem)
                                <div class="cb-brandreel-reel-item -{{$brandItem->name_en}}"><img
                                        src="{{url('uploads/brandsreel/source/' . $brandItem->logo)}}" loading="lazy"
                                        alt="{{app()->getLocale() == 'en' ? $brandItem->name_en : $brandItem->name_ar}}"></div>
                                @endforeach
                            @endisset
                            </div>
                        </div>
                        <div class="cb-brandreel-reel">
                            <div class="cb-brandreel-reel-wrap">
                            @isset($brands[0]->brands()[1])
                                @foreach($brands[0]->brands()[1]  as $brandItem)
                                <div class="cb-brandreel-reel-item -{{$brandItem->name_en}}"><img
                                        src="{{url('uploads/brandsreel/source/' . $brandItem->logo)}}" loading="lazy" alt="{{app()->getLocale() == 'en' ? $brandItem->name_en : $brandItem->name_ar}}">
                                </div>
                                @endforeach
                            @endisset
                            </div>
                        </div>
                </div>
            </div>
        </section>
    @endif
    @if(count($postcards) > 0)
    <section class="cb-postcard" data-menu-inverse data-cursor="-inverse">
        <div class="cb-postcard-bg"></div>
        <div class="cb-postcard-content -ct">
            <div class="cb-postcard-items">
                @foreach($postcards as $postcard)
                    <div class="cb-postcard-item">
                        <div class="cb-postcard-item-back">
                            <div class="cb-postcard-item-title">{!! app()->getLocale() == 'en' ? $postcard->name_en : $postcard->name_ar !!}</div>
                            <div class="cb-postcard-item-tags">
                            <?php 
                                $postcardNew = app()->getLocale() == 'en' ? $postcard->details_en : $postcard->details_ar;
                                $postcardArr = explode(',', $postcardNew);
                                $new = array_slice($postcardArr, 0, 3);
                            ?>
                                @foreach($postcardArr as $postcardItem)
                                    <div class="cb-postcard-item-tag">{{$postcardItem}}</div>
                                @endforeach
                            </div>
                            <div class="cb-postcard-item-arr"><svg class="cb-svgsprite -chevron-right-o">
                                    <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#chevron-right-o')}}"></use>
                                </svg></div>
                            <div class="cb-postcard-item-text">
                                <p>
                                {!! app()->getLocale() == 'en' ? $postcard->text_en : $postcard->text_ar !!}
                                </p>
                            </div>
                        </div>
                        <div class="cb-postcard-item-front">
                            <div class="cb-postcard-item-bg"><img src="{{url('uploads/postcards/source/' . $postcard->image)}}"
                                    srcset="{{url('uploads/postcards/source/' . $postcard->image)}} 2x" loading="lazy"
                                    alt></div>
                            <div class="cb-postcard-item-title">{!! app()->getLocale() == 'en' ? $postcard->name_en : $postcard->name_ar !!}</div>
                            <div class="cb-postcard-item-tags">
                                @foreach($new as $postcardItem)
                                    <div class="cb-postcard-item-tag">{{$postcardItem}}</div>
                                @endforeach
                            </div>
                            <div class="cb-postcard-item-arr"><svg class="cb-svgsprite -chevron-right-o">
                                    <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#chevron-right-o')}}"></use>
                                </svg></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @if(count($achievements) > 0)
    <section class="cb-achievement">
        <div class="cb-achievement-content">
            <div class="cb-achievement-container -xs">
                <div class="cb-achievement-text">
                    <p>{!! app()->getLOcale() == 'en' ? $hello->achievement_text_en : $hello->achievement_text_ar !!}</p>
                </div>
                <div class="cb-achievement-items">
                    @foreach($achievements as $achievement)
                        <div class="cb-achievement-item -tertiary">
                            <div class="cb-achievement-item-bg" style="background-color: {{$achievement->color}};">
                                <div class="cb-achievement-item-figure -sm">
                                    <div class="cb-achievement-item-figure-media"><video autoplay playsinline loop
                                            muted>
                                            <source data-src="{{url('uploads/achievements/source/' . $achievement->video)}}"
                                                type="video/webm;codecs=&quot;vp09.00.10.08.00&quot;">
                                            <source data-src="{{url('uploads/achievements/source/' . $achievement->video)}}"
                                                type="video/mp4">
                                        </video></div>
                                </div>
                            </div>
                            <div class="cb-achievement-item-info">
                                <div class="cb-achievement-item-title">{!! app()->getLocale() == 'en' ? $achievement->title_en : $achievement->title_ar !!}</div>
                                <div class="cb-achievement-item-text">
                                    <p>{!! app()->getLocale() == 'en' ? $achievement->text_en : $achievement->text_ar !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="cb-overview -gray">
        <div class="cb-overview-content">
            <div class="cb-overview-container -sm">
                <div class="cb-overview-header">
                    <h2><em>{{trans('home.Our')}}</em><br>{{trans('home.Philos')}}<span class="cb-coin"><span class="cb-coin-svg -v2"></span><span
                                class="cb-coin-video"><video data-src="{{url('uploads/hello/source/' . $hello->our_philosophy_video)}}"
                                    autoplay playsinline loop muted></video></span><span
                                class="cb-coin-letter">o</span></span>{{trans('home.phy')}}</h2>
                </div>
                <div class="cb-overview-divider">
                    <div class="cb-divider"></div>
                </div>
                <div class="cb-overview-grid">
                    <div class="cb-overview-grid-col -left">
                        <div class="cb-overview-icon -rotating"><svg class="cb-svgsprite -star">
                                <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#star')}}"></use>
                            </svg></div>
                    </div>
                    <div class="cb-overview-grid-col -right">
                        <div class="cb-overview-info">
                            <div class="cb-overview-caption -offset">
                                <h3>{{app()->getLocale() == 'en' ? $hello->our_philosophy_title_en : $hello->our_philosophy_title_ar}}</h3>
                            </div>
                            <div class="cb-overview-text">
                                <p>
                                    {!! app()->getLocale() == 'en' ? $hello->our_philosophy_text_en : $hello->our_philosophy_text_ar !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cb-outro" data-menu-inverse data-cursor="-inverse">
        <div class="cb-outro-content">
            <div class="cb-outro-container -sm">
                <div class="cb-outro-header">
                    <h2><em>{{trans('home.Foll')}}</em><span class="cb-coin"><span class="cb-coin-svg -v1"></span><span
                                class="cb-coin-video"><video data-src="{{url('resources/assets/front/hello/img/home/3.mp4')}}"
                                    autoplay playsinline loop muted></video></span><span
                                class="cb-coin-letter">{{trans('home.o')}}</span></span>{{trans('home.w')}}<br>{{trans('home.Us')}}</h2>
                </div>
                <div class="cb-outro-caption">
                    <h3>{{trans('home.Social Media and contacts')}}</h3>
                </div>
            </div>
            <div class="cb-outro-socials">@if(! empty($setting->facebook))<a class="cb-outro-social"
                    href="{{$setting->facebook}}" rel="noopener" target="_blank">
                    <div class="cb-outro-social-divider"></div>
                    <div class="cb-outro-container -sm">
                        <div class="cb-outro-social-info">
                            <div class="cb-outro-social-title">{{trans('home.facebook')}}</div>
                            <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                    <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                </svg></div>
                        </div>
                    </div>
                    <div class="cb-outro-social-reel">
                        <div class="cb-outro-social-reel-wrap">
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-title">{{trans('home.facebook')}}</div>
                            </div>
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                        <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-outro-social-divider"></div>
                </a>@endif @if(! empty($setting->instgram))<a class="cb-outro-social"
                    href="{{$setting->instgram}}" rel="noopener" target="_blank">
                    <div class="cb-outro-social-divider"></div>
                    <div class="cb-outro-container -sm">
                        <div class="cb-outro-social-info">
                            <div class="cb-outro-social-title">{{trans('home.instgram')}}</div>
                            <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                    <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                </svg></div>
                        </div>
                    </div>
                    <div class="cb-outro-social-reel">
                        <div class="cb-outro-social-reel-wrap">
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-title">{{trans('home.instgram')}}</div>
                            </div>
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                        <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-outro-social-divider"></div>
                </a>@endif @if(! empty($setting->linkedin))<a class="cb-outro-social" href="{{$setting->linkedin}}" rel="noopener"
                    target="_blank">
                    <div class="cb-outro-container -sm">
                        <div class="cb-outro-social-info">
                            <div class="cb-outro-social-title">{{trans('home.linkedin')}}</div>
                            <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                    <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                </svg></div>
                        </div>
                    </div>
                    <div class="cb-outro-social-reel">
                        <div class="cb-outro-social-reel-wrap">
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-title">{{trans('home.linkedin')}}</div>
                            </div>
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                        <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-outro-social-divider"></div>
                </a>@endif @if(! empty($setting->dribbble))<a class="cb-outro-social" href="{{$setting->dribbble}}" rel="noopener"
                    target="_blank">
                    <div class="cb-outro-container -sm">
                        <div class="cb-outro-social-info">
                            <div class="cb-outro-social-title">{{trans('home.dribbble')}}</div>
                            <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                    <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                </svg></div>
                        </div>
                    </div>
                    <div class="cb-outro-social-reel">
                        <div class="cb-outro-social-reel-wrap">
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-title">{{trans('home.dribbble')}}</div>
                            </div>
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                        <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-outro-social-divider"></div>
                </a>@endif @if(! empty($setting->github))<a class="cb-outro-social" href="{{$setting->github}}" rel="noopener" target="_blank">
                    <div class="cb-outro-container -sm">
                        <div class="cb-outro-social-info">
                            <div class="cb-outro-social-title">{{trans('home.github')}}</div>
                            <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                    <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                </svg></div>
                        </div>
                    </div>
                    <div class="cb-outro-social-reel">
                        <div class="cb-outro-social-reel-wrap">
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-title">{{trans('home.github')}}</div>
                            </div>
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                        <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-outro-social-divider"></div>
                </a>@endif @if(! empty($setting->youtube))<a class="cb-outro-social" href="{{$setting->youtube}}"
                    rel="noopener" target="_blank">
                    <div class="cb-outro-container -sm">
                        <div class="cb-outro-social-info">
                            <div class="cb-outro-social-title">{{trans('home.youtube')}}</div>
                            <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                    <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                </svg></div>
                        </div>
                    </div>
                    <div class="cb-outro-social-reel">
                        <div class="cb-outro-social-reel-wrap">
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-title">{{trans('home.youtube')}}</div>
                            </div>
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                        <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-outro-social-divider"></div>
                </a>@endif @if(! empty($setting->behance))<a class="cb-outro-social" href="{{$setting->behance}}" rel="noopener"
                    target="_blank">
                    <div class="cb-outro-container -sm">
                        <div class="cb-outro-social-info">
                            <div class="cb-outro-social-title">{{trans('home.behance')}}</div>
                            <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                    <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                </svg></div>
                        </div>
                    </div>
                    <div class="cb-outro-social-reel">
                        <div class="cb-outro-social-reel-wrap">
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-title">{{trans('home.behance')}}</div>
                            </div>
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                        <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-outro-social-divider"></div>
                </a>@endif @if(! empty($setting->twitter))<a class="cb-outro-social" href="{{$setting->twitter}}" rel="noopener" target="_blank">
                    <div class="cb-outro-container -sm">
                        <div class="cb-outro-social-info">
                            <div class="cb-outro-social-title">{{trans('home.twitter')}}</div>
                            <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                    <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                </svg></div>
                        </div>
                    </div>
                    <div class="cb-outro-social-reel">
                        <div class="cb-outro-social-reel-wrap">
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-title">{{trans('home.twitter')}}</div>
                            </div>
                            <div class="cb-outro-social-reel-item">
                                <div class="cb-outro-social-arr"><svg class="cb-svgsprite -arrow-up-right-o">
                                        <use xlink:href="{{url('resources/assets/front/hello/sprites/svgsprites.svg#arrow-up-right-o')}}"></use>
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-outro-social-divider"></div>
                </a>@endif</div>
            <div class="cb-outro-container -sm">
                <div class="cb-outro-locations">
                    @if(count($addresses) > 0)
                        @foreach($addresses as $address)
                            <div class="cb-outro-location">
                                        <div class="cb-outro-location-caption">{{app()->getLocale() == 'en' ? $address->name_en : $address->name_ar}}</div>
                                        <div class="cb-outro-location-address">{{app()->getLocale() == 'en' ? $address->address_en : $address->address_ar}}</div>
                                        @if(! empty($address->email))
                                        <div class="cb-outro-location-action"><a class="cb-btn cb-btn_cta -md -inverse"
                                                href="mailto:{{$address->email}}"><span class="cb-btn_cta-border"></span><span
                                                    class="cb-btn_cta-ripple"><span></span></span><span
                                                    class="cb-btn_cta-title"><span
                                                        data-text="{{$address->email}}">{{$address->email}}</span></span></a></div>@endif   
                                        @if(! empty($address->mobile))
                                            <div class="cb-outro-location-action"><a class="cb-btn cb-btn_cta -md -inverse"
                                            href="tel:+2{{$address->mobile}}"><span class="cb-btn_cta-border"></span><span
                                                class="cb-btn_cta-ripple"><span></span></span><span
                                                class="cb-btn_cta-title"><span data-text="{{$address->mobile}}">
                                                    {{$address->mobile}}
                                                </span></span></a></div>@endif 
                        
                            </div>
                        @endforeach
                     @endif
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    {{--<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
    <script>
         grecaptcha.ready(function() {
             grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {action: 'contact'}).then(function(token) {
                if (token) {
                  document.getElementById('recaptcha').value = token;
                }
             });
         });
    </script>--}}

    @if(Session::has('contact_message'))
        <script>
            $.alert({
                title: "{{trans('home.contact_us')}}",
                content: "{{Session::get('contact_message')}}",
                buttons: {
                    ok: {
                        text: "{{trans('home.OK')}}",
                        btnClass: 'btn main-btn',
                    },
                },
                columnClass: 'col-md-6'
            });
        </script>
    @endif
    @php
        Session::forget('contact_message')
    @endphp
@endsection    