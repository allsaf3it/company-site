@extends('layouts.app')
@section('meta')
    <title>{{app()->getLocale() == 'en' ? $product->name_en : $product->name_ar}}</title>
@endsection
@section('main')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="breadcumb-wrap">
                        <h2>{{app()->getLocale() == 'en' ? $product->name_en : $product->name_ar}}</h2>
                        <ol class="breadcumb-wrap">
                            <li><a href="{{url('/')}}">{{trans('home.home')}}</a></li>
                            <li>{{app()->getLocale() == 'en' ? $product->name_en : $product->name_ar}}</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->
        
    <!-- project-single-area start -->
    <div class="project-single-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="project-single-wrap">
                        
                        <div class="project-single-item">
                            <div class="project-single-main-img owl-carousel">
                                <img src="{{asset('uploads/products/' . $product->image)}}" alt="">
                                @foreach($product->images() as $image)
                                    <img src="{{asset('uploads/products/' . $image->image)}}" alt="">
                                @endforeach
                            </div>
                            <div class="project-single-title">
                                <h3>{{app()->getLocale() == 'en' ? $product->name_en : $product->name_ar}}</h3>
                            </div>
                            <p>{!! app()->getLocale() == 'en' ? $product->text_en : $product->text_ar !!}</p>
                        </div>
                        
                    
                        
    
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="sidebar">
                        <h5 class="title">{{trans('home.Our Products')}}</h5>
                        <div class="menu-services">
                        <ul class="menu">
                                @foreach ($products as $product)
                                    <li><a href="{{url('product/' . $product->link)}}">{{app()->getLocale() == 'en' ? $product->name_en : $product->name_ar}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    
                    <div class="contact-pg-section  wow fadeInUp delay-0-6s">
                        <div class="contact-form-area">
                            <form method="post" action="{{route('saveContactUs')}}" class="contact-validation-active row" id="contact-form-main">
                                @csrf
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="{{trans('home.name')}}*" required>
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="{{trans('home.email')}}*" required>
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="{{trans('home.phone')}}*" required>
                                    @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                
                                <div class="fullwidth">
                                    <textarea class="form-control" name="message" id="note"
                                        placeholder="{{trans('home.message')}}..." required></textarea>
                                    @error('message')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="submit-area">
                                    <button type="submit" class="theme-btn">{{trans('home.Get in Touch')}}</button>
                                    <div id="loader">
                                        <i class="ti-reload"></i>
                                    </div>
                                </div>
                                <div class="clearfix error-handling-messages">
                                    <div id="success">{{trans('home.Thank you')}}</div>
                                    <div id="error"> {{trans('home.Error occurred while sending email. Please try again later.')}} </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                    
                    <div class="contact-map">
                    <iframe src="{{$setting->map_url}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!-- service-single-area end -->
@endsection