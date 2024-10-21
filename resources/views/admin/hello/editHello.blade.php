@extends('layouts.admin')
@section('content')

<div class="container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.hello')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/hello')}}">{{trans('home.hello')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_hello')}}</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->pull('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Row-->
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
    
                    <div class="card-body">
                        <div>
                            <h6 class="card-title ">{{trans('home.edit_hello')}}</h6>
                        </div>
                        {!! Form::open(['method'=>'PATCH','route' => 'admin.hello.update', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>{{trans('home.first_video')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="first_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{trans('home.creative_video')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="creative_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                @if($hello->first_video)
                                    <div class="form-group col-md-6">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/hello/source/' . $hello->first_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                @if($hello->creative_video)
                                    <div class="form-group col-md-6">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/hello/source/' . $hello->creative_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="first_text_en">{{trans('home.text_en')}} 1</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.text_en')}}" name="first_text_en">{!!$hello->first_text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="first_text_ar">{{trans('home.text_ar')}} 1</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.text_ar')}}" name="first_text_ar">{!!$hello->first_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="creative_title_en">{{trans('home.creative_title_en')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.creative_title_en')}}" name="creative_title_en" value="{{$hello->creative_title_en}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="creative_title_ar">{{trans('home.creative_title_ar')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.creative_title_ar')}}" name="creative_title_ar" value="{{$hello->creative_title_ar}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="creative_text_en">{{trans('home.creative_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.creative_text_en')}}" name="creative_text_en">{!!$hello->creative_text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="creative_text_ar">{{trans('home.creative_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.creative_text_ar')}}" name="creative_text_ar">{!!$hello->creative_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{trans('home.smart_video')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="smart_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{trans('home.smart_video')}} 2</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="smart_video2">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                @if($hello->smart_video)
                                    <div class="form-group col-md-6">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/hello/source/' . $hello->smart_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                @if($hello->smart_video2)
                                    <div class="form-group col-md-6">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/hello/source/' . $hello->smart_video2)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="smart_title_en">{{trans('home.smart_title_en')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.smart_title_en')}}" name="smart_title_en" value="{{$hello->smart_title_en}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="smart_title_ar">{{trans('home.smart_title_ar')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.smart_title_ar')}}" name="smart_title_ar" value="{{$hello->smart_title_ar}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="smart_text_en">{{trans('home.smart_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.smart_text_en')}}" name="smart_text_en">{!!$hello->smart_text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="smart_text_ar">{{trans('home.smart_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.smart_text_ar')}}" name="smart_text_ar">{!!$hello->smart_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="smart_area_en">{{trans('home.smart_area_en')}}</label>
                                        <textarea class="form-control" placeholder="{{trans('home.smart_area_en')}}" name="smart_area_en">{!!$hello->smart_area_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="smart_area_ar">{{trans('home.smart_area_ar')}}</label>
                                        <textarea class="form-control" placeholder="{{trans('home.smart_area_ar')}}" name="smart_area_ar">{!!$hello->smart_area_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{trans('home.brand_video')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="brand_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                @if($hello->brand_video)
                                    <div class="form-group col-md-6">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/hello/source/' . $hello->brand_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                <div class="col-md-6"></div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="brand_title_en">{{trans('home.brand_title_en')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.brand_title_en')}}" name="brand_title_en" value="{{$hello->brand_title_en}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="brand_title_ar">{{trans('home.brand_title_ar')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.brand_title_ar')}}" name="brand_title_ar" value="{{$hello->brand_title_ar}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="brand_text_en">{{trans('home.brand_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.brand_text_en')}}" name="brand_text_en">{!!$hello->brand_text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="brand_text_ar">{{trans('home.brand_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.brand_text_ar')}}" name="brand_text_ar">{!!$hello->brand_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{trans('home.art_video')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="art_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                @if($hello->art_video)
                                    <div class="form-group col-md-6">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/hello/source/' . $hello->art_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                <div class="col-md-6"></div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="art_title_en">{{trans('home.art_title_en')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.art_title_en')}}" name="art_title_en" value="{{$hello->art_title_en}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="art_title_ar">{{trans('home.art_title_ar')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.art_title_ar')}}" name="art_title_ar" value="{{$hello->art_title_ar}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="art_text_en">{{trans('home.art_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.art_text_en')}}" name="art_text_en">{!!$hello->art_text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="art_text_ar">{{trans('home.art_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.art_text_ar')}}" name="art_text_ar">{!!$hello->art_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="art_details_en">{{trans('home.art_details_en')}}</label>
                                        <textarea class="form-control" placeholder="{{trans('home.art_details_en')}}" name="art_details_en">{!!$hello->art_details_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="art_details_ar">{{trans('home.art_details_ar')}}</label>
                                        <textarea class="form-control" placeholder="{{trans('home.art_details_ar')}}" name="art_details_ar">{!!$hello->art_details_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{trans('home.greeting_image')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="greeting_image">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                @if($hello->greeting_image)
                                    <div class="form-group col-md-3">
                                        <img src="{{url('\uploads\hello\source')}}\{{$hello->greeting_image}}" width="150">
                                    </div>
                                    <div class="col-md-6"></div>
                                @endif
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="greeting_title_en">{{trans('home.greeting_title_en')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.greeting_title_en')}}" name="greeting_title_en" value="{{$hello->greeting_title_en}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="greeting_title_ar">{{trans('home.greeting_title_ar')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.greeting_title_ar')}}" name="greeting_title_ar" value="{{$hello->greeting_title_ar}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="greeting_text_en">{{trans('home.greeting_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.greeting_text_en')}}" name="greeting_text_en">{!!$hello->greeting_text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="greeting_text_ar">{{trans('home.greeting_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.greeting_text_ar')}}" name="greeting_text_ar">{!!$hello->greeting_text_ar!!}</textarea>
                                    </fieldset>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>{{trans('home.brandreel_video')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="brandreel_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                @if($hello->brandreel_video)
                                    <div class="form-group col-md-6">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/hello/source/' . $hello->brandreel_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                <div class="col-md-6"></div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="brandreel_text_en">{{trans('home.brandreel_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.brandreel_text_en')}}" name="brandreel_text_en">{!!$hello->brandreel_text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="brandreel_text_ar">{{trans('home.brandreel_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.brandreel_text_ar')}}" name="brandreel_text_ar">{!!$hello->brandreel_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="achievement_text_en">{{trans('home.achievement_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.achievement_text_en')}}" name="achievement_text_en">{!!$hello->achievement_text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="achievement_text_ar">{{trans('home.achievement_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.achievement_text_ar')}}" name="achievement_text_ar">{!!$hello->achievement_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{trans('home.our_philosophy_video')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="our_philosophy_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                @if($hello->our_philosophy_video)
                                    <div class="form-group col-md-6">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/hello/source/' . $hello->our_philosophy_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                <div class="col-md-6"></div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="our_philosophy_title_en">{{trans('home.our_philosophy_title_en')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.our_philosophy_title_en')}}" name="our_philosophy_title_en" value="{{$hello->our_philosophy_title_en}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="our_philosophy_title_ar">{{trans('home.our_philosophy_title_ar')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.our_philosophy_title_ar')}}" name="our_philosophy_title_ar" value="{{$hello->our_philosophy_title_ar}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="our_philosophy_text_en">{{trans('home.our_philosophy_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.our_philosophy_text_en')}}" name="our_philosophy_text_en">{!!$hello->our_philosophy_text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="our_philosophy_text_ar">{{trans('home.our_philosophy_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.our_philosophy_text_ar')}}" name="our_philosophy_text_ar">{!!$hello->our_philosophy_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                
                                <br>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{url('/admin')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
                                </div>
                                
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>

@endsection