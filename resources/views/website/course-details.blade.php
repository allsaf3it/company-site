@extends('layouts.app')
@section('meta')
    <title>{{app()->getLocale() == 'en' ? $course->title_en : $course->title_ar}}</title>
@endsection
@section('controller')
    <div class="cb-view" data-controller="tutorialsController" id="view-main"><canvas class="cb-scene"></canvas>
@endsection

@section('content')
    <div class="cb-navbar -inverse">
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
    <header class="cb-topcover -inverse">
        <div class="cb-topcover-bg">
            <div class="cb-topcover-bg-video"><video preload="auto" loop muted autoplay playsinline>
                    <source src="{{url('uploads/courses/source/' . $course->breadcrump_video)}}"
                        type="video/mp4">
                </video></div>
            <div class="cb-topcover-bg-overlay"></div>
        </div>
        <div class="cb-topcover-content">
            <div class="cb-topcover-body">
                <div class="cb-topcover-container">
                    <div class="cb-topcover-title">{{app()->getLocale() == 'en' ? $course->title_en : $course->title_ar}}</div>
                    <div class="cb-topcover-header">
                        <h1>{{app()->getLocale() == 'en' ? $course->title_en : $course->title_ar}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <article class="cb-textpaper">
        <div class="cb-textpaper-content">
            <div class="cb-textpaper-container">
                <div class="cb-textpaper-text -lg">
                    <p>
                        {!! app()->getLocale() == 'en' ? $course->text_en : $course->text_ar !!}
                    </p>
                </div>
            </div>
            @if(! empty($course->youtube_link))
                <div class="cb-textpaper-container -md">
                    <div class="cb-textpaper-embedded">
                        <div class="cb-embedded -youtube"
                            data-src="{{$course->youtube_link}}">
                            <div class="cb-embedded-play"></div><img
                                src="{{url('uploads/courses/source/' . $course->image)}}" loading="lazy" alt>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </article>
    @if(count($courses) > 0)
        <section class="cb-employment">
            <div class="cb-employment-content -rp">
                <div class="cb-employment-container">
                    <div class="cb-employment-header">
                        <h2>{{trans('home.Similar')}}<br> {{trans('home.SimilarCourses')}}</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="cb-rcfeed">
            <div class="cb-rcfeed-content -ct -rb">
                <div class="cb-rcfeed-container -ml">
                    <div class="cb-rcfeed-items">
                        @foreach($courses as $courseItem)<a class="cb-rcfeed-item" href="{{app()->getLocale() == 'en' ? LaravelLocalization::localizeUrl('course/'.$courseItem->link_en) : LaravelLocalization::localizeUrl('course/'.$courseItem->link_ar) }}"><span
                                class="cb-rcfeed-item-img"><img src="{{url('uploads/courses/source/' . $courseItem->image)}}"
                                    srcset="{{url('uploads/courses/source/' . $courseItem->image)}}" loading="lazy" alt></span><span
                                class="cb-rcfeed-item-tag"><span class="cb-rcfeed-item-tag-item">{{app()->getLocale() == 'en' ? $courseItem->title_en : $courseItem->title_ar}}
                                    </span></span><span class="cb-rcfeed-item-title">{!! app()->getLocale() == 'en' ? \Illuminate\Support\Str::limit(strip_tags($courseItem->text_en), $limit = 50, $end = '...') : \Illuminate\Support\Str::limit(strip_tags($courseItem->text_ar), $limit = 50, $end = '...') !!}
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

@endsection
