@extends('layouts.app')
@section('meta')
    <title>{{trans('home.video')}}</title>
@endsection
@section('main')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="breadcumb-wrap">
                        <h2>{{trans('home.video')}}</h2>
                        <ol class="breadcumb-wrap">
                            <li><a href="{{url('/')}}">{{trans('home.home')}}</a></li>
                            <li>{{trans('home.video')}}</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->
    @if (count($videos) > 0)
        <!-- Gallery Area Start -->
        <section class=" bg-white galleryss gallery-area-three bg-black-two rel z-1 pt-120 rpt-90 pb-100 rpb-70">

            <div class="container">
                <div class="row">
                    @foreach ($videos as $video)
                        <div class="col-lg-4 col-md-6">
                            <iframe src="{{$video->youtube_link}}" style="width:100%; height:400px;" title="video"></iframe>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Gallery Area End -->
    @endif

@endsection