@extends('layouts.admin')
@section('meta')
    <title>{{trans('home.add_course')}}</title>
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
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.add_course')}}</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Row-->
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
                    
                    <div class="card-body">
                        <div>
                            <h6 class="card-title ">{{trans('home.add_course')}}</h6>
                        </div>
                        {!! Form::open(['route' => 'courses.store', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="slug_en">{{trans('home.slug_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.slug_en')}}" name="link_en" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="slug_ar">{{trans('home.slug_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.slug_ar')}}" name="link_ar" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="youtube_link">{{trans('home.youtube_link')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.youtube_link')}}" name="youtube_link">
                                </div>
                                                           
                                <div class="form-group col-md-3">
                                    <label for="title_en">{{trans('home.title_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.title_en')}}" name="title_en" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="title_ar">{{trans('home.title_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.title_ar')}}" name="title_ar">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.parent')}}</label>
                                    <select class="form-control select2" name="parent_id" required>
                                        <option value="0">{{trans('home.no_parent')}}</option>
                                        @foreach($courses as $course)
                                            <option value="{{$course->id}}">{{(app()->getLocale() == 'en')?$course->title_en:$course->title_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="order">{{trans('home.order')}}</label>
                                    <input type="number" min="0"  class="form-control" placeholder="{{trans('home.order')}}" name="order">
                                </div>
                                <!-- <div class="col-md-4">
                                    <label>{{trans('home.video')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div> -->
                                
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
                                <div class="col-md-4"></div>
                                

                                <div class="form-group col-md-6 ">
                                    <label for="small_text_en">{{trans('home.small_text_en')}}</label>
                                    <textarea class="form-control area1" name="small_text_en" placeholder="{{trans('home.small_text_en')}}" ></textarea>
                                </div>

                                <div class="form-group col-md-6 "> 
                                    <label for="small_text_ar">{{trans('home.small_text_ar')}}</label>
                                    <textarea class="form-control area1" name="small_text_ar" placeholder="{{trans('home.small_text_ar')}}" ></textarea>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="text_en">{{trans('home.text_en')}}</label>
                                    <textarea class="form-control area1" name="text_en" placeholder="{{trans('home.text_en')}}" ></textarea>
                                </div>

                                <div class="form-group col-md-6 "> 
                                    <label for="text_ar">{{trans('home.text_ar')}}</label>
                                    <textarea class="form-control area1" name="text_ar" placeholder="{{trans('home.text_ar')}}" ></textarea>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label class="ckbox">
                                        <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
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

