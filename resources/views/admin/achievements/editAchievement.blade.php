@extends('layouts.admin')
@section('content')

<div class="container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.achievements')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/achievements')}}">{{trans('home.achievements')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_achievement')}}</li>
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
                            <h6 class="card-title mb-1">{{trans('home.edit_achievement')}}</h6>
                        </div>
                        {!! Form::open(['method'=>'PATCH','url' => 'admin/achievements/'.$achievement->id, 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="title_en">{{trans('home.title_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.title_en')}}" name="title_en">{!!$achievement->title_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="title_ar">{{trans('home.title_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.title_ar')}}" name="title_ar">{!!$achievement->title_ar!!}</textarea>
                                    </fieldset>
                                </div>

                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="text_en">{{trans('home.text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.text_en')}}" name="text_en">{!!$achievement->text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="text_ar">{{trans('home.text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.text_ar')}}" name="text_ar">{!!$achievement->text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="">{{trans('home.color')}}</label>
                                    <input class="form-control" name="color" type="text" placeholder="{{trans('home.color')}}" value="{{$achievement->color}}" >
                                </div>
                                <div class="col-md-8"></div>

                                <div class="col-md-12">
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
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="ckbox">
                                        <input name="status" value="1" {{($achievement->status == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{url('/admin/achievements')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
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
