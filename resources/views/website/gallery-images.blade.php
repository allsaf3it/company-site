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
                <h1>{{trans('home.galleryImages')}}</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                <li>{{trans('home.galleryImages')}}</li>
            </ul>
        </div>
    </div>
</section>

<section class="projects-section alternate">
    <div class="auto-container">
        <div class="mixitup-gallery">
            <div class="filter-list row">
                @foreach($images as $image)
                    <div class="project-block col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image lazy-div">
                                <img class="lazy" data-src="{{url('uploads/galleryImages/source/'.$image->img)}}" data-srcset="{{url('uploads/galleryImages/source/'.$image->img)}}" alt="">
                            </figure>
                            <div class="next-lazy-img"></div>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="{{url('uploads/galleryImages/source/'.$image->img)}}" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="text-center styled-pagination">
            {!! $images->links() !!}
        </div>
                
    </div>
</section>
@endsection