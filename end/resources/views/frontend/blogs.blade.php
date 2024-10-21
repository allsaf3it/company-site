@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
@endsection
@section('data-barba')
    <main class="main theme-nav-dark " id="news" data-barba="container" data-barba-namespace="news">
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
    <div class="section-wrap theme-light theme-lightgray" data-scroll-section>
        <div class="data-change-color-main"></div>
        <header
            class="section default-header theme-light theme-lightgray news-header data-change-color-section">
            <div class="container">
                <div class="row row-title">
                    <div class="flex-col">
                        <h1 class="big split-words-wrap" data-scroll data-scroll-speed="-7.5"
                            data-scroll-position="top" data-scroll-offset="0%, -25%">{{trans('home.news')}} <span class="count">
                                <div data-scroll data-scroll-speed="2" data-scroll-position="top"
                                    data-scroll-offset="0%, -25%">({{count($blogs)}})</div>
                            </span></h1>
                        <div class="stripe"></div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    @if (count($blogs) > 0)
        <div class="section-wrap theme-light theme-lightgray grid-news-wrap grid-hover" data-scroll-section>
            <div class="data-change-color-main"></div>
            <section class="section theme-light theme-lightgray grid-news data-change-color-section">
                <div class="container">
                    <div class="row row-filter" id="news-filter">
                        <div class="flex-col">
                            <p>
                                <span class="inactive">Filter: </span>
                                <span class="filter-active">
                                    <span class="filter-hidden-text">Category</span>
                                    <span class="filter-inner-active visible" data-status-category="all">All
                                        news</span>
                                    @foreach($blogsParent as $blogParent)
                                        <span class="filter-inner-active"
                                            data-status-category="blog{{$blogParent->id}}">{{$blogParent->{'title_' . $lang} }}</span>
                                    @endif
                                </span>
                            </p>
                        </div>
                        <div class="flex-col">
                            <div class="btn-row">
                                <div class="btn btn-filter active" data-filter="all">
                                    <div class="btn-click">
                                        <div class="btn-fill btn-original-fill"></div>
                                        <div class="btn-text btn-original-text">
                                            <span>All</span>
                                        </div>
                                        <div class="btn-fill btn-duplicate-fill"></div>
                                        <div class="btn-text btn-duplicate-text">
                                            <span>All</span>
                                        </div>
                                    </div>
                                </div>
                                @foreach($blogsParent as $blogParent)
                                    <div class="btn btn-filter" data-filter="blog{{$blogParent->id}}">
                                        <div class="btn-click">
                                            <div class="btn-fill btn-original-fill"></div>
                                            <div class="btn-text btn-original-text">
                                                <span>{{$blogParent->{'title_' . $lang} }}</span>
                                            </div>
                                            <div class="btn-fill btn-duplicate-fill"></div>
                                            <div class="btn-text btn-duplicate-text">
                                                <span>{{$blogParent->{'title_' . $lang} }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row products-list toggle-fade visible">
                        <div class="flex-col">
                            <ul class="mouse-pos-list-image-ul">
                                @foreach($blogs as $blog)
                                    <li class="single-news-item mouse-pos-list-image-hover visible"
                                        data-category="blog{{$blog->parent_id}}">
                                        <a href="{{LaravelLocalization::localizeUrl('blog/'.$blog->{'link_'.$lang} )}}" data-background-color="{{$blog->color}}">
                                            <div class="col">
                                                <div class="col-row col-row-thumb">
                                                    <div class="thumb">
                                                        <div class="overlay overlay-image">
                                                            <img class="overlay single-image lazy"
                                                                src="{{asset('uploads/blogs/' . $blog->image)}}"
                                                                data-src="{{asset('uploads/blogs/' . $blog->image)}}" width="1080"
                                                                height="810" data-sizes="100w" alt="Image">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $Parent = App\Models\Blog::select('title_en', 'title_ar')->where('id', $blog->parent_id)->first(); 
                                                @endphp
                                                <div class="col-row">
                                                    <p><strong>{{$Parent->{'title_' . $lang} }}</strong></p>
                                                </div>
                                                <div class="col-row">
                                                    <h3><span>{{$blog->{'title_' . $lang} }}</span></h3>
                                                </div>
                                                <div class="col-row">
                                                    <p><span>{{$blog->writer}}</span> <span>{{$blog->date}}</span></p>
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
                </div>
            </section>
        </div>
    @endif
@endsection