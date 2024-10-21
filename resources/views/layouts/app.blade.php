<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{csrf_token()}}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0">
      <meta name="msapplication-TileColor" content="#da532c">
      <meta name="theme-color" content="#ffffff">
      <meta name="google-site-verification" content="5w2XksL321TwXdZp_uc48M6uuuCeRoNb5bGC6ovBQJM" />
      <!-- Hotjar Tracking Code for https://www.allsafeeg.com/en -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:5017485,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
        <!-- Google tag (gtag.js) -->
        
        
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PJZKVLD8');</script>
        <!-- End Google Tag Manager -->
        
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16645862976">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-16645862976');
</script>
      @yield('meta') @include('layouts.partials.hreflang') 
      <link rel="icon" href="{{url('uploads/settings/source/'.$configration->fav_icon)}}" type="image/x-icon">
      <link rel="shortcut icon" href="{{url('uploads/settings/source/'.$configration->fav_icon)}}"/>
      <link rel="preload" href="{{url('resources/assets/front/css/fonts/AvertaCY-Light.woff2')}}" as="font" crossorigin>
      <link rel="preload" href="{{url('resources/assets/front/css/fonts/AvertaCY-Regular.woff2')}}" as="font" crossorigin>
      <link rel="preload" href="{{url('resources/assets/front/css/fonts/AvertaCY-Semibold.woff2')}}" as="font" crossorigin>
      @if(app()->getLocale() == 'en')
      <link rel="stylesheet" href="{{url('resources/assets/front/css/main.css')}}">
    @else
      <link rel="stylesheet" href="{{url('resources/assets/front/css/main-ar.css')}}">
    @endif
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
            
            .wh-fixed > a {
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
            
            .wh-fixed > a:hover button.wh-ap-btn::before {
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
      @yield('style') 
      <meta property="og:image" content="https://allsafeeg.com/resources/assets/front/img/image.png">
   </head>
   <body class="@if(app()->getLocale() == 'ar') rtl-div @endif" oncontextmenu="return true">
      <div class="cb-loader cb-loader_overlay -visible"></div>
      <nav class="cb-menu">
         <div class="cb-menu-logo">
            <a href="{{LaravelLocalization::localizeUrl('/')}}" aria-label="All Safe">
               <svg class="cb-svgsprite -logo">
                  <use xlink:href="{{url('uploads/settings/source/'.$configration->app_logo)}}"></use>
               </svg>
            </a>
         </div>
         <div class="cb-menu-toggle"> <button class="cb-btn cb-btn_menu" aria-label="menu" data-cursor="-menu" data-cursor-stick=".cb-btn_menu-box"><span class="cb-btn_menu-title" style="visibility:hidden;">{{trans('home.menu')}}</span><span class="cb-btn_menu-box" data-magnetic="{&quot;x&quot;:&quot;0.08&quot;,&quot;y&quot;:&quot;0.08&quot;}"><span></span><span></span></span> </button> </div>
         <div class="cb-menu-box">
            <div class="cb-menu-backdrop"></div>
            <div class="cb-menu-content">
               <div class="cb-menu-body">
                  <div class="cb-menu-container">
                     <div class="cb-menu-grid">
                        <div class="cb-menu-grid-col -left">
                           <div class="cb-menu-title">{{trans('home.Social')}}</div>
                           <div class="cb-menu-social" data-cursor="-opaque"> @if(! empty($setting->linkedin)) <a class="cb-menu-social-item" href="{{$setting->linkedin}}" target="_blank" rel="noopener" data-magnetic><em><span data-text="{{trans('home.linkedin')}}">{{trans('home.linkedin')}}</span></em> </a> @endif @if(! empty($setting->behance)) <a class="cb-menu-social-item" href="{{$setting->behance}}" target="_blank" rel="noopener" data-magnetic><em><span data-text="{{trans('home.behance')}}">{{trans('home.behance')}}</span></em> </a> @endif @if(! empty($setting->dribbble)) <a class="cb-menu-social-item" href="{{$setting->dribbble}}" target="_blank" rel="noopener" data-magnetic><em><span data-text="{{trans('home.dribbble')}}">{{trans('home.dribbble')}}</span></em> </a> @endif @if(! empty($setting->facebook)) <a class="cb-menu-social-item" href="{{$setting->facebook}}" target="_blank" rel="noopener" data-magnetic><em><span data-text="{{trans('home.facebook')}}">{{trans('home.facebook')}}</span></em> </a> @endif @if(! empty($setting->instgram)) <a class="cb-menu-social-item" href="{{$setting->instgram}}" target="_blank" rel="noopener" data-magnetic><em><span data-text="{{trans('home.instgram')}}">{{trans('home.instgram')}}</span></em> </a> @endif @if(! empty($setting->youtube)) <a class="cb-menu-social-item" href="{{$setting->youtube}}" target="_blank" rel="noopener" data-magnetic><em><span data-text="{{trans('home.youtube')}}">{{trans('home.youtube')}}</span></em> </a> @endif @if(! empty($setting->twitter)) <a class="cb-menu-social-item" href="{{$setting->twitter}}" target="_blank" rel="noopener" data-magnetic><em><span data-text="{{trans('home.twitter')}}">{{trans('home.twitter')}}</span></em> </a> @endif @if(! empty($setting->github)) <a class="cb-menu-social-item" href="{{$setting->github}}" target="_blank" rel="noopener" data-magnetic><em><span data-text="{{trans('home.github')}}">{{trans('home.github')}}</span></em> </a> @endif </div>
                        </div>
                        <div class="cb-menu-grid-col -right">
                           <div class="cb-menu-title">{{trans('home.menu')}}</div>
                           <div class="cb-menu-nav" role="navigation" data-cursor="-opaque">
                              @foreach($menus as $menu) @if($menu->type=='hello') 
                              <div class="cb-menu-nav-item @if(Request::segment(2)=='') -active @endif"><a href="@if(Request::segment(2)=='') javascript::void(0) @else{{LaravelLocalization::localizeUrl('/')}}@endif" data-magnetic><em><span data-text="{{(app()->getLocale()=='en')?$menu->name_en:$menu->name_ar}}">{{(app()->getLocale()=='en')?$menu->name_en:$menu->name_ar}}</span></em></a> </div>
                              @else 
                              <div class="cb-menu-nav-item @if(Request::segment(2)==$menu->type) -active @endif"><a href='@if(Request::segment(2)==$menu->type) javascript::void(0) @else{{LaravelLocalization::localizeUrl("$menu->type")}}@endif' data-magnetic><em><span data-text="{{(app()->getLocale()=='en')?$menu->name_en:$menu->name_ar}}">{{(app()->getLocale()=='en')?$menu->name_en:$menu->name_ar}}</span></em></a> </div>
                              @endif 
                              @endforeach 
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if($localeCode == 'ar' && LaravelLocalization::getCurrentLocale() == 'en')
                                    <div class="cb-menu-nav-item">
                                        <a data-magnetic rel="alternate" 
                                            @if(Request::segment(2) == 'service')
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'service/'.$service->link_ar, [], true) }}"
                                            @elseif(Request::segment(2) == 'project')
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'project/'.$project->link_ar, [], true) }}"
                                            @elseif(Request::segment(2) == 'course')
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'course/'.$course->link_ar, [], true) }}"
                                            @elseif(Request::segment(2) == 'blog')
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'blog/'.$blog->link_ar, [], true) }}"
                                            @else
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                            @endif  
                                        ><em><span data-text="{{ $properties['native'] }}">{{ $properties['native'] }}</span></em>
                                        </a>
                                    </div>    
                                @elseif($localeCode == 'en' && LaravelLocalization::getCurrentLocale() == 'ar')
                                    <div class="cb-menu-nav-item">
                                        <a data-magnetic rel="alternate" 
                                            @if(Request::segment(2) == 'service')
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'service/'.$service->link_en, [], true) }}"
                                            @elseif(Request::segment(2) == 'project')
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'project/'.$project->link_en, [], true) }}"
                                            @elseif(Request::segment(2) == 'course')
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'course/'.$course->link_en, [], true) }}"
                                            @elseif(Request::segment(2) == 'blog')
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, 'blog/'.$blog->link_en, [], true) }}"
                                            @else
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                            @endif  
                                        ><em><span data-text="{{ $properties['native'] }}">{{ $properties['native'] }}</span></em>
                                        </a>
                                    </div> 
                                    <div class="cb-menu-nav-item  -active "><a href="{{ route('security') }}"
                                            data-magnetic><em><span data-text="Web Security Plans">{{ app()->getLocale() == 'ar' ? 'خطط حماية المواقع': 'Web Security Plans' }}</span></em></a> </div>
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
                     <div class="cb-menu-mail"><a href="mailto:{{$setting->email}}"><span>{{$setting->email}}</span></a> </div>
                  </div>
               </div>
               @endif 
            </div>
         </div>
         <div class="cb-menu-contact">
            <a class="cb-btn cb-btn_contact" href="{{LaravelLocalization::localizeUrl('/contact-us')}}" data-cursor="-exclusion" aria-label="Get in touch">
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
      @yield('controller') 
      
      <div class="cb-layout" role="main">
         @yield('content') 
         <section class="cb-outro">
            <div class="cb-outro-content" data-cursor="-inverse">
               <div class="cb-outro-body">
                  <div class="cb-outro-container">
                     <div class="cb-outro-header">
                        <h2>{{trans('home.Have an idea?')}}</h2>
                        <a href="{{LaravelLocalization::localizeUrl('/contact-us')}}">{{trans('home.Tell us about it')}}</a> 
                     </div>
                  </div>
               </div>
               <div class="cb-outro-footer">
                  <div class="cb-outro-container">
                     <div class="cb-outro-grid">
                        <div class="cb-outro-grid-col -left">
                           @if(! empty($setting->email)) 
                           <div class="cb-outro-mail"><a href="mailto:{{$setting->email}}"><em><span>{{$setting->email}}</span></em></a> </div>
                           @endif @if(count($addresses) > 0) 
                           <div class="cb-outro-address">
                              <address>
                                 @foreach($addresses as $address) 
                                 <p>{{app()->getLocale()=='en' ? $address->address_en : $address->address_ar}}</p>
                                 @endforeach 
                              </address>
                           </div>
                           @endif @foreach($pages as $page) 
                           <div class="cb-outro-link"><a class="cb-outro-link-item" href="{{LaravelLocalization::localizeUrl('/')}}">{{app()->getLocale()=='en' ? $page->title_en : $page->title_ar}}</a></div>
                           @endforeach 
                        </div>
                        <div class="cb-outro-grid-col -right">
                           <div class="cb-outro-social">
                              <div class="cb-outro-social-row">
                                 @if(! empty($setting->linkedin)) 
                                 <a class="cb-outro-social-item" href="{{$setting->linkedin}}" target="_blank" rel="noopener" aria-label="LinkedIn">
                                    <span class="cb-outro-social-item-title"><span data-text="LinkedIn">{{trans('home.linkedin')}}</span></span>
                                    <svg class="cb-svgsprite -linkedin">
                                       <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#linkedin')}}"> </use>
                                    </svg>
                                 </a>
                                 @endif @if(! empty($setting->facebook)) 
                                 <a class="cb-outro-social-item" href="{{$setting->facebook}}" target="_blank" rel="noopener" aria-label="Facebook">
                                    <span class="cb-outro-social-item-title"><span data-text="Facebok">{{trans('home.facebook')}}</span></span>
                                    <svg class="cb-svgsprite -facebook">
                                       <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#facebook')}}"> </use>
                                    </svg>
                                 </a>
                                 @endif @if(! empty($setting->twitter)) 
                                 <a class="cb-outro-social-item -patreon" href="{{$setting->twitter}}" target="_blank" rel="noopener" aria-label="Twitter">
                                    <span class="cb-outro-social-item-title"><span data-text="Twitter">{{trans('home.twitter')}}</span></span>
                                    <svg class="cb-svgsprite -twitter">
                                       <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#twitter')}}"> </use>
                                    </svg>
                                 </a>
                                 @endif @if(! empty($setting->behance)) 
                                 <a class="cb-outro-social-item -behance" href="{{$setting->behance}}" target="_blank" rel="noopener" aria-label="Behance">
                                    <span class="cb-outro-social-item-title"><span data-text="Behance">{{trans('home.behance')}}</span></span>
                                    <svg class="cb-svgsprite -behance">
                                       <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#behance')}}"> </use>
                                    </svg>
                                 </a>
                                 @endif 
                              </div>
                              <div class="cb-outro-social-row">
                                 @if(! empty($setting->dribble)) 
                                 <a class="cb-outro-social-item -dribble" href="{{$setting->dribble}}" target="_blank" rel="noopener" aria-label="Dribbble">
                                    <span class="cb-outro-social-item-title"><span data-text="Dribbble">{{trans('home.dribble')}}</span></span>
                                    <svg class="cb-svgsprite -dribbble">
                                       <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#dribbble')}}"> </use>
                                    </svg>
                                 </a>
                                 @endif @if(! empty($setting->github)) 
                                 <a class="cb-outro-social-item" href="{{$setting->github}}" target="_blank" rel="noopener" aria-label="Github">
                                    <span class="cb-outro-social-item-title"><span data-text="Github">{{trans('home.github')}}</span></span>
                                    <svg class="cb-svgsprite -github">
                                       <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#github')}}"> </use>
                                    </svg>
                                 </a>
                                 @endif @if(! empty($setting->instgram)) 
                                 <a class="cb-outro-social-item -instagram" href="{{$setting->instgram}}" target="_blank" rel="noopener" aria-label="Instagram">
                                    <span class="cb-outro-social-item-title"><span data-text="Instagram">{{trans('home.instgram')}}</span></span>
                                    <svg class="cb-svgsprite -instagram">
                                       <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#instagram')}}"> </use>
                                    </svg>
                                 </a>
                                 @endif @if(! empty($setting->youtube)) 
                                 <a class="cb-outro-social-item -youtube" href="{{$setting->youtube}}" target="_blank" rel="noopener" aria-label="YouTube">
                                    <span class="cb-outro-social-item-title"><span data-text="YouTube">{{trans('home.youtube')}}</span></span>
                                    <svg class="cb-svgsprite -youtube">
                                       <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#youtube')}}"> </use>
                                    </svg>
                                 </a>
                                 @endif 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      @yield('modal') </div><script>var videoShowReel={!! json_encode('/aboutStrucs/source/' . $about->show_reel) !!}; var assetUrlGolbal={!! json_encode(url('uploads')) !!}; var assetUrlProjectImage={!! json_encode('/projects/source/') !!}; </script> <?php $projectsImages=App\Project::where('status',1)->limit(6)->orderBy('order')->get()->pluck('image'); $items=array(); foreach($projectsImages as $key=>$proImage){$items[]=url('uploads/projects/source/' . $proImage);}?> <script>var assetUrlProjectId={!! json_encode($items) !!}; </script> <script src="{{url('resources/assets/front/js/bundle.js')}}"></script> 
      <noscript>
         <link rel="stylesheet" href="{{url('resources/assets/front/css/noscript66c7.css')}}">
      </noscript>
      
      
        <script>
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
            
        	document.addEventListener('keypress', function (e) {
                if (e.key === 'u' && e.ctrlKey) {
                    e.preventDefault();
                } else {
                    return true;
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