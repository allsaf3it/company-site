@extends('layouts.app')

@section('meta')
    @php echo $metatags @endphp

    @php echo $schema @endphp
@endsection
@section('controller')
    <div class="cb-view" data-controller="homeController" id="view-main"><canvas class="cb-scene"></canvas>
@endsection

@section('content')
<div class="cb-navbar">
    <div class="cb-navbar-strip">
        <div class="cb-navbar-grid">
            <div class="cb-navbar-grid-col -left">
                <div class="cb-navbar-logo">
                    <a href="{{LaravelLocalization::localizeUrl('/')}}">
                        <img src="{{url('uploads/settings/source/'.$configration->app_logo)}}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="cb-navbar-grid-col -right">
                <div class="cb-navbar-link"><button class="cb-btn cb-btn_nav"><span>{{trans('home.our showreel')}}</span></button></div>
                <div class="cb-navbar-toggle"><button class="cb-btn cb-btn_menu" aria-label="menu"><span
                            class="cb-btn_menu-title">{{trans('home.menu')}}</span><span class="cb-btn_menu-box"
                            style="visibility:hidden"><span></span><span></span></span></button></div>
            </div>
        </div>
    </div>
</div>
<header class="cb-hero">
    <div class="cb-hero-content">
        <div class="cb-hero-body">
            <div class="cb-hero-container">
                <div class="cb-hero-grid">
                    <div class="cb-hero-grid-col -left">
                        <div class="cb-hero-video"><video preload="auto" loop muted playsinline>
                                <source src="{{url('uploads/aboutStrucs/source/' . $about->video)}}" type="video/mp4">
                            </video></div>
                    </div>
                    @if(count($services) > 0)
                        <div class="cb-hero-grid-col -right">
                            <div class="cb-hero-header">
                                <h1>{{trans('home.We make it happen')}}</h1>
                            </div>
                            <div class="cb-hero-nav">
                                @foreach ($services as $service)
                                    <div class="cb-hero-nav-item" data-video-src="{{url('uploads/services/source/' . $service->video)}}">
                                        <div class="cb-hero-nav-item-spacer"></div><a
                                            href="#"><span>{{app()->getLocale() == 'en' ? $service->name_service_en : $service->name_service_ar}}</span></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="cb-hero-footer">
            <div class="cb-hero-container">
                <div class="cb-hero-text">
                    <p>
                        {!! app()->getLocale() == 'en' ? $about->services_text_en : $about->services_text_ar !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>
@if(count($projects) > 0)
    <section class="cb-featured">
        <div class="cb-featured-content">
            <div class="cb-featured-container">
                <div class="cb-featured-header">
                    <h2>{{trans('home.fFeatured')}} <span>{{trans('home.fprojects')}}</span></h2>
                </div>
                <div class="cb-featured-items">
                    @foreach ($projects as $project)
                        <div class="cb-featured-item" data-project-bg="{{$project->color}}"
                            data-cursor="-color-ulesson">
                            <div class="cb-featured-item-grid">
                                <div class="cb-featured-item-grid-col -right">
                                    <a class="cb-featured-item-img" href="{{app()->getLocale() == 'en' ? LaravelLocalization::localizeUrl('project/'.$project->link_en) : LaravelLocalization::localizeUrl('project/'.$project->link_ar) }}"
                                        >
                                        <picture>
                                            <source
                                                srcset="{{url('uploads/projects/source/' . $project->image)}}, {{url('uploads/projects/source/' . $project->image)}} 2x"
                                                media="(max-width:1199px)"><img src="{{url('uploads/projects/source/' . $project->image2)}}"
                                                srcset="{{url('uploads/projects/source/' . $project->image2)}} 2x" loading="lazy" alt="{{$project->img_alt}}">
                                        </picture>
                                    </a>
                                </div>
                                <div class="cb-featured-item-grid-col -left">
                                    <div class="cb-featured-item-header">
                                        <h3>{{ app()->getLocale() == 'en' ? $project->title_en : $project->title_ar }}</h3>
                                    </div>
                                    <div class="cb-featured-item-text">
                                        <p>{!! app()->getLocale() == 'en' ? $project->name_en : $project->name_ar !!}</p>
                                    </div>
                                        <div class="cb-featured-item-tags">
                                            <p>{{app()->getLocale() == 'en' ? $project->featurs_en : $project->featurs_ar}}</p>
                                        </div>                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="cb-featured-more"><a class="cb-btn cb-btn_more" href="{{LaravelLocalization::localizeUrl('/projects')}}"
                        data-magnetic><span class="cb-btn_more-title"><span data-text="{{trans('home.view all projects')}}">{{trans('home.view all projects')}}
                                </span></span><span
                            class="cb-btn_more-ripple"><span></span></span></a></div>
            </div>
        </div>
    </section>
@endif
@if (count($courses) > 0)
    <section class="cb-description">
        <div class="cb-description-content -st -mb">
            <div class="cb-description-container">
                <div class="cb-description-header">
                    <h2>{{trans('home.Development and')}}<br> {{trans('home.design resources')}}</h2>
                </div>
                <div class="cb-description-text">
                    <p>
                        {!! app()->getLocale() == 'en' ? $about->course_desc_en : $about->course_desc_ar !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="cb-rcfeed">
        <div class="cb-rcfeed-content -ct -rb">
            <div class="cb-rcfeed-container -ml">
                <div class="cb-rcfeed-items">@foreach($courses as $course)<a class="cb-rcfeed-item" href="{{app()->getLocale() == 'en' ? LaravelLocalization::localizeUrl('course/'.$course->link_en) : LaravelLocalization::localizeUrl('course/'.$course->link_ar) }}"><span
                            class="cb-rcfeed-item-img"><img src="{{url('uploads/courses/source/' . $course->image)}}"
                                srcset="{{url('uploads/courses/source/' . $course->image)}}" loading="lazy" alt></span><span
                            class="cb-rcfeed-item-tag"><span class="cb-rcfeed-item-tag-item">{{app()->getLocale() == 'en' ? $course->title_en : $course->title_ar}}
                                </span></span><span class="cb-rcfeed-item-title">{!! app()->getLocale() == 'en' ? \Illuminate\Support\Str::limit(strip_tags($course->small_text_en), $limit = 150, $end = '...') : \Illuminate\Support\Str::limit(strip_tags($course->small_text_ar), $limit = 150, $end = '...') !!}
                            </span></a>@endforeach
                </div>
                <div class="cb-rcfeed-more"><a class="cb-btn cb-btn_more" href="{{LaravelLocalization::localizeUrl('/courses')}}"
                        data-magnetic><span class="cb-btn_more-title"><span data-text="{{trans('home.View all resources')}}">{{trans('home.View all courses')}}
                                </span></span><span
                            class="cb-btn_more-ripple"><span></span></span></a></div>
            </div>
        </div>
    </section>
@endif
@if(count($inspiros) > 0)
    <section class="cb-smfeed">
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