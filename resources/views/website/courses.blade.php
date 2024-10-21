@extends('layouts.app')
@section('meta')
    <title>{{trans('home.courses')}}</title>
@endsection
@section('controller')
    <div class="cb-view" data-controller="tutorialsController" id="view-main"><canvas class="cb-scene"></canvas>
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

    <header class="cb-rcfeed">
            <div class="cb-rcfeed-content -lg">
                <div class="cb-rcfeed-container">
                    <div class="cb-rcfeed-header">
                        <h1></h1>
                    </div>
                    <div class="cb-rcfeed-title">
                        <h2>{{trans('home.Development and')}}<br> {{trans('home.design resources')}}</h2>
                    </div>
                    <div class="cb-rcfeed-filter">
                        <a class="cb-rcfeed-filter-item -active" href="#">
                            <span>{{trans('home.all')}}</span>
                        </a>
                        @foreach($parentCourses as $parentCourse)
                            <a class="cb-rcfeed-filter-item" href="#" data-filter-target="{{$parentCourse->id}}">
                                <span>{{app()->getLocale() == 'en' ? $parentCourse->title_en : $parentCourse->title_ar}}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="cb-rcfeed-container -ml">
                    <div class="cb-rcfeed-items">
                        @foreach($courses as $course)
                            <a class="cb-rcfeed-item" href="{{app()->getLocale() == 'en' ? LaravelLocalization::localizeUrl('course/'.$course->link_en) : LaravelLocalization::localizeUrl('course/'.$course->link_ar) }}" data-cat="{{$course->parent_id}}">
                                <span class="cb-rcfeed-item-img">
                                    <img src="{{url('uploads/courses/source/' . $course->image)}}" loading="lazy" alt>
                                </span>
                                <span class="cb-rcfeed-item-tag">
                                    <span class="cb-rcfeed-item-tag-item">{{app()->getLocale() == 'en' ? $course->title_en : $course->title_ar}}</span>
                                </span>
                                <span class="cb-rcfeed-item-title">{!! app()->getLocale() == 'en' ? \Illuminate\Support\Str::limit(strip_tags($course->text_en), $limit = 50, $end = '...') : \Illuminate\Support\Str::limit(strip_tags($course->text_ar), $limit = 50, $end = '...') !!}</span></a>
                        @endforeach
                    
                                
                    </div>
                </div>
            </div>
        </header>
    <!-- Video Tutorial -->
    <section class="cb-screenshot">
        <div class="cb-screenshot-preview -lg"><video preload="auto" loop muted autoplay playsinline>
                <source src="{{url('uploads/aboutStrucs/source/' . $about->courses_video)}}" type="video/mp4">
            </video></div>
    </section>
    <!-- Brief Text -->
    <section class="cb-brief">
        <div class="cb-brief-content">
            <div class="cb-brief-container">
                <div class="cb-brief-grid">
                    <div class="cb-brief-grid-col -left">
                        <div class="cb-brief-header">
                            <h2>{{app()->getLocale() == 'en' ? $about->courses_title_en : $about->courses_title_ar}}</h2>
                        </div>
                    </div>
                    <div class="cb-brief-grid-col -right">
                        <div class="cb-brief-text">
                            <p>
                                {!! app()->getLocale() == 'en' ? $about->courses_text_en : $about->courses_text_ar !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
