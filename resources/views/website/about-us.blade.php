@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
    @php echo $schema @endphp
@endsection
@section('controller')
    <div class="cb-view" data-controller="aboutController" id="view-main"><canvas class="cb-scene"></canvas>
@endsection

@section('content')
<div class="cb-navbar">
    <div class="cb-navbar-strip">
        <div class="cb-navbar-grid">
            <div class="cb-navbar-grid-col -left">
                <div class="cb-navbar-logo">
                    <a href="{{LaravelLocalization::localizeUrl('/')}}" aria-label="All Safe">
                        <img src="{{url('uploads/settings/source/'.$configration->app_logo)}}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="cb-navbar-grid-col -right">
                <div class="cb-navbar-toggle"><button class="cb-btn cb-btn_menu" aria-label="menu"><span
                            class="cb-btn_menu-title">{{trans('home.menu')}}</span><span class="cb-btn_menu-box"
                            style="visibility:hidden"><span></span><span></span></span></button></div>
            </div>
        </div>
    </div>
</div>
<header class="cb-tophead">
    <div class="cb-tophead-content">
        <div class="cb-tophead-container">
            <div class="cb-tophead-title -lg">
                <h1>{{trans('home.Creativity')}}<br> {{trans('home.meets technology')}}</h1>
            </div>
        </div>
    </div>
</header>
<!-- Img -->
<section class="cb-screenshot">
    <div class="cb-screenshot-preview -lg"><img src="{{url('uploads/aboutStrucs/source/' . $about->about_breadcrump)}}" alt></div>
</section>
@if (count($aboutStrucs) > 0)
    @foreach ($aboutStrucs as $aboutStruc)
    <!-- Brief -->
    <section class="cb-brief">
        <div class="cb-brief-content">
            <div class="cb-brief-container">
                <div class="cb-brief-grid">
                    <div class="cb-brief-grid-col -left">
                        <div class="cb-brief-header">
                            <h2>{{$aboutStruc->title}}</h2>
                        </div>
                    </div>
                    <div class="cb-brief-grid-col -right">
                        <div class="cb-brief-text">
                            <p>
                                {!! $aboutStruc->text !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
@endif
<!-- Spilt Images -->
<section class="cb-splitshow">
    <div class="cb-splitshow-content -cp">
        <div class="cb-splitshow-container">
            <div class="cb-splitshow-items">
                <div class="cb-splitshow-col -left">
                    <div class="cb-splitshow-item">
                        <div class="cb-splitshow-preview -sm"><img
                                src="{{url('uploads/aboutStrucs/source/' . $about->image)}}"
                                srcset="{{url('uploads/aboutStrucs/source/' . $about->image)}} 2x" loading="lazy" alt>
                        </div>
                    </div>
                </div>
                <div class="cb-splitshow-col -right">
                    <div class="cb-splitshow-item">
                        <div class="cb-splitshow-preview -sm"><img
                                src="{{url('uploads/aboutStrucs/source/' . $about->image2)}}"
                                srcset="{{url('uploads/aboutStrucs/source/' . $about->image2)}} 2x" loading="lazy" alt>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Description (Text) -->
<section class="cb-description">
    <div class="cb-description-content -rb">
        <div class="cb-description-container">
            <div class="cb-description-header">
                <h2>{!! app()->getLocale() == 'en' ? $about->title_en : $about->title_ar !!}</h2>
            </div>
            <div class="cb-description-text">
                {!! app()->getLocale() == 'en' ? $about->text_en : $about->text_ar !!}
            </div>
        </div>
    </div>
</section>
<!-- One Iamge again -->
<section class="cb-screenshot">
    <div class="cb-screenshot-content -cp">
        <div class="cb-screenshot-container">
            <div class="cb-screenshot-preview">
                <img src="{{url('uploads/aboutStrucs/source/' . $about->image3)}}" loading="lazy" alt>
            </div>
        </div>
    </div>
</section>
<!-- Nums -->
<!-- <section class="cb-numstat">
    <div class="cb-numstat-content -cb">
        <div class="cb-numstat-container">
            <div class="cb-numstat-grid">
                <div class="cb-numstat-grid-col">
                    <div class="cb-numstat-num">
                        <div class="cb-numstat-num-digit" style="transform:translateY(-60%)">
                            <span>0</span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span>
                        </div>
                        <div class="cb-numstat-num-digit">
                            <span>0</span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span>
                        </div>
                        <div class="cb-numstat-num-char">+</div>
                    </div>
                    <div class="cb-numstat-title">{{trans('home.members')}}</div>
                </div>
                <div class="cb-numstat-grid-col">
                    <div class="cb-numstat-num">
                        <div class="cb-numstat-num-digit" style="transform:translateY(-30%)">
                            <span>0</span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span>
                        </div>
                        <div class="cb-numstat-num-digit">
                            <span>0</span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span>
                        </div>
                        <div class="cb-numstat-num-digit">
                            <span>0</span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span>
                        </div>
                        <div class="cb-numstat-num-char">+</div>
                    </div>
                    <div class="cb-numstat-title">{{trans('home.completed_projects')}}</div>
                </div>
                <div class="cb-numstat-grid-col">
                    <div class="cb-numstat-num">
                        <div class="cb-numstat-num-digit" style="transform:translateY(-10%)">
                            <span>0</span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span>
                        </div>
                        <div class="cb-numstat-num-digit">
                            <span>0</span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span>
                        </div>
                        <div class="cb-numstat-num-char">&nbsp;{{trans('home.years')}}&nbsp;</div>
                    </div>
                    <div class="cb-numstat-title">{{trans('home.of_experience')}}</div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- More Description -->
<section class="cb-description">
    <div class="cb-description-content -rb">
        <div class="cb-description-container">
            <div class="cb-description-header">
                <h2>{!! app()->getLocale() == 'en' ? $about->more_title_en : $about->more_title_ar !!}</h2>
            </div>
            <div class="cb-description-text">
                <p>
                    {!! app()->getLocale() == 'en' ? $about->more_text_en : $about->more_text_ar !!}
                </p>
            </div>
        </div>
    </div>
</section>
@if(! empty($about->about_video))
    <!-- Video -->
    <section class="cb-screenshot">
        <div class="cb-screenshot-preview -lg">
            <video preload="auto" loop muted autoplay playsinline>
                <source src="{{url('uploads/aboutStrucs/source/' . $about->about_video)}}" type="video/mp4">
            </video>
        </div>
    </section>
@endif
@if(count($brands) > 0)
    <!-- Our Clients -->
    <section class="cb-billboard">
        <div class="cb-billboard-content -cb">
            <div class="cb-billboard-container">
                <div class="cb-billboard-header">
                    <h2>{{trans('home.We work with people')}}<br> {{trans('home.from all over the world')}}</h2>
                </div>
                <div class="cb-billboard-items">
                    @foreach($brands as $brand)
                        <div class="cb-billboard-item">
                            <div class="cb-billboard-img"><img
                                    src="{{url('uploads/brands/source/' . $brand->logo)}}"
                                    srcset="{{url('uploads/brands/source/' . $brand->logo)}}" loading="lazy"
                                    alt="All Safe"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
@if(count($testimonials) > 0)
    <!-- Testimonials -->
    <section class="cb-feedback">
        <div class="cb-feedback-content">
            <div class="cb-feedback-container">
                <div class="cb-feedback-grid">
                    <div class="cb-feedback-grid-col -left">
                        <div class="cb-feedback-header">
                            <h2>{{trans('home.Feedback from our clients')}}</h2>
                        </div>
                    </div>
                    <div class="cb-feedback-grid-col -right">
                        <div class="cb-feedback-items">
                            @foreach ($testimonials as $testimonial)
                                <div class="cb-feedback-item" data-project="cisco">
                                    <blockquote class="cb-feedback-quote" cite="{{url('uploads/testimonials/source/' . $testimonial->pdf)}}">
                                        <div class="cb-feedback-author">
                                            <div class="cb-feedback-author-line"></div>
                                            <div class="cb-feedback-author-name"><b>{{$testimonial->name}}</b></div>
                                        </div>
                                        <div class="cb-feedback-text">
                                            <p>{!! $testimonial->text !!}</p>
                                        </div>
                                        <div class="cb-feedback-more"><a class="cb-btn cb-btn_seemore"
                                                href="{{url('uploads/testimonials/source/' . $testimonial->pdf)}}" target="_blank"><span
                                                    data-text="{{trans('home.See the full feedback')}}">{{trans('home.See the full feedback')}}
                                                    </span></a></div>
                                    </blockquote>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- Spilt Images -->
<section class="cb-splitshow">
    <div class="cb-splitshow-content -cp">
        <div class="cb-splitshow-container">
            <div class="cb-splitshow-items">
                <div class="cb-splitshow-col -left">
                    <div class="cb-splitshow-item">
                        <div class="cb-splitshow-preview -sm"><img
                                src="{{url('uploads/aboutStrucs/source/' . $about->image4)}}"
                                srcset="{{url('uploads/aboutStrucs/source/' . $about->image4)}} 2x" loading="lazy" alt>
                        </div>
                    </div>
                </div>
                <div class="cb-splitshow-col -right">
                    <div class="cb-splitshow-item">
                        <div class="cb-splitshow-preview -sm"><img
                                src="{{url('uploads/aboutStrucs/source/' . $about->image5)}}"
                                srcset="{{url('uploads/aboutStrucs/source/' . $about->image5)}} 2x" loading="lazy" alt>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Description (Text) -->
<section class="cb-description">
    <div class="cb-description-content -rb">
        <div class="cb-description-container">
            <div class="cb-description-header">
                <h2>{!! app()->getLocale() == 'en' ? $about->last_title_en : $about->last_title_ar !!}</h2>
            </div>
            <div class="cb-description-text">
                {!! app()->getLocale() == 'en' ? $about->last_text_en : $about->last_text_ar !!}
            </div>
        </div>
    </div>
</section>

<!-- Iframe -->
<section class="cb-splitshow">
    <div class="cb-splitshow-content -cp">
        <div class="cb-splitshow-container">
            <div class="cb-description-header" style="margin-bottom: 50px;">
                <h2>{{trans('home.Our_profile_company')}}</h2>
            </div>
            <div class="cb-splitshow-items">
                <iframe src="{{url('resources/assets/front/img/profile.pdf')}}" style="width:100%; height: 85vh;" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</section>

@if(count($inspiros) > 0)
    <section class="cb-smfeed" style="margin-top: 70px;">
        <div class="cb-smfeed-content -st -rb">
            <div class="cb-smfeed-container">
                <div class="cb-smfeed-header">
                    <h2>{{trans('home.New Day')}} –<br> {{trans('home.New Achievement')}}</h2>
                </div>
                <div class="cb-smfeed-carousel" data-cursor-text="Drag">
                    <div class="cb-smfeed-items">
                        @foreach($inspiros as $inspiro)
                            <!-- One Item -->
                            <a class="cb-smfeed-item -facebook" href="{{$inspiro->slug}}" target="_blank" rel="noopener">
                                <span class="cb-smfeed-item-img"><img
                                        src="{{url('uploads/inspiros/source/' . $inspiro->image)}}"
                                        loading="lazy" alt data-lazy-force>
                                </span>
                                <span class="cb-smfeed-item-url">
                                    <svg class="cb-svgsprite -facebook">
                                        <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#facebook')}}"></use>
                                    </svg>{{app()->getLocale() == 'en' ? $inspiro->title_en : $inspiro->title_ar}}
                                </span>
                                <span class="cb-smfeed-item-text">
                                {!! app()->getLocale() == 'en' ? \Illuminate\Support\Str::limit(strip_tags($inspiro->text_en), $limit = 50, $end = '...') : \Illuminate\Support\Str::limit(strip_tags($inspiro->text_ar), $limit = 50, $end = '...') !!}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@endsection



