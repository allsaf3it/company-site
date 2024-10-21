@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
    @php echo $schema @endphp
@endsection
@section('data-barba')
    <main class="main theme-nav-dark " id="course-details" data-barba="container"
        data-barba-namespace="course-details">
@endsection
@section('main')
    <header class="section default-header theme-dark data-change-color-section work-single-header"
            data-scroll-section>
        <div class="container">
            <div class="row row-title">
                <div class="flex-col">
                    <div class="col-wrap">
                    <div class="col-wrap-inner" data-scroll data-scroll-speed="-7.5" data-scroll-position="top"
                        data-scroll-offset="0%, -25%">
                        <div class="col-row">
                            <p><strong>{{trans('home.our_courses')}}</strong></p>
                        </div>
                        <div class="col-row col-title">
                            <h1 class="split-words-wrap">{{$course->{'name_'.$lang} }}</h1>
                        </div>
                    </div>
                    </div>
                    <div class="col-row col-wide">
                    <div class="stripe"></div>
                    </div>
                </div>
            </div>
            @if(! empty($course->video))
                <div class="row row-thumb">
                    <div class="flex-col">
                        <div class="single-vimeo-player">
                            <div class="video-box vimeo-overlay-placeholder playpauze" data-scroll data-scroll-speed="-1">
                                <video src="{{asset('uploads/courses/' . $course->video)}}" loop muted playsinline></video>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </header>

    <section class="section work-single-intro theme-dark data-change-color-section" data-scroll-section>
        <div class="container">
            <div class="row row-split row-intro">
                <div class="flex-col">
                    <div class="list-wrap">
                        <div class="list">
                            <p><strong>{{trans('home.courses')}}</strong></p>
                            @foreach($courses as $courseItem)
                                <a href="{{LaravelLocalization::localizeUrl('course/'.$courseItem->{'link_'.$lang} )}}">{{$courseItem->{'name_'.$lang} }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex-col">
                    <h3>{{$course->{'name_' . $lang} }}</h3>
                    <div class="row styled">
                        {!! $course->{'text_' . $lang} !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <article class="section-wrap theme-dark layout-wrapper data-change-color-section" data-scroll-section>
        @if(! empty($course->image))
            <section class="section theme-dark single-layout data-change-color-section"
                id="e2206bb7-f808-4109-bc67-315a6acb8e8e">
                <div class="container">
                    <div class="row">
                        <div class="flex-col column-span-12" style="--columns: calc(12/12)">
                        <div class="inner-row block-type-image">
                            <figure>
                                <div class="image-box no-ratio">
                                    <img class="lazy" data-scroll data-scroll-speed="-1" src="{{asset('uploads/courses/' . $course->image)}}"
                                    src="{{asset('uploads/courses/' . $course->image)}}" data-src="{{asset('uploads/courses/' . $course->image)}}" width="1720"
                                    height="921" data-sizes="100w" alt="{{$course->alt_img}}">
                                </div>
                            </figure>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if(! empty($course->{'title_' . $lang} ) || ! empty($course->{'desc_' . $lang} ))
            <section class="section theme-dark single-layout data-change-color-section"
                id="e014e412-9c0b-4704-a2cf-0c30035fee67">
                <div class="container">
                    <div class="row">
                        <div class="flex-col column-span-6" style="--columns: calc(12/6)">
                            @if(! empty($course->{'title_' . $lang} ))
                                <div class="inner-row block-type-heading">
                                    <h3>{{$course->{'title_' . $lang} }}</h3>
                                </div>
                            @endif
                            @if($course->{'desc_' . $lang})
                                <div class="inner-row styled block-type-text">
                                    <p>{!! $course->{'desc_' . $lang} !!}</p>
                                </div>
                            @endif
                        </div>
                        <div class="flex-col column-span-6" style="--columns: calc(12/6)">
                        <div class="column-empty"></div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </article>
    @php
            $swipService = App\Models\Course::where('status', 1)->where('parent_id', $course->parent_id)->where('id', '>' ,$course->id)->first();
        if($swipService){
            $nextService = $swipService;
        }else{
            $nextService = App\Models\Course::where('status', 1)->where('parent_id', $course->parent_id)->where('id', '<' ,$course->id)->first();
        }
    @endphp
    @if($nextService != null)
        <section class="section theme-dark work-single-related data-change-color-section" data-scroll-section>
            <div class="container">
                <div class="stripe"></div>
                <a href="{{LaravelLocalization::localizeUrl('course/'.$nextService->{'link_'.$lang} )}}" data-cursor-text="{{trans('home.Next Course')}}" data-background-color="{{$nextService->color}}">
                    <div class="row row-subtitle">
                        <div class="flex-col">
                        <p>{{trans('home.Next up')}}</p>
                        </div>
                    </div>
                    <div class="row row-title">
                        <div class="flex-col">
                        <h2>{{trans('home.Next Service')}}</h2>
                        </div>
                    </div>
                    <div class="row row-thumb">
                        <div class="thumb cycle-images-parent" data-scroll data-scroll-speed="3"
                        data-scroll-position="bottom">
                        <div class="overlay overlay-image cycle-images">
                            <img class="overlay single-image lazy active" src="{{asset('uploads/coursrs/' . $nextService->image)}}"
                                data-src="{{asset('uploads/courses/' . $nextService->image)}}" width="1080" height="1080" data-sizes="100w"
                                alt="{{$nextService->alt_img}}">
                        </div>
                        </div>
                    </div>
                    <div class="row btn-row">
                        <div class="btn btn-normal btn-negative">
                        <div class="btn-click">
                            <div class="btn-fill btn-original-fill"></div>
                            <div class="btn-text btn-original-text">
                                <span>{{trans('home.View work')}}</span>
                            </div>
                            <div class="btn-fill btn-duplicate-fill"></div>
                            <div class="btn-text btn-duplicate-text">
                                <span>{{trans('home.View work')}}</span>
                            </div>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    @endif

@endsection
