@extends('layouts.admin')
<title>{{trans('home.seo_assistant')}}</title>
@section('content')

<div class="container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.seo_assistant')}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('home.seo_assistant')}}</li>
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

    {!! Form::open(['method'=>'PATCH','url' => 'admin/seo-assistant/'.$seo->id, 'data-toggle'=>'validator', 'files'=>'true']) !!}
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">{{trans('home.hello_page')}}</h6>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="hello_meta_title_en"> {{trans('home.meta_title_en')}}</label>
                            <textarea class="form-control" name="hello_meta_title_en" placeholder="{{trans('home.meta_title_en')}}">{{$seo->hello_meta_title_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hello_meta_title_ar"> {{trans('home.meta_title_ar')}}</label>
                            <textarea class="form-control ar" name="hello_meta_title_ar" placeholder="{{trans('home.meta_title_ar')}}">{{$seo->hello_meta_title_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="hello_meta_keywords_en"> {{trans('home.meta_keywords_en')}}</label>
                            <textarea class="form-control" name="hello_meta_keywords_en" placeholder="{{trans('home.meta_keywords_en')}}">{{$seo->hello_meta_keywords_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hello_meta_keywords_ar"> {{trans('home.meta_keywords_ar')}}</label>
                            <textarea class="form-control ar" name="hello_meta_keywords_ar" placeholder="{{trans('home.meta_keywords_ar')}}">{{$seo->hello_meta_keywords_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="hello_meta_desc_en"> {{trans('home.meta_desc_en')}}</label>
                            <textarea class="form-control" name="hello_meta_desc_en" placeholder="{{trans('home.meta_desc_en')}}">{{$seo->hello_meta_desc_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hello_meta_desc_ar"> {{trans('home.meta_desc_ar')}}</label>
                            <textarea class="form-control ar" name="hello_meta_desc_ar" placeholder="{{trans('home.meta_desc_ar')}}">{{$seo->hello_meta_desc_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="ckbox">
                                <input name="hello_meta_robots" value="1" {{($seo->hello_meta_robots == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
                            </label>
                        </div>
                    </div>    
                </div>  
            </div>
            
        </div>   
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">{{trans('home.home_page')}}</h6>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="home_meta_title_en"> {{trans('home.meta_title_en')}}</label>
                            <textarea class="form-control" name="home_meta_title_en" placeholder="{{trans('home.meta_title_en')}}">{{$seo->home_meta_title_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="home_meta_title_ar"> {{trans('home.meta_title_ar')}}</label>
                            <textarea class="form-control ar" name="home_meta_title_ar" placeholder="{{trans('home.meta_title_ar')}}">{{$seo->home_meta_title_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="home_meta_keywords_en"> {{trans('home.meta_keywords_en')}}</label>
                            <textarea class="form-control" name="home_meta_keywords_en" placeholder="{{trans('home.meta_keywords_en')}}">{{$seo->home_meta_keywords_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="home_meta_keywords_ar"> {{trans('home.meta_keywords_ar')}}</label>
                            <textarea class="form-control ar" name="home_meta_keywords_ar" placeholder="{{trans('home.meta_keywords_ar')}}">{{$seo->home_meta_keywords_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="home_meta_desc_en"> {{trans('home.meta_desc_en')}}</label>
                            <textarea class="form-control" name="home_meta_desc_en" placeholder="{{trans('home.meta_desc_en')}}">{{$seo->home_meta_desc_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="home_meta_desc_ar"> {{trans('home.meta_desc_ar')}}</label>
                            <textarea class="form-control ar" name="home_meta_desc_ar" placeholder="{{trans('home.meta_desc_ar')}}">{{$seo->home_meta_desc_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="ckbox">
                                <input name="home_meta_robots" value="1" {{($seo->home_meta_robots == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
                            </label>
                        </div>
                    </div>    
                </div>  
            </div>
            
        </div>   
        
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">{{trans('home.about')}}</h6>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="about_meta_title_en"> {{trans('home.meta_title_en')}}</label>
                            <textarea class="form-control" name="about_meta_title_en" placeholder="{{trans('home.meta_title_en')}}">{{$seo->about_meta_title_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="about_meta_title_ar"> {{trans('home.meta_title_ar')}}</label>
                            <textarea class="form-control ar" name="about_meta_title_ar" placeholder="{{trans('home.meta_title_ar')}}">{{$seo->about_meta_title_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="about_meta_keywords_en"> {{trans('home.meta_keywords_en')}}</label>
                            <textarea class="form-control" name="about_meta_keywords_en" placeholder="{{trans('home.meta_keywords_en')}}">{{$seo->about_meta_keywords_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="about_meta_keywords_ar"> {{trans('home.meta_keywords_ar')}}</label>
                            <textarea class="form-control ar" name="about_meta_keywords_ar" placeholder="{{trans('home.meta_keywords_ar')}}">{{$seo->about_meta_keywords_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="about_meta_desc_en"> {{trans('home.meta_desc_en')}}</label>
                            <textarea class="form-control" name="about_meta_desc_en" placeholder="{{trans('home.meta_desc_en')}}">{{$seo->about_meta_desc_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="about_meta_desc_ar"> {{trans('home.meta_desc_ar')}}</label>
                            <textarea class="form-control ar" name="about_meta_desc_ar" placeholder="{{trans('home.meta_desc_ar')}}">{{$seo->about_meta_desc_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="ckbox">
                                <input name="about_meta_robots" value="1" {{($seo->about_meta_robots == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
                        </label>
                    </div>
                </div>    
            </div>
            </div>
        </div>
        
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">{{trans('home.contact_page')}}</h6>
                        <hr>
                    </div>
                    <div class="row">
                       <div class="form-group col-md-6">
                            <label for="contact_meta_title_en"> {{trans('home.meta_title_en')}}</label>
                            <textarea class="form-control" name="contact_meta_title_en" placeholder="{{trans('home.meta_title_en')}}">{{$seo->contact_meta_title_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contact_meta_title_ar"> {{trans('home.meta_title_ar')}}</label>
                            <textarea class="form-control ar" name="contact_meta_title_ar" placeholder="{{trans('home.meta_title_ar')}}">{{$seo->contact_meta_title_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="contact_meta_keywords_en"> {{trans('home.meta_keywords_en')}}</label>
                            <textarea class="form-control" name="contact_meta_keywords_en" placeholder="{{trans('home.meta_keywords_en')}}">{{$seo->contact_meta_keywords_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contact_meta_keywords_ar"> {{trans('home.meta_keywords_ar')}}</label>
                            <textarea class="form-control ar" name="contact_meta_keywords_ar" placeholder="{{trans('home.meta_keywords_ar')}}">{{$seo->contact_meta_keywords_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="contact_meta_desc_en"> {{trans('home.meta_desc_ar')}}</label>
                            <textarea class="form-control" name="contact_meta_desc_en" placeholder="{{trans('home.meta_desc_ar')}}">{{$seo->contact_meta_desc_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contact_meta_desc_ar"> {{trans('home.meta_desc_ar')}}</label>
                            <textarea class="form-control ar" name="contact_meta_desc_ar" placeholder="{{trans('home.meta_desc_ar')}}">{{$seo->contact_meta_desc_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="ckbox">
                                <input name="contact_meta_robots" value="1" {{($seo->contact_meta_robots == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
                            </label>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">{{trans('home.gallery_images_page')}}</h6>
                        <hr>
                    </div>
                    <div class="row">
                       <div class="form-group col-md-6">
                            <label for="gallery_images_meta_title"> {{trans('home.meta_title')}}</label>
                            <textarea class="form-control" name="gallery_images_meta_title" placeholder="{{trans('home.gallery_images_meta_title')}}">{{$seo->gallery_images_meta_title}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="gallery_images_meta_desc"> {{trans('home.meta_desc')}}</label>
                            <textarea class="form-control" name="gallery_images_meta_desc" placeholder="{{trans('home.gallery_images_meta_desc')}}">{{$seo->gallery_images_meta_desc}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="ckbox">
                                <input name="gallery_images_meta_robots" value="1" {{($seo->gallery_images_meta_robots == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
                            </label>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">{{trans('home.gallery_videos_page')}}</h6>
                        <hr>
                    </div>
                    <div class="row">
                       <div class="form-group col-md-6">
                            <label for="gallery_videos_meta_title"> {{trans('home.meta_title')}}</label>
                            <textarea class="form-control" name="gallery_videos_meta_title" placeholder="{{trans('home.gallery_videos_meta_title')}}">{{$seo->gallery_videos_meta_title}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="gallery_videos_meta_desc"> {{trans('home.meta_desc')}}</label>
                            <textarea class="form-control" name="gallery_videos_meta_desc" placeholder="{{trans('home.gallery_videos_meta_desc')}}">{{$seo->gallery_videos_meta_desc}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="ckbox">
                                <input name="gallery_videos_meta_robots" value="1" {{($seo->gallery_videos_meta_robots == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
                            </label>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">{{trans('home.services_page')}}</h6>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="services_meta_title_en"> {{trans('home.meta_title_en')}}</label>
                            <textarea class="form-control" name="services_meta_title_en" placeholder="{{trans('home.meta_title_en')}}">{{$seo->services_meta_title_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="services_meta_title_ar"> {{trans('home.meta_title_ar')}}</label>
                            <textarea class="form-control ar" name="services_meta_title_ar" placeholder="{{trans('home.meta_title_ar')}}">{{$seo->services_meta_title_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="services_meta_keywords_en"> {{trans('home.meta_keywords_en')}}</label>
                            <textarea class="form-control" name="services_meta_keywords_en" placeholder="{{trans('home.meta_keywords_en')}}">{{$seo->services_meta_keywords_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="services_meta_keywords_ar"> {{trans('home.meta_keywords_ar')}}</label>
                            <textarea class="form-control ar" name="services_meta_keywords_ar" placeholder="{{trans('home.meta_keywords_ar')}}">{{$seo->services_meta_keywords_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="services_meta_desc_en"> {{trans('home.meta_desc_en')}}</label>
                            <textarea class="form-control" name="services_meta_desc_en" placeholder="{{trans('home.meta_desc_en')}}">{{$seo->services_meta_desc_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="services_meta_desc_ar"> {{trans('home.meta_desc_ar')}}</label>
                            <textarea class="form-control ar" name="services_meta_desc_ar" placeholder="{{trans('home.meta_desc_ar')}}">{{$seo->services_meta_desc_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="ckbox">
                                <input name="services_meta_robots" value="1" {{($seo->services_meta_robots == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
                            </label>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">{{trans('home.projects_page')}}</h6>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="projects_meta_title_en"> {{trans('home.meta_title_en')}}</label>
                            <textarea class="form-control" name="projects_meta_title_en" placeholder="{{trans('home.meta_title_en')}}">{{$seo->projects_meta_title_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="projects_meta_title_ar"> {{trans('home.meta_title_ar')}}</label>
                            <textarea class="form-control ar" name="projects_meta_title_ar" placeholder="{{trans('home.meta_title_ar')}}">{{$seo->projects_meta_title_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="projects_meta_keywords_en"> {{trans('home.meta_keywords_en')}}</label>
                            <textarea class="form-control" name="projects_meta_keywords_en" placeholder="{{trans('home.meta_keywords_en')}}">{{$seo->projects_meta_keywords_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="projects_meta_keywords_ar"> {{trans('home.meta_keywords_ar')}}</label>
                            <textarea class="form-control ar" name="projects_meta_keywords_ar" placeholder="{{trans('home.meta_keywords_ar')}}">{{$seo->projects_meta_keywords_ar}}</textarea>
                        </div>
                        
                        
                        <div class="form-group col-md-6">
                            <label for="projects_meta_desc_en"> {{trans('home.meta_desc_en')}}</label>
                            <textarea class="form-control" name="projects_meta_desc_en" placeholder="{{trans('home.meta_desc_en')}}">{{$seo->projects_meta_desc_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="projects_meta_desc_ar"> {{trans('home.meta_desc_ar')}}</label>
                            <textarea class="form-control ar" name="projects_meta_desc_ar" placeholder="{{trans('home.meta_desc_ar')}}">{{$seo->projects_meta_desc_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="ckbox">
                                <input name="projects_meta_robots" value="1" {{($seo->projects_meta_robots == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
                            </label>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">{{trans('home.blogs_page')}}</h6>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="blogs_meta_title_en"> {{trans('home.meta_title_en')}}</label>
                            <textarea class="form-control" name="blogs_meta_title_en" placeholder="{{trans('home.blogs_meta_title_en')}}">{{$seo->blogs_meta_title_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blogs_meta_title_ar"> {{trans('home.meta_title_ar')}}</label>
                            <textarea class="form-control ar" name="blogs_meta_title_ar" placeholder="{{trans('home.blogs_meta_title_ar')}}">{{$seo->blogs_meta_title_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="blogs_meta_keywords_en"> {{trans('home.meta_keywords_en')}}</label>
                            <textarea class="form-control" name="blogs_meta_keywords_en" placeholder="{{trans('home.meta_keywords_en')}}">{{$seo->blogs_meta_keywords_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blogs_meta_keywords_ar"> {{trans('home.meta_keywords_ar')}}</label>
                            <textarea class="form-control ar" name="blogs_meta_keywords_ar" placeholder="{{trans('home.meta_keywords_ar')}}">{{$seo->blogs_meta_keywords_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="blogs_meta_desc_en"> {{trans('home.blogs_meta_desc_en')}}</label>
                            <textarea class="form-control" name="blogs_meta_desc_en" placeholder="{{trans('home.blogs_meta_desc_en')}}">{{$seo->blogs_meta_desc_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blogs_meta_desc_ar"> {{trans('home.blogs_meta_desc_ar')}}</label>
                            <textarea class="form-control ar" name="blogs_meta_desc_ar" placeholder="{{trans('home.blogs_meta_desc_ar')}}">{{$seo->blogs_meta_desc_ar}}</textarea>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="ckbox">
                                <input name="blogs_meta_robots" value="1" {{($seo->blogs_meta_robots == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
                            </label>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        

        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
            <a href="{{url('/admin')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
        </div>

    {!! Form::close() !!}

</div>
@endsection