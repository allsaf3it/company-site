@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
@endsection
@section('controller')
    <div class="cb-view" data-controller="servicesController" id="view-main"><canvas class="cb-scene"></canvas>
@endsection

@section('content')
    <!-------------------------- Breadcrumb------------------------>
    <section class="breadcrumb-area jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <nav aria-label="breadcrumb">   
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{trans('home.services')}}</li>
                            </ol>
                        </nav>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-------------------------- Breadcrumb------------------------>

    @if(count($services) > 0)
        <!-- service-section -->
        <section class="service-section">
            <div class="top-content">
                <div class="parallax-scene parallax-scene-2 anim-icons">
                    <span data-depth="0.40" class="parallax-layer icon icon-1"></span>
                    <span data-depth="0.50" class="parallax-layer icon icon-2"></span>
                    <span data-depth="0.30" class="parallax-layer icon icon-3"></span>
                    <span data-depth="0.40" class="parallax-layer icon icon-4"></span>
                    <span data-depth="0.50" class="parallax-layer icon icon-5"></span>
                    <span data-depth="0.30" class="parallax-layer icon icon-6"></span>
                </div>

                <div class="container">

                    <div class="row">
                        @foreach ($services as $oneServ)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="service-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img class="lazy" data-src="{{url('uploads/services/source/'.$oneServ->img)}}" data-srcset="{{url('uploads/services/source/'.$oneServ->img)}}" alt="{{$oneServ->alt_img}}">
                                    </figure>
                                    <div class="overlay-box">
                                        <h4><a href='{{app()->getLocale() == 'en' ? LaravelLocalization::localizeUrl('service/'.$oneServ->link_en) : LaravelLocalization::localizeUrl('service/'.$oneServ->link_ar) }}'>{{(app()->getLocale() == 'en')?$oneServ->name_service_en:$oneServ->name_service_ar}}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> 
        </section>
        <!-- service-section end -->
    @endif
@endsection    