@extends('layouts.admin')
@section('content')

<div class="container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.about')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/about')}}">{{trans('home.about')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_about')}}</li>
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
                            <h6 class="card-title ">{{trans('home.edit_about')}}</h6>
                        </div>
                        {!! Form::open(['method'=>'PATCH','route' => 'admin.about.update', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="title_en">{{trans('home.title_en')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.title_en')}}" name="title_en" value="{{$about->title_en}}">
                                    </fieldset>
                                </div>

                                <div class="form-group col-md-6 ">     
                                    <fieldset class="form-group">
                                        <label for="title_ar">{{trans('home.title_ar')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.title_ar')}}" name="title_ar" value="{{$about->title_ar}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="text_en">{{trans('home.text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.text_en')}}" name="text_en">{!!$about->text_en!!}</textarea>
                                    </fieldset>
                                </div>

                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="text_ar">{{trans('home.text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.text_ar')}}" name="text_ar">{!!$about->text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="more_title_en">{{trans('home.more_title_en')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.more_title_en')}}" name="more_title_en" value="{{$about->more_title_en}}">
                                    </fieldset>
                                </div>

                                <div class="form-group col-md-6 ">     
                                    <fieldset class="form-group">
                                        <label for="more_title_ar">{{trans('home.more_title_ar')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.more_title_ar')}}" name="more_title_ar" value="{{$about->more_title_ar}}">
                                    </fieldset>
                                </div>
                                
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="more_text_en">{{trans('home.more_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.more_text_en')}}" name="more_text_en">{!!$about->more_text_en!!}</textarea>
                                    </fieldset>
                                </div>

                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="more_text_ar">{{trans('home.more_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.more_text_ar')}}" name="more_text_ar">{!!$about->more_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="last_title_en">{{trans('home.last_title_en')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.last_title_en')}}" name="last_title_en" value="{{$about->last_title_en}}">
                                    </fieldset>
                                </div>

                                <div class="form-group col-md-6 ">     
                                    <fieldset class="form-group">
                                        <label for="last_title_ar">{{trans('home.last_title_ar')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.last_title_ar')}}" name="last_title_ar" value="{{$about->last_title_ar}}">
                                    </fieldset>
                                </div>
                                
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="last_text_en">{{trans('home.last_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.last_text_en')}}" name="last_text_en">{!!$about->last_text_en!!}</textarea>
                                    </fieldset>
                                </div>

                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="last_text_ar">{{trans('home.last_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.last_text_ar')}}" name="last_text_ar">{!!$about->last_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="services_text_en">{{trans('home.services_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.services_text_en')}}" name="services_text_en">{!!$about->services_text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="services_text_ar">{{trans('home.services_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.services_text_ar')}}" name="services_text_ar">{!!$about->services_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="course_desc_en">{{trans('home.course_desc_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.course_desc_en')}}" name="course_desc_en">{!!$about->course_desc_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="course_desc_ar">{{trans('home.course_desc_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.course_desc_ar')}}" name="course_desc_ar">{!!$about->course_desc_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <!-- <div class="form-group col-md-4 "> 
                                    <fieldset class="form-group">
                                        <label for="members">{{trans('home.members')}}</label>
                                        <input type="number"  class="form-control" placeholder="{{trans('home.members')}}" name="members" value="{{$about->members}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-4 "> 
                                    <fieldset class="form-group">
                                        <label for="completed_projects">{{trans('home.completed_projects')}}</label>
                                        <input type="number"  class="form-control" placeholder="{{trans('home.completed_projects')}}" name="completed_projects" value="{{$about->completed_projects}}">
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-4 "> 
                                    <fieldset class="form-group">
                                        <label for="years_of_experience">{{trans('home.years_of_experience')}}</label>
                                        <input type="number"  class="form-control" placeholder="{{trans('home.years_of_experience')}}" name="years_of_experience" value="{{$about->years_of_experience}}">
                                    </fieldset>
                                </div> -->
                                <div class="form-group col-md-6 "> 
                                    <fieldset class="form-group">
                                        <label for="courses_title_en">{{trans('home.courses_title_en')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.courses_title_en')}}" name="courses_title_en" value="{{$about->courses_title_en}}">
                                    </fieldset>
                                </div>

                                <div class="form-group col-md-6 ">     
                                    <fieldset class="form-group">
                                        <label for="courses_title_ar">{{trans('home.courses_title_ar')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.courses_title_ar')}}" name="courses_title_ar" value="{{$about->courses_title_ar}}">
                                    </fieldset>
                                </div>
                                
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="courses_text_en">{{trans('home.courses_text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.courses_text_en')}}" name="courses_text_en">{!!$about->courses_text_en!!}</textarea>
                                    </fieldset>
                                </div>

                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="courses_text_ar">{{trans('home.courses_text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.courses_text_ar')}}" name="courses_text_ar">{!!$about->courses_text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>{{trans('home.video')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>{{trans('home.reel')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="show_reel">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_reel')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>{{trans('home.about_video')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="about_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>{{trans('home.courses_video')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="courses_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                @if($about->video)
                                    <div class="form-group col-md-3">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/aboutStrucs/source/' . $about->video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                @if($about->show_reel)
                                    <div class="form-group col-md-3">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/aboutStrucs/source/' . $about->show_reel)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                @if($about->about_video)
                                    <div class="form-group col-md-3">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/aboutStrucs/source/' . $about->about_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                @if($about->courses_video)
                                    <div class="form-group col-md-3">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/aboutStrucs/source/' . $about->courses_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif

                                <div class="form-group col-md-3">
                                    <label>{{trans('home.image')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label>{{trans('home.image2')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image2">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>{{trans('home.image')}}3</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image3">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>{{trans('home.about_breadcrump')}}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="about_breadcrump">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>
                                

                                @if($about->image)
                                    <div class="form-group col-md-3">
                                        <img src="{{url('\uploads\aboutStrucs\source')}}\{{$about->image}}" width="150">
                                    </div>
                                @endif
                                
                                @if($about->image2)
                                    <div class="form-group col-md-3">
                                        <img src="{{url('\uploads\aboutStrucs\source')}}\{{$about->image2}}" width="150">
                                    </div>
                                @endif
                                @if($about->image3)
                                    <div class="form-group col-md-3">
                                        <img src="{{url('\uploads\aboutStrucs\source')}}\{{$about->image3}}" width="150">
                                    </div>
                                @endif
                                @if($about->about_breadcrump)
                                    <div class="form-group col-md-3">
                                        <img src="{{url('\uploads\aboutStrucs\source')}}\{{$about->about_breadcrump}}" width="150">
                                    </div>
                                @endif

                                <br>
                                <div class="form-group col-md-6">
                                    <label>{{trans('home.image')}}4</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image4">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{trans('home.image')}}5</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image5">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>
                                @if($about->image4)
                                    <div class="form-group col-md-6">
                                        <img src="{{url('\uploads\aboutStrucs\source')}}\{{$about->image4}}" width="150">
                                    </div>
                                @endif
                                @if($about->image5)
                                    <div class="form-group col-md-6">
                                        <img src="{{url('\uploads\aboutStrucs\source')}}\{{$about->image5}}" width="150">
                                    </div>
                                @endif
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