@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp

    @php echo $schema @endphp
@endsection

@section('content')
<section class="page-title" style="background-image:url({{url('resources/assets/front/images/background/10.webp')}});">
    <div class="auto-container">
        <div class="inner-container clearfix step-flex">
            <div class="title-box">
                <h1>{{$writer->name}}</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                <li>{{$writer->name}}</li>
            </ul>
        </div>
    </div>
</section>

<div class="container">
    <section class="news-section">
    <div class="about-doctor">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-about-doctor">
                        <h2>{{$writer->name}}</h2>
                        <p style="text-align: right;">{!! $writer->aboutWriter !!}<p></p>
                    </div>
                    <div class="social-links">
                        <ul class="social-icon-two">
                            @if($writer->twitter)<li><a href="{{$writer->twitter}}" style="color:black;" target="_blank"><i class="fa fa-twitter"></i></a></li>@endif
                            @if($writer->facebook)<li><a href="{{$writer->facebook}}" style="color:black;" target="_blank"><i class="fa fa-facebook-f"></i></a></li>@endif
                            @if($writer->linkedin)<li><a href="{{$writer->linkedin}}" style="color:black;" target="_blank"><i class="fa fa-linkedin-in"></i></a></li>@endif
                            @if($writer->instgram)<li><a href="{{$writer->instgram}}" style="color:black;" target="_blank"><i class="fa fa-instagram"></i></a></li>@endif
                        </ul>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="img-about-doctor">
                        <img class="" data-src="{{url('uploads/aboutStrucs/source/'. $writer->image)}}" data-srcset="{{url('uploads/aboutStrucs/source/'. $writer->image)}}" alt="about image" src="{{url('uploads/aboutStrucs/source/'. $writer->image)}}" srcset="{{url('uploads/aboutStrucs/source/'. $writer->image)}}">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(count($blogss) > 0)            
    <section class="specialize-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">{{trans('home.blogs')}}</span>
            </div>
            <div class="row">
                @foreach($blogss as $key=>$blog)
                    <div class="col-md-4">
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <img class="lazy" data-src="{{url('uploads/blogitems/source/'.$blog->image)}}" data-srcset="{{url('uploads/blogitems/source/'.$blog->image)}}" alt="blog image">
                                        <div class="next-lazy-img"></div>
                                    </figure>
                                    <div class="overlay-box">
                                        <a href='{{route("checkUrl",$blog->link)}}'><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="caption-box">
                                    <h2><a href='{{route("checkUrl",$blog->link)}}'>{{($lang == 'en')?$blog->title_en:$blog->title_ar}}</a></h2>
                                    <ul class="info">
                                        <li>{{$blog->date}}</li>
                                        <li>{{$blog->writers->name}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endif
</div>
@endsection

@section('script')

    @if(Session::has('contact_message'))
        <script>
            $.alert({
                title: "{{trans('home.contact_us')}}",
                content: "{{Session::get('contact_message')}}",
                buttons: {
                    ok: {
                        text: "{{trans('home.OK')}}",
                        btnClass: 'btn main-btn',
                    },
                },
                columnClass: 'col-md-6'
            });
        </script>
    @endif
    @php
        Session::forget('contact_message')
    @endphp
@endsection   