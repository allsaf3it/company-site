@extends('layouts.app')
@section('meta')
    <title>{{app()->getLocale() == 'en' ? $project->name_en : $project->name_ar}}</title>
@endsection
@section('controller')
    <div class="cb-view" data-controller="projectController" id="view-main"><canvas class="cb-scene"></canvas>
@endsection

@section('content')
    <div class="cb-navbar">
        <div class="cb-navbar-strip">
            <div class="cb-navbar-grid">
                <div class="cb-navbar-grid-col -left">
                    <div class="cb-navbar-logo">
                        <a href="{{LaravelLocalization::localizeUrl('/')}}" aria-label="All Safe">
                            <img src="{{url('uploads/settings/source/'.$configration->app_logo)}}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="cb-navbar-grid-col -right">
                    <div class="cb-navbar-toggle"><button class="cb-btn cb-btn_menu" aria-label="menu"><span
                                class="cb-btn_menu-title">{{trans('home.menu')}}</span><span class="cb-btn_menu-box"
                                style="visibility:hidden"><span></span><span></span></span></button></div>
                </div>
            </div>
        </div>
    </div>
    <header class="cb-tophead">
        <div class="cb-tophead-content">
            <div class="cb-tophead-container">
                <div class="cb-tophead-header">
                    <h1>{{app()->getLocale() == 'en' ? $project->title_en : $project->title_ar}}</h1>
                </div>
                <div class="cb-tophead-title">
                    <h2>{!! app()->getLocale() == 'en' ? $project->title_en_inside : $project->title_en_inside !!}</h2>
                </div>
            </div>
        </div>
    </header>
    @if(! empty($project->image))
    <section class="cb-screenshot">
        <div class="cb-screenshot-preview -lg"><img src="{{url('uploads/projects/source/' . $project->image)}}" alt>
        </div>
    </section>
    @endif
    @if($project->challenge_title_en || $project->challenge_title_ar)
    <section class="cb-brief">
        <div class="cb-brief-content">
            <div class="cb-brief-container">
                <div class="cb-brief-grid">
                    <div class="cb-brief-grid-col -left">
                        <div class="cb-brief-header">
                            <h2>{{app()->getLocale() == 'en' ? $project->challenge_title_en : $project->challenge_title_ar}}</h2>
                        </div>
                    </div>
                    <div class="cb-brief-grid-col -right">
                        <div class="cb-brief-text">
                            <p>
                                {!! app()->getLocale() == 'en' ? $project->challenge_text_en : $project->challenge_text_ar !!}
                            </p>
                        </div>
                        <?php 
                            $smart = app()->getLocale() == 'en' ? $project->challenge_details_en : $project->challenge_details_ar;
                            $challengeArr = explode(',', $smart);
                        ?>
                        <div class="cb-brief-link">@foreach($challengeArr as $challengeItem)<a class="cb-brief-link-item" href="javascript::void(0)"
                                target="_blank" rel="noopener" data-magnetic><span
                                    data-text="{{$challengeItem}}">{{$challengeItem}}</span></a>@endforeach</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if(! empty($project->image3))
    <section class="cb-screenshot">
        <div class="cb-screenshot-preview -lg"><img src="{{url('uploads/projects/source/' . $project->image3)}}"
                loading="lazy" alt></div>
    </section>
    @endif
    @if($project->text_en || $project->text_ar)
    <section class="cb-description">
        <div class="cb-description-content -rb">
            <div class="cb-description-container">
            {!! app()->getLocale() == 'en' ? $project->text_en : $project->text_ar !!}
            </div>
        </div>
    </section>
    @endif
    @if(count($projects)> 0)
        <section class="cb-splitshow">
            <div class="cb-splitshow-content -ct">
                <div class="cb-splitshow-container">
                    <div class="cb-splitshow-items">
                        <div class="cb-splitshow-col -left">
                            @isset($project->projectDetails()[0])
                                @foreach($project->projectDetails()[0] as $proDetails)
                                    <div class="cb-splitshow-item">
                                        <div class="cb-splitshow-preview -sm"><img
                                                src="assets/img/project-details/3.jpg"
                                                srcset="assets/img/project-details/3.jpg 2x" loading="lazy" alt>
                                        </div>
                                        <div class="cb-splitshow-caption">Overview of current events and city highlights.
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                        <div class="cb-splitshow-col -right">
                        @isset($project->projectDetails()[0])
                                @foreach($project->projectDetails()[0] as $proDetails)
                            <div class="cb-splitshow-item">
                                <div class="cb-splitshow-preview"><img
                                        src="{{url('uploads/projects/source/' . $project->image)}}"
                                        srcset="{{url('uploads/projects/source/' . $project->image)}} 2x" loading="lazy" alt>
                                </div>
                                <div class="cb-splitshow-caption">{!! app()->getLocale() == 'en' ? $project->name_en : $project->name_ar !!}</div>
                            </div>
                            @endforeach
                        @endisset
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if($project->ar_en_title_en || $project->ar_en_title_ar)
    <section class="cb-description">
        <div class="cb-description-content -ct -mb">
            <div class="cb-description-container">
                <div class="cb-description-header">
                    <h2>{!! app()->getLocale() == 'en' ? $project->ar_en_title_en : $project->ar_en_title_ar !!}</h2>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if(! empty($project->ar_en_video))
    <section class="cb-screenshot">
        <div class="cb-screenshot-container">
            <div class="cb-screenshot-preview"><video preload="auto" loop muted autoplay playsinline>
                    <source src="{{url('uploads/projects/source/' . $project->ar_en_video)}}" type="video/mp4">
                </video></div>
        </div>
    </section>
    @endif
    @if($project->city_map_title_en || $project->city_map_title_ar || $project->city_map_text_en || $project->city_map_text_ar)
    <section class="cb-description">
        <div class="cb-description-content -ct -mb">
            <div class="cb-description-container">
                <div class="cb-description-header">
                    <h2>{!! app()->getLocale() == 'en' ? $project->city_map_title_en : $project->city_map_title_ar !!}</h2>
                </div>
                <div class="cb-description-text">
                    <p>
                        {!! app()->getLocale() == 'en' ? $project->city_map_text_en : $project->city_map_text_ar !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if(! empty($project->city_map_video))
    <section class="cb-screenshot">
        <div class="cb-screenshot-container">
            <div class="cb-screenshot-preview" style="padding-bottom:57.91%"><video preload="auto" loop muted
                    autoplay playsinline>
                    <source src="{{url('uploads/projects/source/' . $project->city_map_video)}}" type="video/mp4">
                </video></div>
        </div>
    </section>
    @endif
    @if($nextProject)
        <section class="cb-nextcase" data-project-next="Service1">
            <div class="cb-nextcase-content">
                <div class="cb-nextcase-body">
                    <div class="cb-nextcase-container"><a class="cb-nextcase-anchor" href="{{app()->getLocale() == 'en' ? LaravelLocalization::localizeUrl('project/'.$nextProject->link_en) : LaravelLocalization::localizeUrl('project/'.$nextProject->link_ar) }}"><span class="cb-nextcase-title"><span>{{trans('home.next_case')}}
                                    </span></span></a></div>
                </div>
            </div>
        </section>
    @endif
@endsection    