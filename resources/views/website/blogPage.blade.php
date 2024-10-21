
@extends('layouts.app')
@section('meta')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' integrity='sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==' crossorigin='anonymous'/>
    @php echo $metatags @endphp

    @php echo $schema @endphp
    <style>

    </style>
@endsection
@section('controller')
    <div class="cb-view" data-controller="projectController" id="view-main"><canvas class="cb-scene"></canvas>
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
                    <div class="cb-tophead-header">
                        <h1>{{trans('home.Blog Page')}}</h1>
                    </div>
                    <div class="cb-tophead-title">
                        <h2>{{$blog->{'title_blog_'.$lang} }}</h2>
                    </div>
                </div>
            </div>
        </header>
        <section class="cb-screenshot">
            <div class="cb-screenshot-preview -lg"><img src="{{url('uploads/blogitems/source/' . $blog->image)}}" alt>
            </div>
        </section>
        <section class="cb-brief">
            <div class="cb-brief-content">
                <div class="cb-brief-container">
                    <div class="cb-brief-grid">
                        <div class="cb-brief-grid-col -left">
                            <div class="cb-brief-header">
                                <h2>{{trans('home.blog_text')}}</h2>
                            </div>
                        </div>
                        <div class="cb-brief-grid-col -right">
                            <div class="cb-brief-text-fix">
                                <p>
                                    {!! $blog->{'text_'.$lang} !!}
                                </p>
                               
                                <div class="social-links">
                                <a class="social-link" href="">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                                <a class="social-link" href="">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a class="social-link" href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                                <a class="social-link" href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if($blog->breadcrump_video)
        <section class="cb-screenshot">
            <div class="cb-screenshot-container">
                <div class="cb-screenshot-preview"><video preload="auto" loop muted autoplay playsinline>
                        <source src="{{url('uploads/blogitems/source/' . $blog->breadcrump_video)}}" type="video/mp4">
                    </video></div>
            </div>
        </section>
        @endif
        @php
            $nextBlog = App\BlogItem::where('id', '>' , $blog->id)->where('parent_id', $blog->parent_id)->where('status', 1)->first();
        @endphp
        @if($nextBlog)
            <section class="cb-nextcase" data-project-next="Service1">
                <div class="cb-nextcase-content">
                    <div class="cb-nextcase-body">
                        <div class="cb-nextcase-container"><a class="cb-nextcase-anchor"
                                href="{{app()->getLocale() == 'en' ? LaravelLocalization::localizeUrl('blog/'.$nextBlog->link_en) : LaravelLocalization::localizeUrl('blog/'.$nextBlog->link_ar) }}"><span class="cb-nextcase-title"><span>{{trans('home.Next Blog')}}</span></span></a></div>
                    </div>
                </div>
            </section>
        @endif

@endsection

@section('script')
<script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js' integrity='sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==' crossorigin='anonymous'></script>
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