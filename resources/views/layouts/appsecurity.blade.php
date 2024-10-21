<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="bCFrwUbsA18jvvQ62tcmpqsIpm8FpGWwlmglZdvx">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="google-site-verification" content="5w2XksL321TwXdZp_uc48M6uuuCeRoNb5bGC6ovBQJM" />
    <!-- Hotjar Tracking Code for https://www.allsafeeg.com/en -->
    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () { (h.hj.q = h.hj.q || []).push(arguments) };
            h._hjSettings = { hjid: 5017485, hjsv: 6 };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script'); r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
    
     <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PJZKVLD8');</script>
        <!-- End Google Tag Manager -->
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16645862976">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'AW-16645862976');
    </script>
    <title>all safe security</title>
    <meta name="title" content="all safe security" />
    <meta name="keywords" content="all safe security" />
    <meta name="description" content="all safe security" />
    <meta name="author" content="All Safe" />
    <link href="https://www.allsafeeg.com/en/security-plans" rel="alternate"
        media="only screen and (max-width: 640px)" />
    <link rel="canonical" href="https://www.allsafeeg.com/en/security-plans" />
    <link rel="shortlink" href="https://www.allsafeeg.com/en/security-plans" />
    <meta name="robots" content="noindex" />
    <meta property="twitter:title" content="all safe security" />
    <meta property="twitter:description" content="all safe security" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:image" content="https://www.allsafeeg.com/resources/assets/front/img/image.png" />
    <meta property="og:title" content="all safe security" />
    <meta property="og:description" content="all safe security" />
    <meta property="og:image" content="https://www.allsafeeg.com/resources/assets/front/img/image.png" />
    <script
        type="application/ld+json">{"@context":"https:\/\/schema.org","@graph":[{"url":"https:\/\/www.allsafeeg.com\/en\/security-plans","image":"https:\/\/www.allsafeeg.com\/uploads\/settings\/source\/30624.png","headline":"Security Plans","author":{"name":"All Safe","url":"https:\/\/www.allsafeeg.com\/en\/security-plans","@type":"person","@context":"https:\/\/schema.org\/"},"datePublished":null,"dateModified":"2024-07-16T09:34:37.000000Z","@type":"Article","@context":"https:\/\/schema.org\/"}]}</script>
    {{--  ////////////////////  --}}
    @yield('meta') @include('layouts.partials.hreflang')

    <link rel="icon" href="{{url('uploads/settings/source/'.$configration->fav_icon)}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{url('uploads/settings/source/'.$configration->fav_icon)}}" />
    {{--  //////////////////  --}}
    <link rel="preload" href="{{url('resources/assets/front/css/fonts/AvertaCY-Light.woff2')}}" as="font" crossorigin>
    <link rel="preload" href="{{url('resources/assets/front/css/fonts/AvertaCY-Regular.woff2')}}" as="font" crossorigin>
    <link rel="preload" href="{{url('resources/assets/front/css/fonts/AvertaCY-Semibold.woff2')}}" as="font"
        crossorigin>
    @if(app()->getLocale() == 'en')
    <link rel="stylesheet" href="{{url('resources/assets/front/css/main.css')}}">
    @else
    <link rel="stylesheet" href="{{url('resources/assets/front/css/main-ar.css')}}">
    @endif
    <link rel="stylesheet" href="{{url('resources/assets/front/css/front/css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <meta property="og:image" content="{{url('resources/assets/front/img/image.png')}}">
</head>
<body class="@if(app()->getLocale() == 'ar') rtl-div @endif" oncontextmenu="return true">
    <div class="cb-loader cb-loader_overlay -visible"></div>
    <div class="cb-view" data-controller="projectController" id="view-main">
        <canvas class="cb-scene"></canvas>
        @yield('contentsecurity')
    </div>
    <nav class="cb-menu">
            <div class="cb-menu-logo">
                <a href="{{LaravelLocalization::localizeUrl('/')}}" aria-label="All Safe">
                    <svg class="cb-svgsprite -logo">
                        <use xlink:href="{{url('uploads/settings/source/'.$configration->app_logo)}}"></use>
                    </svg>
                </a>
            </div>
            <div class="cb-menu-toggle"> <button class="cb-btn cb-btn_menu" aria-label="menu" data-cursor="-menu"
                    data-cursor-stick=".cb-btn_menu-box"><span class="cb-btn_menu-title"
                        style="visibility:hidden;">{{trans('home.menu')}}</span><span class="cb-btn_menu-box"
                        data-magnetic="{&quot;x&quot;:&quot;0.08&quot;,&quot;y&quot;:&quot;0.08&quot;}"><span></span><span></span></span>
                </button> </div>
            <div class="cb-menu-box">
                <div class="cb-menu-backdrop"></div>
                <div class="cb-menu-content">
                    <div class="cb-menu-body">
                        <div class="cb-menu-container">
                            <div class="cb-menu-grid">
                                <div class="cb-menu-grid-col -left">
                                    <div class="cb-menu-title">{{trans('home.Social')}}</div>
                                    <div class="cb-menu-social" data-cursor="-opaque"> @if(! empty($setting->linkedin)) <a
                                            class="cb-menu-social-item" href="{{$setting->linkedin}}" target="_blank"
                                            rel="noopener" data-magnetic><em><span
                                                    data-text="{{trans('home.linkedin')}}">{{trans('home.linkedin')}}</span></em>
                                        </a> @endif @if(! empty($setting->behance)) <a class="cb-menu-social-item"
                                            href="{{$setting->behance}}" target="_blank" rel="noopener"
                                            data-magnetic><em><span
                                                    data-text="{{trans('home.behance')}}">{{trans('home.behance')}}</span></em>
                                        </a> @endif @if(! empty($setting->dribbble)) <a class="cb-menu-social-item"
                                            href="{{$setting->dribbble}}" target="_blank" rel="noopener"
                                            data-magnetic><em><span
                                                    data-text="{{trans('home.dribbble')}}">{{trans('home.dribbble')}}</span></em>
                                        </a> @endif @if(! empty($setting->facebook)) <a class="cb-menu-social-item"
                                            href="{{$setting->facebook}}" target="_blank" rel="noopener"
                                            data-magnetic><em><span
                                                    data-text="{{trans('home.facebook')}}">{{trans('home.facebook')}}</span></em>
                                        </a> @endif @if(! empty($setting->instgram)) <a class="cb-menu-social-item"
                                            href="{{$setting->instgram}}" target="_blank" rel="noopener"
                                            data-magnetic><em><span
                                                    data-text="{{trans('home.instgram')}}">{{trans('home.instgram')}}</span></em>
                                        </a> @endif @if(! empty($setting->youtube)) <a class="cb-menu-social-item"
                                            href="{{$setting->youtube}}" target="_blank" rel="noopener"
                                            data-magnetic><em><span
                                                    data-text="{{trans('home.youtube')}}">{{trans('home.youtube')}}</span></em>
                                        </a> @endif @if(! empty($setting->twitter)) <a class="cb-menu-social-item"
                                            href="{{$setting->twitter}}" target="_blank" rel="noopener"
                                            data-magnetic><em><span
                                                    data-text="{{trans('home.twitter')}}">{{trans('home.twitter')}}</span></em>
                                        </a> @endif @if(! empty($setting->github)) <a class="cb-menu-social-item"
                                            href="{{$setting->github}}" target="_blank" rel="noopener"
                                            data-magnetic><em><span
                                                    data-text="{{trans('home.github')}}">{{trans('home.github')}}</span></em>
                                        </a> @endif </div>
                                </div>
                                <div class="cb-menu-grid-col -right">
                                    <div class="cb-menu-title">{{trans('home.menu')}}</div>
                                    <div class="cb-menu-nav" role="navigation" data-cursor="-opaque">
                                        @foreach($menus as $menu) @if($menu->type=='hello')
                                        <div class="cb-menu-nav-item @if(Request::segment(2)=='') -active @endif"><a
                                                href="@if(Request::segment(2)=='') javascript::void(0) @else{{LaravelLocalization::localizeUrl('/')}}@endif"
                                                data-magnetic><em><span
                                                        data-text="{{(app()->getLocale()=='en')?$menu->name_en:$menu->name_ar}}">{{(app()->getLocale()=='en')?$menu->name_en:$menu->name_ar}}</span></em></a>
                                        </div>
                                        @else
                                        <div class="cb-menu-nav-item @if(Request::segment(2)==$menu->type) -active @endif">
                                            <a href='@if(Request::segment(2)==$menu->type) javascript::void(0) @else{{LaravelLocalization::localizeUrl("$menu->type")}}@endif'
                                                data-magnetic><em><span
                                                        data-text="{{(app()->getLocale()=='en')?$menu->name_en:$menu->name_ar}}">{{(app()->getLocale()=='en')?$menu->name_en:$menu->name_ar}}</span></em></a>
                                        </div>
                                        @endif
                                        @endforeach
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        @if($localeCode == 'ar' && LaravelLocalization::getCurrentLocale() == 'en')
                                        <div class="cb-menu-nav-item">
                                            <a data-magnetic rel="alternate" @if(Request::segment(2)=='service' )
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'service/'.$service->link_ar, [], true) }}"
                                                @elseif(Request::segment(2)=='project' )
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'project/'.$project->link_ar, [], true) }}"
                                                @elseif(Request::segment(2)=='course' )
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'course/'.$course->link_ar, [], true) }}"
                                                @elseif(Request::segment(2)=='blog' )
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'blog/'.$blog->link_ar, [], true) }}"
                                                @else
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                                @endif><em><span data-text="{{ $properties['native'] }}">{{
                                                        $properties['native'] }}</span></em>
                                            </a>
                                        </div>
                                        @elseif($localeCode == 'en' && LaravelLocalization::getCurrentLocale() == 'ar')
                                        <div class="cb-menu-nav-item">
                                            <a data-magnetic rel="alternate" @if(Request::segment(2)=='service' )
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'service/'.$service->link_en, [], true) }}"
                                                @elseif(Request::segment(2)=='project' )
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'project/'.$project->link_en, [], true) }}"
                                                @elseif(Request::segment(2)=='course' )
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'course/'.$course->link_en, [], true) }}"
                                                @elseif(Request::segment(2)=='blog' )
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'blog/'.$blog->link_en, [], true) }}"
                                                @else
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                                @endif><em><span data-text="{{ $properties['native'] }}">{{
                                                        $properties['native'] }}</span></em>
                                            </a>
                                        </div>
                                        <div class="cb-menu-nav-item  -active "><a href="{{ route('security') }}"
                                                data-magnetic><em><span data-text="Web Security Plans">{{ app()->getLocale()
                                                        == 'ar' ? 'خطط حماية المواقع': 'Web Security Plans'
                                                        }}</span></em></a> </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(! empty($setting->email))
                    <div class="cb-menu-footer">
                        <div class="cb-menu-container">
                            <div class="cb-menu-title -sm">{{trans('home.get_in_touch')}}</div>
                            <div class="cb-menu-mail"><a
                                    href="mailto:{{$setting->email}}"><span>{{$setting->email}}</span></a> </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="cb-menu-contact">
                <a class="cb-btn cb-btn_contact" href="{{LaravelLocalization::localizeUrl('/contact-us')}}"
                    data-cursor="-exclusion" aria-label="Get in touch">
                    <svg class="cb-svgsprite -chat">
                        <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#chat')}}"></use>
                    </svg>
                </a>

            </div>
            @if(! empty($setting->whatsapp))
            <div class="wh-api" style="z-index: 100000000">
                <div class="wh-fixed whatsapp-pulse">
                    <a href="https://wa.me/+2{{$setting->whatsapp}}" target='_blank'>
                        <button class="wh-ap-btn"></button>
                    </a>
                </div>
            </div>
            @endif

        </nav>



    <script src="/resources/assets/security/js/swiper-bundle.min.js"></script>
    <script>var videoShowReel = "\/aboutStrucs\/source\/17663177.mp4"; var assetUrlGolbal = "https:\/\/www.allsafeeg.com\/uploads"; var assetUrlProjectImage = "\/projects\/source\/"; </script>
    <script>var assetUrlProjectId = ["https:\/\/www.allsafeeg.com\/uploads\/projects\/source\/17489433.jpg", "https:\/\/www.allsafeeg.com\/uploads\/projects\/source\/69412502.jpeg", "https:\/\/www.allsafeeg.com\/uploads\/projects\/source\/97613940.jpeg", "https:\/\/www.allsafeeg.com\/uploads\/projects\/source\/80514341.jpg", "https:\/\/www.allsafeeg.com\/uploads\/projects\/source\/14479301.jpg", "https:\/\/www.allsafeeg.com\/uploads\/projects\/source\/68743920.jpg"]; </script>
    <script src="{{url('resources/assets/front/js/bundle.js')}}"></script>
    {{--  <script src="https://www.allsafeeg.com/resources/assets/front/js/bundle.js"></script>  --}}
    <noscript>
        <link rel="stylesheet" href="{{url('resources/assets/front/css/noscript66c7.css')}}">
    </noscript>


    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });
        // Disable F12 key
        document.addEventListener('keydown', function (event) {
            if (event.key === 'F12' || event.keyCode === 123) {
                event.preventDefault();
            }
        });

        // Disable Ctrl+Shift+I
        document.addEventListener('keydown', function (event) {
            if (event.ctrlKey && event.shiftKey && (event.key === 'I' || event.keyCode === 73)) {
                event.preventDefault();
            }
        });
        document.onkeydown = function (e) {
            if (e.ctrlKey &&
                (e.keyCode === 67 ||
                    e.keyCode === 86 ||
                    e.keyCode === 85 ||
                    e.keyCode === 117)) {
                //  alert('Content is protected\nYou cannot view the page source.');
                return e.preventDefault();
            } else {
                return true;
            }
        };

        document.addEventListener('keypress', function (e) {
            if (e.key === 'u' && e.ctrlKey) {
                e.preventDefault();
            } else {
                return true;
            }
        });
        document.querySelector(".cb-btn_menu-box").addEventListener("click", function () {
            if (document.querySelector("html").classList.contains("menu-open")) {
                document.querySelector(".cb-btn_menu-box").classList.remove("text-black");
                document.querySelector(".cb-btn_menu-box").classList.add("text-white");
            } else {
                document.querySelector(".cb-btn_menu-box").classList.remove("text-white");
                document.querySelector(".cb-btn_menu-box").classList.add("text-black");
            }
        });
        document.addEventListener("click", function () {
            if (document.querySelector("html").classList.contains("menu-open")) {
                console.log("yes");
                document.querySelector(".cb-btn_menu-box").classList.remove("text-white");
                document.querySelector(".cb-btn_menu-box").classList.add("text-black");
            } else {
                document.querySelector(".cb-btn_menu-box").classList.remove("text-black");
                document.querySelector(".cb-btn_menu-box").classList.add("text-white");
                console.log("no");
            }
        });
        document.querySelector(".cb-menu-content").addEventListener("mouseenter", function () {
            document.querySelector('.cb-cursor').style.color = "#000";
        })
        document.querySelector(".cb-menu-content").addEventListener("mouseleave", function () {
            document.querySelector('.cb-cursor').style.color = "#fff";
        })
        document.querySelector(".cb-outro").addEventListener("mouseenter", function () {
            console.log('ok');

            document.querySelector('.cb-cursor').style.color = "#000";
        })
        document.querySelector(".cb-outro").addEventListener("mouseleave", function () {
            console.log('no');

            document.querySelector('.cb-cursor').style.color = "#fff";
        })

    </script>
    
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJZKVLD8"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

</body>
</html>
