@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
@endsection
@section('data-barba')
    <main class="main theme-nav-dark " id="courses" data-barba="container" data-barba-namespace="courses">
@endsection
@section('main')
    <header class="section default-header theme-dark about-header" data-scroll-section>
        <div class="container">
            <div class="row row-title">
                <div class="flex-col" data-scroll data-scroll-speed="-7.5" data-scroll-position="top"
                    data-scroll-offset="0%, -25%">
                    <h1 class="medium">
                    <div class="split-words-wrap" style="position:relative; display:inline;">
                        {{trans('home.our_courses')}}
                    </div>
                    </h1>
                </div>
            </div>
            <div class="stripe"></div>
        </div>
    </header>
    @if(count($courses) > 0)
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
            </div>
        </section>
    @endif

@endsection