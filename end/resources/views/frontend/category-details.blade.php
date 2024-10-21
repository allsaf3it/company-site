@extends('layouts.app')
@section('meta')
    <title>{{trans('home.categories')}}</title>
@endsection
@section('main')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="breadcumb-wrap">
                        <h2>{{trans('home.categories')}}</h2>
                        <ol class="breadcumb-wrap">
                            <li><a href="{{url('/')}}">{{trans('home.home')}}</a></li>
                            <li>{{trans('home.categories')}}</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->
    @if (count($products) > 0)
        <!-- Gallery Area Start -->
         <!-- start project-section -->
            <section class="project-section">
              
                <div class="project-wrapper">
                    <div class="container">
                        <div class="row wow fadeInUp delay-0-6s">
                            @foreach ($products as $product)
                                <div class="col-lg-3">
                                    <div class="project-single">
                                        <div class="project-single-img">
                                            <img src="{{asset('uploads/products/' . $product->image)}}" alt="">
                                        </div>
                                        <div class="project-single-text">
                                            <a href="{{url('product/' . $product->link)}}">
                                                <h2>{{app()->getLocale() == 'en' ? $product->name_en : $product->name_ar}}</h2>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- end project-section -->
      
      
    @endif
@endsection