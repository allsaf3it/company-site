@extends('layouts.app')
@section('meta')
    <title>{{trans('home.Gallery')}}</title>
@endsection
@section('main')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="breadcumb-wrap">
                        <h2>{{trans('home.Gallery')}}</h2>
                        <ol class="breadcumb-wrap">
                            <li><a href="{{url('/')}}">{{trans('home.home')}}</a></li>
                            <li>{{trans('home.Gallery')}}</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->
    @if (count($gallerys) > 0)
        <!-- Gallery Area Start -->
        <section class=" bg-white galleryss gallery-area-three bg-black-two rel z-1 pt-120 rpt-90 pb-100 rpb-70">

            <div class="container">
                <div class="row">
                    @foreach ($gallerys as $gallery)
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item style-two wow fadeInUp delay-0-2s">
                                <img src="{{asset('uploads/galleryImages/' . $gallery->image)}}" alt="Gallery" />
                                <div class="gallery-content">
                                    <a href="{{asset('uploads/galleryImages/' . $gallery->image)}}" class="icon"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Gallery Area End -->
    @endif
@endsection