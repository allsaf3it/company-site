@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
    @php echo $schema @endphp
@endsection
@section('data-barba')
    <main class="main theme-nav-dark " id="about" data-barba="container" data-barba-namespace="about">
@endsection
@section('main')
    <header class="section default-header theme-dark about-header" data-scroll-section>
        <div class="container">
            <div class="row row-title">
                <div class="flex-col" data-scroll data-scroll-speed="-7.5" data-scroll-position="top"
                    data-scroll-offset="0%, -25%">
                    <h1 class="medium">
                    <div class="split-words-wrap" style="position:relative; display:inline;">{{trans('home.We transform brands to power')}}</div>
                    <div class="single-word word-icon" style="position:relative;display:inline-block;">
                        <div class="single-word-inner" style="transform: rotate(0.00115deg);">
                            {{trans('home.gr')}}<div class="hidden-letter" style="position:relative; display:inline;">o<div
                                class="animation-arrow">
                                <div class="arrow"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.57144 10.4286V10.4286C7.77616 10.4286 12.0087 6.20471 12 1V1V1C11.9913 6.20471 16.2239 10.4286 21.4286 10.4286V10.4286"
                                            stroke="black" stroke-width="2" />
                                        <path d="M12 23V1" stroke="black" stroke-width="2" />
                                    </svg>
                                </div>
                                <div class="arrow arrow-duplicate"><svg width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.57144 10.4286V10.4286C7.77616 10.4286 12.0087 6.20471 12 1V1V1C11.9913 6.20471 16.2239 10.4286 21.4286 10.4286V10.4286"
                                            stroke="black" stroke-width="2" />
                                        <path d="M12 23V1" stroke="black" stroke-width="2" />
                                    </svg>
                                </div>
                                </div>
                            </div>{{trans('home.wth')}}
                        </div>
                    </div>
                    </h1>
                </div>
            </div>
            <div class="stripe"></div>
            <div class="row row-split row-intro">
                <div class="flex-col left-side styled">
                    <p>{!! $about->{'title_' . $lang} !!}</p>
                </div>
                <div class="flex-col styled">
                    {!! $about->{'text_' . $lang}  !!}
                </div>
            </div>
        </div>
    </header>

    <section class="section theme-dark photo-slider" data-scroll-section>
        <div class="container">
            <div class="single-flickity-slider" data-flickity-count="8">
                <div class="flickity-carousel" data-scroll data-scroll-speed="2" data-scroll-direction="horizontal">
                    <div class="flickity-slide">
                    <img class="single-image lazy" src="media/pages/home/vid.png"
                        data-src="media/pages/home/vid.png" width="1080" height="810" data-sizes="100w" alt="Image">
                    </div>
                    <div class="flickity-slide">
                    <img class="single-image lazy" src="media/pages/home/vid.png"
                        data-src="media/pages/home/vid.png" width="1080" height="810" data-sizes="100w" alt="Image">
                    </div>
                    <div class="flickity-slide">
                    <img class="single-image lazy" src="media/pages/home/vid.png"
                        data-src="media/pages/home/vid.png" width="1080" height="810" data-sizes="100w" alt="Image">
                    </div>
                    <div class="flickity-slide">
                    <img class="single-image lazy" src="media/pages/home/vid.png"
                        data-src="media/pages/home/vid.png" width="1080" height="810" data-sizes="100w" alt="Image">
                    </div>
                    <div class="flickity-slide">
                    <img class="single-image lazy" src="media/pages/home/vid.png"
                        data-src="media/pages/home/vid.png" width="1080" height="810" data-sizes="100w" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(! empty($about->{'service_text_' . $lang} ))
        <section class="section theme-dark services-intro" data-scroll-section>
            <div class="container">
                <div class="row row-split row-intro">
                    <div class="flex-col">
                        <h2>{{trans('home.services')}}</h2>
                    </div>
                    <div class="flex-col styled">
                        <h3>{!! $about->{'service_text_' . $lang} !!}</h3>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection