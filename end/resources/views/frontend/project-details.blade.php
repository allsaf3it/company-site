@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
    @php echo $schema @endphp
@endsection
@section('main')
    <!-- Breadcrumb Section -->
    <div id="hero" class="has-image">
        <div id="hero-styles">
            <div id="hero-caption" class="content-full-width parallax-scroll-caption">
                <div class="inner">
                    <div class="hero-title-wrapper"><h1 class="hero-title"><span>{{$project->{'name_'.$lang} }}</span></h1></div>                                    
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
    				<div id="info-text">{{trans('home.Over')}} {{$about->years_of_experience}} {{trans('home.Years of Experience')}}</div>
                </div>
            </div>                                   
        </div>
    </div>
    <div id="hero-image-wrapper" class="change-header-color">
    	<div id="hero-background-layer" class="parallax-scroll-image">
            <div id="hero-bg-image" style="background-image:url({{asset('uploads/projects/' . $project->image)}})">
            	<div class="hero-video-wrapper">
                    <video loop muted class="bgvid">
                        <source src="{{asset('uploads/projects/' . $project->video)}}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>                        
    <!--/Hero Section -->  
    <!-- Main Content -->
    <div id="main-content">
        <!-- Main Page Content -->
        <div id="main-page-content">
             
            <!-- Row -->
            <div class="content-row row_padding_top row_padding_left row_padding_right row_padding_bottom full dark-section">
                
                <h3 class="has-mask">{!! $project->{'text_' . $lang} !!} </h3>
                
                <hr><hr><hr>
                @if(! empty($project->{'left_desc_'.$lang} ))
                    <div class="one_half">
                    	
                        <h6>
                            {!! $project->{'left_desc_'.$lang} !!}
                        </h6>
                        @if(! empty($project->visit_link))
        					<div class="button-box has-animation" data-delay="100">             
                                <div class="clapat-button-wrap parallax-wrap hide-ball">
                                    <div class="clapat-button parallax-element">
                                        <div class="button-border rounded parallax-element-second">
                                        	<a target="_blank" href="{{$project->visit_link}}">
                                            	<span data-hover="{{trans('home.VISIT LINK')}}">{{trans('home.VISIT LINK')}}</span>
                                             </a>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        @endif
                        
                        <hr>
                        
                    </div>
                @endif
                @if(! empty($project->{'right_desc_'.$lang} ))
                    <div class="one_half last">
                    
                        {!! $project->{'right_desc_'.$lang} !!}
                    </div>
                @endif
                
            </div> 
            <!--/Row -->
            
            <!-- Row -->
            <div class="content-row video-sec row_padding_top row_padding_bottom dark-section full change-header-color">
            
            	<hr>
            	
                <!-- Video Player -->
                <div class="video-wrapper has-animation autocenter">                   
                    
                    <div class="video-cover" data-src="images/05hero.jpg"></div>
                    <video class="bgvid" controls loop preload="auto" >
                        <source src="{{asset('uploads/about/' . $about->video)}}" type="video/mp4">
                    </video>
                    
                    <div class="control">
                        <div class="btmControl">                        
                            <div class="progress-bar">
                                <div class="progress">
                                    <span class="bufferBar"></span>
                                    <span class="timeBar"></span>
                                </div>
                            </div>
                            <div class="video-btns">
                                <div class="sound sound2 btn" title="Mute/Unmute sound">
                                    <i class="fa fa-volume-up" aria-hidden="true"></i>
                                    <i class="fa fa-volume-off" aria-hidden="true"></i>
                                </div>
                                <div class="btnFS btn" title="Switch to full screen">
                                    <i class="fa fa-expand" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>                    
                <!--/Video Player -->
                    
            </div> 
            <!--/Row -->

        </div>
        <!--/Main Page Content -->
        
        
        @php
            $swipProject = App\Models\Project::where('id', '>' ,$project->id)->first();
        if($swipProject){
            $nextProject = $swipProject;
        }else{
            $nextProject = App\Models\Project::where('id', '<' ,$project->id)->first();
        }
        @endphp
        <!-- Project Navigation --> 
        <div id="project-nav" class="">
            <div class="next-project-wrap">
                <div class="next-project-caption content-full-width">
                    <div class="next-caption-wrapper">
                    	<div class="caption-wrapper">
                            <a class="next-ajax-link-project auto-trigger" data-type="page-transition" href="{{LaravelLocalization::localizeUrl('project/'.$nextProject->{'link_'.$lang} )}}" data-firstline="Next" data-secondline="Project"></a>
                            <div class="next-caption">                                         
                                <div class="next-hero-subtitle-wrapper"><div class="next-hero-subtitle"><span>{{trans('home.next_project')}}</span></div></div>
                                <div class="next-hero-progress"><span></span></div>                                                                                            
                                <div class="next-hero-title-wrapper"><div class="next-hero-title"><span>{{$nextProject->{'name_'.$lang}}}</span><span></span></div></div>
                            </div>
                        </div>
                    </div>                   
                </div>
                <div class="next-project-image-wrapper">
                    <div class="next-project-image">
                        <div class="next-project-image-bg" style="background-image:url({{asset('frontend/assets/images/03hero.jpg')}})"></div>
                    </div>            
                </div>
            </div>
        </div>      
        <!--/Project Navigation -->  
        
                
    </div>
    <!--/Main Content --> 

@endsection