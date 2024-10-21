<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:url" content="{{LaravelLocalization::localizeUrl('/')}}">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{asset('frontend/assets/media/pages/ogimage.png')}}">
    @yield('meta')
    <link rel="icon" type="image/ico" href="{{asset('uploads/configration/'. $configration->fav_icon)}}" />
    <link rel="shortcut icon" type="image/png" href="{{asset('uploads/configration/'. $configration->fav_icon)}}">
    <link rel="preload" as="font" href="{{asset('frontend/assets/fonts/GeneralSans-Variable.ttf')}}" type="font/ttf" crossorigin="anonymous">
    <link href="{{asset('frontend/assets/css/normalize.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/flickity.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/assets/css/locomotive-scroll.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/styleguide.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/components.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/style-v2.css')}}" rel="stylesheet">
</head>

<body data-barba="wrapper">

<div class="loading-container loading-animation">
      <div class="loading-fade"></div>
      <div class="loading-screen"></div>
      <div class="loading-words">
         <h3 class="loader-words-wrap active">
            <span class="single-word"><span class="single-word-inner">@if(Request::segment(2) == 'about-us') {{trans('home.about')}} @elseif(Request::segment(2) == 'services') {{trans('home.services')}} @elseif(Request::segment(2) == 'courses') {{trans('home.courses')}} @elseif(Request::segment(2) == 'blogs') {{trans('home.blogs')}} @elseif(Request::segment(2) == 'contact') {{trans('home.contact')}} @else  @endif</span></span>
            <span class="single-word"><span class="single-word-inner">All</span></span>
            <span class="single-word"><span class="single-word-inner">Safe</span></span>
            <span class="single-word"><span class="single-word-inner">Trade</span></span>
         </h3>
      </div>
</div>
   <div class="custom-cursor no-select">
      <div class="cursor-normal">
         <div class="cursor-normal-before"></div>
         <span class="cursor-text">{{trans('home.view')}}</span>
         <span class="cursor-text duplicate">{{trans('home.view')}}</span>
      </div>
   </div>
   @include('layouts.body.header')

   @yield('data-barba')
   @yield('blogsImage')
        <div class="main-wrap" data-scroll-container>

            @yield('main')
            @include('layouts.body.footer')
        </div>
    </main>
    <!-- All JavaScript files
    ================================================== -->

    <script src="{{asset('frontend/assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/gsap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/ScrollTrigger.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/barba.umd.js')}}"></script>
    <script src="{{asset('frontend/assets/js/lazyload.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/player.js')}}"></script>
    <script src="{{asset('frontend/assets/js/flickity.pkgd.min.js')}}"></script>

    <script src="{{asset('frontend/assets/js/locomotive-scroll.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/SplitText.min.js')}}"></script>
    <script defer src="{{asset('frontend/assets/js/index.js')}}"></script>
    @yield('script')
</body>
</html>