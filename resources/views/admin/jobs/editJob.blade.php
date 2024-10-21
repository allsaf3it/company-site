@extends('layouts.admin')
<title>{{trans('home.edit_job')}}</title>
@section('content')

<div class="container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.jobs')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/jobs')}}">{{trans('home.jobs')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_job')}}</li>
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
                            <h6 class="card-title mb-1">{{trans('home.edit_job')}}</h6>
                        </div>
                        {!! Form::open(['method'=>'PATCH','url' => 'admin/jobs/'.$job->id, 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.position_en')}}</label>
                                    <input class="form-control" name="position_en" type="text" placeholder="{{trans('home.position_en')}}"  value="{{$job->position_en}}" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.position_ar')}}</label>
                                    <input class="form-control" name="position_ar" type="text" placeholder="{{trans('home.position_ar')}}" value="{{$job->position_ar}}" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.time')}}</label>
                                    <input class="form-control" name="time" type="text" placeholder="{{trans('home.time')}}"  value="{{$job->time}}" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.location')}}</label>
                                    <input class="form-control" name="location" type="text" placeholder="{{trans('home.location')}}" value="{{$job->location}}" >
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="ckbox">
                                        <input name="status" value="1" {{($job->status == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{url('/admin/jobs')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
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
