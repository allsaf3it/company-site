<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="5w2XksL321TwXdZp_uc48M6uuuCeRoNb5bGC6ovBQJM" />
    <title>{{ $configration->app_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @include('layouts.partials.hreflang')
    <link rel="icon" href="{{ url('uploads/settings/source/' . $configration->fav_icon) }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('uploads/settings/source/' . $configration->fav_icon) }}" />
    @yield('meta')
    @if (app()->getLocale() == 'en')
        <link rel="stylesheet" href="{{ url('resources/assets/front/hello/css/style.css') }}">
    @else
        <link rel="stylesheet" href="{{ url('resources/assets/front/hello/css/style-ar.css') }}">
    @endif
    <meta property="og:image" content="https://allsafeeg.com/resources/assets/front/img/image.png">
    <style>
        button.wh-ap-btn {
            outline: none;
            width: 60px;
            height: 60px;
            border: 0;
            background-color: #2ecc71;
            padding: 0;
            border-radius: 100%;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            cursor: pointer;
            transition: opacity 0.3s, background 0.3s, box-shadow 0.3s;
        }

        button.wh-ap-btn::after {
            content: "";
            background-image: url("//i.imgur.com/cAS6qqn.png");
            background-position: center center;
            background-repeat: no-repeat;
            background-size: 60%;
            width: 100%;
            height: 100%;
            display: block;
            opacity: 1;
        }

        button.wh-ap-btn:hover {
            opacity: 1;
            background-color: #20bf6b;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        .wh-api {
            position: fixed;
            bottom: 0;
            right: 0;
        }

        .wh-fixed {
            margin-right: 15px;
            margin-bottom: 15px;
        }

        .wh-fixed>a {
            display: block;
            text-decoration: none;
        }

        button.wh-ap-btn::before {
            content: "Chat with me";
            display: block;
            position: absolute;
            margin-left: -130px;
            margin-top: 16px;
            height: 25px;
            background: #49654e;
            color: #fff;
            font-weight: 400;
            font-size: 15px;
            border-radius: 3px;
            width: 0;
            opacity: 0;
            padding: 0;
            transition: opacity 0.4s, width 0.4s, padding 0.5s;
            padding-top: 7px;
            border-radius: 30px;
            box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);
        }

        .wh-fixed>a:hover button.wh-ap-btn::before {
            opacity: 1;
            width: auto;
            padding-top: 7px;
            padding-left: 10px;
            padding-right: 10px;
            width: 100px;
        }

        /* animacion pulse */

        .whatsapp-pulse {
            width: 60px;
            height: 60px;
            left: 10px;
            bottom: 10px;
            background: #10b418;
            position: fixed;
            text-align: center;
            color: #ffffff;
            cursor: pointer;
            border-radius: 50%;
            z-index: 99;
            display: inline-block;
            line-height: 65px;
        }

        .whatsapp-pulse:before {
            position: absolute;
            content: " ";
            z-index: -1;
            bottom: -15px;
            right: -15px;
            background-color: #10b418;
            width: 90px;
            height: 90px;
            border-radius: 100%;
            animation-fill-mode: both;
            -webkit-animation-fill-mode: both;
            opacity: 0.6;
            -webkit-animation: pulse 1s ease-out;
            animation: pulse 1.8s ease-out;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
        }

        @-webkit-keyframes pulse {
            0% {
                -webkit-transform: scale(0);
                opacity: 0;
            }

            25% {
                -webkit-transform: scale(0.3);
                opacity: 1;
            }

            50% {
                -webkit-transform: scale(0.6);
                opacity: 0.6;
            }

            75% {
                -webkit-transform: scale(0.9);
                opacity: 0.3;
            }

            100% {
                -webkit-transform: scale(1);
                opacity: 0;
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            25% {
                transform: scale(0.3);
                opacity: 1;
            }

            50% {
                transform: scale(0.6);
                opacity: 0.6;
            }

            75% {
                transform: scale(0.9);
                opacity: 0.3;
            }

            100% {
                transform: scale(1);
                opacity: 0;
            }
        }
    </style>
    <!-- Hotjar Tracking Code for https://www.allsafeeg.com/en -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 5017485,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
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
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16645862976"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-16645862976');
    </script>
</head>

<body class="@if (app()->getLocale() == 'ar') rtl-div @endif" oncontextmenu="return false">
    <div class="cb-loader cb-loader_overlay -visible">
        <div class="cb-loader_overlay-fill"></div>
        <div class="cb-loader_overlay-box">
            <div class="cb-loader_overlay-word -v1"><span>{{ trans('home.We') }}</span></div>
            <div class="cb-loader_overlay-word -v2"><span>{{ trans('home.create') }}</span></div>
            <div class="cb-loader_overlay-word -v3"><span>{{ trans('home.digital') }}</span></div>
            <div class="cb-loader_overlay-word -v4"><span>{{ trans('home.solutions') }}<span
                        class="-blink">_</span></span></div>
            <div class="cb-loader_overlay-percent"><span>0%</span></div>
        </div>
    </div>
    <nav class="cb-menu -inverse">
        <div class="cb-menu-logo">
            <a href="{{ LaravelLocalization::localizeUrl('/') }}" aria-label="All Safe">
                <svg class="cb-svgsprite -logo">
                    <use xlink:href="{{ url('uploads/settings/source/' . $configration->about_image) }}"></use>
                </svg>
            </a>
        </div>
        <div class="cb-menu-toggle"><button class="cb-btn cb-btn_menu" aria-label="Menu" data-cursor="-menu"
                data-cursor-stick><span></span><span></span></button></div>
        <div class="cb-menu-box">
            <div class="cb-menu-backdrop"></div>
            <div class="cb-menu-fill"></div>
            <div class="cb-menu-content">
                <div class="cb-menu-body">
                    <div class="cb-menu-container">
                        <div class="cb-menu-grid">
                            <div class="cb-menu-grid-col -left">
                                <div class="cb-menu-title">{{ trans('home.Social') }}</div>
                                <div class="cb-menu-socials" data-cursor="-opaque">
                                    @if (!empty($setting->linkedin))
                                        <a class="cb-menu-social" href="{{ $setting->linkedin }}" target="_blank"
                                            rel="noopener"><em><span
                                                    data-text="{{ trans('home.linkedin') }}">{{ trans('home.linkedin') }}</span></em></a>
                                        @endif @if (!empty($setting->behance))
                                            <a class="cb-menu-social" href="{{ $setting->behance }}" target="_blank"
                                                rel="noopener"><em><span
                                                        data-text="{{ trans('home.behance') }}">{{ trans('home.behance') }}</span></em></a>
                                            @endif @if (!empty($setting->facebook))
                                                <a class="cb-menu-social" href="{{ $setting->facebook }}"
                                                    target="_blank" rel="noopener"><em><span
                                                            data-text="{{ trans('home.facebook') }}">{{ trans('home.facebook') }}</span></em></a>
                                                @endif @if (!empty($setting->facebook))
                                                    <a class="cb-menu-social" href="{{ $setting->instgram }}"
                                                        target="_blank" rel="noopener"><em><span
                                                                data-text="{{ trans('home.instgram') }}">{{ trans('home.instgram') }}</span></em></a>
                                                    @endif @if (!empty($setting->youtube))
                                                        <a class="cb-menu-social" href="{{ $setting->youtube }}"
                                                            target="_blank" rel="noopener"><em><span
                                                                    data-text="{{ trans('home.youtube') }}">{{ trans('home.youtube') }}</span></em></a>
                                                        @endif @if (!empty($setting->twitter))
                                                            <a class="cb-menu-social" href="{{ $setting->twitter }}"
                                                                target="_blank" rel="noopener"><em><span
                                                                        data-text="{{ trans('home.twitter') }}">{{ trans('home.twitter') }}</span></em></a>
                                                            @endif @if (!empty($setting->github))
                                                                <a class="cb-menu-social" href="{{ $setting->github }}"
                                                                    target="_blank" rel="noopener"><em><span
                                                                            data-text="{{ trans('home.github') }}">{{ trans('home.github') }}</span></em></a>
                                                            @endif
                                </div>
                            </div>
                            <div class="cb-menu-grid-col -right">
                                <div class="cb-menu-title">{{ trans('home.menu') }}</div>
                                <div class="cb-menu-nav" role="navigation" data-cursor="-opaque">

                                    @foreach ($menus as $menu)
                                        @if ($menu->type == 'hello')
                                            <div
                                                class="cb-menu-nav-item @if (Request::segment(2) == '') -active @endif">
                                                <a href="@if (Request::segment(2) == '') javascript::void(0) @else {{ LaravelLocalization::localizeUrl('/') }} @endif"
                                                    data-magnetic><em><span
                                                            data-text="{{ app()->getLocale() == 'en' ? $menu->name_en : $menu->name_ar }}">{{ app()->getLocale() == 'en' ? $menu->name_en : $menu->name_ar }}</span></em></a>
                                            </div>
                                        @else
                                            <div
                                                class="cb-menu-nav-item @if (Request::segment(2) == $menu->type) -active @endif">
                                                <a href='@if (Request::segment(2) == $menu->type) javascript::void(0) @else {{ LaravelLocalization::localizeUrl("$menu->type") }} @endif'
                                                    data-magnetic><em><span
                                                            data-text="{{ app()->getLocale() == 'en' ? $menu->name_en : $menu->name_ar }}">{{ app()->getLocale() == 'en' ? $menu->name_en : $menu->name_ar }}</span></em></a>
                                            </div>
                                        @endif
                                    @endforeach
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        @if ($localeCode == 'ar' && LaravelLocalization::getCurrentLocale() == 'en')
                                            <div class="cb-menu-nav-item">
                                                <a data-magnetic rel="alternate"
                                                    @if (Request::segment(2) == 'service') href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'service/' . $service->link_ar, [], true) }}"
                                                        @elseif(Request::segment(2) == 'project')
                                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'project/' . $project->link_ar, [], true) }}"
                                                        @elseif(Request::segment(2) == 'course')
                                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'course/' . $course->link_ar, [], true) }}"
                                                        @else
                                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" @endif><em><span
                                                            data-text="{{ $properties['native'] }}">{{ $properties['native'] }}</span></em>
                                                </a>
                                            </div>
                                        @elseif($localeCode == 'en' && LaravelLocalization::getCurrentLocale() == 'ar')
                                            <div class="cb-menu-nav-item">
                                                <a data-magnetic rel="alternate"
                                                    @if (Request::segment(2) == 'service') href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'service/' . $service->link_en, [], true) }}"
                                                        @elseif(Request::segment(2) == 'project')
                                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'project/' . $project->link_en, [], true) }}"
                                                        @elseif(Request::segment(2) == 'course')
                                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'course/' . $course->link_en, [], true) }}"
                                                        @else
                                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" @endif><em><span
                                                            data-text="{{ $properties['native'] }}">{{ $properties['native'] }}</span></em>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (!empty($setting->email))
                    <div class="cb-menu-footer">
                        <div class="cb-menu-container">
                            <div class="cb-menu-title -sm">{{ trans('home.get_in_touch') }}</div>
                            <div class="cb-menu-mail"><a
                                    href="mailto:{{ $setting->email }}"><span>{{ $setting->email }}</span></a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </nav>
    <a class="cb-intouch" href="{{ LaravelLocalization::localizeUrl('/contact-us') }}" data-cursor="-inverse"
        aria-label="Contact us">
        <div class="cb-intouch-border">
            <div class="cb-intouch-text"
                style="background-image:url({{ url('resources/assets/front/hello/img/home/1.svg') }})"></div>
        </div>
        <div class="cb-intouch-video"><video src="{{ url('resources/assets/front/hello/img/home/1.mp4') }}" autoplay
                playsinline loop muted></video></div>


    </a>
    @if (!empty($setting->whatsapp))
        <div class="wh-api" style="z-index: 100000000">
            <div class="wh-fixed whatsapp-pulse">
                <a href="https://wa.me/+2{{ $setting->whatsapp }}" target='_blank'>
                    <button class="wh-ap-btn"></button>
                </a>
            </div>
        </div>
    @endif

    <div class="cb-view" id="view-main">
        <div class="cb-layout" role="main">
            @yield('content')
            <footer class="cb-footer" data-menu-inverse data-cursor="-inverse">
                <div class="cb-footer-bg">
                    <div class="cb-footer-bg-media"><video
                            data-src="{{ url('uploads/settings/source/' . $configration->footer_video) }}"
                            crossorigin="anonymous" autoplay playsinline loop muted></video></div>
                </div>
                <div class="cb-footer-content">
                    <div class="cb-footer-top">
                        <div class="cb-footer-container -sm">
                            <div class="cb-footer-header">
                                <h2><em>{{ trans('home.Have') }}</em><br> {{ trans('home.an idea?') }}</h2>
                            </div>
                            <div class="cb-footer-action"><a class="cb-btn cb-btn_cta -xl -tertiary"
                                    href="{{ LaravelLocalization::localizeUrl('/contact-us') }}"><span
                                        class="cb-btn_cta-border"></span><span
                                        class="cb-btn_cta-ripple"><span></span></span><span
                                        class="cb-btn_cta-title"><span
                                            data-text="{{ trans('home.tell_us') }}">{{ trans('home.tell_us') }}</span></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="cb-footer-bottom">
                        <div class="cb-footer-container -sm">
                            <div class="cb-footer-grid">
                                <div class="cb-footer-grid-col -left">
                                    <div class="cb-footer-tags">
                                        @if (!empty($setting->email))
                                            <div class="cb-footer-tag"><a class="cb-btn cb-btn_cta -sm -inverse"
                                                    href="mailto:{{ $setting->email }}"><span
                                                        class="cb-btn_cta-border"></span><span
                                                        class="cb-btn_cta-ripple"><span></span></span><span
                                                        class="cb-btn_cta-title"><span
                                                            data-text="{{ $setting->email }}">{{ $setting->email }}</span></span></a>
                                            </div>
                                        @endif
                                        @if ($setting->mobile)
                                            <div class="cb-footer-tag"><a class="cb-btn cb-btn_cta -sm -inverse"
                                                    href="tel:+{{ $setting->mobile }}"><span
                                                        class="cb-btn_cta-border"></span><span
                                                        class="cb-btn_cta-ripple"><span></span></span><span
                                                        class="cb-btn_cta-title"><span
                                                            data-text="{{ $setting->mobile }}">{{ $setting->mobile }}
                                                        </span></span></a></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="cb-footer-grid-col -center">
                                    <div class="cb-footer-links"><a class="cb-footer-link"
                                            href="{{ LaravelLocalization::localizeUrl('/privacy') }}"><span>{{ trans('home.Privacy Policy') }}</span></a>
                                    </div>
                                </div>
                                <div class="cb-footer-grid-col -right"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ url('resources/assets/front/hello/js/bundle.js') }}" defer></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-4T0YT1PCQE');
    </script>
    <script>
        // Disable F12 key
        // document.addEventListener('keydown', function (event) {
        //   if (event.key === 'F12' || event.keyCode === 123) {
        //     event.preventDefault();
        //   }
        // });


        document.onkeydown = (e) => {
            if (e.key == 123) {
                e.preventDefault();
            } else if (e.ctrlKey && e.shiftKey && e.key == 'I') {
                e.preventDefault();
            } else if (e.ctrlKey && e.shiftKey && e.key == 'U') {
                e.preventDefault();
            } else if (e.ctrlKey && e.shiftKey && e.key == 'u') {
                e.preventDefault();
            } else if (e.ctrlKey && e.shiftKey && e.key == 'C') {
                e.preventDefault();
            } else if (e.ctrlKey && e.shiftKey && e.key == 'J') {
                e.preventDefault();
            } else(e.ctrlKey && e.key == 'U')
            e.preventDefault();

        };

        // Disable Ctrl+Shift+I
        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey && event.shiftKey && (event.key === 'I' || event.keyCode === 73)) {
                event.preventDefault();
            }
        });
        document.onkeydown = function(e) {
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
        document.addEventListener("keypress", function(e) {
            if (e.key === "u" && e.ctrlKey) {
                e.preventDefault();
            }
        });
    </script>
    
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJZKVLD8"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    @yield('script')
</body>

</html>
