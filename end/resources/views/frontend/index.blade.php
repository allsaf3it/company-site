@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
    @php echo $schema @endphp
@endsection
@section('data-barba')
    <main class="main theme-nav-dark" id="home" data-barba="container" data-barba-namespace="home">
@endsection
@section('blogsImage')
    <div class="main-fade"></div>
    <div class="data-change-color-main"></div>
    <div class="mouse-pos-list-image mouse-pos-list-service no-select">
        <div class="mouse-pos-list-rotate">
            @foreach($blogs as $blog)
                <li class="overlay mouse-pos-list-image-inner">
                    <div class="overlay overlay-image">
                        <div class="overlay overlay-image-inner lazy"
                            style="opacity: 1; background-position: center center; background-repeat: no-repeat; background-size: cover;"
                            data-bg="{{asset('uploads/blogs/' . $blog->image)}}">
                        </div>
                    </div>
                </li>
            @endforeach
            <div class="fake-cursor">
                <div class="fake-cursor-before"></div>
                <span class="fake-cursor-text">{{trans('home.Read article')}}</span>
                <span class="fake-cursor-text duplicate">{{trans('home.Read article')}}</span>
            </div>
        </div>
    </div>
@endsection
@section('main')
    <header class="section theme-dark default-header home-header data-change-color-section" data-scroll-section
        data-scroll>
        <div class="container">
            <div class="row row-title" data-scroll data-scroll-speed="-7.5" data-scroll-position="top"
                data-scroll-offset="0%, -25%">
                <div class="flex-col left">
                    <h1 class="big split-words-wrap">All Safe</h1>
                    <h1 class="big split-words-wrap">
                    <div style="position:relative;display:inline-block;" class="single-word">
                        <div class="icon-sprite"><svg width="216" height="24" viewBox="0 0 216 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M180 20.3333C184.602 20.3333 188.333 16.6024 188.333 12C188.333 7.39762 184.602 3.66666 180 3.66666C175.398 3.66666 171.667 7.39762 171.667 12C171.667 16.6024 175.398 20.3333 180 20.3333Z"
                                stroke="black" stroke-width="2" />
                                <path
                                d="M175.833 12C175.833 13.1051 176.272 14.1649 177.054 14.9463C177.835 15.7277 178.895 16.1667 180 16.1667C181.105 16.1667 182.165 15.7277 182.946 14.9463C183.728 14.1649 184.167 13.1051 184.167 12"
                                stroke="black" stroke-width="2" />
                                <path d="M84 2L93 7V17L84 22L75 17V7L84 2Z" stroke="black" stroke-width="2"
                                stroke-miterlimit="10" />
                                <path d="M75 7L84 12L93 7" stroke="black" stroke-width="2" stroke-miterlimit="10" />
                                <path d="M84 12V22" stroke="black" stroke-width="2" stroke-miterlimit="10" />
                                <path d="M99.5 6.5L102.5 9.5V12.5L104.5 14.5H108L110 16.5V19L107 22" stroke="black"
                                stroke-width="2" />
                                <path d="M113 3.5L109.5 7V10.5L111.5 12H114.5L116 13.5V18" stroke="black"
                                stroke-width="2" />
                                <path
                                d="M108 22C113.523 22 118 17.5228 118 12C118 6.47715 113.523 2 108 2C102.477 2 98 6.47715 98 12C98 17.5228 102.477 22 108 22Z"
                                stroke="black" stroke-width="2" />
                                <g clip-path="url(#clip0_450_82)">
                                <path d="M143 11L132 22L121 11L126 3H138L143 11Z" stroke="black" stroke-width="2" />
                                <path d="M121 11H143" stroke="black" stroke-width="2" />
                                <path d="M130 3L128 11" stroke="black" stroke-width="2" />
                                <path d="M134 3L136 11" stroke="black" stroke-width="2" />
                                <path d="M132 22L136 11" stroke="black" stroke-width="2" />
                                <path d="M128 11L132 22" stroke="black" stroke-width="2" />
                                </g>
                                <path d="M204 3L207 4L206 10H213V13L210 20H202L199 18V11L204 3Z" stroke="black"
                                stroke-width="2" stroke-miterlimit="10" />
                                <path d="M199 10H195V20H199V10Z" stroke="black" stroke-width="2"
                                stroke-miterlimit="10" />
                                <path d="M45.5 10V5H40.5" stroke="black" stroke-width="2" stroke-miterlimit="10" />
                                <path d="M45.5 5L37 13.5L33 9.5L26 16.5" stroke="black" stroke-width="2"
                                stroke-miterlimit="10" />
                                <path
                                d="M12 16C15.866 16 19 12.866 19 9C19 5.13401 15.866 2 12 2C8.13401 2 5 5.13401 5 9C5 12.866 8.13401 16 12 16Z"
                                stroke="black" stroke-width="2" stroke-miterlimit="10" />
                                <path d="M12 22.5V12V6" stroke="black" stroke-width="2" stroke-miterlimit="10" />
                                <path d="M9 9L12 12L15 9" stroke="black" stroke-width="2" stroke-miterlimit="10" />
                                <g clip-path="url(#clip1_450_82)">
                                <path
                                    d="M54.1 18.76C52.8855 18.0618 51.8707 17.0634 51.1528 15.8604C50.4349 14.6575 50.0379 13.2904 50 11.89C50 7.19 54.47 3.38 60 3.38C65.53 3.38 70 7.19 70 11.89C70 16.59 65.52 20.39 60 20.39C59.367 20.3913 58.7349 20.3412 58.11 20.24L53.66 22.49L54.1 18.76Z"
                                    stroke="black" stroke-width="2" />
                                <path
                                    d="M60 10.75L59.56 10.36C59.2756 10.095 58.8996 9.95079 58.511 9.95765C58.1224 9.9645 57.7516 10.1219 57.4768 10.3968C57.2019 10.6716 57.0445 11.0423 57.0376 11.431C57.0308 11.8196 57.175 12.1956 57.44 12.48L60 15.08L62.56 12.48C62.825 12.1956 62.9692 11.8196 62.9623 11.431C62.9555 11.0423 62.7981 10.6716 62.5232 10.3968C62.2484 10.1219 61.8776 9.9645 61.489 9.95765C61.1004 9.95079 60.7243 10.095 60.44 10.36L60 10.75Z"
                                    stroke="black" stroke-width="2" />
                                </g>
                                <path
                                d="M166 12C165.011 13.794 163.565 15.2941 161.809 16.348C160.052 17.4019 158.048 17.9719 156 18C153.952 17.9719 151.948 17.4019 150.191 16.348C148.435 15.2941 146.989 13.794 146 12C146.989 10.206 148.435 8.70586 150.191 7.65199C151.948 6.59812 153.952 6.02814 156 6C158.048 6.02814 160.052 6.59812 161.809 7.65199C163.565 8.70586 165.011 10.206 166 12Z"
                                stroke="black" stroke-width="2" />
                                <path
                                d="M156 15C157.657 15 159 13.6569 159 12C159 10.3431 157.657 9 156 9C154.343 9 153 10.3431 153 12C153 13.6569 154.343 15 156 15Z"
                                stroke="black" stroke-width="2" />
                                <defs>
                                <clipPath id="clip0_450_82">
                                    <rect width="24" height="24" fill="white" transform="translate(120)" />
                                </clipPath>
                                <clipPath id="clip1_450_82">
                                    <rect width="24" height="24" fill="white" transform="translate(48)" />
                                </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    </h1>
                </div>
                <div class="flex-col right" data-scroll data-scroll-speed="-1" data-scroll-position="top">
                    <h1 class="big split-words-wrap">{{trans('home.traade')}}</h1>
                    <h1 class="big split-words-wrap">{{trans('home.boot')}}</h1>
                </div>
            </div>
            <div class="stripe"></div>
        </div>
    </header>
    <!-- about -->
    <section class="section theme-dark section-showreel data-change-color-section" data-scroll-section>
        <div class="container">
            <div class="row row-info">
                <p class="fade-in">{{trans('home.Transforming brands for growth')}}</p>
                <p class="fade-in">{{trans('home.What can we do for you?')}}</p>
            </div>
            <div class="row">
                <div class="flex-col">
                    <div class="single-vimeo-player" style="--aspect-ratio: 50%;" data-vimeo-player-target
                    data-vimeo-status-activated="false" data-vimeo-status-loaded="false"
                    data-vimeo-status-play="false" data-vimeo-status-muted="false">
                    <iframe
                        src="{{$configration->home_video}}"
                        width="640" height="360" frameborder="0" allowfullscreen
                        allow="autoplay; encrypted-media"></iframe>
                    <div class="overlay vimeo-overlay-dark"></div>
                    <div class="overlay vimeo-overlay-interface">
                        <div class="vimeo-duration">
                            <span class="time duration"></span>
                        </div>
                        <div class="vimeo-mute" data-vimeo-control="mute">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M3 8.99998V15H7L12 20V3.99998L7 8.99998H3ZM16.5 12C16.5 10.23 15.48 8.70998 14 7.96998V16.02C15.48 15.29 16.5 13.77 16.5 12ZM14 3.22998V5.28998C16.89 6.14998 19 8.82998 19 12C19 15.17 16.89 17.85 14 18.71V20.77C18.01 19.86 21 16.28 21 12C21 7.71998 18.01 4.13998 14 3.22998V3.22998Z"
                                fill="black" />
                            </svg>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M16.5 12C16.5 10.23 15.48 8.71 14 7.97V10.18L16.45 12.63C16.48 12.43 16.5 12.22 16.5 12V12ZM19 12C19 12.94 18.8 13.82 18.46 14.64L19.97 16.15C20.63 14.91 21 13.5 21 12C21 7.72 18.01 4.14 14 3.23V5.29C16.89 6.15 19 8.83 19 12ZM4.27 3L3 4.27L7.73 9H3V15H7L12 20V13.27L16.25 17.52C15.58 18.04 14.83 18.45 14 18.7V20.76C15.38 20.45 16.63 19.81 17.69 18.95L19.73 21L21 19.73L12 10.73L4.27 3ZM12 4L9.91 6.09L12 8.18V4Z"
                                fill="black" />
                            </svg>
                        </div>
                    </div>
                    <div class="overlay vimeo-overlay-play" data-vimeo-control="play"
                        data-cursor-text="Play Showreel" data-background-color="var(--color-primary)">
                        <div class="icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 12V4L14 8L21 12L14 16L7 20V12Z" fill="black" />
                            </svg>
                        </div>
                    </div>
                    <div class="overlay vimeo-overlay-pause" data-vimeo-control="pause" data-cursor-text="Pause"
                        data-background-color="var(--color-primary)">
                        <div class="icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 5V19" stroke="black" stroke-width="3" stroke-miterlimit="10" />
                                <path d="M8 5V19" stroke="black" stroke-width="3" stroke-miterlimit="10" />
                            </svg>
                        </div>
                    </div>
                    <div class="overlay vimeo-overlay-loading"><svg version="1.1" id="L9"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#000"
                                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                            </path>
                        </svg></div>
                    <img class="overlay vimeo-overlay-placeholder lazy" data-scroll data-scroll-speed="-1"
                        data-scroll-position="top" src="{{asset('uploads/configration/'. $configration->video_image)}}" data-src="{{asset('uploads/configration/'. $configration->video_image)}}"
                        width="1721" height="922" data-sizes="100w" alt="Showreel Placeholder" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section theme-dark home-intro data-change-color-section" data-scroll-section>
        <div class="container">
            <div class="row row-text-big">
                <div class="flex-col">
                    <p>{{trans('home.about')}}</p>
                    <h3 class="big">
                        {!! $configration->{'about_app_' . $lang} !!}
                    </h3>
                </div>
            </div>
        </div>
    </section>
    @if(count($services) > 0)
        <!-- services -->
        <section class="section theme-dark testimonials-slider-intro data-change-color-section" data-scroll-section>
            <div class="container">
                <div class="row row-split">
                    <div class="flex-col">
                        <h2>{{trans('home.our_services')}}</h2>
                    </div>
                    <div class="flex-col desktop">
                        <div class="btn-row">
                        <div class="btn btn-negative">
                            <a href="{{LaravelLocalization::localizeUrl('/services')}}" class="btn-click">
                                <div class="btn-fill btn-original-fill"></div>
                                <div class="btn-text btn-original-text">
                                    <span>{{trans('home.More Services')}}</span>
                                </div>
                                <div class="btn-fill btn-duplicate-fill"></div>
                                <div class="btn-text btn-duplicate-text">
                                    <span>{{trans('home.More Services')}}</span>
                                </div>
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section theme-dark grid-work grid-hover data-change-color-section" data-scroll-section>
            <div class="container">
                <div class="row">
                    <div class="flex-col">
                        <ul class="small">
                            @foreach($services as $service)
                            <li class="single-work-item" data-scroll>
                                <a href="{{LaravelLocalization::localizeUrl('service/'.$service->{'link_'.$lang} )}}" class="item-click" data-cursor-text="{{$service->{'name_'.$lang} }}"
                                    data-background-color="{{$service->color}}">
                                    @if(! empty($service->video))
                                        <div class="thumb">
                                            <div class="overlay overlay-video playpauze">
                                            <video class="overlay" src="{{asset('uploads/services/' . $service->video)}}" loop muted playsinline></video>
                                            </div>
                                        </div>
                                    @else
                                        <div class="thumb cycle-images-parent">
                                            <div class="overlay overlay-image cycle-images">
                                            <img class="overlay single-image lazy active" src="{{ !empty($service->image) ? asset('uploads/services/' . $service->image) : asset('uploads/no_image.jpg')}}"
                                                data-src="{{ !empty($service->image) ? asset('uploads/services/' . $service->image) : asset('uploads/no_image.jpg')}}" width="879" height="879"
                                                data-sizes="100w" alt="{{$service->alt_img}}">
                                                @if(count($service->images()) > 0)
                                                    @foreach($service->images() as $image)
                                                        <img class="overlay single-image lazy" src="{{asset('uploads/services/' . $image->image)}}"
                                                            data-src="{{asset('uploads/services/' . $image->image)}}" width="921" height="921"
                                                            data-sizes="100w" alt="{{$service->alt_img}}">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    <h4>{{$service->{'name_'.$lang} }}</h4>
                                    <div class="tags">
                                        <span>{!! $service->{'short_text_'.$lang} !!} </span>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- tags -->
        <section class="section theme-dark home-services-tags data-change-color-section" data-scroll-section>
            <div class="container">
               <div class="row">
                  <div class="flex-col">
                     <div class="btn-row">
                        @foreach($servicesTags as $servicesTag)
                            <div class="btn btn-filter btn-negative">
                            <a href="{{LaravelLocalization::localizeUrl('service/'.$servicesTag->{'link_'.$lang} )}}" class="btn-click">
                                <div class="btn-fill btn-original-fill"></div>
                                <div class="btn-text btn-original-text">
                                    <span>{{$servicesTag->{'name_'.$lang} }}</span>
                                </div>
                                <div class="btn-fill btn-duplicate-fill"></div>
                                <div class="btn-text btn-duplicate-text">
                                    <span>{{$servicesTag->{'name_'.$lang} }}</span>
                                </div>
                            </a>
                            </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
        </section>
    @endif
    @if(count($courses) > 0)
        <section class="section theme-dark testimonials-slider-intro data-change-color-section" data-scroll-section>
            <div class="container">
               <div class="row row-split">
                  <div class="flex-col">
                     <h2>{{trans('home.our_courses')}}</h2>
                  </div>
                  <div class="flex-col desktop">
                     <div class="btn-row">
                        <div class="btn btn-negative">
                           <a href="{{LaravelLocalization::localizeUrl('/courses')}}" class="btn-click">
                              <div class="btn-fill btn-original-fill"></div>
                              <div class="btn-text btn-original-text">
                                 <span>{{trans('home.More Courses')}}</span>
                              </div>
                              <div class="btn-fill btn-duplicate-fill"></div>
                              <div class="btn-text btn-duplicate-text">
                                 <span>{{trans('home.More Courses')}}</span>
                              </div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </section>
        <section class="section theme-dark grid-work grid-hover data-change-color-section" data-scroll-section>
            <div class="container">
               <div class="row">
                  <div class="flex-col">
                     <ul class="small">
                        @foreach($courses as $course)
                            <li class="single-work-item" data-scroll>
                            <a href="{{LaravelLocalization::localizeUrl('course/'.$course->{'link_'.$lang} )}}" class="item-click" data-cursor-text="{!! $course->{'name_'.$lang} !!}"
                                data-background-color="{{$course->color}}">
                                @if(! empty($course->video))
                                <div class="thumb">
                                    <div class="overlay overlay-video playpauze">
                                        <video class="overlay" src="{{asset('uploads/courses/' . $course->video)}}" loop muted playsinline></video>
                                    </div>
                                </div>
                                @else
                                    <div class="thumb cycle-images-parent">
                                        <div class="overlay overlay-image cycle-images">
                                        <img class="overlay single-image lazy active" src="{{ !empty($course->image) ? asset('uploads/courses/' . $course->image) : asset('uploads/no_image.jpg')}}"
                                            data-src="{{ !empty($course->image) ? asset('uploads/courses/' . $course->image) : asset('uploads/no_image.jpg')}}" width="879" height="879"
                                            data-sizes="100w" alt="{{$course->alt_img}}">
                                            @if(count($course->images()) > 0)
                                                @foreach($course->images() as $image)
                                                    <img class="overlay single-image lazy" src="{{asset('uploads/courses/' . $image->image)}}"
                                                        data-src="{{asset('uploads/courses/' . $image->image)}}" width="921" height="921"
                                                        data-sizes="100w" alt="{{$course->alt_img}}">
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <h4>{{ $course->{'name_'.$lang} }}</h4>
                                <div class="tags">
                                    <span>{!! $course->{'short_text_'.$lang} !!} </span>
                                </div>
                            </a>
                            </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               <div class="row-btn btn-row">
                  <div class="btn btn-normal">
                     <a href="{{LaravelLocalization::localizeUrl('/courses')}}" class="btn-click">
                        <div class="btn-fill btn-original-fill"></div>
                        <div class="btn-text btn-original-text">
                           <span>{{trans('home.More Courses')}}</span>
                        </div>
                        <div class="btn-fill btn-duplicate-fill"></div>
                        <div class="btn-text btn-duplicate-text">
                           <span>{{trans('home.More Courses')}}</span>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
        </section>
    @endif
    @if(count($blogs) > 0)
        <!-- News -->
        <div class="section-wrap theme-light theme-lightgray home-grid-news-wrap grid-hover" data-scroll-section>
            <div class="data-change-color-main"></div>
            <section class="section theme-light theme-lightgray home-grid-news data-change-color-section">
                <div class="container">
                    <div class="row row-split">
                        <div class="flex-col">
                            <h2>{{trans('home.Featured news')}}</h2>
                        </div>
                    <div class="flex-col">
                        <div class="btn-row">
                           <div class="btn btn-normal">
                              <a href="blogs.html" class="btn-click">
                                 <div class="btn-fill btn-original-fill"></div>
                                 <div class="btn-text btn-original-text">
                                    <span>{{trans('home.News overview')}}</span>
                                 </div>
                                 <div class="btn-fill btn-duplicate-fill"></div>
                                 <div class="btn-text btn-duplicate-text">
                                    <span>{{trans('home.News overview')}}</span>
                                 </div>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row products-list toggle-fade visible">
                     <div class="flex-col">
                        <ul class="mouse-pos-list-image-ul">
                            @foreach($blogs as $blog)
                                <li class="single-news-item mouse-pos-list-image-hover visible">
                                    <a href="{{LaravelLocalization::localizeUrl('blog/'.$blog->{'link_'.$lang} )}}" data-background-color="{{$blog->color}}">
                                        <div class="col">
                                            <div class="col-row col-row-thumb">
                                            <div class="thumb">
                                                <div class="overlay overlay-image">
                                                    <img class="overlay single-image lazy" src="{{asset('uploads/blogs/' . $blog->image)}}"
                                                        data-src="{{asset('uploads/blogs/' . $blog->image)}}" width="1080" height="810"
                                                        data-sizes="100w" alt="{{$blog->alt_img}}">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-row">
                                                @php
                                                    $blogParent = App\Models\Blog::select('title_en', 'title_ar')->where('id', $blog->parent_id)->first(); 
                                                @endphp
                                            <p><strong>{{$blogParent->{'title_' . $lang} }}</strong> </p>
                                            </div>
                                            <div class="col-row">
                                            <h3><span>{{$blog->{'title_' . $lang} }}</span></h3>
                                            </div>
                                            <div class="col-row">
                                            <p><span>{{$blog->date}}</span></p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p class="intro">
                                                {!! $blog->{'short_text_' . $lang}  !!}
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                     </div>
                  </div>
                  <div class="row-btn btn-row">
                     <div class="btn btn-normal">
                        <a href="{{LaravelLocalization::localizeUrl('blogs')}}" class="btn-click">
                           <div class="btn-fill btn-original-fill"></div>
                           <div class="btn-text btn-original-text">
                              <span>{{trans('home.News overview')}}</span>
                           </div>
                           <div class="btn-fill btn-duplicate-fill"></div>
                           <div class="btn-text btn-duplicate-text">
                              <span>{{trans('home.News overview')}}</span>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </section>
        </div>
    @endif

@endsection