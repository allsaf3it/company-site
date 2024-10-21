@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp

    @php echo $schema @endphp
@endsection
@section('controller')
    <div class="cb-view" data-controller="serviceController" id="view-main"><canvas class="cb-scene"></canvas>
@endsection

{{-- @section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection --}}

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
                                <li class="breadcrumb-item active" aria-current="page">{{app()->getLocale() == 'en' ? $service->name_service_en : $service->name_service_ar}}</li>
                            </ol>
                        </nav>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-------------------------- Breadcrumb------------------------>

    <div class="site-main">
        <div class="ttm-row sidebar ttm-sidebar-left clearfix">
            <div class="container">
                <div class="row">
                 
                    <div class="col-lg-8 content-area">
                        <div class="image-box">
                            <div class="single-item-carousel owl-carousel owl-theme">
                                <figure class="image"><img src="{{url('uploads/services/source/'.$service->img)}}" alt="{{$service->alt_img}}" /></figure>
                                @foreach ($service->images() as $serv)
                                    <figure class="image"><img src="{{url('uploads/services/source/'.$serv->image)}}" alt="{{$serv->alt_img}}" /></figure>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="ttm-service-single-content-area">
                            <h1>{{app()->getLocale() == 'en' ? $service->name_h1_en : $service->name_h1_ar}}</h1>
                            <div class="ttm-service-classic-content">
                                <p>{!! app()->getLocale() == 'en' ? $service->text_en : $service->text_ar !!}</p>
                            </div>
                        </div>
                        
                        <div class="btns">
                            
                            <div class="Call-btn">
                                <a href="tel:+2{{$setting->mobile}}" class="fixed-phone" target="_blank">{{trans('home.Call Us')}}<i class="fa fa-phone"></i> </a>
                            </div>
                            <div class=" Whatsapp-btn">
                                <a href="https://wa.me/+2{{$setting->whatsapp}}" class="fixed-whatsapp" target="_blank">{{trans('home.Contact Us')}}<i class="fab fa-whatsapp"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 widget-area sidebar-left">
                        <aside class="widget widget-nav-menu">
                            <h3 class="widget-title">{{trans('home.More services')}}</h3>
                            <ul class="widget-menu">
                                @foreach ($services as $oneServ)
                                    <li class="@if (Request::segment(3) == $oneServ->link_en || Request::segment(3) == $oneServ->link_ar) active @endif"><a href="{{app()->getLocale() == 'en' ? LaravelLocalization::localizeUrl('service/'.$oneServ->link_en) : LaravelLocalization::localizeUrl('service/'.$oneServ->link_ar) }}">{{app()->getLocale() == 'en' ? $oneServ->name_service_en : $oneServ->name_service_ar}}</a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="widget contact-widget with-title">
                            <h3 class="widget-title">{{trans('home.contact')}}</h3>
                            <div class="call-to-action">
                                <div class="inner-content">
                                    <div class="appointment-form wow fadeInLeft " data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <form action="{{LaravelLocalization::localizeUrl('save/contact-us')}}" method="post" class="row" >
                                            @csrf
                                            <div class="form-group col-md-12">
                                                <input type="text" name="name" placeholder="{{trans('home.name')}}" required>
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input type="email" name="email" placeholder="{{trans('home.email')}}" required>
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input type="text" name="phone"  value="01" placeholder="{{trans('home.phone')}}" required>
                                                @error('phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <textarea name="message" placeholder="{{trans('home.message')}}" required></textarea>
                                                @error('message')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <input type="hidden" name="recaptcha" id="recaptcha">
                                            <div class="form-group message-btn">
                                                <button type="submit">{{trans('home.send')}} </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-icon-box icon-align-before-content icon-ver_align-top style1">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-xs">
                                        <i class="flaticon flaticon-phone-call"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>{{trans('home.Phone Number')}}</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>
                                            <a href="tel:+2{{$setting->mobile}}">{{$setting->mobile}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-icon-box icon-align-before-content icon-ver_align-top style1">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-xs">
                                        <i class="flaticon flaticon-email"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>{{trans('home.email')}}</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>    

@endsection

@section('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> --}}

    {{--<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
    <script>
         grecaptcha.ready(function() {
             grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {action: 'contact'}).then(function(token) {
                if (token) {
                  document.getElementById('recaptcha').value = token;
                }
             });
         });
    </script> --}}

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