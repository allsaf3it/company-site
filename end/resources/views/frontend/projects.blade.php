@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
@endsection
@section('main')
    <!-- Breadcrumb Section -->
    <div id="hero">
        <div id="hero-styles">
            <div id="hero-caption" class="content-full-width parallax-scroll-caption">
                <div class="inner">
                    <div class="hero-title-wrapper"><h1 class="hero-title"><span>{{trans('home.Our')}}</span><span>{{trans('home.projects')}}</span></h1></div>                                    
                </div>
            </div>
            <div id="hero-footer">
                <div class="hero-footer-left">
                    <div class="button-wrap right scroll-down">
                        <div class="icon-wrap parallax-wrap">
                            <div class="button-icon parallax-element">
                                <i class="arrow-icon-down"></i>
                            </div>
                        </div>
                        <div class="button-text sticky right"><span data-hover="{{trans('home.Scroll to Explore')}}">{{trans('home.Scroll to Explore')}}</span></div> 
                    </div>
                </div>
                <div class="hero-footer-right">
                    <div id="info-text">{{trans('home.All Projects')}} ({{count($projects)}})</div>
                </div>
            </div>                                   
        </div>
    </div>
    <!--/Breadcrumb Section --> 
    @if (count($projects) > 0)
        <!-- Main Content -->
        <div id="main-content">
            <!-- Main Page Content -->
            <div id="main-page-content">
                    
                <div id="itemsWrapperLinks">
                    <div id="itemsWrapper" class="webgl-fitthumbs fx-five">
                        <!-- Portfolio Wrap -->
                        <div class="portfolio-wrap classic-grid content-full-width fade-scaleout-effect">                
                            <!-- Portfolio Columns -->
                            <div class="portfolio">
                                @foreach($projects as $project)
                                    <div class="item wide trigger-item" data-color="{{$project->color}}">
                                        <div class="item-parallax">
                                            <div class="item-appear">
                                                <div class="item-content">                            	                                    
                                                    <a class="item-wrap ajax-link-project" data-type="page-transition" href="{{LaravelLocalization::localizeUrl('project/'.$project->{'link_'.$lang} )}}"></a>
                                                    <div class="item-wrap-image">
                                                        <img src="{{asset('uploads/projects/' . $project->image)}}" class="item-image grid__item-img trigger-item-link" alt="{{$project->alt_img}}">
                                                    </div>
                                                    <div class="hero-video-wrapper">
                                                        <video loop muted class="bgvid">
                                                            <source src="{{asset('uploads/projects/' . $project->video)}}" type="video/mp4">
                                                            <!-- <source src="https://keepgrading.cdn.prismic.io/keepgrading/ba4f9e29-6acc-4993-9ce3-8eb9261f414b_G2_WEBM.webm" type="video/webm"> -->
                                                        </video>
                                                    </div>
                                                    <img class="grid__item-img grid__item-img--large" src="{{asset('uploads/projects/' . $project->image)}}" alt="{{$project->alt_img}}" />
                                                </div>                                             
                                            </div>
                                            <div class="item-caption-wrapper">
                                                <div class="item-caption">                                                    
                                                    <div class="item-title"><span>{{$project->{'name_'.$lang} }}</span></div>
                                                    <div class="item-cat"><span data-hover="{{trans('home.Subscribe')}}">{{trans('home.project')}}</span></div>                                                    
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                @endforeach
                            </div>
                            <!--/Portfolio -->                
                        </div>
                        <!--/Portfolio Wrap -->
                    </div>
                </div>

            </div>
            <!--/Main Page Content -->

            @include('layouts.body.page_navigation')
        
        </div>
        <!--/Main Content --> 
      
      
    @endif
@endsection