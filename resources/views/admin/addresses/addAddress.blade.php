@extends('layouts.admin')
<title>{{trans('home.add_address')}}</title>
@section('content')

<div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.addresses')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/addresses')}}">{{trans('home.addresses')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.add_address')}}</li>
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
                            <h6 class="card-title mb-1">{{trans('home.add_address')}}</h6>
                        </div>
                        {!! Form::open(['route' => 'addresses.store', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.address_en')}}</label>
                                    <input class="form-control" name="address_en" type="text" placeholder="{{trans('home.address_en')}}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.address_ar')}}</label>
                                    <input class="form-control" name="address_ar" type="text" placeholder="{{trans('home.address_ar')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.name_en')}}</label>
                                    <input class="form-control" name="name_en" type="text" placeholder="{{trans('home.name_en')}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.email')}}</label>
                                    <input class="form-control" name="email" type="text" placeholder="{{trans('home.email')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.mobile')}}</label>
                                    <input class="form-control" name="mobile" type="text" placeholder="{{trans('home.mobile')}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.name_ar')}}</label>
                                    <input class="form-control" name="name_ar" type="text" placeholder="{{trans('home.name_ar')}}">
                                </div>

                                <div class="col-md-12">
                                    <label>{{trans('home.map_url')}}</label>
                                    <textarea class="form-control" name="map_url" type="text" placeholder="{{trans('home.map_url')}}"></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="ckbox">
                                        <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{url('/admin/addresses')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
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

