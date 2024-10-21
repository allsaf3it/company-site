@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
    @php echo $schema @endphp
@endsection
@section('data-barba')
    <main class="main theme-nav-dark main-theme-light " id="news-single" data-barba="container" data-barba-namespace="news-single">
@endsection
@section('main')
    <header class="section default-header theme-light data-change-color-section news-single-header"
        data-scroll-section>
        <div class="data-change-color-main"></div>
        <div class="container">
            <div class="row row-title">
                <div class="flex-col">
                    <div class="col-wrap">
                        <div class="col-wrap-inner" data-scroll data-scroll-speed="-7.5"
                            data-scroll-position="top" data-scroll-offset="0%, -25%">
                            <div class="col-row">
                                @php
                                $parent = App\Models\Blog::select('title_en', 'title_ar')->where('id', $blog->parent_id)->where('status', 1)->first()
                                @endphp
                                <p><strong>{{$parent->{'title_' . $lang} }}</strong><span class="mobile">{{$blog->created_at->diffForHumans()}}</span></p>
                            </div>
                            <div class="col-row col-title">
                                <h1 class="split-words-wrap">{{$blog->{'title_' . $lang} }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-row col-wide">
                        <div class="stripe"></div>
                        <p><span>{{$blog->writer}}</span><span>{{$blog->date}}</span><span class="desktop">
                        {{$blog->created_at->diffForHumans()}}</span></p>
                    </div>
                </div>
            </div>
            <div class="row row-thumb">
                <div class="thumb">
                    <div class="overlay overlay-image">
                        <img class="overlay lazy" data-scroll data-scroll-speed="-1" data-scroll-position="top"
                            src="{{asset('uploads/blogs/' . $blog->image)}}" data-src="{{asset('uploads/blogs/' . $blog->image)}}"
                            width="1920" height="1080" data-sizes="100w" alt="{{$blog->alt_img}}">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <article class="section-wrap theme-light layout-wrapper data-change-color-section" data-scroll-section>
        <section class="section theme-light single-layout data-change-color-section"
            id="7ec5bf33-323b-49cc-9e73-f7fafda8f958">
            <div class="container">
                <div class="row">
                    <div class="flex-col column-span-6" style="--columns: calc(12/6)">
                        <div class="inner-row block-type-heading">
                            <h3>
                                {{$blog->{'title_' . $lang} }}
                            </h3>
                        </div>
                    </div>
                    <div class="flex-col column-span-6" style="--columns: calc(12/6)">
                        <div class="inner-row styled block-type-text">
                            {!! $blog->{'text_' . $lang} !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <section class="section section-light news-single-article-footer" data-scroll-section>
        <div class="container">
            <div class="row">
                <div class="flex-col">
                    <div class="col-row col-wide">
                        <div class="stripe"></div>
                        <p><span>{{$blog->writer}}</span><span>{{$blog->date}}</span><span class="desktop">{{$blog->created_at->diffForHumans()}}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-wrap theme-light theme-lightgray home-grid-news-wrap single-news-grid-news-wrap grid-hover"
        data-scroll-section>
        <div class="data-change-color-main"></div>
        <section class="section theme-light theme-lightgray home-grid-news data-change-color-section">
            <div class="container">
                <div class="row row-split">
                    <div class="flex-col">
                        <h2>{{trans('home.Next up')}}</h2>
                    </div>
                    <div class="flex-col">
                        <div class="btn-row">
                            <div class="btn btn-normal">
                                <a href="blogs.html" data-barba-update class="btn-click">
                                    <div class="btn-fill btn-original-fill"></div>
                                    <div class="btn-text btn-original-text">
                                        <span>{{trans('home.News overview')}}</span>
                                    </div>
                                    <div class="btn-fill btn-duplicate-fill"></div>
                                    <div class="btn-text btn-duplicate-text">
                                        <span>{{trans('home.News overview')}}  </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row products-list toggle-fade visible">
                    <div class="flex-col">
                        <ul class="mouse-pos-list-image-ul">
                            <li class="single-news-item mouse-pos-list-image-hover visible"
                                data-category="insights">
                                <a href="blog-details.html" data-barba-update data-background-color="#34eb71">
                                    <div class="col">
                                        <div class="col-row col-row-thumb">
                                            <div class="thumb">
                                                <div class="overlay overlay-image">
                                                    <img class="overlay single-image lazy"
                                                        src="{{asset('uploads/blogs/' . $nextService->image)}}"
                                                        data-src="{{asset('uploads/blogs/' . $nextService->image)}}" width="1080"
                                                        height="810" data-sizes="100w" alt="{{$nextService->alt_img}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-row">
                                            <p><strong>{{$parentNextService->{'title_' . $lang} }}</strong> <span>{{$nextService->created_at->diffForHumans()}}</span></p>
                                        </div>
                                        <div class="col-row">
                                            <h3><span>{{$nextService->{'title_' . $lang} }}</span></h3>
                                        </div>
                                        <div class="col-row">
                                            <p><span>{{$nextService->writer}}</span> <span>{{$nextService->date}}</span></p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="intro">{!! $nextService->{short_text_ . $lang} !!}</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row-btn btn-row">
                    <div class="btn btn-normal">
                        <a href="blogs.html" data-barba-update class="btn-click">
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

@endsection