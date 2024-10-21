@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
@endsection
@section('data-barba')
    <main class="main theme-nav-dark " id="services" data-barba="container" data-barba-namespace="services">
@endsection
@section('main')
    <header class="section default-header theme-dark about-header" data-scroll-section>
        <div class="container">
            <div class="row row-title">
                <div class="flex-col" data-scroll data-scroll-speed="-7.5" data-scroll-position="top"
                    data-scroll-offset="0%, -25%">
                    <h1 class="medium">
                    <div class="split-words-wrap" style="position:relative; display:inline;">
                        {{trans('home.our_services')}}
                    </div>
                    </h1>
                </div>
            </div>
            <div class="stripe"></div>
        </div>
    </header>
    @if(count($services) > 0)
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
    @endif
@endsection