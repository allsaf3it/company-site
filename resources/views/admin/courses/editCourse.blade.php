@extends('layouts.admin')
@section('meta')
    <title>{{trans('home.edit_course')}}</title>
@endsection

@section('style')
<style>
    img {
        display:block !important;
    }
    .dz-hidden-input{
        position: absolute !important;
        top: 0px !important;
        left: 250px !important;
    }

</style>
@endsection
@section('content')

<div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.courses')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/courses')}}">{{trans('home.courses')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_course')}}</li>
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
                            <h6 class="card-title ">{{trans('home.edit_course')}}</h6>
                        </div>
                        {!! Form::open(['method'=>'PATCH','url' => 'admin/courses/'.$course->id, 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="slug_en">{{trans('home.slug_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.slug_en')}}" name="link_en" value="{{$course->link_en}}" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="slug_ar">{{trans('home.slug_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.slug_ar')}}" name="link_ar" value="{{$course->link_ar}}" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="youtube_link">{{trans('home.youtube_link')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.youtube_link')}}" name="youtube_link" value="{{$course->youtube_link}}">
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label for="title_en">{{trans('home.title_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.title_en')}}" name="title_en" value="{{$course->title_en}}" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="title_ar">{{trans('home.title_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.name_ar')}}" name="title_ar" value="{{$course->title_ar}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.parent')}}</label>
                                    <select class="form-control select2" name="parent_id" required>
                                        <option value="0" {{($course->parent_id == 0)?'selected':''}}>{{trans('home.no_parent')}}</option>
                                        @foreach($courses as $courseItem)
                                            <option value="{{$courseItem->id}}"  {{($courseItem->id ==$course->parent_id)?'selected':''}}>{{(app()->getLocale() == 'en')?$courseItem->title_en:$courseItem->title_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="order">{{trans('home.order')}}</label>
                                    <input type="number" min="0"  class="form-control" placeholder="{{trans('home.order')}}" name="order" value="{{$course->order}}">
                                </div>
                                <div class="col-md-4">
                                    <label>{{trans('home.image')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>{{trans('home.breadcrump_video')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="breadcrump_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-4">
                                </div>

                                @if($course->image)
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="{{url('\uploads\courses\source')}}\{{$course->image}}" width="200" height="150">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($course->breadcrump_video)
                                    <div class="form-group col-md-4">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/courses/source/' . $course->breadcrump_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                <div class="col-md-4"></div>


                                <div class="form-group col-md-6 ">
                                    <label for="small_text_en">{{trans('home.small_text_en')}}</label>
                                    <textarea class="form-control area1" name="small_text_en" placeholder="{{trans('home.small_text_en')}}" >{!! $course->small_text_en !!}</textarea>
                                </div>

                                <div class="form-group col-md-6 "> 
                                    <label for="small_text_ar">{{trans('home.small_text_ar')}}</label>
                                    <textarea class="form-control area1" name="small_text_ar" placeholder="{{trans('home.small_text_ar')}}" >{!! $course->small_text_ar !!}</textarea>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="text_en">{{trans('home.text_en')}}</label>
                                    <textarea class="form-control area1" name="text_en" placeholder="{{trans('home.text_en')}}" >{!! $course->text_en !!}</textarea>
                                </div>

                                <div class="form-group col-md-6 "> 
                                    <label for="text_ar">{{trans('home.text_ar')}}</label>
                                    <textarea class="form-control area1" name="text_ar" placeholder="{{trans('home.text_ar')}}" >{!! $course->text_ar !!}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="ckbox">
                                        <input name="status" value="1" {{($course->status == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="image-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{url('/admin/courses')}}"><button type="button" class="btn btn-danger mr-1"><i class="image-trash"></i> {{trans('home.cancel')}}</button></a>
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
