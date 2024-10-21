@extends('layouts.admin')
<title>{{trans('home.edit_postcard')}}</title>
@section('content')

<div class="container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.postcards')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/postcards')}}">{{trans('home.postcards')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_postcard')}}</li>
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
                            <h6 class="card-title mb-1">{{trans('home.edit_postcard')}}</h6>
                        </div>
                        {!! Form::open(['method'=>'PATCH','url' => 'admin/postcards/'.$postcard->id, 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.name_en')}}</label>
                                    <input class="form-control" name="name_en" type="text" placeholder="{{trans('home.name_en')}}"  value="{{$postcard->name_en}}" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.name_ar')}}</label>
                                    <input class="form-control" name="name_ar" type="text" placeholder="{{trans('home.name_ar')}}" value="{{$postcard->name_ar}}" >
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="text_en">{{trans('home.text_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.text_en')}}" name="text_en">{!!$postcard->text_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 area1">    
                                    <fieldset class="form-group">
                                        <label for="text_ar">{{trans('home.text_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.text_ar')}}" name="text_ar">{!!$postcard->text_ar!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="details_en">{{trans('home.details_en')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.details_en')}}" name="details_en">{!!$postcard->details_en!!}</textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-6 ">    
                                    <fieldset class="form-group">
                                        <label for="details_ar">{{trans('home.details_ar')}}</label>
                                        <textarea class="form-control area1" placeholder="{{trans('home.details_ar')}}" name="details_ar">{!!$postcard->details_ar!!}</textarea>
                                    </fieldset>
                                </div>

                                <div class="col-md-12">
                                    <label>{{trans('home.logo')}}</label>
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

                                @if($postcard->image)
                                    <div class="col-md-12">
                                        <img src="{{url('\uploads\postcards\source')}}\{{$postcard->image}}" width="150">
                                    </div>
                                @endif

                                <div class="form-group col-md-4">
                                    <label class="ckbox">
                                        <input name="status" value="1" {{($postcard->status == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{url('/admin/postcards')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
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
